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
                <h3>{{$totalOrders}}</h3>

                <p>Jumlah Orderan</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>Menu hari ini</h3>
                @foreach ($menu as $menu )
                <ul>
                    <li>{{$menu->name}}</li>
                </ul>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>Rp{{ number_format($totalPenghasilan, 0, ',', '.') }}</h3>

                <p>Jumlah Penghasilan</p>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$totalUser}}</h3>

                <p>Jumlah Pengguna</p>
            </div>
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
</script>

@endsection