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



    public function test(ConnectToForum $forum)
    {
        //$res = $forum->signup('xinmima', '188888888', 'xin.yo3@6we436.com');

        $res = $forum->login('fxxkbat@gmail.com', 'd341fecb6989e3a46b1187d5d017edba');

        dd($res);

        echo 'zhuce';
    }

}
