<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{username}', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/{username}/followers', [ProfileController::class, 'showFollowers'])->name('profile.followers');
    Route::get('/profile/{username}/following', [ProfileController::class, 'showFollowing'])->name('profile.following');

    Route::post('/profile/{username}/follow', [ProfileController::class, 'follow'])->name('profile.follow');
    Route::post('/profile/{username}/unfollow', [ProfileController::class, 'unfollow'])->name('profile.unfollow');

    Route::get('/profile', function(){
        return redirect()->route('profile.index', ['username' => auth()->user()->username]);
    });
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/home', [HomeController::class, 'tweetStore'])->name('tweet_store');

    //show tweet
    Route::get('/tweet/{id}', [TweetController::class, 'showTweet'])->name('showtweet');
    Route::post('/tweet/{id}', [TweetController::class, 'storeTweetComment'])->name('store_tweet_comment');

    //settings
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::get('/edit', [SettingController::class, 'editProfile'])->name('edit_profile');
});

require __DIR__.'/auth.php';
