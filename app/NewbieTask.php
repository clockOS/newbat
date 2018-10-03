<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class NewbieTask extends Model
{

    protected $table = 'newbietasks';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'type',
        'difficulty',
        'stock',
        'vote',
        'experience',
        'fullname',
        'estimated',
        'min_level',
        'days',
        'completed',
    ];
    
    protected $dates = ['estimated', 'completed', 'published_at'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
      
    public function final_checker()
    {
        return $this->belongsTo('App\User','final_checker_id');
    }
       
    public static function prerequisite($id)
    {
        //return $this->hasMany('App\Quest','id','prerequisite_id');
        return \DB::table('quests')
            ->join('prerequisite_quest', 'quests.id', '=', 'prerequisite_quest.prerequisite_id')
            ->where('prerequisite_quest.quest_id',$id)
            ->lists('quests.id', 'quests.title','quests.fullname');
    }
    
    public function quests()
    {
        return $this->belongsToMany('App\Quest','prerequisite_quest','quest_id','prerequisite_id');
    }    
    
    public function ownQuest()
    {
        return $this->belongsTo('App\User','user_id');
    }
    
}
