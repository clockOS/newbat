<?php
namespace App\Http\Controllers;
use App\Skill;
use App\Status;
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

        //$quests = NewbieTask::rightJoin('posts', 'users.id', '=', 'posts.user_id')latest('updated_at')->paginate(12);
        
        /*$quests = \DB::table('newbietasks')
                    ->leftJoin('newbietask_user', function ($join) {
                        $join->on('newbietask_user.user_id', '=', \Auth::id())
                             ->on('newbietask_user.task_id', '=', 'newbietasks.id');
                        })
                    ->orderBy('min_level')->paginate(12);*/
        
        $results = \DB::select
                    ('select * from `newbietasks` a left join `newbietask_user` b on (a.id=b.task_id AND b.`user_id`=:uid) order by `min_level`;'
                     , ['uid' => \Auth::id()]);
                    // ->get()
                     //->paginate(12);

        //dd($results);

        return view('quest.newbietasklist',compact('results'));
        
    }
    
    public function show($id,\Parsedown $parsedown)
    {
        $quest = Quest::findOrFail($id);
        
        $quest['body'] = $parsedown->text($quest['body']);
        $prerequisite = Quest::prerequisite($id);
        
        if($quest['state']<6){
            return view('quest.show',compact('quest','prerequisite'));
            
        }else{
            
            return view('quest.newbietask',compact('quest','prerequisite'));
            //die('Developing...');
        }
    }


}
