<?php

namespace App\Http\Controllers;

use App\Decision;
use App\Invest;
use App\Services\UpyunOther;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

use Clockos\ConnectToForum;
use Clockos\LevelCalculate;



class TestController extends Controller
{
    public function index()
    {
        return Invest::invested();
    }
    
    public function levelup(LevelCalculate $calc)
    {
        //input
        
        $level = 6;
        
        $exp = 530;
        
        $data['expInc'] = 200;
        
        $data['stockInc'] = 50;
        
        $data['voteInc'] = 30;
        
        //cal
                     
        $data['currentExp'] = $exp - 200 - $calc->toExp($level-1);
        
        $data['finishExp'] = $exp - $calc->toExp($level);
        
        $data['preLevel'] = $level - 1;
        
        $data['postLevel'] = $level;
        
        $data['preLevelExp'] = $calc->expPerLevel($level-1);    //182
        
        $data['postLevelExp'] = $calc->expPerLevel($level);     //254
        
        $data['preRatio'] = ($data['currentExp']/$data['preLevelExp'])*100;
        
        $data['postRatio'] = ($data['finishExp']/$data['postLevelExp'])*100;
       
        return view('user.levelup',$data);
    }



    public function test(ConnectToForum $forum)
    {
        //$res = $forum->signup('yellove', 'e8ff9773wdth12e6d89096089c45366f', 'yellove2392@gmail.com');

        //$res = $forum->login('yellove1992@gmail.com', 'e8ff9779c75012e6d89096089c45366f');
        
        $data= [];
        
        $data_string = json_encode($data);
        $ch = curl_init('https://bbsdev.fuckb.at/api/posts?filter[user]=130');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string),
                'Authorization: Token ' . config('app.forum.api_key') . '; userId=1',
            ]
        );
        $result = curl_exec($ch);
        
        $result = json_decode($result, true);
        
        //dd($result);
        
        echo count($result['data']);
        
        

    }

}
