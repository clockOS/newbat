<?php
namespace App\Http\Controllers;
use App\Skill;
use App\Status;
use App\User;
use Gate;
use App\Department;
use App\Http\Requests\QuestRequest;
use App\NewbieTask;
use Illuminate\Support\Facades\Auth;
class NewbieTasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('profile', ['except' => ['index', 'show']]);
    }
    
    public function index()
    {
        
        $results = \DB::select
                    ('select * from `newbietasks` a left join `newbietask_user` b on (a.id=b.task_id AND b.`user_id`=:uid) order by `min_level`;'
                     , ['uid' => \Auth::id()]);
        
        $quests = collect($results);


        return view('quest.newbietasklist',compact('quests'));
        
    }
    
    
    public function show($id,\Parsedown $parsedown)
    {
        
        $results = \DB::select
            ('select * from `newbietasks` a left join `newbietask_user` b on (a.id=b.task_id AND b.`user_id`=:uid) where id=:tid;'
             , ['tid' => $id,'uid' => \Auth::id()]);
        
        
        $quest = $results[0];
        
        
        //dd($results);
                
        $quest->body = $parsedown->text($quest->body);
        
        $quest = get_object_vars($quest);
        
        //dd($quest);
                
        return view('quest.newbietask', $quest);

    }
    
    public function checkList()
    {
        
        $results = \DB::select
                    ('SELECT *
                        FROM `newbietask_user` n
                        INNER JOIN `users` u
                            on n.user_id = u.id
                        INNER JOIN `newbietasks` t
                            on t.id = n.task_id 
                            order by `completed`;'
                    );
        
        $results=collect($results);
        
        
        
        if(\Auth::user()->can('task_completion')){
            $quests = \DB::table("newbietask_user")
                           ->where('state', '=',10 )
                           ->orderBy('updated_at','desc')
                           ->paginate(30);
            
            //dd($quests);
            return view('manage.checknewbie',compact('results'));
            
        }else{
            return 'opps';
        }
    }
    
    
    public function start($id)
    {
        
        
        
         $started = \DB::table("newbietask_user")
             ->where('task_id', '=',$id )
             ->where('user_id', '=',\Auth::id() )
             ->count();
        
        if($started>0){
        
            dd('already started');
        
        }else{
            
            \DB::table('newbietask_user')
            ->insert(
                ['user_id' => \Auth::id(), 'task_id' => $id, 'state' => 8]
            );
            
            flash()->info('任务已经开始，完成任务后点击下面的“我已经完成了任务“');
            
            return redirect('/newbie/'.$id);
                       
        }
        
    }
    
    public function isCompleted($id)
    {
        if(\Auth::user()->can('task_completion')){
            
            
        $results = \DB::select
            ('select * from `newbietask_user` a inner join `newbietasks` b on (b.id=a.task_id) where cid=:cid;'
             , ['cid' => $id]);
        
        
        $quest = $results[0];
        
        
        dd($quests);
                
        $quest->body = $parsedown->text($quest->body);
        
        $quest = get_object_vars($quest);
            
            
            $quest = Quest::where('state',3)
                          ->whereNotNull('completed')
                          ->where('id',$id)
                          ->firstOrFail();
            $quest->state = 4;
            $quest->final_checker_id = \Auth::id();
            $quest->save();
            $job = new UpdateStatus($quest);
            $this->dispatch($job);
            flash()->success(trans('alert.check_completion'));
            return redirect('check/completion');
        }else{
            return 'opps';
        }
    }
    
    public function done($id)
    {
        
         $submitted = \DB::table("newbietask_user")
             ->where('task_id', '=',$id )
             ->where('user_id', '=',\Auth::id())
             ->where('state', '!=', 8)
             ->count();
        
        if($submitted>0){
        
            dd('told');
        
        }else{
            
            $now = date('Y-m-d H:i:s');
            
            \DB::table('newbietask_user')
                ->where('task_id', '=',$id )
                ->where('user_id', '=',\Auth::id())
            ->update(
                ['state' => 10 , 'completed' => $now ]
            );
            
            flash()->info('任务已经等待审核，审核结果将会发送到你的邮件');
            
            return redirect('/newbie/'.$id);
                       
        }
        
    }


}
