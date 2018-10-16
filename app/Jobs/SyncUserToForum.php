<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use Clockos\ConnectToForum;
use App\User;

class SyncUserToForum extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ConnectToForum $forum, User $sso_user)
    {
        dd($this->user);
        
        $generated_pw =  substr(md5(microtime()), 0, 59);
        
        $sso_user = User::find($this->user->id);
        
        $sso_user->forum_pw = $generated_pw;
        
        $sso_user->save();

        $forum_id = $forum->signup($this->user['username'], $this->user['forum_pw'], $this->user['email']);

        $forum->login($this->user['email'], $this->user['forum_pw']);

    }
}
