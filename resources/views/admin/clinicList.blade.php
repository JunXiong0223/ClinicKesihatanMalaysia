@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Clinic List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Clinic Name</th>
                        <th>Clinic Address</th>
                        <th>Clinic Telephone No.</th>
                        <th>Clinic Start Operation Time</th>
                        <th>Clinic End Operation Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($clinics) > 0)
                        @foreach ($clinics as $clinic)
                            <tr>
                                <td><a href="{{ route('clinics.show', [ 'clinic' => $clinic['name'] ]) }}" style="color: var(--bs-gray-900);">{{$clinic['name']}}</a></td>
                                <td>{{$clinic['address']}}</td>
                                <td>{{$clinic['telephone_number']}}</td>
                                <td>{{$clinic['start_time']}}</td>
                                <td>{{$clinic['end_time']}}</td>
                                <td>
                                    <button style="all: unset; cursor: pointer;" data-toggle="modal" data-target="#clinicModal{{$clinic['id']}}">    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                    </button>
                                    <div class="modal fade" id="clinicModal{{$clinic['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update for {{$clinic['name']}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.editClinic') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="NameUpdate">Name</label>
                                                            <input type="text" class="form-control" id="NameUpdate" name="NameUpdate" aria-describedby="emailHelp" placeholder="{{$clinic['name']}}">
                                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="AddressUpdate">Address</label>
                                                            <input type="text" class="form-control" id="AddressUpdate" name="AddressUpdate" placeholder="{{$clinic['address']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="TeleUpdate">Staff Telephone No.</label>
                                                            <input type="password" class="form-control" id="TeleUpdate" name="TeleUpdate" placeholder="{{$clinic['telephone_number']}}">
                                                        </div>
                                                        {{-- <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                        </div> --}}
                                                        {{-- <div class="form-group">
                                                            <label for="ClinicUpdate">Change Clinic</label>
                                                            <select class="form-control" id="ClinicUpdate" name="ClinicUpdate">
                                                                @foreach ($clinics as $clinic)
                                                                    @if ($clinic['name'] ==  $staff->clinic_name)
                                                                        <option value="{{$clinic['id']}}" selected>{{$clinic['name']}}</option>
                                                                    @else
                                                                        <option value="{{$clinic['id']}}">{{$clinic['name']}}</option>
                                                                    @endif
                                                                    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div> --}}
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                        </div>
                
                                                        <input type="text" name="clinic_id" id="clinic_id" value="{{$clinic['id']}}" required readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            
        </div>
        <div class="col"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
    </div>
@endsection