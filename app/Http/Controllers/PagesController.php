<?php

namespace App\Http\Controllers;

use App\Weekly;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {

    }
    //


    function about($page){

        return view('about.'.$page);

    }

    public function contact(){
        return view('about.contact');
    }

    public function home(){
        
        if(Auth::user()){
            
            dd(\Auth::user()->roles()->first()->name);
        
        
            if(\Auth::user()->roles()->first()->name == 'rookie'){

                return redirect("/newbie");

            }
         
        
        }
        


        $status = Status::latest()->first();

        return view('user.about',compact('status'));
    }
}
