<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="{{ asset('../resources/views/user/styles.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
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
            background-color: #fff;
            align-items: center;
            text-align: center;
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
            width: 250px;
            box-sizing: border-box;
            margin-right: 130px; /* Adjust the margin between items horizontally */
            margin-bottom: 20px; /* Adjust the margin between items vertically */
            margin-left: 110px;
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

        /* Additional styles for separating sections */
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #eee;
        }


    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="left-icons">
                <span class="cart-icon" onclick="openCart()">
                    <img src="{{ asset('user/asset gambar/item1.jpg') }}" alt="Keranjang">
                </span>
            </div>
            <div class="logo">
                <div style="text-align: center;">
                    <img src="{{ asset('user/asset gambar/logo usaha.png') }}" alt="Logo Usaha" width="80" height="80" style="display: inline-block;">
                </div>
                <p>DAPUR BU NELMAS</p>
            </div>
            <div class="right-icons">
                <span class="user-icon" onclick="openAccount()">
                    <img src="{{ asset('user/assets/user-icon.png') }}" alt="Pengguna">
                </span>
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
    <h2 style="text-align: center;">PRODUK</h2>
    <div class="section-container">
        <div class="section-title">KUE</div>
        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/pie1.jpg') }}" alt="Menu 1">
            <p>MINI PIE SUSU</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/pie2.jpg') }}" alt="Menu 2">
            <p>MINI PIE COKELAT</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/pie3.jpg') }}" alt="Menu 3">
            <p>MINI PIE BUAH</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/pie4.jpg') }}" alt="Menu 4">
            <p>MINI PIE NANAS</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/risolmayo.jpg') }}" alt="Menu 5">
            <p>RISOL MAYO</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/pizza.jpg') }}" alt="Menu 6">
            <p>MINI PIZZA</p>
        </div>
    </div>
    <hr>

    <div class="section-container">
        <div class="section-title">PAKET NASI BENTO</div>
        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/bento1.jpg') }}" alt="Menu 4">
            <p>BENTO (BLOM TAU NAMANYA)</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/bento2.jpg') }}" alt="Menu 5">
            <p>BENTO (BLOM TAU NAMANYA)</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/bento3.jpg') }}" alt="Menu 6">
            <p>BENTO (BLOM TAU NAMANYA)</p>
        </div>
    </div>

    <hr>

    <div class="section-container">
        <div class="section-title">PAKET NASI RICE BOWL</div>
        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/ricebowl1.jpg')}}" alt="Menu 7">
            <p>BLOM TAU NAMANYA</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/ricebowl2.jpg') }}" alt="Menu 8">
            <p>BLOM TAU NAMANYA</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/ricebowl3.jpg') }}" alt="Menu 9">
            <p>BLOM TAU NAMANYA</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/ricebowl4.jpg') }}" alt="Menu 9">
            <p>BLOM TAU NAMANYA</p>
        </div>

        <div class="menu-item">
            <img src="{{ asset('user/asset gambar/ricebowl5.jpg') }}" alt="Menu 9">
            <p>BLOM TAU NAMANYA</p>
        </div>
    </div>
</body>

</html>
