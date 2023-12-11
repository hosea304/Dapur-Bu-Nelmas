<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="user/user-style.css">
</head>
<body class="buy" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <h1>Nama Makanan</h1>
                <hr class="section-divider">
                <img class="food-img" src="path/to/food/image.jpg" alt="Food Image">
                <div class="quantity-control">
                    <button>-</button>
                    <span>1</span>
                    <button>+</button>
                </div>
                <p class="price">Harga: Rp. 10000</p>
                <img class="cart-icon" src="user/asset gambar/shoppingcart.png" alt="Cart Icon">
                <button class="btn-buy">BELI</button>
                <hr class="subsection-divider">
                <p class="food-description">Keterangan makanan</p>
            </div>
            <div class="col-md-6 order-md-1">
                <div class="menu-list">
                    <img class="menu-img" src="path/to/menu/image.jpg" alt="Menu Image">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
