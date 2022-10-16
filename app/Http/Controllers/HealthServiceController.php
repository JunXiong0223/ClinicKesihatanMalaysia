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

        return redirect()->route('admin.healthServiceList');
    }

    public function update()
    {

    }
}
