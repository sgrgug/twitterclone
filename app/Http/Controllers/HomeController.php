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



        return view('home');
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
