@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Create Staff</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <form method="POST" action="{{ route('admin.staffStore') }}">
                @csrf
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffEmail">Staff Email</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('staffEmail') }}" id="staffEmail" name="staffEmail">
                    @error('staffEmail')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffPassword">Staff Password</label>
                    <input class="form-control" type="password" style="height: 38px;" value="" id="staffPassword" name="staffPassword">
                    @error('staffPassword')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffName">Staff Name</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('staffName') }}" id="staffName" name="staffName">
                    @error('staffName')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffAddress">Address</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('staffAddress') }}" id="staffAddress" name="staffAddress">
                    @error('staffAddress')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffDOB">Date of Birth</label>
                    <input class="form-control" type="date" style="height: 38px;" value="{{ old('staffDOB') }}" id="staffDOB" name="staffDOB">
                    @error('staffDOB')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="staffTelNo">Telephone No.</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('staffTelNo') }}" id="staffTelNo" name="staffTelNo">
                    @error('staffTelNo')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="clinic_id">Clinic Assigned</label>
                    <select class="form-control" name="clinic_id" id="clinic_id" required>
                        <option value="" selected disabled hidden>Select a Clinic</option>
                        @if ($clinics != null)
                            @foreach ($clinics as $clinic)
                                <option value="{{ $clinic['id'] }}">{{ $clinic['name'] }}</option>
                            @endforeach
                        @else
                            <option value="" disabled>No Clinic Created</option>
                        @endif
                        
                    </select>
                    @error('clinic_id')
                       {{$message}}
                    @enderror
                </div>
                <div class="form-group d-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-xl-center">
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <a class="btn btn-danger flex-fill" href="{{ route('admin.createStaff') }}">Reset</a>
                    </div>
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-success d-flex flex-fill justify-content-center justify-content-xl-center" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection