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
        $res = $forum->signup('xinmima', '18', 'xinasedfyo3@6we436.com');

        if(array_key_exists('errors', $res)){

            echo 'Error!';

        }

        //$forum->login('asdf@fuckb.at', '123456');

        dd($res);

        echo 'zhuce';
    }

}
