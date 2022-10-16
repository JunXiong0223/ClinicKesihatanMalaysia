@extends('staff.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Schedule</h1>
        </div>
    </div>
    <div class="row">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>DateTime</th>
                    <th>Patient</th>
                    <th>Service</th>
                    <th>Attendence</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>DateTime</td>
                    <td><a href="#">Patient</a></td>
                    <td>Service</td>
                    <td>Attendence</td>
                    <td>Note</td>
                </tr>
            </tbody>
        </table>
        
    </div>
@endsection