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
                    <h1>Heading</h1>
                    <p class="text-break" data-aos="slide-right" data-aos-once="true">Lorem ipsum dolor sit amet, eu evertitur adversarium mei, odio etiam an vel, his at molestie antiopam. Debet libris laoreet vel in. Ne iriure albucius perpetua eum, qui ex saepe graeci disputationi, an dolorem referrentur usu. Mel at meliore reprimique, tota sonet ceteros eos no, ut erant nusquam cum. Ei mutat error tantas eam, ad sonet deseruisse pro. Te sea ponderum pericula, eum ea volumus senserit necessitatibus, ex sint phaedrum vix.</p>
                </div>
                <div class="col d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus1.jpg') }}"></div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12 col-md-5 d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus2.jpg') }}"></div>
                <div class="col">
                    <h1 class="text-md-end">Heading</h1>
                    <p class="text-break text-start" data-aos="slide-left" data-aos-once="true">Lorem ipsum dolor sit amet, eu evertitur adversarium mei, odio etiam an vel, his at molestie antiopam. Debet libris laoreet vel in. Ne iriure albucius perpetua eum, qui ex saepe graeci disputationi, an dolorem referrentur usu. Mel at meliore reprimique, tota sonet ceteros eos no, ut erant nusquam cum. Ei mutat error tantas eam, ad sonet deseruisse pro. Te sea ponderum pericula, eum ea volumus senserit necessitatibus, ex sint phaedrum vix.</p>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;">
                <div class="col-sm-12 col-md-7">
                    <h1>Heading</h1>
                    <p class="text-break" data-aos="slide-right" data-aos-once="true">Lorem ipsum dolor sit amet, eu evertitur adversarium mei, odio etiam an vel, his at molestie antiopam. Debet libris laoreet vel in. Ne iriure albucius perpetua eum, qui ex saepe graeci disputationi, an dolorem referrentur usu. Mel at meliore reprimique, tota sonet ceteros eos no, ut erant nusquam cum. Ei mutat error tantas eam, ad sonet deseruisse pro. Te sea ponderum pericula, eum ea volumus senserit necessitatibus, ex sint phaedrum vix.</p>
                </div>
                <div class="col d-md-flex align-items-md-center"><img class="img-fluid" src="{{ url('images/aboutus3.jpg') }}"></div>
            </div>
        </div>
    </section>
@endsection