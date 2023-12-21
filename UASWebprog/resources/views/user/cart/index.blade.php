<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}" />
    <link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/your-fontawesome-kit-id.js" crossorigin="anonymous"></script>
</head>

<body class="checkout"
    style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover; color:white;">
    @include('user.navbar')
    <br />
    <div class="cart">
        <div class="cart-title img">
            <img src="{{ asset('user/asset gambar/carttitle.png') }}" alt="Chef Woman" />
        </div>
        <hr />
        <button class="cart-button" onclick="window.location.href='/beranda'">KEMBALI</button>
        <br /><br />
        <div class="table-responsive">
            <table class="cart-table" id="tableMenu">
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
                        <td class="cart-image">
                            <img src="path/to/your/image.jpg" alt="Food Image" />
                        </td>
                        <td class="cart-name">Nama Makanan</td>
                        <td class="cart-quantity">0</td>
                        <td class="cart-price">Rp.</td>
                        <td class="cart-delete">
    <button class="remove-button">
        <img src="{{ asset('user/asset gambar/remove-icon.png') }}" alt="Remove Item" />
    </button>
</td>

                    </tr>
                </tbody>
            </table>
        </div>
        <div class="cart-subtotal">
            Subtotal: Rp. <span id="subtotal"></span><br><br>
        </div>
        <form method="post" action="{{ route('checkoutcart') }}" id="checkoutform">
            <input type="hidden" name="name" value="{{$user->name}}">
            <input type="hidden" name="alamat" value="{{$user->alamat}}">
            <h6><span style="color: black;">Mohon melakukan transfer ke nomor rekening BCA berikut: <span style="color: red;">8840820069 a.n. JOHANNA AGUSTINA W BAMBA</span>, dan kemudian kirimkan bukti transfer melalui WhatsApp di bawah ini:</h6>
                <center><a href="https://wa.link/3dk41t" target="_blank">
                            <img src="{{ asset('user/asset gambar/wa.png') }}" alt="081319939500" width="40" height="40">
                        </a>
                </center>
            <h6>
                <center><span style="color: black">Makanan akan disampaikan melalui layanan pengiriman Grab dengan biaya ongkir yang akan ditanggung oleh penerima. Terima kasih.</span><center>
            </h6>
            <center><button type="submit" class="cart-checkout-button">
            CHECKOUT
        </button><center>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>
<!--  -->

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{
            asset('datatable/dataTables.bootstrap4.min.js')
        }}"></script>

<!-- sweetAlert -->
<script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
    "></script>
@include('user.cart.scripts')

</html>
