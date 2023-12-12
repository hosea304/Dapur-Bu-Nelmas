<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchCategory() {
            let datatable = $('#tableKategori').DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category.fetch') }}",
                    type: "GET"
                },
                columns: [
                    {
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: null,
                        name: 'no',
                        render: function (data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'photo',
                        name: 'photo'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            }).on('draw', function () {
                $('input[name="kategori_checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
                $('input[name="main_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }

        fetchCategory();

        function fetchTrashCategory() {
            let datatable = $('#tableKategoriTrash').DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('category.fetchTrashCategory') }}",
                    type: "GET"
                },
                columns: [
                    {
                        data: 'checkbox',
                        name: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: null,
                        name: 'no',
                        render: function (data, type, full, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'photo',
                        name: 'photo'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            }).on('draw', function () {
                $('input[name="kategoriTrash_checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
                $('input[name="mainTrash_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }

        fetchTrashCategory();
    });



    $(document).on('submit', '#addFormKategori', function (e) {
        e.preventDefault();
        let dataForm = this;
        $.ajax({
            url: $(dataForm).attr('action'),
            type: $(dataForm).attr('method'),
            data: new FormData(dataForm),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(dataForm).find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 404) {
                    $.each(response.errors, function (prefix, val) {
                        $(dataForm).find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    Swal.fire(
                        'Success',
                        response.message,
                        'success'
                    );
                    $('#addModalKategori').modal('hide');
                    $('#tableKategori').DataTable().ajax.reload(null, false);
                    $(dataForm)[0].reset();
                }
            }
        });
    });


    $(document).on('click', '#btnEditKategori', function (e) {
        e.preventDefault();
        let idKategori = $(this).data('id');
        $.get("{{ route('category.edit') }}", { idKategori: idKategori },
            function (data) {
                $('#editModalKategori').modal('show');
                $('#idKategori').val(idKategori);
                $('#name').val(data.kategori.name);
            },
            "json"
        );
    });

    $(document).on('submit', '#editFormKategori', function (e) {
        e.preventDefault();
        let dataForm = this;

        console.log("Form action URL:", dataForm);

        $.ajax({
            type: $("#editFormKategori").attr('method'),
            url: $("#editFormKategori").attr('action'),
            data: new FormData(dataForm),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#editFormKategori").find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 400) {
                    $.each(response.errors, function (prefix, val) {
                        $("#editFormKategori").find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    Swal.fire(
                        'Success',
                        response.message,
                        'success'
                    );
                    $('#editModalKategori').modal('hide');
                    $('#tableKategori').DataTable().ajax.reload(null, false);
                    $("#editFormKategori")[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#btnDelKategori', function (e) {
        e.preventDefault();
        let idKategori = $(this).data('id');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Menghapus Data Kategori !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('category.destroy') }}", { idKategori: idKategori },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        );
                        $('#tableKategori').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });

    $(document).on('click', '#btnRestoreKategori', function (e) {
        e.preventDefault();
        let idKategori = $(this).data('id');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Mengembalikan Data Kategori !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, kembalikan data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('category.restore') }}", { idKategori: idKategori },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        );
                        $('#tableKategoriTrash').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });

    function toggleDelAllBtn() {
        if ($('input[name="kategori_checkbox"]:checked').length > 0) {
            $('#delAllBtn').text('Hapus (' + $('input[name="kategori_checkbox"]:checked').length + ')').removeClass('d-none');
        } else {
            $('#delAllBtn').addClass('d-none');
        }
    }


    $(document).on('click', '#main_checkbox', function () {
        if (this.checked) {
            $('input[name="kategori_checkbox"]').each(function () {
                this.checked = true;
            });
        } else {
            $('input[name="kategori_checkbox"]').each(function () {
                this.checked = false;
            });
        }
        toggleDelAllBtn();
    });

    $(document).on('click', '#kategori_checkbox', function () {
        if ($('input[name="kategori_checkbox"]:checked').length == $('input[name="kategori_checkbox"]').length) {
            $('#main_checkbox').prop('checked', true);
        } else {
            $('#main_checkbox').prop('checked', false);
        }
        toggleDelAllBtn();
    });

    $(document).on('click', '#delAllBtn', function (e) {
        e.preventDefault();
        let idCategorys = [];

        $('input[name="kategori_checkbox"]:checked').each(function () {
            idCategorys.push($(this).data('id'));
        });

        if (idCategorys.length > 0) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Kamu Ingin Menghapus Data Kategori !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ route('category.destroySelected') }}", { idCategorys: idCategorys },
                        function (data) {
                            console.log('Ajax response:', data);
                            Swal.fire(
                                'Success',
                                data.message,
                                'success'
                            );
                            $('#tableKategori').DataTable().ajax.reload(null, false);
                        },
                        "json"
                    );
                }
            });
        }
    });

    function toggleRestoreAllBtn() {
        if ($('input[name="kategoriTrash_checkbox"]:checked').length > 0) {
            $('#restoreAllBtn').text('Restore (' + $('input[name="kategoriTrash_checkbox"]:checked').length + ')').removeClass('d-none');
        } else {
            $('#restoreAllBtn').addClass('d-none');
        }
    }

    $(document).on('click', '#kategori_checkbox', function () {
        if ($('input[name="kategoriTrash_checkbox"]:checked').length == $('input[name="kategoriTrash_checkbox"]').length) {
            $('#mainTrash_checkbox').prop('checked', true);
        } else {
            $('#mainTrash_checkbox').prop('checked', false);
        }
        toggleRestoreAllBtn();
    });

    $(document).on('click', '#mainTrash_checkbox', function () {
        if (this.checked) {
            $('input[name="kategoriTrash_checkbox"]').each(function () {
                this.checked = true;
            });
        } else {
            $('input[name="kategoriTrash_checkbox"]').each(function () {
                this.checked = false;
            });
        }
        toggleRestoreAllBtn();
    });

    $(document).on('click', '#restoreAllBtn', function (e) {
        e.preventDefault();
        let idCategorys = [];

        $('input[name="kategoriTrash_checkbox"]:checked').each(function () {
            idCategorys.push($(this).data('id'));
        });

        if (idCategorys.length > 0) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Kamu Ingin Mengembalikan Data Kategori !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, kembalikan data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ route('category.restoreSelected') }}", { idCategorys: idCategorys },
                        function (data) {
                            console.log('Ajax response:', data);
                            Swal.fire(
                                'Success',
                                data.message,
                                'success'
                            );
                            $('#tableKategoriTrash').DataTable().ajax.reload(null, false);
                        },
                        "json"
                    );
                }
            });
        }
    });

    $(document).on('click', '#btnDelPermanen', function (e) {
        e.preventDefault();
        let idKategori = $(this).data('id');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Menghapus Data Kategori Secara Permanen !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('category.destroyPermanent') }}", { idKategori: idKategori },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        );
                        $('#tableKategoriTrash').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });


</script>
