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
                                <td><button>Update</button></td>
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