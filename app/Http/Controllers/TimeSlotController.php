<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {

        return view('admin.timeSlotList', [
            'timeSlots' => TimeSlot::all()
        ]);
    }

    public function create()
    {
        return view('admin.timeSlotManage');
    }

    public function store(Request $req)
    {
        $req -> validate([
            'clinicTimeSlot' => 'required'
        ]);

        $timeslot = new TimeSlot();

        $timeslot -> ServiceTime = $req->input('clinicTimeSlot');

        $timeslot -> is_deleted = 0;

        $timeslot->save();

        return redirect()->back()->with('success','Time Slot Create Successful');
    }

    public function update(Request $req)
    {
        $timeslot = TimeSlot::findOrFail($req->input('service_id'));

        if ($req->input('timeSlotUpdate') != null) {
            $timeslot->ServiceTime = $req->input('timeSlotUpdate');
        }

        if ($req->input('status') != null) {
            $timeslot->is_deleted = $req->input('status');
        }
        
        //dd($req->input('status'));

        $timeslot->save();

        return redirect()->back()->with('success','Time Slot update successful');
    }
}
