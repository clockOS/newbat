<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Clockos\ConnectToForum;

class ForumController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function migrate(ConnectToForum $forum)
    {

        if(\Auth::user()->hasRole('ceo')){

            $users = User::all();

            $fail = 0;
            $success =0;
            
            foreach($users as $user){

                if(!$user->forum_id){

                    echo '<li>Email: ';
                    echo $user->email;

                    //Generate forum password    
                    $generated_pw =  substr(md5(microtime()), 0, 59);

                    //Save to the users table

                    $user->forum_pw = $generated_pw;

                    $user->save();

                    //Sign up forum account

                    $res = $forum->signup($user->username, $generated_pw, $user->email);

                    if(array_key_exists('errors', $res)){

                        foreach($res['errors'] as $error){
                            
                            print_r($error);
                        
                        }
                        $fail ++;

                    }else{

                        $forum_id = $res['data']['id'];

                        $user->forum_id = $forum_id;

                        $user->save();

                        echo '   <p style="color:blue">注册成功</p>';

                        $success ++;

                    }

                    echo '</li>';

                }

            }

            echo '成功 '.$success.' 失败 '.$fail;


        }else{
            return 'opps';
        }

    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
