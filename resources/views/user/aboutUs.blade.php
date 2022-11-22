@extends('user.layout')

@section('content')
    <section class="article-list">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1>Abouts Us</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <h1>Objective</h1>
                    <p class="text-break" style="text-align: justify;" data-aos="slide-right" data-aos-once="true">To assist an individual in achieving and sustaining as well as maintaining a certain level of health status to further facilitate them in leading a productive lifestyle - economically and socially.This could be materialised by introducing or providing a promotional and preventive approaches, other than an efficient treatment and rehabilitation services, which is suitable and effective, whilst priorities on the less fortunate groups.</p>
                </div>
                <div class="col d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus1.jpg') }}"></div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12 col-md-5 d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus2.jpg') }}"></div>
                <div class="col">
                    <h1 class="text-md-end">Vision</h1>
                    <p class="text-break text-end" data-aos="slide-left" data-aos-once="true">A nation working together for better health.</p>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12 col-md-7">
                    <h1>Mission</h1>
                    <ol data-aos="slide-right" data-aos-once="true">
                        <li> To facilitate and support the people to:
                            <ul style="list-style-type:circle">
                                <li>Attain fully their potential in health</li>
                                <li>Appreciate health as a valuable asset</li>
                                <li>Take individual responsibility and positive action for their health</li>
                            </ul>
                        </li>
                        <li> To ensure a high quality health system that is:
                            <ul style="list-style-type:circle">
                                <li>Customer centred</li>
                                <li>Equitable</li>
                                <li>Affordable</li>
                                <li>Efficient</li>
                                <li>Technologically appropriate</li>
                                <li>Environmentally adaptable</li>
                            </ul>
                        </li>
                        <li> With emphasis on:
                            <ul style="list-style-type:circle">
                                <li>Professionalism, caring and teamwork value</li>
                                <li>Respect for human dignity</li>
                                <li>Community participation</li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <div class="col d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus3.jpg') }}"></div>
            </div>
        </div>
    </section>
@endsection