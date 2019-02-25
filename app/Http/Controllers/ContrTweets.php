<?php

namespace App\Http\Controllers;

use App\Tweets;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContrTweets extends Controller
{
    
    public function create(Request $req){
        $tweet = new Tweets;
        $tweet->users_id = Auth::user()->id;
        $tweet->tweet = $req->input('tweet');
        $tweet->save();

        return redirect('home');
    }
    
    public function read($id){
        
    }

    public function readAll(){
        $tweets = \App\Tweets::all();
        return view('home')
            ->with('tweets', $tweets);
    }

    public function update(){

    }

    public function delete(){

    }

    
}