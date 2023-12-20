<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}">
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</head>

<body class="checkout" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>

    <div class="container checkout-container">
        <button class="btn-go-back">
            <i class="fas fa-arrow-left"></i> KEMBALI
        </button>


        <div class="checkout-box">
            <div class="checkout-image-container img">
                <img src="{{ asset('user/asset gambar/checkouttitle.png') }}" alt="Checkout">
            </div>
            <hr>

            <!-- Kolom-kolom table untuk data makanan -->
            <!-- Checkout header table -->
            <div class="checkout-header-table">
                <div class="checkout-row checkout-header-row">
                    <div class="checkout-col checkout-number-header">Nomer</div>
                    <div class="checkout-col checkout-image-header">Gambar Makanan</div>
                    <div class="checkout-col checkout-name-header">Nama Barang</div>
                    <div class="checkout-col checkout-quantity-header">Jumlah</div>
                    <div class="checkout-col checkout-price-header">Harga</div>
                    <div class="checkout-col checkout-total-header">Total Harga</div>
                    <div class="checkout-col checkout-action-header">Aksi</div>
                </div>
                <!-- Checkout data table -->
                <div class="checkout-data-table">
                    <div class="checkout-row">
                        <div class="checkout-col checkout-number">1</div>
                        <div class="checkout-col checkout-image">
                            <img src="{{ asset('storage/'.$beli->photo) }}" alt="Food Image">
                        </div>
                        <div class="checkout-col checkout-name">{{$beli->name}}</div>
                        <div class="checkout-col checkout-quantity" id="quantity">{{$beli->qty}}</div>
                        <div class="checkout-col checkout-price" id="harga">{{$beli->harga}}</div>
                        <div class="checkout-col checkout-total" id="total">{{$beli->harga*$beli->qty}}</div>
                        <div class="checkout-col checkout-action">
                            <button class="remove-button" onclick="deleteItem()">
                                <img src="{{asset('user/asset gambar/remove-icon.png') }}" alt="Remove Item">
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="total-price">
                <p>Total Harga Keseluruhan: Rp. {{$beli->harga*$beli->qty}}</p>
            </div>

            <form method="post" action="{{ route('checkout.store') }}">
                @csrf
                <input type="hidden" name="orders" value="{{ request('id') }}">
                <input type="hidden" name="foods" value="{{$beli->food_id}}">
                <input type="hidden" name="harga" value="{{$beli->harga}}">
                <input type="hidden" name="subtotal" value="{{$beli->harga*$beli->qty}}">
                <div class="checkout-nama-info">
                    <h3>Nama Penerima</h3>
                    <input type="text" name="nama_penerima" placeholder="Nama Penerima" required>
                </div>

                <div class="checkout-address-info">
                    <h3>Alamat</h3>
                    <input type="text" name="alamat" placeholder="Alamat Tempat" required>
                </div>
                <h6><span style="color: black;">Makanan akan disampaikan melalui layanan pengiriman Grab dengan biaya
                        ongkir
                        yang akan ditanggung oleh penerima. Terima kasih.</span></h6>
                CHECKOUT
                <button class="btn-checkout" type="submit">
            </form>
            </button>
        </div>
    </div>
</body>



</html>