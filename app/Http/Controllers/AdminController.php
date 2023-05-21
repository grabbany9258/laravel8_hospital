<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
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

    // Showing Appoitnment

    public function show_appointment()
    {
        $data = appoinment::all();
        return view('admin.show_appointment', compact('data'));
    }

    // For Approved appintment
    public function approved($id)
    {
        $data = appoinment::find($id);
        $data->status = 'Approved';
        $data->save();

        return redirect()->back();
    }

    // for canceld appointment

    public function canceled($id)
    {
        $data = appoinment::find($id);
        $data->status = 'Canceled';
        $data->save();

        return redirect()->back();
    }

    // Showing All Doctors
    public function allDoctors()
    {
        $data = doctor::all();
        return view('admin.all_doctors', compact('data'));
    }

    // Deleting Doctpor
    public function delete_doctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    // updating Doctor

    public function edit_doctor($id)
    {
        $data = doctor::find($id);
        return view('admin.edit_doctor', compact('data'));
    }

    // Update Doctor
    public function update_doctor(Request $request, $id)
    {
        $data = doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->number;
        $data->speciality = $request->speciality;
        $data->room = $request->room;

        $image = $request->file;

        if ($image) {

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $request->file->move('doctorImage', $imageName);
            $data->image = $imageName;
        }

        $data->save();
        return redirect('/alldoctors')->with('message', "Doctor Updated Successfully");
    }

    // fOR email send in show_appointment page

    public function emailview()
    {
        return view('admin.email_view');
    }
}
