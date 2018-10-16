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
        $res = $forum->signup('yellove', 'e8ff9773wdth12e6d89096089c45366f', 'yellove2392@gmail.com');

        //$res = $forum->login('yellove1992@gmail.com', 'e8ff9779c75012e6d89096089c45366f');

        dd($res);

        echo 'zhuce';
    }

}
