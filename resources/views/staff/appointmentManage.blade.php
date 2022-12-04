@extends('staff.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Appointment</h1>
        </div>
    </div>
    <br><br>
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
                                <td>{{$appointment->staff_name}}</td>
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
                                        <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td>
                                    @if ($appointment->status == "Cancel" || $appointment->attendance == 1)
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
                                                                    
                                                                        @if ($appointment->attendance == 1 || $appointment->status == 'Cancel')
                                                                            <input type="checkbox"  id="attend" name="attend" value="0" checked disabled>
                                                                        @else
                                                                            <input type="checkbox"  id="attend" name="attend" value="1">
                                                                        @endif
                                                                        <label for="attend" > Attend</label>
                                                                    
                                                                </div>  
                                                                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">   
                                                                    
                                                                        <label for="status"> Status</label>
                                                                        <select name="status"  id="status" required>
                                                                            <option value="NA" selected disabled> Select a status </option>
                                                                            <option value="Cancel">Cancel</option>
                                                                            <option value="Minor"> Minor </option>
                                                                            <option value="Medium"> Medium </option>
                                                                            <option value="Attention"> Attention </option>
                                                                            <option value="Serious"> Serious </option>
                                                                        </select>
                                                                    
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
        
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            @if (session()->get('infos'))
                @foreach (session()->get('infos') as $info)
                    <div class="row" style="box-shadow: 0px 0px 4px; border-radius: 5px; padding: 5px;">
                        <div class="col-4">
                            <label for="">Name: </label> <span>{{$info->name}}</span> <br>
                        </div>
                        <div class="col-4">
                            <label for="">Telephone: </label> <span>{{$info->telephone_number}}</span> <br>
                        </div>
                        <div class="col-4">
                            <label for="">Email: </label> <span>{{$info->email}}</span> <br>
                        </div>
                        <div class="col-6">
                            <label for="">Address: </label> <span>{{$info->address}}</span> <br>
                        </div>
                        <div class="col-6">
                            <label for="">Date of Birth: </label> <span>{{$info->DOB}}</span> <br>
                        </div>
                    </div>
                    <br>
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

                <div class="col">
                    <label for="">Status: </label>
                    <span>{{ $note->status }}</span>
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
