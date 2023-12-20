<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="{{ asset('user/user-style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        .category-box {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }

        .category-box img {
            width: 100%;
            height: auto;
        }

        .category-box h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 24px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .list-box {
            cursor: pointer;
            text-align: center;
            margin-bottom: 20px;
        }

        .list-box img {
            width: 100%;
            height: auto;
        }

        .list-box p {
            margin-top: 10px;
        }
    </style>
</head>

<body class="homepage" style="background-image: url('user/asset gambar/backgroundweb.jpg'); background-size: cover;">
    @include('user.navbar')

    <div class="showcase" style="background-image: url('user/asset gambar/showcase home.gif');"></div>

    <hr>

    <section id="products" class="container">
        <h2 class="text-center">KATEGORI MAKANAN</h2>
        <div class="category-container row">
            <div class="category-carousel col-md-12">
                <div id="categoryCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php
                        $categories = $dataKategori->chunk(3);
                        $active = 'active';
                        @endphp
                        @foreach($categories as $categoryChunk)
                        <div class="carousel-item {{ $active }}">
                            <div class="row justify-content-center">
                                @foreach($categoryChunk as $category)
                                <div class="category-box col-lg-4 col-md-12 col-sm-12">
                                    <a href="{{ route('produk', ['selectedCategory' => $category->id]) }}">
                                        <img src="{{ asset('storage/' . $category->photo) }}" alt="Food Photo">
                                        <h1 class="text-center1">{{ $category->name }}</h1>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @php
                        $active = ''; // Reset $active after the first iteration
                        @endphp
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#categoryCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#categoryCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </section>

    <hr>

    <section id="list" class="container">
        <h2 class="text-center">LIST HARI INI</h2>
        <div class="list-container row">
            @foreach($dataFood as $item)
            <a href="{{ route('beli', ['selectedItem' => $item->id]) }}" class="list-box col-md-4">
                <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" class="img-fluid">
                <p class="text-center3">{{ $item->name }}</p>
            </a>
            @endforeach
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('user/scripts.js') }}"></script>
</body>

</html>