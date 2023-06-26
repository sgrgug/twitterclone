<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index()
    {
        
        $followingIds = auth()->user()->following()->pluck('users.id');

        $tweets = Tweet::whereIn('user_id', $followingIds)->get();

        //user details
        // $tweet_user_details = Tweet::all(); // Retrieve all the tweets

        // foreach ($tweet_user_details as $tweet) {
        //     $user = $tweet->user; // Retrieve the associated user

        //     // Now you can access the user details for each tweet
        //     echo $user->name;
        //     echo $user->email;
        //     // ... and so on
        // }


        return view('home', compact('tweets'));
    }

    public function tweetStore(Request $request)
    {
        $user = User::find(Auth::id());

        $tweet = new Tweet();
        $tweet->tweet = $request->tweet;

        $user->tweet()->save($tweet);

        return redirect()->route('home');
    }
}