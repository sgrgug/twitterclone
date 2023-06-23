<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Tweet;
use App\Models\User;
use App\Models\Follower;

class ProfileController extends Controller
{
    
    public function index($username)
    {

        if($username == Auth::user()->username)
        {
            //count total number of tweets of auth user
            $auth_user_tweet_count = Tweet::where('user_id', Auth::id())->count();

            return view('profile.index', compact('username','auth_user_tweet_count'));
        } else {
            
            //check profile visit user available or not in database
            $profile_visited_user = User::where('username', $username)->first();

            if($profile_visited_user){

                //get id of username of url from db
                $profile_visited_user_id = $profile_visited_user->id;
                // count the number of tweets of request(visited) user
                $profile_visited_user_no_of_tweets = Tweet::where('user_id',$profile_visited_user_id)->count();
                $username_info = User::find($profile_visited_user_id);

                return view('profile.index', compact('username','profile_visited_user_no_of_tweets','username_info', ));
            } else {
                return "user not found!";
            }
        }
    }
    
}
