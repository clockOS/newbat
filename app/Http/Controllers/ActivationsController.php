<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Activation;
use App\User;
use Illuminate\Support\Facades\Auth;

class ActivationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function confirmEmail($token)
    {
        $user = Activation::where('token',$token)->firstOrFail()->toArray();

        $nameparts = explode("@", $user['email']);

        $user['username'] = substr($nameparts[0], 0, 29);

        $user['sponsor_code'] = md5($user['email'].time());

        $user['avatar'] = 'https://cdn.cooldevelop.com/img/roles/color/rookie.png';

        $newUser = User::create($user);

        session()->flash('status', '账号激活成功！请登录。');

        Activation::where('email',$user['email'])->delete();

        Auth::login($newUser);

        Auth::user()->assignRole('rookie');

        return redirect("/newbie");

    }
}
