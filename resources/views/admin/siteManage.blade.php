@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <form>
                <div class="col-xl-12 offset-xl-0 d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center"><label style="margin-right: 18px;min-width: 70px;font-size: 20px;padding-top: 5px;">Address</label><input class="form-control d-flex justify-content-center align-items-center" type="text"></div>
                <div class="col-xl-12 offset-xl-0 d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center" style="margin-top: 10px;"><label style="margin-right: 18px;min-width: 70px;font-size: 20px;padding-top: 5px;">E-Mail</label><input class="form-control d-flex justify-content-center align-items-center" type="text"></div>
                <div class="col d-inline-flex d-xl-flex justify-content-center justify-content-xl-center align-items-xl-end" style="margin-top: 10px;"><button class="btn btn-success flex-fill" type="button">Button</button></div>
                <div class="col d-inline-flex d-xl-flex justify-content-center justify-content-xl-center align-items-xl-end" style="margin-top: 10px;"><button class="btn btn-danger flex-fill" type="button">Button</button></div>
            </form>
        </div>
    </div>
@endsection