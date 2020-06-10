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


    function about($page){

        return view('about.'.$page);

    }

    public function contact(){
        
        return view('about.contact');
        
    }

    public function home(){
        
        $status = Status::latest()->first();

        
        if(\App::getLocale()=='zh'){
            
            return view('user.about',compact('status'));
            
        }else{
            
            return view('user.en_about',compact('status'));
            
        }
        
    }
}
