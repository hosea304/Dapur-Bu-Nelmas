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
                    <button onclick="decreaseStock()">-</button>
                    <span id="stock">0</span>
                    <button onclick="increaseStock()">+</button>
                </div>
                <p id="stock-message"></p>
                <p class="price">Harga: Rp. {{ $selectedItem->harga }}</p>
                <img class="cart-icon" src="{{ asset('user/asset gambar/shoppingcart.png') }}" alt="Cart Icon">
                <button class="btn-buy" onclick="buyItem('{{ $selectedItem->id }}', '{{ $selectedItem->name }}', '{{ $selectedItem->harga }}', '{{ asset('storage/' . $selectedItem->photo) }}' )">BELI</button>

                <hr class="subsection-divider">
                <p class="food-description">{{ $selectedItem->keterangan }}</p>
                @else
                <p>No item selected</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        function decreaseStock() {
            var stockElement = document.getElementById('stock');
            var stock = parseInt(stockElement.innerText);
            if (stock > 0) {
                stock--;
            }
            stockElement.innerText = stock;
            displayStockMessage(stock); // Call function to display stock message
        }

        function increaseStock() {
            var stockElement = document.getElementById('stock');
            var stock = parseInt(stockElement.innerText);
            if (stock < 5) {
                stock++;
            }
            stockElement.innerText = stock;
            displayStockMessage(stock); // Call function to display stock message
        }

        function displayStockMessage(stock) {
            var stockMessageElement = document.getElementById('stock-message');
            if (stock >= 5) {
                stockMessageElement.innerText = "Maximal beli 5";
                stockMessageElement.style.color = "red";
                stockMessageElement.style.fontWeight = "bold";
            } else {
                stockMessageElement.innerText = "";
            }
        }

        function buyItem(id, name, harga, photo) {
        // Capture selected item data
        var selectedItem = {
            id: id,
            name: name,
            harga: harga,
            photo: photo
        };

        // Store selected item data in localStorage for use on the checkout page
        localStorage.setItem('selectedItem', JSON.stringify(selectedItem));

        // Redirect to the checkout page
        window.location = '{{ route("checkout") }}';
    }
    </script>
</body>

</html>
