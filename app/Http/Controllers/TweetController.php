<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Tweet;
use App\Models\User;

class TweetController extends Controller
{
    public function showTweet($id)
    {
        $tweet = Tweet::where('id',$id)
                        ->with('user:id,name,photo','comment')
                        ->first();

        return view('tweet', compact('tweet'));
        // return $tweet;
    }

    public function storeTweetComment(Request $request, $id)
    {
        $user = User::find(Auth::id());

        $tweet_cmt = new Comment();
        $tweet_cmt->user_id = Auth::id();
        $tweet_cmt->tweet_id = $id;        
        $tweet_cmt->comment = $request->tweet_comment;        


        // $user->comment()->save($tweet_cmt);
        $tweet_cmt->save();

        return redirect()->route('showtweet', $id);
    }
}
