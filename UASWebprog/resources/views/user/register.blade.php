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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('user/asset gambar/logo usaha.png') }}" alt="Logo Usaha" width="80" height="80">
                <span>DAPUR BU NELMAS</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openCart()">
                            <img src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Keranjang" width="30"
                                height="30">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openAccount()">
                            <img src="{{ asset('user/asset gambar/usericon.png') }}" alt="Pengguna" width="30"
                                height="30">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="sub-navbar">
            <div class="nav-option" onclick="scrollToSection('home')">BERANDA</div>
            <div class="nav-option" onclick="scrollToSection('products')">PRODUK</div>
            <div class="nav-option" onclick="scrollToSection('orders')">INFO PESANAN</div>
            <div class="nav-option" onclick="toggleAbout()">TENTANG KAMI</div>
        </div>
    </header>
    <br />
    <h2 style="text-align: center; font-family: monospace; font-weight: bold; color: white;">PRODUK</h2>
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
                    <p>BENTO (-)</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/bento2.jpg') }}" alt="Menu 8">
                    <p>BENTO (-)</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/bento3.jpg') }}" alt="Menu 9">
                    <p>BENTO (-)</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="section-container">
            <div class="section-title">PAKET NASI RICE BOWL</div>
            <div class="row justify-content-center">
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl1.jpg') }}" alt="Menu 10">
                    <p>-</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl2.jpg') }}" alt="Menu 11">
                    <p>-</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl3.jpg') }}" alt="Menu 12">
                    <p>-</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl4.jpg') }}" alt="Menu 13">
                    <p>-</p>
                </div>
                <div class="menu-item col-md-4">
                    <img src="{{ asset('user/asset gambar/ricebowl5.jpg') }}" alt="Menu 14">
                    <p>-</p>
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
