@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Health Service List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <form method="post" action="{{ route('admin.healthServiceCreate') }}">
                @csrf
                <div class="form-group">
                    <label class="justify-content-xl-start align-items-xl-center" style="font-size: 20px;" for="serviceName">Health Service Name</label>
                    <input class="form-control" type="text" style="height: 38px;" value="{{ old('serviceName') }}" id="serviceName" name="serviceName">
                    @error('serviceName')
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
                        <th>Health Service</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>   
                            <td>{{ $service['ServiceName'] }}</td>
                            <td>
                                @if ($service['is_deleted'] == 0)
                                    Show
                                @else
                                    Hide
                                @endif
                            </td>
                            <td>
                                <button style="all: unset; cursor: pointer;" data-toggle="modal" data-target="#serviceModal{{$service['id']}}">    
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                </button>

                                <div class="modal fade" id="serviceModal{{$service['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update for {{ $service['ServiceName'] }} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.healthServiceUpdate') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="NameUpdate">Name</label>
                                                        <input type="text" class="form-control" id="NameUpdate" name="NameUpdate" placeholder="{{ $service['ServiceName'] }}">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select class="form-control" name="status" id="status">
                                                            <option value="0">Show</option>
                                                            <option value="1">Hide</option>
                                                        </select>
                                                    </div>
            
                                                    <input type="text" name="service_id" id="service_id" value="{{$service['id']}}" required readonly>
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
                </tbody>
            </table>
        </div>
    </div>
@endsection