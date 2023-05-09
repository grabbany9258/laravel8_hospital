<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Homecontroller extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::User()->usertype == ('0')) {

                return view('user.home');
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    // For index function
    public function index()
    {
        return view('user.home');
    }
}
