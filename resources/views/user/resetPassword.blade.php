@extends('user.layout')

@section('content')
    <section class="login-clean" style="box-shadow: 0px 0px;">
        <form method="post" action="{{ route('user.handleresetpassword') }}" style="height: 326px;">
            @csrf
            <h1 class="display-1" style="font-size: 28px;text-align: center;margin-top: -24px;margin-bottom: 17px;"><strong>RESET PASSWORD</strong></h1>
            {{-- <div class="mb-3"><input class="form-control" type="password" name="oldpassword" placeholder="Old Password"></div> --}}
            <div class="mb-3"><input class="form-control" type="password" name="newpassword" placeholder="New Password"></div>
            <div class="mb-3"></div><input class="form-control" type="password" name="repassword" placeholder="Repeat Password">
            <button class="btn btn-primary d-block w-100" type="submit" style="background: #ff655b;font-size: 22px;">Reset</button>
        </form>
    </section>
@endsection