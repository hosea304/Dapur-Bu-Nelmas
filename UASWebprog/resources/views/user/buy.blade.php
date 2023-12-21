<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Buy Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('user/user-style.css') }}" />
    <link href="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
        " rel="stylesheet" />
</head>

<body class="buy" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <h1>{{$buy->name}}</h1>
                <hr class="section-divider">
                <img class="food-img" alt="Food Image" src="{{ asset('storage/' . $buy->photo) }}">
                <br><br>
                <form action="{{ route('getDirectCheckout') }}" method="GET">
                    @csrf
                    <input type="hidden" name="foods" value="{{ $buy->id }}">
                    <input type="hidden" name="harga" value="{{$buy->harga}}">
                    <div class="quantity-control">
                        <button type="button" onclick="decreaseQuantity()">-</button>
                        <input type="number" id="qty" name="qty" value="1" readonly>
                        <button type="button" onclick="increaseQuantity()">+</button>
                    </div>
                    <p id="-message"></p>
                    <p class="price">Harga: Rp.{{$buy->harga}}</p>
                    <button type="button" onclick="addtocart('{{ $buy->id }}')">
    <img class="cart-icon" src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Cart Icon">
</button>
                    <button type="submit" class="btn-buy">BELI</button>
                    <hr class="subsection-divider">
                    <h5>Food Desciption</h5>
                    <p class="food-description">{{$buy->description}}</p>
                </form>
            </div>
        </div>

        <script>
            var quantity = 0;
            var qtyElement = document.getElementById('qty');

            function decreaseQuantity() {
                if (quantity > 1) {
                    quantity--;
                    qtyElement.value = quantity;
                }
            }

            function increaseQuantity() {
                quantity++;
                qtyElement.value = quantity;
            }

            function addtocart(id) {

                const formData = new FormData();
                formData.append("foods", id);
                formData.append(
                    "qty",
                    $("#qty").val()
                );

                $.ajax({
                    url: "{{ route('addtocart') }}",
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    beforeSend: function () { },
                    success: function (response) {
                        if (response.status == 404) {
                        } else if (response.status == 403) {
                            Swal.fire("Warning", response.errors, "warning");
                        } else {
                            Swal.fire("Success", response.message, "success");
                        }
                    },
                });
            }
        </script>
        <script src="{{
                asset('admin/plugins/jquery/jquery.min.js')
            }}"></script>
        <script src="
            https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
            "></script>
</body>

</html>
