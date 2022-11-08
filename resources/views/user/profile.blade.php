@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col">
                        <h1>Profile</h1>
                    </div>
                    <div class="col d-xl-flex justify-content-xl-end align-items-xl-center">
                        <button class="btn btn-primary float-end" type="button" onclick="magic()">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col" style="padding: 20px;">
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Name</label></div>
                    <div class="col"><input class="form-control" id="name" name="name" type="text" value="{{ $profiles['name'] }}" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Email</label></div>
                    <div class="col"><input class="form-control" id="email" name="email" type="text" value="{{ $profiles['email'] }}" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Telephone No</label></div>
                    <div class="col"><input class="form-control" id="teleNo" name="teleNo" type="text" value="{{ $profiles['telephone_number'] }}" disabled minlength="12"></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Date of Birth</label></div>
                    <div class="col"><input class="form-control" id="DOB" name="DOB" type="date" value="{{ $profiles['DOB'] }}" disabled></div>
                </div>
                <div class="row" style="margin-bottom: 25px;">
                    <div class="col-2"><label class="col-form-label">Address</label></div>
                    <div class="col"><input class="form-control" id="address" name="address" type="text" disabled minlength="20"></div>
                </div>
                <button class="btn btn-primary float-end" style="display: none;" id="submit" type="submit">Done</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function magic() {
            document.getElementById("name").disabled = !document.getElementById("name").disabled;
            document.getElementById("teleNo").disabled = !document.getElementById("teleNo").disabled;
            document.getElementById("DOB").disabled = !document.getElementById("DOB").disabled;
            document.getElementById("address").disabled = !document.getElementById("address").disabled;

            var x = document.getElementById("submit");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection