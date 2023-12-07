@extends('layouts.backend')

@section('title')
Menu
@endsection

@section('headerScripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('heading')
Halaman Menu
@endsection

@section('subHeading')
Menu
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('foods')}}">
                                    <span class="fas fa-trash-restore"></span>
                                    Menu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('foods.trashFoods')}}">
                                    <span class="fas fa-trash-restore"></span>
                                    Recycle Bin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <table id="tableMenu" class="table table-bordered table-striped">
                            <button class="btn btn-primary mb-3" id="btnAddMenu" data-toggle="modal"
                                data-target="#addModalMenu">
                                <span class="fas fa-plus"></span>
                                Tambah Menu
                            </button>
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" name="main_checkbox" id="main_checkbox">
                                        <label for=""></label>
                                    </th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Kategori</th>
                                    <th>
                                        Action <br>
                                        <button id="delAllBtn" type="submit" class="btn btn-danger">Hapus</button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.foods.addModalMenu')

@include('backend.foods.editModalMenu')

@endsection

@section('footerScripts')
<!--  -->
<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>

<!-- sweetAlert -->
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>

@include('backend.foods.scripts')

@endsection