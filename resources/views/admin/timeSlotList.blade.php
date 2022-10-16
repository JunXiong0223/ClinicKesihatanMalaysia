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
                        <th>Service Time</th>
                        <th>Action</th>
                        {{-- <th>Clinic Address</th>
                        <th>Clinic Start Operation Time</th>
                        <th>Clinic End Operation Time</th>
                        <th>Clinic Telephone No.</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @if (count($timeSlots) > 0)
                        @foreach ($timeSlots as $timeSlot)
                            <tr>
                                <td>{{$timeSlot['ServiceTime']}}</td>
                                <td><button>Update</button></td>
                                {{-- <td>{{$timeSlot['address']}}</td>
                                <td>{{$timeSlot['telephone_number']}}</td>
                                <td>{{$timeSlot['start_time']}}</td>
                                <td>{{$timeSlot['end_time']}}</td> --}}
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