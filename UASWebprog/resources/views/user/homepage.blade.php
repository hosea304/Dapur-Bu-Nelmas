<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="{{ asset('user/user-style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
</head>

<body class="homepage" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
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

    <div class="showcase" style="background-image: url('user/asset gambar/showcase home.gif');"></div>

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
