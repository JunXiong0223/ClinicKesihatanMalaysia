@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Create Time Slot</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <form method="post" action="{{ route('admin.timeSlotCreate') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="clinicTimeSlot">Clinic Time Slot</label>
                    <input class="form-control" type="time" style="height: 38px;" value="{{ old('clinicTimeSlot') }}" id="clinicTimeSlot" name="clinicTimeSlot" >
                    @error('clinicTimeSlot')
                       {{$message}}
                    @enderror
                </div>
                
                <div class="form-group d-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-xl-center">
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-danger flex-fill" type="button">Reset</button>
                    </div>
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-success d-flex flex-fill justify-content-center justify-content-xl-center" type="submit">Create</button>
                    </div>
                </div>
            </form>

            <form method="post" action="{{ route('admin.editClinic') }}">
                @csrf
                
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="ID">ID</label>
                    <input class="form-control" type="text" style="height: 38px;" id="ID" name="ID">
                    @error('clinicName')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="clinicName">Clinic Name</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('clinicName') }}" id="clinicName" name="clinicName">
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;">Label</label>
                    <input class="form-control" type="text" style="height: 38px;">
                </div>
                <div class="form-group d-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-xl-center">
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-danger flex-fill" type="button">Reset</button>
                    </div>
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-success d-flex flex-fill justify-content-center justify-content-xl-center" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection