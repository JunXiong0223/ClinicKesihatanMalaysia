@extends('user.layout')

@section('content')

    @if (Session::has('success'))
        
        <div class="alert alert-success text-break alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert </strong> {{ Session::get('success') }}</span>
        </div>
        {{ Session::forget('success') }}
    @endif

    @if (Session::has('failed'))
        
        <div class="alert alert-warning text-break alert-dismissible" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span class="text-break d-xl-flex justify-content-xl-center"><strong>Alert</strong> {{ Session::get('failed') }}</span>
        </div>
        {{ Session::forget('failed') }}
    @endif
    
    <div class="container">
        <div class="row" style="box-shadow: inset 0px 0px 2px var(--bs-teal);padding: 5px;">
            <div class="col-md-6">
                <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
                    <div class="carousel-inner">
                        @if (count($images) ==1)
                            @foreach ($images as $image)
                                <div class="carousel-item active"><img class="w-100 d-block" src="{{ url($image['url']) }}" alt="{{ $image['name'] }}"></div>
                            @endforeach
                        @else
                            @php
                                $count = true;
                            @endphp
                            @foreach ($images as $image)
                                @if ($count == true)
                                    <div class="carousel-item active"><img class="w-100 d-block" src="{{ url($image['url']) }}" alt="{{ $image['name'] }}" height="400"></div>
                                    @php
                                        $count = false;
                                    @endphp
                                @else
                                    <div class="carousel-item"><img class="w-100 d-block" src="{{ url($image['url']) }}" alt="{{ $image['name'] }}" height="400"></div>
                                @endif
                            @endforeach
                        @endif

                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                    <ol class="carousel-indicators">

                        @if ( count($images) ==1 )
                            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                        @else
                            @for ($i = 0; $i < count($images); $i++)
                                @if ($i == 0)
                                    <li data-bs-target="#carousel-1" data-bs-slide-to="{{$i}}" class="active"></li>
                                @else
                                    <li data-bs-target="#carousel-1" data-bs-slide-to="{{$i}}"></li>
                                @endif
                            @endfor
                        @endif

                    </ol>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <div class="col">
                        <h1 id="clinicName">{{ $clinicDetails['name'] }}</h1>
                    </div>
                    <div class="col">
                        <div>
                            <div class="row">
                                <div class="col-3 d-flex align-items-center"><label class="col-form-label text-break" for="tele">Telephone No</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center align-items-xxl-center"><span class="text-break">{{$clinicDetails['telephone_number']}}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-3 d-flex align-items-center"><label class="col-form-label text-break" for="tele">Start Hour</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center align-items-xxl-center"><span class="text-break">{{date("h:i a", strtotime($clinicDetails['start_time']) )}}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-3 d-flex align-items-center"><label class="col-form-label text-break" for="tele">End Hour</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center align-items-xxl-center"><span class="text-break">{{date("h:i a", strtotime($clinicDetails['end_time']) )}}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-3 d-flex align-items-center"><label class="col-form-label text-break" for="tele">Address</label></div>
                                <div class="col d-flex d-xxl-flex align-items-center align-items-xxl-center"><span class="text-break">{{$clinicDetails['address']}}</span></div>
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    <div class="col d-grid align-items-xxl-center">
                        <select class="float-start" style="height: 35px;margin-bottom: 12px;" id="service">
                            
                            <option value="none" selected disabled hidden>Select s Service</option>
                            @foreach ($services as $service)
                                @if ($service['is_deleted'] == 0)
                                    <option value="{{ $service['id'] }}">{{ $service['ServiceName'] }}</option>
                                @endif
                            @endforeach
                                
                        </select>

                        <div class="d-inline-flex" style="margin-bottom: 10px;">
                            <div class="col-6 text-break d-flex d-xl-flex d-xxl-flex flex-fill justify-content-center align-items-center justify-content-xl-center justify-content-xxl-center">
                                <input class="flex-fill" type="date" id="date">
                            </div>
                            <div class="col-6 text-break d-flex d-xl-flex d-xxl-flex flex-fill justify-content-center align-items-center justify-content-xl-center justify-content-xxl-center">
                                <select class="d-xl-flex flex-fill align-items-xl-center" id="time">
                                    
                                    <option value="none" selected disabled hidden>Time Slot</option>
                                    @foreach ($timeslots as $timeslot)
                                        @if ($timeslot['is_deleted'] == 0)
                                            <option value="{{ $timeslot['id'] }}">{{ date("h:i a", strtotime($timeslot['ServiceTime']) ) }}</option>
                                        @endif
                                        
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>

                        <br>
                        <input type="hidden" value="{{ $clinicDetails['id'] }}" id="clinicId" readonly>

                        <button class="btn btn-success" type="button" id="appointment">Make Appointment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="make_appointment">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Appointment Comformation</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modal_body">You have selected </p>
                        <div class="form-group row">
                            <label for="staticClinic" class="col-sm-4 col-form-label" >Clinic:</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" id="staticClinic" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticService" class="col-sm-4 col-form-label" >Service:</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" id="staticService" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Date:</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" id="staticDate" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-4 col-form-label">Time:</label>
                            <div class="col-sm-8">
                              <input type="text" readonly class="form-control-plaintext" id="staticTime" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <form method="post" action="{{ route('user.appointment') }}" >
                            @csrf
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                        
                            <input id="clinic_id" type="hidden" value="{{ $clinicDetails['id'] }}" name="clinic_id" readonly>
                            <input id="service_id" type="hidden" value="" name="service_id" readonly>
                            <input id="appointment_date" type="hidden" value="" name="appointment_date" readonly>
                            <input id="appointment_time" type="hidden" value="" name="appointment_time" readonly>

                            <button class="btn btn-primary" type="submit">Confirm</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <script>    

        $("#appointment").click(function () {

            let today = new Date().toISOString().slice(0, 10)
            var clinic = $("#clinicName").text();
            var service = $("#service").find(":selected").val();
            var time = $("#time").find(":selected").val();
            var date = $("#date").val();
            var str = "";

            if(service == "none" )
            {
                alert("Please Select a Service");
                return;
            }
            else if(time == "none")
            {
                alert("Please Select a Time");
                return;
            }
            else if(date == "")
            {
                alert("Please Select a Date");
                return;
            }
            else if (date != "" && date < today) {
                alert("Please Select Correct Date");
                return;
            }
            else
            {
                // //Modal content
                $("#staticClinic").val(clinic);
                $("#staticService").val($("#service").find(":selected").text());
                $("#staticDate").val($("#date").val());
                $("#staticTime").val($("#time").find(":selected").text());

                //send the backend data
                $("#service_id").val(service);
                $("#appointment_date").val(date);
                $("#appointment_time").val(time);

                $("#make_appointment").modal('show');
            }

            
        });
    </script>
@endsection