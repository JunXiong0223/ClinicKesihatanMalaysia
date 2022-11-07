@extends('admin.layout')

@section('js')
    <script type="text/javascript">
        // Pie Chart
        const currentMonth = new Date();
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Services', 'Amount of Patient'],
            
            <?php
                foreach($pies as $pie)
                {
                    echo "['".$pie->ServiceName."',".$pie->val."],";
                }
            ?>

        ]);

        var options = {
            title: 'Patients attend for services on '+months[currentMonth.getMonth() - 1]
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }

        // Bar Chart
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawMaterial);

        function drawMaterial() {
            var data = google.visualization.arrayToDataTable([
                ['Service', 'Last Month', 'This Month'],
                ['Service 1', 100, 120],
                ['Service 2', 80, 140],
                ['Service 3', 150, 70],
                ['Service 4', 160, 50],
                ['Service 5', 200, 300]
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
                                <h5 class="card-title">Today Appointments</h5>
                                <h5 class="display-1 text-center card-text">{{ $appointment }}</h5>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h5 class="card-title">Today Attend</h5>
                                <h1 class="display-1 text-center card-text">{{ $attendance }}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h5 class="card-title">Today Cancel</h5>
                                <h1 class="display-1 text-center card-text">{{ $cancel }}</h1>
                                
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
                                <h5 class="card-title">Users</h5>
                                <h1 class="display-1 text-center card-title">{{$user}}</h1>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h5 class="card-title">Staffs</h5>
                                <h1 class="display-1 text-center card-title">{{$staff}}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h5 class="card-title">Clinics</h5>
                                <h1 class="display-1 text-center card-title">{{$clinic}}</h1>
                                
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