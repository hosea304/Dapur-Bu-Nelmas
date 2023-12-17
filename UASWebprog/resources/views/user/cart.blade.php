<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</head>

<body class="checkout" style="background-image: url('{{ asset('user/asset gambar/backgroundweb.jpg') }}'); background-size: cover">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>
    <div class="cart">
        <div class="cart-title img">
        <img src="{{ asset('user/asset gambar/carttitle.png') }}" alt="Chef Woman">
        </div>
        <hr>
        <button class="cart-button">KEMBALI</button>
        <br><br>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Gambar Makanan</th>
                    <th>Nama Makanan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="cart-image"><img src="path/to/your/image.jpg" alt="Food Image"></td>
                    <td class="cart-name">Nama Makanan</td>
                    <td class="cart-quantity">0</td>
                    <td class="cart-price">Rp. </td>
                    <td class="cart-delete"><button class="remove-button"><img src="{{ asset('user/asset gambar/remove-icon.png') }}" alt="Remove Item"></button></td>
                </tr>
            </tbody>
        </table>
        <div class="cart-subtotal">
            Subtotal: Rp. 
        </div>
        <button class="cart-checkout-button">CHECKOUT</button>
    </div>

</body>
</html>