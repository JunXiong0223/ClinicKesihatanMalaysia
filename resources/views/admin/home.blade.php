@extends('admin.layout')

@section('js')
    <script type="text/javascript">
        // Pie Chart
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work',     11],
            ['Eat',      2],
            ['Commute',  2],
            ['Watch TV', 2],
            ['Sleep',    7]
        ]);

        var options = {
            title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }

        // Bar Chart
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawMaterial);

        function drawMaterial() {
            var data = google.visualization.arrayToDataTable([
                ['City', '2010 Population', '2000 Population'],
                ['New York City, NY', 8175000, 8008000],
                ['Los Angeles, CA', 3792000, 3694000],
                ['Chicago, IL', 2695000, 2896000],
                ['Houston, TX', 2099000, 1953000],
                ['Philadelphia, PA', 1526000, 1517000]
            ]);

            var materialOptions = {
                chart: {
                title: 'Population of Largest U.S. Cities'
                },
                hAxis: {
                title: 'Total Population',
                minValue: 0,
                },
                vAxis: {
                title: 'City'
                },
                bars: 'horizontal'
            };
            var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
            materialChart.draw(data, materialOptions);
            }
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Admin</h1>
        </div>
    </div>
    <div class="row" >
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;">
            <p><br>List of staff<br><br></p>
        </div>
        <div class="row" style="box-shadow: 0px 0px 20px 1px; border-radius: 10px;">
            <div class="col-9 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-fill justify-content-center justify-content-sm-center justify-content-md-center align-items-md-center justify-content-lg-center" style="margin-top: 5px;margin-bottom: 5px;">
                <div id="piechart" class="d-sm-flex flex-fill justify-content-sm-center align-items-sm-center" style="width: 100%; height: 100%; padding: 10px;">


                </div>
            </div>
            <div class="col-3">
                <div class="row">
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Appointments</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Attend</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Cancel</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row" style="box-shadow: 0px 0px 20px 1px; border-radius: 10px;">
            <div class="col-3">
                <div class="row">
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Users</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Staffs</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Clinics</h4>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9 d-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex flex-fill justify-content-center justify-content-sm-center justify-content-md-center align-items-md-center justify-content-lg-center" style="margin-top: 5px;margin-bottom: 5px;">
                <div id="chart_div" class="d-sm-flex flex-fill justify-content-sm-center align-items-sm-center" style="width: 100%; height: 100%; padding: 10px;">


                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-0 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0" style="margin-top: 5px;margin-bottom: 5px;"></div>
    </div>
@endsection