@extends('layouts.backend')

@section('title')
User
@endsection

@section('headerScripts')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{asset('datatable/dataTables.bootstrap4.min.css')}}">
@endsection

@section('heading')
Halaman Pengguna
@endsection

@section('subHeading')
User
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <button class="btn btn-primary">
                        <span class="fas fa-plus"></span>
                        Tambah User
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-12 col-sm-12 table-responsive">
                        <table id="tableUser" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
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
@endsection

@section('footerScripts')
<script src="{{asset('datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('datatable/dataTables.bootstrap4.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    function fetchUser() {
        let datatable = $('#tableUser').DataTable({
            processing: true,
            info: true,
            serverSide: true,
            ajax: {
                url: "{{route('user.fetch')}}",
                type: "GET"
            },
            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ]
        });
    }
    fetchUser();
</script>
@endsection