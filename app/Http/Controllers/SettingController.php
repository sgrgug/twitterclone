<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function editProfile()
    {
        $user = User::find(Auth::id());

        return view('profile.edit', compact('user'));
    }
}
