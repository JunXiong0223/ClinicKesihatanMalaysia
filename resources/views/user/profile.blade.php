@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <h1>Profile</h1>
                    </div>
                    <div class="col d-xl-flex justify-content-xl-end align-items-xl-center"><button class="btn btn-primary float-end" type="button">Update</button></div>
                </div>
            </div>
        </div>
        <div class="col" style="padding: 20px;">
            <form>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Name</label></div>
                    <div class="col"><input class="form-control" type="text" value="{{ $profiles['name'] }}" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Email</label></div>
                    <div class="col"><input class="form-control" type="text" value="{{ $profiles['email'] }}" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Telephone No</label></div>
                    <div class="col"><input class="form-control" type="text" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Date of Birth</label></div>
                    <div class="col"><input class="form-control" type="text" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Label</label></div>
                    <div class="col"><input class="form-control" type="text" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Label</label></div>
                    <div class="col"><input class="form-control" type="text" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Label</label></div>
                    <div class="col"><input class="form-control" type="text" disabled></div>
                </div>
            </form>
        </div>
    </div>
@endsection