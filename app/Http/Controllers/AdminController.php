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

        $imageName = time() . '.' . $image->getClientoriginalExtension();
        $request->file->move('doctorImage', $imageName);
        $doctor->image = $imageName;

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();
        // return back()->with('message', 'Doctor Uploaded Successfully');
        return redirect()->back();
    }
}
