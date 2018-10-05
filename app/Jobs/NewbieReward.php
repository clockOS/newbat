<?php

namespace App\Jobs;

use App\Income;
use App\Jobs\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Clockos\LevelCalculate;
use App\Status;
use DB;
use App\User;

class NewbieReward extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $quest;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($quest)
    {
        $this->quest = $quest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(LevelCalculate $calculate)
    {
        //阶段从3改为4
        //检查者的id
        DB::transaction(function() use ($calculate){

            //更新执行任务的用户的股权等

            $user = User::where('id',$this->quest->user_id)->first();

            $exp = $user->experience + $this->quest->experience;

            $user->level = $calculate->toLevel($exp,$user->level);

            $user->experience = $exp;

            $user->stock = $user->stock + $this->quest->stock;

            $user->voting = $user->voting + $this->quest->vote;

            $user->vote = $user->vote + $this->quest->vote;

            $user->save();

            $income = new Income;

            $income->user_id = $this->quest->user_id;

            $income->stock = $this->quest->stock;

            $income->experience = $this->quest->experience;

            $income->vote = $this->quest->vote;

            $income->per_stock = ($this->quest->stock/Status::usersSum('stock'))*100;

            $income->title = '完成"'.$this->quest->title.'"';

            $income->type = 'complete_task';

            $income->subject_id = $this->quest->id;

            $income->save();

        });

        //更新状态

        $status['stock_wait'] = Status::stocksNum([1,2,3]);             //待发行股权的总数

        $status['stock'] = Status::usersSum('stock');              //已发行股权的总数

        $status['per_stock'] = (1/(Status::usersSum('stock')))*100;                //平均每股所占百分比

        $status['quests_doing'] = Status::questsNum([3]);             //待发行股权的总数

        $status['quests_done'] = Status::questsNum([4]);

        $status['vote'] = Status::usersSum('vote');

        $status['quests_done'] = Status::questsNum([4]);

        Status::updateStatus($status);
        //通知执行者

    }
}
