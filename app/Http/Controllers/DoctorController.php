<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function addDoctorQueue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'roomNo' => 'required',
            'docName' => 'required',
            'docspecial' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $doctorQueue = Doctor::create([
            'room_no' => $request->roomNo,
            'doctor_name' => $request->docName,
            'doctor_special' => $request->docspecial,
        ]);

        if ($doctorQueue) {
            return redirect()->route('dashboard')->with('success', 'Doctor Queue created successfully!');
        }

    }

    public function dashboard()
    {
        $queues = Doctor::all();

        return view('dashboard.dashboard', compact('queues'));
    }

    public function queueView()
    {
        // $queues = Doctor::orderBy('id', 'desc')->limit('5')->get();
        return view('queue.view');
    }

    public function getQueue()
    {
        $queues = Doctor::orderBy('id', 'desc')->limit('5')->get();
        // return response()->json($queues);
        return view('queue.queuecard', compact('queues'));
    }

    public function deleteQueue($id)
    {
        echo json_encode($id);
        exit();
    }
}