<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    // Upload 
    public function upload(Request $request)
    {
        $doctor = new doctor;

        $image = $request->file;

        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->file->move('doctorImage', $imageName);
        $doctor->image = $imageName;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();

        return  redirect()->back()->with('message', 'Doctor Added Successfully');
        // return redirect()->back();
    }
}
