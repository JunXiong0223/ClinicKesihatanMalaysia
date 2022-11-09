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

        $service-> is_deleted = 0;

        $service->save();

        return redirect()->route('admin.healthServiceList')->with('success','Health Service add successful');
    }

    public function update(Request $req)
    {
        $healthService = HealthService::findOrFail($req->input('service_id'));

        if ($req->input('NameUpdate') != null) {
            $healthService->ServiceName = $req->input('NameUpdate');
        }

        if ($req->input('status') != null) {
            $healthService->is_deleted = $req->input('status');
        }
        
        //dd($req->input('status'));

        $healthService->save();

        return redirect()->back()->with('success','Health Service update successful');
    }
}
