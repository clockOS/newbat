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
            ('select * from `newbietasks` a left join `newbietask_user` b on (a.id=b.task_id) where id=:tid;'
             , ['tid' => $id]);
        
        
        $quest = $results[0];
        
        
        //dd($results);
                
        $quest->body = $parsedown->text($quest->body);
        
        dd($quest->toArray());
                
        return view('quest.newbietask')->with($quest);

    }
    
    
    public function start($id)
    {
        
        
        
         $started = \DB::table("newbietask_user")
             ->where('task_id', '=',$id )
             ->where('user_id', '=',\Auth::id() )
             ->count();
        
        if($started>0){
        
            dd('did');
        
        }else{
            
            \DB::table('newbietask_user')
            ->insert(
                ['user_id' => \Auth::id(), 'task_id' => $id, 'state' => 8]
            );
                       
        }
        
    }


}
