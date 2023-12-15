@extends('layouts.backend') @section('title') Menu @endsection
@section('headerScripts')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link
    rel="stylesheet"
    href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}"
/>
<link
    href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css
"
    rel="stylesheet"
/>
@endsection @section('heading') Halaman Menu @endsection @section('subHeading')
Menu @endsection @section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6"></div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <table
                            id="tableMenu"
                            class="table table-bordered table-striped"
                        >
                            <label for="">Tanggal</label>
                            <input
                                placeholder=""
                                type="date"
                                name=""
                                id="date"
                                class="form-control mb-3 w-25"
                            />
                            <div>
                                <button
                                    class="btn btn-primary mb-3"
                                    id="btnPerDay"
                                >
                                    Cari Menu Harian Berdasarkan Tanggal
                                </button>
                            </div>
                            <button
                                class="btn btn-primary mb-3"
                                id="btnAddMenu"
                                data-toggle="modal"
                                data-target="#addModalMenu"
                            >
                                <span class="fas fa-plus"></span>
                                Tambah Menu
                            </button>
                            <thead>
                                <tr>
                                    <th>
                                        <input
                                            type="checkbox"
                                            name="main_checkbox"
                                            id="main_checkbox"
                                        />
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
                                        Action <br />
                                        <button
                                            id="delAllBtn"
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Hapus
                                        </button>
                                    </th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('backend.perdaymenu.addModalMenu')@endsection @section('footerScripts')
<!--  -->
<script src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('datatable/dataTables.bootstrap4.min.js') }}"></script>

<!-- sweetAlert -->
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js
"></script>

@include('backend.perdaymenu.scripts') @endsection
