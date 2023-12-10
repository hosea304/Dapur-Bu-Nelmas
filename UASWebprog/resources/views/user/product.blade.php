<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('../resources/views/user/styles.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('{{ asset("user/asset gambar/backgroundweb.jpg") }}');
            background-size: cover;  
            font-family: monospace;
            font-weight: bold;
            padding: 0;
        }

        header {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .sub-navbar {
            display: flex;
            justify-content: center;
            background-color: #eee;
        }

        .nav-option {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .nav-option:hover {
            background-color: #ddd;
        }

        .section-container {
            margin: 20px 0;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #9EB8D9;
            text-align: center;
            border-radius: 10px; 

        }

        .section-title {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .menu-item {
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            display: inline-block;
            width: 100%; 
            max-width: 250px; 
            box-sizing: border-box;
            margin-bottom: 20px; 
        }

        .menu-item:hover {
            transform: scale(1.05);
        }

        .menu-item img {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
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
                            <img src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Keranjang" width="30" height="30">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="openAccount()">
                            <img src="{{ asset('user/asset gambar/usericon.png') }}" alt="Pengguna" width="30" height="30">
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
