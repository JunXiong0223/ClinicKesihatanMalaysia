@extends('user.layout')

@section('content')
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-1">
        <div class="carousel-inner">
            <div class="carousel-item active"><a href="https://futurise.com.my/ohs" target="_blank"><img class="w-100 d-block" src="https://www.moh.gov.my/moh/resources/Main%20Banner/2022/Oktober/OHS_webbanner_FINAL.jpg" alt="Slide Image"></a></div>
            <div class="carousel-item"><a href="https://covid-19.moh.gov.my/makluman/senarai-fasiliti-kesihatan-swasta-bagi-rawatan-covid-19-dengan-paxlovid" target="_blank"><img class="w-100 d-block" src="https://www.moh.gov.my/moh/resources/Main%20Banner/2022/Jul/PAXLOVID-_KLINIK_SWASTA_png_.jpeg" alt="Slide Image"></a></div>
            <div class="carousel-item"><a href="https://docs.google.com/forms/d/e/1FAIpQLSd_o5Yq98AtT4gKCRfPS_lpG0lpTBZY8HaQHZ99QqQNJGa9pQ/viewform" target="_blank"><img class="w-100 d-block" src="https://www.moh.gov.my/moh/resources/Kajian_Kepuasan_Pelanggan_UKK.jpeg" alt="Slide Image"></a></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
        </ol>
    </div>
    <section class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Latest Articles</h2>
                <p class="text-center">Nunc luctus in metus eget fringilla. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae. </p>
            </div>
            <div class="row articles">
                <div class="col-sm-6 col-md-4 item"><a href="https://www.thestar.com.my/lifestyle/health/2022/11/22/are-you-losing-sleep-over-the-quality-of-your-sleep" target="_blank"><img class="img-fluid" src="https://apicms.thestar.com.my/uploads/images/2022/11/18/thumbs/medium/1825388.jpg"></a>
                    <h3 class="name">Are you losing sleep over the quality of your sleep?</h3>
                    <p class="description">Monitoring the quality of our sleep could actually be perpetuating the problem.</p><a class="action" href="https://www.thestar.com.my/lifestyle/health/2022/11/22/are-you-losing-sleep-over-the-quality-of-your-sleep" target="_blank"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="https://www.thestar.com.my/lifestyle/health/2022/11/20/the-more-covid-19-infections-you-get-the-more-health-problems-you-develop" target="_blank"><img class="img-fluid" src="https://apicms.thestar.com.my/uploads/images/2022/11/18/1825390.jpg"></a>
                    <h3 class="name">The more Covid-19 infections you get, the more health problems you develop</h3>
                    <p class="description">Constantly getting reinfected with Covid-19 puts a person at higher risk for serious health issues.</p><a class="action" href="https://www.thestar.com.my/lifestyle/health/2022/11/20/the-more-covid-19-infections-you-get-the-more-health-problems-you-develop" target="_blank"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="col-sm-6 col-md-4 item"><a href="https://www.thestar.com.my/lifestyle/health/the-doctor-says/2022/11/22/can-malaysia-meet-its-goals-when-it-comes-to-diabetes" target="_blank"><img class="img-fluid" src="https://apicms.thestar.com.my/uploads/images/2022/11/18/thumbs/medium/1825415.jpg"></a>
                    <h3 class="name">Can Malaysia meet its goals when it comes to diabetes? It could be challenging</h3>
                    <p class="description">The WHO has set hefty goals for countries to meet when it comes to diabetes, which is likely to prove challenging for Malaysia.</p><a class="action" href="https://www.thestar.com.my/lifestyle/health/the-doctor-says/2022/11/22/can-malaysia-meet-its-goals-when-it-comes-to-diabetes" target="_blank"><i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection