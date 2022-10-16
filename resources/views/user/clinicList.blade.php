@extends('user.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-4 d-flex justify-content-center align-items-center">
                <h1 class="text-center d-inline-flex justify-content-lg-center align-items-lg-center">Clinic List</h1>
            </div>
            <div class="col d-flex float-start d-md-flex d-xxl-flex justify-content-center align-items-center justify-content-md-center align-items-md-center justify-content-xxl-center align-items-xxl-center">
                <form class="d-flex float-end justify-content-center align-items-center align-items-md-center flex-lg-fill justify-content-xxl-center align-items-xxl-center" style="margin-right: 18px;">
                    <input class="form-control me-auto" type="search" placeholder="Search Clinic Name" style="max-width: 800px;">
                    <i class="fa fa-search d-xxl-flex justify-content-xxl-center align-items-xxl-center" style="margin-left: 11px;font-size: 24px;"></i>
                </form>
            </div>
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
                            <div class="col-md-12"><a href="{{ route('clinics.show', [ 'clinic' => $clinic['name'] ]) }}" style="color: var(--bs-gray-900);font-size: 40px;">{{$clinic['name']}}</a></div>
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
                                        {{-- <div class="carousel-item active"><img class="w-100 d-block" src="{{ asset($images[$counts[$i]]->url) }}" alt="Slide Image"></div>
                                        <div class="carousel-item"><img class="w-100 d-block" src="{{ asset($images[$counts[$i]]->url) }}" alt="Slide Image"></div> --}}
                                        
                                        @for ($i = 0; $i < count($counts); $i++)
                                            @if ($i == 0)
                                                <div class="carousel-item active"><img class="w-100 d-block" src="{{ asset($images[$counts[$i]]->url) }}" alt="Slide Image"></div>
                                            @else
                                                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset($images[$counts[$i]]->url) }}" alt="Slide Image"></div>
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
                            <div class="col-md-6">
                                <div>
                                    <div class="row">
                                        <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center"><label class="col-form-label">Telephone No</label></div>
                                        <div class="col text-start d-xxl-flex">
                                            <p class="text-break d-xxl-flex">{{$clinic['telephone_number']}}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center"><label class="col-form-label">Start Hour</label></div>
                                        <div class="col text-start d-xxl-flex">
                                            <p class="text-break d-xxl-flex">{{$clinic['start_time']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center"><label class="col-form-label">End Hour</label></div>
                                        <div class="col text-start d-xxl-flex">
                                            <p class="text-break d-xxl-flex">{{$clinic['end_time']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 d-flex d-xl-flex justify-content-start align-items-center justify-content-xl-start align-items-xl-center"><label class="col-form-label">Address</label></div>
                                        <div class="col text-start d-xxl-flex">
                                            <p class="text-break d-xxl-flex">{{$clinic['address']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><a class="btn btn-primary" role="button" href="{{ route('clinics.show', [ 'clinic' => $clinic['name'] ]) }}">More Details</a></div>
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
    @endif
    
    <div class="col">
        <nav class="text-center d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
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