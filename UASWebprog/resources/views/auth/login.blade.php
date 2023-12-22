<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-rYfL5PZdOEDb8WGVLO5o49lT9EPiDGSQDf3aoZe8fIuv2pJ6p4f+POeF5B7boI+c" crossorigin="anonymous">

    <style>
        body {
            background-image: url('../user/asset gambar/backgroundweb.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; 
            font-family: monospace;
            font-weight: bold;
            font-size: 30px;    
            color: white;
        }

        .card {
            background-color: rgba(200, 200, 200, 0.5);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-control {
            border-radius: 5px;
            transition: all 0.3s;
            margin-bottom: 10px;
            width: 240px;
            height: 30px;
        }

        .form-control:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        .btn-primary {
            border-radius: 10px;
            transition: all 0.3s;
            font-size: 20px;
            border-radius: 5px;
            background-color: white;
            width: 150px;
        }

        .btn-primary:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
            background-color: #007bff; 
            border-color: #007bff; 
        }

        .card-body {
            text-align: center;
            font-weight: bold;
        }

        .card-header {
            font-size: 80px;
            text-align: center;
        }

        .forgot-password {
            margin-top: 10px;
            font-size: 14px; 
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .navbar-brand img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .navbar {
            font-size: 30px;
            font-family: monospace;
        }

        .navbar-nav {
            display: flex;
            justify-content: center;
            gap: 20px; 
            list-style: none; 
            padding: 0; 
        }

        .navbar-nav .nav-item {
            white-space: nowrap;
        }

        .navbar-nav .nav-link {
            color: white;       
            text-decoration: none;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            transition: color 0.3s ease, text-shadow 0.3s ease; 
        }

        .navbar-nav .nav-link:hover {
            color: #87CEFA; 
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.8); 
        }

        .navbar-nav .nav-link i {
            display: none; 
        }


        .text-danger {
            font-size: 20px;
            color: yellow;
        }

        @media (max-width: 767px) {
    body {
        font-size: 16px;
    }

    .card {
        width: 80%;
        margin: 20px auto;
        margin-right: 150px;
        margin-left: 15px;
    }

    .form-control {
        width: 100%;
    }

    .btn-primary {
        width: 100%;
    }

    .navbar {
        font-size: 20px;
    }

    .navbar-brand img {
        width: 10px; 
    }

    .card-header {
        font-size: 40px;
    }
}

    </style>

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/dashboard') }}">DASHBOARD</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                                    </li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="../user/asset gambar/logo usaha.png" alt="Your Logo" style="width: 160px; height: 160px;">
        </a>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                            <div class="card-header">{{ __('LOGIN') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="email" class="form-label">EMAIL</label>
                                        <br>
                                        <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autofocus>
                                        @error('email')
                                        <br>    
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">PASSWORD</label>
                                        <br>
                                        <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                        @error('password')
                                        <br>
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary mx-auto d-block">
                                            Log in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbVqg2iZN3tu2iOjN2D5tnbNE2A2IDT+5CGZms9Iugf6lL0H6ipmYXcDQ+6p6z" crossorigin="anonymous"></script>
</body>
</html>
