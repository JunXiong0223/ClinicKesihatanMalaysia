@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Staff List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>Staff Name</th>
                    <th>Staff Email</th>
                    <th>Staff Address</th>
                    <th>Staff Operation Time</th>
                    <th>Staff Telephone No.</th>
                    <th>Staff Clinic</th>
                    <th>Action</th>
                </tr>
            </thead>
          
            @if ($staffs === null)
                <tr>
                    <td>No Staff<td>
                </tr>
            @else
               
                @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>Staff Address</td>
                    <td>Staff Operation Time</td>
                    <td>Staff Telephone No.</td>
                    <td>{{ $staff->clinic_name }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staffModal{{$staff->id}}">Update</button>
                        <div class="modal fade" id="staffModal{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update for {{ $staff->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.staffUpdate') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="NameUpdate">Name</label>
                                                <input type="text" class="form-control" id="NameUpdate" name="NameUpdate" aria-describedby="emailHelp" placeholder="{{ $staff->name }}">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="AddressUpdate">Address</label>
                                                <input type="text" class="form-control" id="AddressUpdate" name="AddressUpdate" placeholder="Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="TeleUpdate">Staff Telephone No.</label>
                                                <input type="password" class="form-control" id="TeleUpdate" name="TeleUpdate" placeholder="Telephone No">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>
                                            <div class="form-group">
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
                                              </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
    
                                            <input type="hidden" name="staff_id" id="staff_id" value="{{$staff->id}}" required readonly>
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
            <tbody>
                
            </tbody>
        </table>
        </div>
    </div>
@endsection