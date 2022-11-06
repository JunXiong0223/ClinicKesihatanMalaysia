@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 d-flex justify-content-center align-items-center">
                <h1 class="text-center d-inline-flex justify-content-lg-center align-items-lg-center">Clinic List</h1>
            </div>
            <div class="col d-flex float-start d-md-flex d-xxl-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-xxl-center align-items-xxl-center">
                <form action="{{ route('clinicSearch') }}" method="POST" class="d-flex float-end justify-content-center align-items-center align-items-md-center flex-lg-fill justify-content-xxl-center align-items-xxl-center" style="margin-right: 18px;">
                    @csrf
                    <input class="form-control me-auto" type="search" placeholder="Search Clinic Name" style="max-width: 800px;" name="search" id="search">
                    <button style="all: unset; cursor: pointer;" type="submit"><i class="fa fa-search d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="margin-left: 11px;font-size: 24px;"></i></button>
                </form>
            </div>
        </div>
        @if (count($clinics) > 0)
            @php
                $corousel=1;
            @endphp
            @foreach ($clinics as $clinic)
                <div class="row text-center d-xl-flex justify-content-xl-center align-items-xl-center" style="margin-bottom: 30px;">
                    <div class="col" style="border-style: none;">
                        <div class="container" style="box-shadow: 0px 0px 6px 1px var(--bs-teal);padding-bottom: 5px;padding-top: 5px;">
                            <div class="row">
                                <div class="col-md-12"><a href="{{ route('clinics.show', [ 'clinic' => $clinic['id'] ]) }}" style="color: var(--bs-gray-900);font-size: 40px;">{{$clinic['name']}}</a></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-md-flex d-lg-flex d-xxl-flex justify-content-md-center align-items-md-center justify-content-lg-center align-items-lg-center justify-content-xxl-center align-items-xxl-center">
                                    @php
                                        $counts=array();
                                    @endphp
                                    @php
                                        $times = 0;
                                    @endphp
                                    @foreach ($images as $image)
                                        @if ($image['clinic_id'] == $clinic['id'])
                                            @php
                                                $counts[] = $times;
                                            @endphp
                                        @endif
                                        @php
                                            $times++;
                                        @endphp
                                    @endforeach
                
                                    <div class="carousel slide flex-fill" data-bs-ride="carousel" id="carousel-{{$corousel}}">
                                        <div class="carousel-inner">
                                            
                                            @for ($i = 0; $i < count($counts); $i++)
                                                @if ($i == 0)
                                                    <div class="carousel-item active"><img class="w-100 d-block" src="{{ url($images[$counts[$i]]->url) }}" alt="{{ $images[$counts[$i]]->name }}"></div>
                                                @else
                                                    <div class="carousel-item"><img class="w-100 d-block" src="{{ url($images[$counts[$i]]->url) }}" alt="{{ $images[$counts[$i]]->name }}"></div>
                                                @endif
                                            @endfor
                                            
                                        </div>
                                        <div><a class="carousel-control-prev" href="#carousel-{{$corousel}}" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-{{$corousel}}" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
                                        <ol class="carousel-indicators">

                                            @for ($i = 0; $i < count($counts); $i++)
                                                @if ($i == 0)
                                                    <li data-bs-target="#carousel-{{$corousel}}" data-bs-slide-to="{{$i}}" class="active"></li>
                                                @else
                                                    <li data-bs-target="#carousel-{{$corousel}}" data-bs-slide-to="{{$i}}"></li>
                                                @endif
                                            @endfor
                                            
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div>
                                        <div class="row">
                                            <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center">
                                                <label class="col-form-label">Telephone No</label>
                                            </div>
                                            <div class="col text-break text-start d-flex align-items-center align-items-xxl-center">
                                                <span>{{$clinic['telephone_number']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center">
                                                <label class="col-form-label">Start Hour</label>
                                            </div>
                                            <div class="col text-start d-xxl-flex">
                                                <span class="text-break d-xxl-flex">{{$clinic['start_time']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center">
                                                <label class="col-form-label">End Hour</label>
                                            </div>
                                            <div class="col text-start d-xxl-flex">
                                                <span class="text-break d-xxl-flex">{{$clinic['end_time']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center">
                                                <label class="col-form-label">Address</label>
                                            </div>
                                            <div class="col text-start d-xxl-flex">
                                                <span class="text-break d-xxl-flex">{{$clinic['address']}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-primary" role="button" href="{{ route('clinics.show', [ 'clinic' => $clinic['id'] ]) }}">More Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $corousel++;
                @endphp
            @endforeach
        @else
            <h1>No Clinic Found</h1>
        @endif
       
        <div class="col">
            <nav class="text-center d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
                
                {{ $clinics->links() }}

            </nav>
            
        </div>
        
    </div>
@endsection