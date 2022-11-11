@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Clinic List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <form method="post" action="{{ route('admin.timeSlotCreate') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="clinicTimeSlot">Clinic Time Slot</label>
                    <input class="form-control" type="time" style="height: 38px;" value="{{ old('clinicTimeSlot') }}" id="clinicTimeSlot" name="clinicTimeSlot" >
                    @error('clinicTimeSlot')
                       {{$message}}
                    @enderror
                </div>
                
                <div class="form-group d-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-xl-center">
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-danger flex-fill" type="button">Reset</button>
                    </div>
                    <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center">
                        <button class="btn btn-success d-flex flex-fill justify-content-center justify-content-xl-center" type="submit">Create</button>
                    </div>
                </div>
            </form>

        </div>
       
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            
            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>Service Time</th>
                        <th>Status</th>
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
                                <td>
                                    @if ($timeSlot['is_deleted'] == 0)
                                        Show
                                    @else
                                        Hide
                                    @endif
                                </td>
                                <td>
                                    <button style="all: unset; cursor: pointer;" data-toggle="modal" data-target="#serviceModal{{$timeSlot['id']}}">    
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                        </svg>
                                    </button>
    
                                    <div class="modal fade" id="serviceModal{{$timeSlot['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update for {{$timeSlot['ServiceTime']}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.timeSlotUpdate') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="timeSlotUpdate">Time Slot</label>
                                                            <input type="time" class="form-control" id="timeSlotUpdate" name="timeSlotUpdate">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" name="status" id="status">
                                                              <option value="0">Show</option>
                                                              <option value="1">Hide</option>
                                                            </select>
                                                          </div>
                
                                                        <input type="text" name="service_id" id="service_id" value="{{$timeSlot['id']}}" required readonly>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection