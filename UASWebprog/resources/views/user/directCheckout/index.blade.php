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

                    </div>
                </div>
            </div>
            <br>
            <div class="total-price">
                <p>Total Harga Keseluruhan: Rp. {{$beli->harga*$beli->qty}}</p>
            </div>

            <form method="post" action="{{ route('checkout.store') }}">
                @csrf
                <input type="hidden" name="orders" value="{{ request('id') }}">
                <input type="hidden" name="foods" value="{{$beli->food_id}}">
                <input type="hidden" name="harga" value="{{$beli->harga}}">
                <input type="hidden" name="subtotal" value="{{$beli->harga*$beli->qty}}">
                <input type="hidden" name="nama_penerima" value="{{$user->name}}">
                <input type="hidden" name="alamat" value="{{$user->alamat}}">
                <h6><span style="color: black;">Mohon melakukan transfer ke nomor rekening BCA berikut: <span style="color: red;">8840820069 a.n. JOHANNA AGUSTINA W BAMBA</span>, dan kemudian kirimkan bukti transfer melalui WhatsApp di bawah ini:</h6>
                <center><a href="https://wa.link/3dk41t" target="_blank">
                            <img src="{{ asset('user/asset gambar/wa.png') }}" alt="081319939500" width="40" height="40">
                        </a>
                </center>
                <center><h6><span style="color: black;">Makanan akan disampaikan melalui layanan pengiriman Grab dengan biaya ongkir yang akan ditanggung oleh penerima. Terima kasih.</span></h6><center>
                <center> <input class="btn-checkout" type="submit" value="Checkout"></center>
            </form>
            </button>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>
