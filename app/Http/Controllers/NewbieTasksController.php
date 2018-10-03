<?php
namespace App\Http\Controllers;
use App\Skill;
use App\Status;
use Gate;
use App\Department;
use App\Http\Requests\QuestRequest;
use App\Quest;
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

        $quests = Quest::where('state','>',5);

        return view('quest.list',compact('quests'));
        
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
