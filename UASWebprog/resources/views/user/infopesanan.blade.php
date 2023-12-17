<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Make sure to use the correct asset path for your CSS file -->
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
</head>
<body class="aboutus" style="background-image: url('{{ asset('user/asset gambar/backgroundweb.jpg') }}'); background-size: cover; color: white;">
    @include('user.navbar')
    <br><br><br><br><br>
    <div class="container mt-5">
        <h2 style="padding-top: 25px; text-align: center; font-family: monospace; font-weight: bold; color: white; font-size: 90px">INFO PESANAN</h2>
        <div class="table-responsive" style="border-radius: 10px;">
            <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga Produk</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
