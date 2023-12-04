<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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
        .showcase {
        width: 100%;
        height: 500px;
        background-image: url('{{ asset("user/asset gambar/showcase home.gif") }}');
        background-size: 100% 100%;
        background-position: center center;
        background-repeat: no-repeat;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    @media (max-width: 1500px) {

        .showcase {
            height: 250px; 
            margin: 10px 0; 
        }
    }
        hr {
            border: 1px solid #ccc;
        }

        .category-container {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .category-box {
            width: 100%;
            max-width: 350px;
            height: 200px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s;
            margin-bottom: 25px;
            background-color: white;
        }

        .category-box img {
            margin-top: 11px;
            width: 200px
            object-fit: cover;
            border-radius: 10px; 

        }

        .category-box:hover {
            transform: scale(1.05);
        }

        .list-container {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .list-box {
            width: 100%;
            max-width: 200px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }

        .list-box img {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
        }

        .list-box:hover {
            transform: scale(1.05);
        }

        .text-center {
            font-family: monospace;
            font-weight: bold;
            color: white;
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

    <div class="showcase"></div>

    <hr>

    <section id="products" class="container">
        <h2 class="text-center">KATEGORI MAKANAN</h2>
        <div class="category-container row">
            <div class="category-box col-md-4" onclick="showCategory('category1')">
                <img src="{{ asset('user/asset gambar/kue showcase.jpg') }}" alt="Kategori 1" class="img-fluid">
            </div>
            <div class="category-box col-md-4" onclick="showCategory('category2')">
                <img src="{{ asset('user/asset gambar/nasi bento showcase.jpg') }}" alt="Kategori 2" class="img-fluid">
            </div>
            <div class="category-box col-md-4" onclick="showCategory('category3')">
                <img src="{{ asset('user/asset gambar/ricebowl showcase.jpg') }}" alt="Kategori 3" class="img-fluid">
            </div>
        </div>
    </section>

    <hr>

    <section id="list" class="container">
        <h2 class="text-center">LIST HARI INI</h2>
        <div class="list-container row">
            <div class="list-box col-md-4" onclick="showList('item1')">
                <img src="{{ asset('user/assets/item1.jpg') }}" alt="Item 1" class="img-fluid">
                <p class="text-center">Nama Item 1</p>
            </div>
            <div class="list-box col-md-4" onclick="showList('item2')">
                <img src="{{ asset('user/assets/item2.jpg') }}" alt="Item 2" class="img-fluid">
                <p class="text-center">Nama Item 2</p>
            </div>
            <div class="list-box col-md-4" onclick="showList('item3')">
                <img src="{{ asset('user/assets/item3.jpg') }}" alt="Item 3" class="img-fluid">
                <p class="text-center">Nama Item 3</p>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>
