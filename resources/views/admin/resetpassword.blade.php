@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Reset password</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            
            <form method="post" action="{{ route('admin.handleresetpassword') }}">
                @csrf
                
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="ID">ID</label>
                    <input class="form-control" type="text" style="height: 38px;" id="ID" name="ID">
                    @error('clinicName')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="password">Password</label>
                    <input class="form-control" type="password" style="height: 38px;" id="password" name="password">
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="re-password">Password</label>
                    <input class="form-control" type="password" style="height: 38px;" id="re-password" name="re-password">
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
        <div class="col"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
    </div>
@endsection