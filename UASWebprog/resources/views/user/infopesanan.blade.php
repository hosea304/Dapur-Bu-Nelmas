<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
</head>
<body class="aboutus" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover; color: white;">
    @include('user.navbar')
    <br><br><br><br><br>
    <div class="container mt-5">
        <h2 style="padding-top: 25px; text-align: center; font-family: monospace; font-weight: bold; color: white; font-size: 90px">INFO PESANAN</h2>
        <div class="table-responsive" style="border-radius: 10px;">
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
