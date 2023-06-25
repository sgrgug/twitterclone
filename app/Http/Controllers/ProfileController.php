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
            
            $user_followers = User::find(Auth::id())->following;
            $user_following = User::find(Auth::id())->followers;

            


            return view('profile.index', compact('username','auth_user_tweet_count', 'user_followers', 'user_following'));
            

        } else {
            
            //check profile visit user available or not in database
            $profile_visited_user = User::where('username', $username)->first();

            if($profile_visited_user){

                //get id of username of url from db
                $profile_visited_user_id = $profile_visited_user->id;
                // count the number of tweets of request(visited) user
                $profile_visited_user_no_of_tweets = Tweet::where('user_id',$profile_visited_user_id)->count();
                $username_info = User::find($profile_visited_user_id);


                // get no of follower and following
                $visited_user_followers = User::find($profile_visited_user_id)->following;
                $visited_user_following = User::find($profile_visited_user_id)->followers;

                // check the user follow or not
                $follower = User::find(Auth::id());
                $following = User::find($profile_visited_user_id);

                $isFollowing = $follower->following->contains($following);


                $check_follow_status = $isFollowing ? true : false;


                return view('profile.index', compact('username','profile_visited_user_no_of_tweets','username_info', 'visited_user_followers', 'visited_user_following','check_follow_status'));

            } else {
                return "user not found!";
            }
        }
    }

    public function showFollowing($username)
    {

        if($username == Auth::user()->username)
        {
            //count total number of tweets of auth user
            $auth_user_tweet_count = Tweet::where('user_id', Auth::id())->count();
            
            $user_followers = User::find(Auth::id())->following;
            $user_following = User::find(Auth::id())->followers;



            return view('profile.followers', compact('username','auth_user_tweet_count', 'user_followers', 'user_following'));
            

        } else {
            
            //check profile visit user available or not in database
            $profile_visited_user = User::where('username', $username)->first();

            if($profile_visited_user){

                //get id of username of url from db
                $profile_visited_user_id = $profile_visited_user->id;
                // count the number of tweets of request(visited) user
                $profile_visited_user_no_of_tweets = Tweet::where('user_id',$profile_visited_user_id)->count();
                $username_info = User::find($profile_visited_user_id);
                

                // get no of follower and following
                $visited_user_followers = User::find($profile_visited_user_id)->following;
                $visited_user_following = User::find($profile_visited_user_id)->followers;

                return view('profile.followers', compact('username','profile_visited_user_no_of_tweets','username_info', 'visited_user_followers', 'visited_user_following'));

            } else {
                return "user not found!";
            }
        }
    }

    public function showFollowers($username)
    {

        if($username == Auth::user()->username)
        {
            //count total number of tweets of auth user
            $auth_user_tweet_count = Tweet::where('user_id', Auth::id())->count();
            
            $user_followers = User::find(Auth::id())->following;
            $user_following = User::find(Auth::id())->followers;

            return view('profile.followers', compact('username','auth_user_tweet_count', 'user_followers', 'user_following'));
            

        } else {
            
            //check profile visit user available or not in database
            $profile_visited_user = User::where('username', $username)->first();

            if($profile_visited_user){

                //get id of username of url from db
                $profile_visited_user_id = $profile_visited_user->id;
                // count the number of tweets of request(visited) user
                $profile_visited_user_no_of_tweets = Tweet::where('user_id',$profile_visited_user_id)->count();
                $username_info = User::find($profile_visited_user_id);
                

                // get no of follower and following
                $visited_user_followers = User::find($profile_visited_user_id)->following;
                $visited_user_following = User::find($profile_visited_user_id)->followers;

                return view('profile.followers', compact('username','profile_visited_user_no_of_tweets','username_info', 'visited_user_followers', 'visited_user_following'));

            } else {
                return "user not found!";
            }
        }
    }

    //follow unfollow
    public function follow(Request $request, $username)
    {
        $follower = $request->user(); // Get the authenticated user who is following
        $following = User::where('username', $username)->first(); // Get the user being followed

        // Check if the relationship already exists
        if (!$follower->following->contains($following)) {
            // Add the relationship
            $follower->following()->attach($following);
        }

        return response()->json(['message' => 'Successfully followed.']);
    }

    public function unfollow(Request $request, $username)
    {
        $follower = $request->user(); // Get the authenticated user who is unfollowing
        $following = User::where('username', $username)->first(); // Get the user being unfollowed

        // Check if the relationship exists
        if ($follower->following->contains($following)) {
            // Remove the relationship
            $follower->following()->detach($following);
        }

        return response()->json(['message' => 'Successfully unfollowed.']);
    }

    
}
