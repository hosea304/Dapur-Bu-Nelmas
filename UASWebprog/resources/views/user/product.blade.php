<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link href="{{ asset('user/user-style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="product" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')
    <br>
    <h2 style="text-align: center; font-family: monospace; font-weight: bold; color: white; font-size: 90px">PRODUK</h2>
    <div class="container">
        @php
        $selectedCategoryId = request()->input('selectedCategory');
        @endphp

        @foreach ($dataKategori as $kategori)
        @if (empty($selectedCategoryId) || $kategori->id == $selectedCategoryId)
        <div class="section-container">
            <div class="section-title">{{ $kategori->name }}</div>
            <div class="row justify-content-center">
                @foreach ($dataFood as $food)
                @if ($food->id_category == $kategori->id)
                <div class="menu-item col-md-4">
                    <img src="{{ asset('storage/' . $food->photo) }}" alt="Menu">
                    <p>{{$food->name}}</p>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <hr>
        @endif
        @endforeach
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>
