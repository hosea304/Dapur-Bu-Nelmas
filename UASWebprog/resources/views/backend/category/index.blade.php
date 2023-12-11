@extends('layouts.backend')

@section('title')
Kategori
@endsection

@section('headerScripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
" rel="stylesheet">
@endsection

@section('heading')
Halaman Kategori
@endsection

@section('subHeading')
Kategori
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
                                <a class="nav-link active" href="{{route('category')}}">
                                    <span class="fas fa-trash-restore"></span>
                                    Kategori
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.trashCategory')}}">
                                    <span class="fas fa-trash-restore"></span>
                                    Recycle Bin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <table id="tableKategori" class="table table-bordered table-striped">
                            <button class="btn btn-primary mb-3" id="btnAddKategori" data-toggle="modal"
                                data-target="#addModalKategori">
                                <span class="fas fa-plus"></span>
                                Tambah Kategori
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
                                    <th>Slug</th>
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

@include('backend.category.addModalKategori')

@include('backend.category.editModalKategori')

@endsection

@section('footerScripts')
<!--  -->
<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>

<!-- sweetAlert -->
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>

@include('backend.category.scripts')

@endsection