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
                                    @if ($appointment->status != "Cancel")
                                        <div class="btn-group" role="group"><button class="btn btn-primary" type="button" data-bs-target="#cancelAppointment{{$appointment->id}}" data-bs-toggle="modal">Cancel</button>
                                            <button class="btn btn-primary" type="button" data-bs-target="#updateAppointment{{$appointment->id}}" data-bs-toggle="modal">Change Date</button>
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
                                    @else
                                        <h1>Cancel</h1>
                                    @endif
                                </div>
                                    
                            </div>
                        @endforeach
                    @else
                        <h1>No Appointment made before</h1>
                    @endif
                    
                    <div class="modal fade" role="dialog" tabindex="-1" id="modal-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="modal-2">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Title</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
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