<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
</head>

<body class="buy" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <h1>{{$buy->name}}</h1>
                <hr class="section-divider">
                <img class="food-img" alt="Food Image" src="{{ asset('storage/' . $buy->photo) }}">
                <br><br>
                <form action="{{ route('beli.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="foods" value="{{ $buy->id }}">
                    <input type="hidden" name="harga" value="{{ $buy->harga }}">
                    <div class="quantity-control">
                        <button type="button" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="qty" name="qty" value="0" readonly>
                        <button type="button" onclick="increaseQuantity()">+</button>
                    </div>
                    <p id="-message"></p>
                    <p class="price">Harga: Rp.{{$buy->harga}}</p>
                    <img class="cart-icon" src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Cart Icon">
                    <button type="submit" class="btn-buy">BELI</button>
                <hr class="subsection-divider">
                <h5>Keterangan</h5>
                <p class="food-description">-</p>
                </form>
            </div>
        </div>
    </div>

    <script>
        var quantity = 0;
        var qtyElement = document.getElementById('qty');

        function decreaseQuantity() {
            if (quantity > 0) {
                quantity--;
                qtyElement.value = quantity;
            }
        }

        function increaseQuantity() {
            quantity++;
            qtyElement.value = quantity;
        }
    </script>
</body>

</html>