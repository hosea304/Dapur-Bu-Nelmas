<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="navbar-brand-container">
        <img src="{{ asset('user/asset gambar/logo usaha.png') }}" alt="Logo Usaha" width="90" height="90">
        <span class="judul">DAPUR BU NELMAS</span>
    </div>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="openCart()">
                    <img src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Keranjang" width="40" height="40">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="openAccount()">
                    <img src="{{ asset('user/asset gambar/usericon.png') }}" alt="Pengguna" width="40" height="40">
                </a>
            </li>
        </ul>
    </div>
</nav>
<div class="sub-navbar fixed-top">
    <div class="nav-option" onclick="scrollToSection('home')">BERANDA</div>
    <div class="nav-option" onclick="scrollToSection('products')">PRODUK</div>
    <div class="nav-option" onclick="scrollToSection('orders')">INFO PESANAN</div>
    <div class="nav-option" onclick="toggleAbout()">TENTANG KAMI</div>
</div>
<link href="{{ asset('user/user-style.css') }}" rel="stylesheet" type="text/css">