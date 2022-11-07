<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthService;

class HealthServiceController extends Controller
{
    public function index()
    {
        return view('admin.healthCareList', ['services' => HealthService::all()] );
    }

    public function create()
    {
        return view('admin.healthCareManage');
    }

    public function store(Request $req)
    {
        $service = new HealthService();

        $service-> ServiceName = $req->input('serviceName');

        $service->save();

        return redirect()->route('admin.healthServiceList')->with('success','Health Service add successful');
    }

    public function update()
    {
        $req -> validate([
            'clinic_id' => 'required',
        ]);

        $clinic = HealthService::findOrFail($req->input('clinic_id'));

        //$clinic->name = strip_tags($req->input('clinicName'));
        
        $clinic->save();

        return redirect()->route('admin.healthServiceList')->with('success','Health Service update successful');
    }
}
