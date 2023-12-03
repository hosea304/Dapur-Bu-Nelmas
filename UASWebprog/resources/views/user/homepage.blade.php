<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
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


hr {
    border: 1px solid #ccc;
}

.category-container {
    display: flex;
    justify-content: space-around;
    margin: 20px 0;
}

.category-box {
    width: 350px;
    height: 200px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s;
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
    width: 200px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    transition: transform 0.3s;
}

.list-box:hover {
    transform: scale(1.05);
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

    <div class="showcase"></div>

    <hr>

    <section id="products">
    <h2 style="text-align: center;">KATEGORI MAKANAN</h2>
        <div class="category-container">
            <div class="category-box" onclick="showCategory('category1')">
                <img src="{{ asset('user/asset gambar/kue showcase.jpg') }}" alt="Kategori 1" width="350" height="200">
            </div>
            <div class="category-box" onclick="showCategory('category2')">
            <img src="{{ asset('user/asset gambar/nasi bento showcase.jpg') }}" alt="Kategori 2" width="350" height="200">
            </div>
            <div class="category-box" onclick="showCategory('category3')">
            <img src="{{ asset('user/asset gambar/ricebowl showcase.jpg') }}" alt="Kategori 3" width="350" height="200">
            </div>
        </div>
    </section>

    <hr>

    <section id="list">
    <h2 style="text-align: center;">LIST HARI INI</h2>
        <div class="list-container">
            <div class="list-box" onclick="showList('item1')">
                <img src="{{ asset('user/assets/item1.jpg') }}" alt="Item 1">
                <p>Nama Item 1</p>
            </div>
            <div class="list-box" onclick="showList('item2')">
                <img src="{{ asset('user/assets/item2.jpg') }}" alt="Item 2">
                <p>Nama Item 2</p>
            </div>
            <div class="list-box" onclick="showList('item3')">
                <img src="{{ asset('user/assets/item3.jpg') }}" alt="Item 3">
                <p>Nama Item 3</p>
            </div>
        </div>
    </section>

    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>
