@extends('staff.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Appointment</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
     
            <table id="table_id" class="display" >
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Clinic</th>
                        <th>Doctor</th>
                        <th>Service</th>
                        <th>Attend Date</th>
                        <th>Attend Time</th>
                        <th>Attendance</th>
                        <th>Status</th>
                        <th>Health Note</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @if ($appointments != null)
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>
                                    <a href="{{ route('staff.info', ['id' => $appointment->id]) }}"> {{$appointment->user_name}}</a>
                                </td>
                                <td>{{$appointment->clinic_name}}</td>
                                <td>{{$appointment->staff_id}}</td>
                                <td>{{$appointment->ServiceName}}</td>
                                <td>{{$appointment->attend_date}}</td>
                                <td>{{$appointment->ServiceTime}}</td>
                                <td>
                                    @if ($appointment->attendance == 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                        </svg>
                                    @endif
                                </td>
                                <td>{{$appointment->status}}</td>
                                <td>
                                    <a href="{{ route('staff.healthNote', ['id' => $appointment->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journals" viewBox="0 0 16 16">
                                            <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                                            <path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/>
                                        </svg> 
                                    </a>
                                </td>
                                <td>
                                    @if ($appointment->status == "Cancel")
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $appointment->id }}" disabled>Update</button>
                                    @else
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $appointment->id }}">Update</button>
                                        <div class="modal fade" id="exampleModal{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update for {{ $appointment->user_id }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('staff.update') }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            
                                                            <div class="row"> 
                                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
                                                                    <div class="form-group">
                                                                        @if ($appointment->attendance == 1)
                                                                        <input type="checkbox" class="form-check-input" id="attend" name="attend" value="0" checked disabled>
                                                                        @else
                                                                            <input type="checkbox" class="form-check-input" id="attend" name="attend" value="1">
                                                                        @endif
                                                                        <label for="attend" class="form-check-label"> Attend</label>
                                                                    </div>
                                                                </div>  
                                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">   
                                                                    <div class="form-group">
                                                                        <label for="status"> Status</label>
                                                                        <select name="status" class="form-control" id="status">
                                                                            <option value="NA">  </option>
                                                                            <option value="a"> a </option>
                                                                        </select>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            
                                                            <label for="note">Note</label><br>
                                                            <textarea name="note" id="note" rows="10" style="width: 100%;" ></textarea>
                                                            <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                                
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="col"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
           
            {{-- @include('staff.appointmentHealthNote') --}}

            {{-- @if (session()->get('notes'))
                @foreach (session()->get('notes') as $note)
                    <label for="">User</label>{{$note->user_id}} <br>
                    <label for="">Staff</label>{{$note->staff_id}} <br>
                    <label for="">Note</label>{{$note->note}} <br> --}}

                    {{-- <div class="row" style="border-radius: 11px;box-shadow: 0px 0px 3px;">
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
                    </div> --}}
                    {{-- <p>===============================================</p>
                @endforeach

                @php
                     Session::forget('notes');
                @endphp --}}

                {{-- {{ session()->get('notes')->links() }} --}}
            {{-- @endif --}}
            
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            @if (session()->get('infos'))
                @foreach (session()->get('infos') as $info)
                    <label for="">Name</label>{{$info->name}} <br>
                    {{-- <label for="">Telephone</label>{{$info->staff_id}} <br> --}}
                    <label for="">Email</label>{{$info->email}} <br>

                    <p>===============================================</p>
                @endforeach

                @php
                     Session::forget('infos');
                @endphp
            @endif
        </div>
    </div>
    @if (session()->get('notes'))
        @foreach (session()->get('notes') as $note)
            <div class="row" style="box-shadow: 0px 0px 4px; border-radius: 5px; padding: 5px;">
                <div class="col">
                    <label for="">Patient: </label>
                    <span>{{ $note->user }}</span>
                </div>
                <div class="col">
                    <label for="">Doctor: </label>
                    <span>{{ $note->staff }}</span>
                </div>

                <div class="col">
                    <label for="">Service: </label>
                    <span>{{ $note->ServiceName }}</span>
                </div>

                <div class="col-12 text-justify d-xl-flex align-items-xl-center">
                    <p class="text-break text-justify">{{ $note->note }}</p>
                </div>

                <div class="col">
                    <label for="">Clinic: </label>
                    <span>{{ $note->clinic }}</span>
                </div>

                <div class="col">
                    <label for="">Attend Date: </label>
                    <span>{{ $note->attend_date }}</span>
                </div>
            </div>
            <br>
        @endforeach
            
        @php
            Session::forget('notes');
        @endphp
    @endif
    
@endsection
