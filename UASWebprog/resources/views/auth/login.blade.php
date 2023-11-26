@extends('layouts.auth')

@section('headerScripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('content')
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="" class="h1"><b>Admin</b> GhostKitchen</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{route('login.store')}}" method="POST" id="formLogin">
                @csrf
                <div class="input-group mb-3">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input id="checkbox" type="checkbox" id="remember">
                            <label for="checkbox">
                                Show Password
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
@endsection

@section('footerScripts')
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '#checkbox', function () {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            }
            else {
                $('#password').attr('type', 'password');
            }
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('submit', '#formLogin', function (e) {
        e.preventDefault();
        let dataForm = this;
        $.ajax({
            type: $('#formLogin').attr('method'),
            url: $('#formLogin').attr('action'),
            data: new FormData(dataForm),
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.status == 405) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops...',
                        text: response.error
                    });
                    $('#formLogin')[0].reset();
                } else if (response.status == 400) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooops...',
                        text: response.error
                    });
                    $('#formLogin')[0].reset();
                } else {
                    window.location.replace('http://127.0.0.1:8000/dashboard');
                }
            }
        });
    });
</script>
@endsection