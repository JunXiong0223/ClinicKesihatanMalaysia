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
                    <th>Staff Image</th>
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
                    <td>Staff Image</td>
                    <td>{{ $staff['email'] }}</td>
                    <td>{{ $staff['name'] }}</td>
                    <td>Staff Address</td>
                    <td>Staff Operation Time</td>
                    <td>Staff Telephone No.</td>
                    <td>Staff Clinic</td>
                    <td><button>Update</button></td>
                </tr>
                @endforeach
            @endif
            <tbody>
                
            </tbody>
        </table>
        </div>
    </div>
@endsection