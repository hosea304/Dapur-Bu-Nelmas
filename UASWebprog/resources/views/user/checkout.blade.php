<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Checkout</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{{ asset('user/user-style.css') }}" />
        <link
            href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
"
            rel="stylesheet"
        />
        <script
            src="https://kit.fontawesome.com/your-fontawesome-kit-id.js"
            crossorigin="anonymous"
        ></script>
    </head>

    <body
        class="checkout"
        style="
            background-image: url('user/asset gambar/backgroundweb.jpg');
            background-size: cover;
        "
    >
        @include('user.navbar')
        <br /><br /><br /><br /><br /><br /><br /><br />

        <div class="container checkout-container">
            <button class="btn-go-back">
                <i class="fas fa-arrow-left"></i> KEMBALI
            </button>

            <div class="checkout-box">
                <div class="checkout-image-container img">
                    <img
                        src="{{ asset('user/asset gambar/checkouttitle.png') }}"
                        alt="Checkout"
                    />
                </div>
                <hr />

                <!-- Kolom-kolom table untuk data makanan -->
                <!-- Checkout header table -->
                <div class="checkout-header-table">
                    <div class="checkout-row checkout-header-row">
                        <div class="checkout-col checkout-number-header">
                            Nomer
                        </div>
                        <div class="checkout-col checkout-image-header">
                            Gambar Makanan
                        </div>
                        <div class="checkout-col checkout-name-header">
                            Nama Barang
                        </div>
                        <div class="checkout-col checkout-quantity-header">
                            Jumlah
                        </div>
                        <div class="checkout-col checkout-price-header">
                            Harga
                        </div>
                        <div class="checkout-col checkout-total-header">
                            Total Harga
                        </div>
                        <div class="checkout-col checkout-action-header">
                            Aksi
                        </div>
                    </div>
                    <!-- Checkout data table -->
                    <div class="checkout-data-table">
                        <div class="checkout-row">
                            <div class="checkout-col checkout-number">1</div>
                            <div class="checkout-col checkout-image">
                                <img
                                    src="{{ asset('storage/'.$beli->photo) }}"
                                    alt="Food Image"
                                />
                            </div>
                            <div class="checkout-col checkout-name">
                                {{$beli->name}}
                            </div>
                            <div
                                class="checkout-col checkout-quantity"
                                id="quantity"
                            >
                                {{$beli->qty}}
                            </div>
                            <div class="checkout-col checkout-price" id="harga">
                                {{$beli->harga}}
                            </div>
                            <div class="checkout-col checkout-total" id="total">
                                {{$beli->subtotal}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="total-price">
                    <p>Total Harga Keseluruhan: Rp. {{$beli->subtotal}}</p>
                </div>

                <form
                    method="post"
                    action="{{ route('directcheckout') }}"
                    id="checkoutform"
                >
                    <input type="hidden" name="id" value="{{$beli->od_id}}" />
                    <div class="checkout-nama-info">
                        <h3>Nama Penerima</h3>
                        <input
                            type="text"
                            name="name"
                            placeholder="Nama Penerima"
                            required
                        />
                    </div>

                    <div class="checkout-address-info">
                        <h3>Alamat</h3>
                        <input
                            type="text"
                            name="alamat"
                            placeholder="Alamat Tempat"
                            required
                        />
                    </div>
                    <h6>
                        <span style="color: black"
                            >Makanan akan disampaikan melalui layanan pengiriman
                            Grab dengan biaya ongkir yang akan ditanggung oleh
                            penerima. Terima kasih.</span
                        >
                    </h6>
                    <button type="submit" class="btn-checkout">CHECKOUT</button>
                </form>
            </div>
        </div>
    </body>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

    <!-- sweetAlert -->
    <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
    "></script>
    <script>
        $(document).on("submit", "#checkoutform", function (e) {
            e.preventDefault();
            let dataForm = this;

            $.ajax({
                url: $(dataForm).attr("action"),
                type: $(dataForm).attr("method"),
                data: new FormData(dataForm),
                dataType: "JSON",
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                beforeSend: function () {
                    $(dataForm).find("span.error-text").text("");
                },
                success: function (response) {
                    if (response.status == 404) {
                    } else if (response.status == 403) {
                        Swal.fire("Warning", response.errors, "warning");
                    } else {
                        Swal.fire("Success", response.message, "success");
                        window.location.href = "{{ route('beranda')}}";
                    }
                },
            });
        });
    </script>
</html>
