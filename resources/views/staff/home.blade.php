@extends('staff.layout')

@section('js')
    <script type="text/javascript">
        // Pie Chart
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
         
        let today = new Date().toISOString().slice(0, 10)    

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],

            <?php
                foreach($pies as $pie)
                {
                    echo "['".$pie->ServiceName."',".$pie->val."],";
                }
            ?>
            // ['Work',     11],
            // ['Eat',      2],
            // ['Commute',  2],
            // ['Watch TV', 2],
            // ['Sleep',    7]
        ]);

        var options = {
            title: today.' Health Service Will Have'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        }

    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center align-items-xl-center">
            <h1 class="d-xl-flex justify-content-xl-center align-items-xl-center" style="font-size: 59px;">Hi, {{ Auth::user()->name }}</h1>
        </div>
    </div>
    <br><br>
    <div class="row">
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
                                <h1 class="display-1 text-center card-title">{{ $appointments }}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Attend</h4>
                                <h1 class="display-1 text-center card-title">{{ $attendance }}</h1>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-md-flex flex-fill justify-content-md-center align-items-md-center" style="padding: 10px;">
                        <div class="card border-dark" style="border-radius: 18px; width: 750px; height: 187.8px;">
                            <div class="card-body" style="border-radius: -1px;">
                                <h4 class="card-title">Cancel</h4>
                                <h1 class="display-1 text-center card-title">{{ $cancel }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        
    </div>

@endsection