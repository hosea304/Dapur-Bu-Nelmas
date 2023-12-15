<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
</head>

<body class="buy"
    style="background-image: url('{{ asset('user/asset gambar/backgroundweb.jpg') }}'); background-size: cover">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                @if(isset($selectedItem))
                <h1>{{ $selectedItem->name }}</h1>
                <hr class="section-divider">
                <img class="food-img" src="{{ asset('storage/' . $selectedItem->photo) }}" alt="Food Image">
                <div class="quantity-control">
                    <button>-</button>
                    <span>{{ $selectedItem->stock }}</span>
                    <button>+</button>
                </div>
                <p class="price">Harga: Rp. {{ $selectedItem->harga }}</p>
                <img class="cart-icon" src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Cart Icon">
                <button class="btn-buy">BELI</button>
                <hr class="subsection-divider">
                <p class="food-description">{{ $selectedItem->keterangan }}</p>
                @else
                <p>No item selected</p>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
