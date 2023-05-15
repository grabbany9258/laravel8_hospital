<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
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
        // For preventing routing issue this if condition
        if (Auth::id()) {
            return redirect('home');
        } else {

            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    // for appoinment

    public function appoinment(Request $request)
    {
        $data = new appoinment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();

        return redirect()->back()->with('message', 'Apoinment Request successful, We will contact you soon');
    }
}
