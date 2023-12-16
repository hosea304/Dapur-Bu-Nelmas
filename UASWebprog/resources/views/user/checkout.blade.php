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

<body class="checkout" style="background-image: url('{{ asset('user/asset gambar/backgroundweb.jpg') }}'); background-size: cover">
    @include('user.navbar')
    <br><br><br><br><br><br><br><br>

    <div class="container checkout-container">
    <button class="btn-go-back" onclick="window.location='{{ route("beranda") }}'">
    <i class="fas fa-arrow-left"></i> KEMBALI
</button>


        <div class="checkout-box">
            <div class="checkout-header">
                <i class="fas fa-shopping-cart"></i>
                <p>Checkout</p>
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
</div>

<!-- Checkout data table -->
<div class="checkout-data-table">

    <div class="checkout-row">
        <div class="checkout-col checkout-number">1</div>
        <div class="checkout-col checkout-image">
            <img src="" alt="Food Image">
        </div>
        <div class="checkout-col checkout-name"></div>
        <div class="checkout-col checkout-quantity" id="quantity"></div>
        <div class="checkout-col checkout-price" id="harga"></div>
        <div class="checkout-col checkout-total" id="total"></div>
        <div class="checkout-col checkout-payment" id="pembayaran"></div>
        <div class="checkout-col checkout-action">
        <button onclick="removeItem()" class="remove-button">
            <img src="{{ asset('user/asset gambar/remove-icon.png') }}" alt="Remove Item">
        </button>
        </div>
    </div>


</div>

            <div class="total-price">
                <p>Total Harga  Keseluruhan: Rp. </p>
            </div>

            <form method="post" action="">
    @csrf

    <div class="checkout-payment-info">
        <img src="{{ asset('user/asset gambar/bca-logo.png') }}" alt="BCA Logo">
        <p>Hanya dapat melakukan pembayaran melalui transfer BCA.</p>
        <input type="text" name="nomor_rekening" placeholder="Nomor Rekening BCA" required>
    </div>
    <div class="checkout-nama-info">
        <h3>Nama Penerima</h3>
        <input type="text" name="nama_penerima" placeholder="Nama Penerima" required>
    </div>

    <div class="checkout-address-info">
        <h3>Alamat</h3>
        <input type="text" name="alamat" placeholder="Alamat Tempat" required>
    </div>

</form>

            <h6><span style="color: red;">Makanan akan disampaikan melalui layanan pengiriman Grab dengan biaya ongkir yang akan ditanggung oleh penerima. Terima kasih.</span></h6>

            <button class="btn-checkout" onclick="window.location='{{ route("infopesanan") }}'">
    CHECKOUT
</button>

        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectedItem = JSON.parse(localStorage.getItem('selectedItem'));

        document.querySelector('.checkout-image img').src = selectedItem.photo;
        document.querySelector('.checkout-name').innerText = selectedItem.name;
        document.querySelector('.checkout-quantity').innerText = 1; 
        document.querySelector('.checkout-price').innerText = 'Rp. ' + selectedItem.harga;
        document.querySelector('.checkout-total').innerText = 'Rp. ' + selectedItem.harga;

        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

    
            var nomorRekening = document.querySelector('input[name="nomor_rekening"]').value;
            var alamat = document.querySelector('input[name="alamat"]').value;
            var nama = document.querySelector('input[name="nama"]').value;

            var url = '{{ route("infopesanan") }}';

            var formData = {
                nama: nama,
                pembayaran: nomorRekening,
                alamat: alamat
            };

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
        
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
    
</script>


</html>
