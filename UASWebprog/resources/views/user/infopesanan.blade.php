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
        <h2 style="color: white;">Info Pesanan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th style="color: white;">No</th>
                    <th style="color: white;">Nama</th>
                    <th style="color: white;">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <td style="color: white;">{{ $index + 1 }}</td>
                        <td style="color: white;">{{ $order->name }}</td>
                        <td style="color: white;">{{ $order->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
