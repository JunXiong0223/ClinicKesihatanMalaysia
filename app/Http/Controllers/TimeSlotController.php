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

        $timeslot->save();

        return redirect()->route('admin.timeSlotManage');
    }
}
