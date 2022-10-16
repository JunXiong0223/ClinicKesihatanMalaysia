@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-bottom: 10px;margin-top: 10px;">
                <div class="row">
                    <div class="col">
                        <h1>Appointment History</h1>
                    </div>
                    <div class="col d-flex d-sm-flex d-md-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center align-items-sm-center justify-content-md-end align-items-md-center justify-content-xl-end align-items-xl-center"><button class="btn btn-primary float-end" type="button">Button</button></div>
                </div>
            </div>
            <div class="col">
                <div class="d-grid">
                    @if (count($appointments)>0)
                        @foreach ($appointments as $appointment)
                            <div class="row">
                                <div class="col-md-9" style="padding-left: 35px;">
                                    <h1 style="font-size: 30px;">{{ $appointment->clinic_name }}</h1>
                                    <p>{{ $appointment->ServiceName }}</p>
                                    <p>{{ $appointment->attend_date }}</p>
                                    <p>{{ $appointment->ServiceTime }}</p>
                                    <p>{{ $appointment->address }}</p>
                                    
                                </div>
                                <div class="col d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex justify-content-center justify-content-sm-center justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xl-center align-items-xl-center">
                                    <div class="btn-group" role="group"><button class="btn btn-primary" type="button" data-bs-target="#modal-1" data-bs-toggle="modal">Cancel</button><button class="btn btn-primary" type="button" data-bs-target="#modal-2" data-bs-toggle="modal">Change Data</button></div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1>No Appointment made before</h1>
                    @endif
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="d-xl-flex justify-content-xl-center" style="margin-top: 20px;">
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    </div>
@endsection