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
                <div>
                    <ul class="nav nav-tabs d-flex justify-content-center" role="tablist">
                        <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" href="#tab-1">Up Coming Appointment</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-2">Attend Appointment</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" href="#tab-3">Cancel Appointment</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                            <p>Content for tab 1.</p>
                            @if ($upcoming_appointments != null)
                                @foreach ($upcoming_appointments as $appointment)
                                    <div class="row" style="border-radius: 11px;box-shadow: 0px 0px 3px;">
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->attend_date}}</h2><span style="font-size: 26px;">{{$appointment->ServiceTime}}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-4" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->clinic_name}}</h2><span style="font-size: 26px;">{{ $appointment->address }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>Doctor</h2><span style="font-size: 26px;">{{ $appointment->name }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h3>Health Service</h3><span style="font-size: 26px;">{{ $appointment->ServiceName }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-2 d-lg-flex justify-content-lg-center align-items-lg-center" style="margin-bottom: 6px; margin-top: 6px;">
                                            <div class="btn-group d-flex d-sm-flex justify-content-center justify-content-sm-center" role="group">
                                                <button class="btn btn-primary" type="button" data-bs-target="#cancelAppointment{{$appointment->id}}" data-bs-toggle="modal">Cancel</button>
                                                <button class="btn btn-primary" type="button" data-bs-target="#updateAppointment{{$appointment->id}}" data-bs-toggle="modal">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="cancelAppointment{{$appointment->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Cancel Appointment</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1 style="font-size: 30px;">{{ $appointment->clinic_name }}</h1>
                                                    <p>{{ $appointment->ServiceName }}</p>
                                                    <p>{{ $appointment->attend_date }}</p>
                                                    <p>{{ $appointment->ServiceTime }}</p>
                                                    <p>{{ $appointment->address }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                                                    <form action="{{ route('user.cancelAppointment') }}" method="POST"> 
                                                        @csrf
                                                        <input type="hidden" name="appointmentId" id="appointmentId" value="{{$appointment->id}}" readonly>  
                                                        <button class="btn btn-primary" type="submit">Cancel Appointment</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="updateAppointment{{$appointment->id}}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Appointment</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('user.updateAppointment') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h1 style="font-size: 30px;">{{ $appointment->clinic_name }}</h1>
                                                        <p>{{ $appointment->ServiceName }}</p>
                                                        <p>{{ $appointment->address }}</p>
                                                        <div class="col d-grid align-items-xxl-center">
                                                            
                                                            <div class="d-inline-flex" style="margin-bottom: 10px;">
                                                                <div class="col-6 text-break d-xl-flex d-xxl-flex flex-fill justify-content-xl-center justify-content-xxl-center">
                                                                    <input class="flex-fill" type="date" id="appointment_date" name="appointment_date">
                                                                </div>
                                                                <div class="col-6 text-break d-xl-flex d-xxl-flex flex-fill justify-content-xl-center justify-content-xxl-center">
                                                                    <select class="d-xl-flex flex-fill align-items-xl-center" id="appointment_time" name="appointment_time">
                                                                        
                                                                        <option value="none" selected disabled hidden>Time Slot</option>
                                                                        @foreach ($timeslots as $timeslot)
                                                                            <option value="{{ $timeslot['id'] }}">{{ $timeslot['ServiceTime'] }}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                    
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="appointmentId" id="appointmentId" value="{{$appointment->id}}" readonly> 
                                                        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                                                        <button class="btn btn-primary" type="submit">Update Appointment</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            @else
                                
                            @endif
                            
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-2">
                            <p>Content for tab 2.</p>
                            @if ($attend_appointments != null)
                                @foreach ($attend_appointments as $appointment)
                                    <div class="row" style="border-radius: 11px;box-shadow: 0px 0px 3px;">
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->attend_date}}</h2><span style="font-size: 26px;">{{$appointment->ServiceTime}}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-4" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->clinic_name}}</h2><span style="font-size: 26px;">{{ $appointment->address }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>Doctor</h2><span style="font-size: 26px;">{{ $appointment->name }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h3>Health Service</h3><span style="font-size: 26px;">{{ $appointment->ServiceName }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-2 " style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>Status</h2><span style="font-size: 26px;">Attended</span>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            @else
                                
                            @endif
                            
                        </div>
                        <div class="tab-pane fade" role="tabpanel" id="tab-3">
                            <p>Content for tab 3.</p>
                            @if ($cancel_appointments != null)
                                @foreach ($cancel_appointments as $appointment)
                                    <div class="row" style="border-radius: 11px;box-shadow: 0px 0px 3px;">
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->attend_date}}</h2><span style="font-size: 26px;">{{$appointment->ServiceTime}}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-4" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>{{$appointment->clinic_name}}</h2><span style="font-size: 26px;">{{ $appointment->address }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>Doctor</h2><span style="font-size: 26px;">{{ $appointment->name }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-3 col-lg-2" style="margin-bottom: 6px; margin-top: 6px;">
                                            <h3>Health Service</h3><span style="font-size: 26px;">{{ $appointment->ServiceName }}</span>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-2 " style="margin-bottom: 6px; margin-top: 6px;">
                                            <h2>Status</h2><span style="font-size: 26px;">Cancel</span>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            @else
                                
                            @endif
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="d-xl-flex justify-content-xl-center" style="margin-top: 20px;">
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
    </div> --}}
@endsection