@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Clinic List</h1>
        </div>
    </div>
    <br>
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
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($clinics) > 0)
                        @foreach ($clinics as $clinic)
                            <tr>
                                <td><a href="{{ route('clinics.show', [ 'clinic' => $clinic['id'] ]) }}" style="color: var(--bs-gray-900);">{{$clinic['name']}}</a></td>
                                <td>{{$clinic['address']}}</td>
                                <td>{{$clinic['telephone_number']}}</td>
                                <td>{{$clinic['start_time']}}</td>
                                <td>{{$clinic['end_time']}}</td>
                                <td>
                                    @if ($clinic['is_deleted'] == 0)
                                        Show
                                    @else
                                        Hide
                                    @endif
                                </td>
                                <td>
                                    <button style="all: unset; cursor: pointer;" data-toggle="modal" data-target="#clinicModal{{$clinic['id']}}">    
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </button>
                                    <div class="modal fade" id="clinicModal{{$clinic['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Update for {{$clinic['name']}} </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.editClinic') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="NameUpdate">Name</label>
                                                            <input type="text" class="form-control" id="NameUpdate" name="NameUpdate" aria-describedby="emailHelp" placeholder="{{$clinic['name']}}">
                                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="AddressUpdate">Address</label>
                                                            <input type="text" class="form-control" id="AddressUpdate" name="AddressUpdate" placeholder="{{$clinic['address']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="TeleUpdate">clinic Telephone No.</label>
                                                            <input type="text" class="form-control" id="TeleUpdate" name="TeleUpdate" placeholder="{{$clinic['telephone_number']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="TeleUpdate">Start Operate Time</label>
                                                            <input type="time" class="form-control" id="clinicStartOperationTime" name="clinicStartOperationTime" placeholder="{{$clinic['telephone_number']}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="TeleUpdate">End Operate Time</label>
                                                            <input type="time" class="form-control" id="clinicEndOperationTime" name="clinicEndOperationTime" placeholder="{{$clinic['telephone_number']}}">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="status">Status</label>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="0">Show</option>
                                                                <option value="1">Hide</option>
                                                            </select>
                                                        </div>
                
                                                        <input type="hidden" name="clinic_id" id="clinic_id" value="{{$clinic['id']}}" required readonly>
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