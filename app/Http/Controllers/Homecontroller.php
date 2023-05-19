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

    // For Appointment route

    public function appointment()
    {
        $doctor = doctor::all();
        return view('user.appointment', compact('doctor'));
    }

    // for appoinment Create

    public function appoint_Create(Request $request)
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

        return redirect()->back()->with('message', 'Apointment Request successful, We will contact you soon');
    }

    // For Viewing MyAppoinment
    public function myappoinment()
    {
        if (Auth::id()) //this auth for stoping url going without auth
        {
            $userid = Auth::user()->id;
            $appoint = appoinment::where('user_id', $userid)->get();

            return  view('user.my_appoinmet', compact('appoint'));
        } else {
            return redirect()->back();
        }
    }

    // For Cancelling Appoinment

    public function cancel_appoint($id)
    {
        $data = appoinment::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Doctor Page

    public function doctors_fun()
    {
        $doctor = doctor::all();
        return view('user.doctor_page', compact('doctor'));
    }

    // Contact Page

    public function contact()
    {
        return view('user.contact');
    }

    // Blog/News Page
    public function news()
    {
        return view('user.news');
    }
}
