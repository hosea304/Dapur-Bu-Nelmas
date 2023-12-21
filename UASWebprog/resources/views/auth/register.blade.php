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
            font-size: 15px;    
            color: white;
        }

        .card {
            background-color: rgba(200, 200, 200, 0.5);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 0 auto;
            margin-bottom: 20px;
            height: 520px;
        }

        .form-control {
            border-radius: 5px;
            transition: all 0.3s;
            margin-bottom: 10px;
            width: 290px;
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
            font-size: 50px;
            text-align: center;
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
            width: 95%;
            height: 500px;
            margin: 20px auto;
            margin-right: 150px;
            margin-left: 10px;
        }

        .form-control {
            width: 80%;
        }

        .btn-primary {
            width: 80%;
        }

        .navbar {
            font-size: 20px;
        }

        .navbar-brand img {
            width: 80px; 
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <a class="navbar-brand" href="{{ url('/') }}">
            <img src="../user/asset gambar/logo usaha.png" alt="Your Logo" style="width: 160px; height: 160px;">
        </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                    <div class="card-header">{{ __('REGISTER') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">NAME</label>
                                <br>
                                <input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">EMAIL</label>
                                <br>
                                <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autocomplete="username">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">ALAMAT</label>
                                <br>
                                <input id="alamat" type="text" class="form-control" name="alamat" :value="old('alamat')" required autofocus>
                                <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="noTelp" class="form-label">NO TELEPON</label>
                                <br>
                                <input id="noTelp" type="text" class="form-control" name="noTelp" :value="old('noTelp')" required autofocus>
                                <x-input-error :messages="$errors->get('noTelp')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">PASSWORD</label>
                                <br>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">CONFIRM PASSWORD</label>
                                <br>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary mx-auto d-block">
                                    Register
                                </button>
                            </div>
                            <br>
                            <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" style="font-size: 15px;">
                                {{ __('Already registered?') }}
                            </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbVqg2iZN3tu2iOjN2D5tnbNE2A2IDT+5CGZms9Iugf6lL0H6ipmYXcDQ+6p6z" crossorigin="anonymous"></script>
</body>
</html>

