<?php

namespace App\Http\Controllers;
use App\Models\Clinic;
use App\Models\HealthService;
use App\Models\Image;
use App\Models\TimeSlot;

use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        return view('admin.clinicList',[
            'clinics' => Clinic::all(),
            'images' => Image::all(),
        ]);
    }

    public function create()
    {
        return view('admin.clinicManage');
    }

    public function edit(Request $req)
    {
        $req -> validate([
            'clinicName' => 'required|min:5',
            'ID' => 'required'
        ]);

        $clinic = Clinic::findOrFail($req->input('ID'));

        $clinic->name = strip_tags($req->input('clinicName'));
        
        $clinic->save();

        return redirect()->route('admin.clinics');
    }

    public function store(Request $req)
    {
        $req -> validate([
            'clinicName' => 'required|min:5',
            'clinicAddress' => 'required',
            'clinicTelNo' => 'required',
            'clinicStartOperationTime' => 'required',
            'clinicEndOperationTime' => 'required'

        ]);


        $clinic = new Clinic();

        $clinic->name =  strip_tags($req->input('clinicName'));

        $clinic->address =  strip_tags($req->input('clinicAddress'));

        $clinic->telephone_number =  strip_tags($req->input('clinicTelNo'));

        $clinic->start_time =  strip_tags($req->input('clinicStartOperationTime'));

        $clinic->end_time =  strip_tags($req->input('clinicEndOperationTime'));
        
        $clinic->save();

        $clinic_Id = Clinic::all()->where('name',$req->input('clinicName'))->last();

        //dd($clinic_Id['id']);
        
        if ($images = $req->file('clinicImage')) {
            foreach($images as $image){

                $clinic_image_name = md5(rand(100, 1000));

                $clinic_image_file = $image->storeAs('images', $clinic_image_name, 'public');

                $clinic_image = new Image();

                $clinic_image->clinic_id = $clinic_Id['id'];

                $clinic_image->name = $clinic_image_name;

                $clinic_image->url = $clinic_image_file;

                $clinic_image->save();
            }
        }
        
        return redirect()->route('admin.clinics');
    }

    public function show($clinicDetail)
    {
        $clinics = Clinic::all()->where('name',$clinicDetail)->first();

        if($clinics == null)
        {
            abort(404);
        }
        return view('user.clinicDetail', [ 
            'clinicDetails' => $clinics, 
            'services' => HealthService::all(),
            'images' => Image::all()->where('clinic_id', $clinics['id']),
            'timeslots' => TimeSlot::all(),
            //dd(Image::all()->where('clinic_id', $clinics['id'])),
        ]);
    }
}
