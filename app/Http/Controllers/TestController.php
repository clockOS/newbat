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



class TestController extends Controller
{
    public function index()
    {
        return Invest::invested();
    }
    
    public function levelup()
    {
        
        
        $data['preLevel'] = 5;
        
        $data['postLevel'] = 6;
        
        $data['preLevelExp'] = 200;
        
        $data['postLevelExp'] = 5;
        
        $data['stockInc'] = 5;
        
        $data['voteInc'] = 5;
        
        $data['expInc'] = 5;
        
        $data['currentExp'] = 350;
        
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
