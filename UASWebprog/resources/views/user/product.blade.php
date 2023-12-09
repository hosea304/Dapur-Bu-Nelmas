<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="{{ asset('user/user-style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="product" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
@include('user.navbar')
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <h2 style="text-align: center; font-family: monospace; font-weight: bold; color: white; font-size: 90px">PRODUK</h2>
    <div class="container">
        <div class="section-container">
            <div class="section-title">KUE</div>
            <div class="row justify-content-center">
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/pie1.jpg') }}" alt="Menu 1">
                    <p>MINI PIE SUSU</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/pie2.jpg') }}" alt="Menu 2">
                    <p>MINI PIE COKELAT</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/pie3.jpg') }}" alt="Menu 3">
                    <p>MINI PIE BUAH</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/pie4.jpg') }}" alt="Menu 4">
                    <p>MINI PIE NANAS</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/risolmayo.jpg') }}" alt="Menu 5">
                    <p>RISOL MAYO</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/pizza.jpg') }}" alt="Menu 6">
                    <p>MINI PIZZA</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="section-container">
            <div class="section-title">PAKET NASI BENTO</div>
            <div class="row justify-content-center">
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/bento1.jpg') }}" alt="Menu 7">
                    <p>PAKET BENTO 1</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/bento2.jpg') }}" alt="Menu 8">
                    <p>PAKET BENTO 2</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/bento3.jpg') }}" alt="Menu 9">
                    <p>PAKET BENTO 3</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="section-container">
            <div class="section-title">PAKET NASI RICE BOWL</div>
            <div class="row justify-content-center">
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl1.jpg') }}" alt="Menu 10">
                    <p>PAKET RICE BOWL 1</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl2.jpg') }}" alt="Menu 11">
                    <p>PAKET RICE BOWL 2</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl3.jpg') }}" alt="Menu 12">
                    <p>PAKET RICE BOWL 3</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl4.jpg') }}" alt="Menu 13">
                    <p>PAKET RICE BOWL 4</p>
                </div>

                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl5.jpg') }}" alt="Menu 14">
                    <p>PAKET RICE BOWL 5</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>
