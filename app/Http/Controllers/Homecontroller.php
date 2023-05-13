<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Homecontroller extends Controller
{
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::User()->usertype == ('0')) {
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
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
        // For preventing routing issue
        if (Auth::id()) {
            return redirect('home');
        } else {


            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
    }
}
