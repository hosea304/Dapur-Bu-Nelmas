@extends('layouts.backend')

@section('title')
Dashboard
@endsection

@section('heading')
Halaman Dashboard
@endsection

@section('subHeading')
dashboard
@endsection

<style>
    .highlight {
        background-color: #ffc107;
    }
</style>
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <table id="calendar" class="table table-bordered">
            <thead>
                <tr>
                    <th>Sun</th>
                    <th>Mon</th>
                    <th>Tue</th>
                    <th>Wed</th>
                    <th>Thu</th>
                    <th>Fri</th>
                    <th>Sat</th>
                </tr>
            </thead>
            <tbody>
                <?php
        $date = strtotime(date("Y-m-01"));
        $daysInMonth = date("t", $date);
        $offset = date("w", $date);
        $currentDay = date("j");

        for ($i = 0; $i < 6; $i++) { // Limit to 6 rows for simplicity
            echo "<tr>";
            for ($j = 0; $j < 7; $j++) {
                $day = $i * 7 + $j - $offset + 1;
                if ($day > 0 && $day <= $daysInMonth) {
                    echo "<td data-day='$day'>" . $day . "</td>";
                } else {
                    echo "<td></td>";
                }
            }
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
    </div>
</div>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

<script>
    function updateCalendar() {
        let currentDay = new Date().getDate();
        let cells = document.querySelectorAll('#calendar tbody td');

        cells.forEach(function (cell) {
            let day = parseInt(cell.getAttribute('data-day'));
            if (day === currentDay) {
                cell.classList.add('highlight');
            } else {
                cell.classList.remove('highlight');
            }
        });
    }

    // Update the calendar every second
    setInterval(updateCalendar, 1000);

    // Initial update
    updateCalendar();

    function getMenu(){
        $.get("{{ route('dashboard.perday') }}",
            function (data) {
                console.log(data);
                Object.keys(data).forEach(function(key, idx, arr){
                    console.log("Value:", $("[data-day="+data[key].day+"]").html().length);
                    if($("[data-day="+data[key].day+"]").html().length > 3){
                        $("[data-day="+data[key].day+"]").append(", " + data[key].food.name)
                    } else {
                        $("[data-day="+data[key].day+"]").append(" " + data[key].food.name)
                    }
                });
            },
            "json"
        );
    }

    getMenu();
</script>

@endsection
