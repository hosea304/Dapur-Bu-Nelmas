<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchFoods() {
            let datatable = $('#tableMenu').DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('foods.fetch') }}",
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
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'id_category',
                        name: 'id_category'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            }).on('draw', function () {
                $('input[name="food_checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
                $('input[name="food_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }

        fetchFoods();

        function fetchTrashFoods() {
            let datatable = $('#tableFoodsTrash').DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('foods.fetchTrashFoods') }}",
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
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'slug',
                        name: 'slug'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'id_category',
                        name: 'id_category'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            }).on('draw', function () {
                $('input[name="foodTrash_checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
                $('input[name="foodTrash_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }

        fetchTrashFoods();
    });

    $(document).on('submit', '#addFormMenu', function (e) {
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
                    // Corrected form ID
                    $('#addModalMenu').modal('hide');
                    $('#tableMenu').DataTable().ajax.reload(null, false);
                    $(dataForm)[0].reset();
                }
            }
        });
    });

    $(document).on('click', '#btnEditFood', function (e) {
        e.preventDefault();
        let idMenu = $(this).data('id');

        $.get("{{ route('foods.edit') }}", { idMenu: idMenu },
            function (data) {
                $('#editModalMenu').modal('show');
                $('#idMenu').val(idMenu);
                $('#name').val(data.food.name);
                $('#harga').val(data.food.harga);
                $('#stock').val(data.food.stock);
                $('#status option[value="' + data.food.status + '"]').prop('selected', true);
                $('#kategori option[value="' + data.food.id_category + '"]').prop('selected', true);
            },
            "json"
        );
    });

    $(document).on('submit', '#editFormMenu', function (e) {
        e.preventDefault();
        let dataForm = this;

        console.log("Form action URL:", dataForm.method);

        $.ajax({
            type: $("#editFormMenu").attr('method'),
            url: $("#editFormMenu").attr('action'),
            data: new FormData(dataForm),
            dataType: 'JSON',
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#editFormMenu").find('span.error-text').text('');
            },
            success: function (response) {
                if (response.status == 400) {
                    $.each(response.errors, function (prefix, val) {
                        $("#editFormMenu").find('span.' + prefix + '_error').text(val[0]);
                    });
                } else {
                    Swal.fire(
                        'Success',
                        response.message,
                        'success'
                    );
                    $('#editModalMenu').modal('hide');
                    $('#tableMenu').DataTable().ajax.reload(null, false);
                    $("#editFormMenu")[0].reset();
                }
            }
        });
    });


    $(document).on('click', '#btnDelFood', function (e) {
        e.preventDefault();
        let idMenu = $(this).data('id');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Menghapus Menu Ini !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('foods.destroy') }}", { idMenu: idMenu },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                        $('#tableMenu').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        })
    });


    function toggleDelAllBtn() {
        if ($('input[name="food_checkbox"]:checked').length > 0) {
            $('#delAllBtn').text('Hapus (' + $('input[name="food_checkbox"]:checked').length + ')').removeClass('d-none');
        } else {
            $('#delAllBtn').addClass('d-none');
        }
    }

    $(document).on('click', '#main_checkbox', function () {
        if (this.checked) {
            $('input[name="food_checkbox"]').each(function () {
                this.checked = true;
            });
        } else {
            $('input[name="food_checkbox"]').each(function () {
                this.checked = false;
            });
        }
        toggleDelAllBtn();
    });

    $(document).on('click', '#food_checkbox', function () {
        if ($('input[name="food_checkbox"]:checked').length == $('input[name="food_checkbox"]').length) {
            $('#main_checkbox').prop('checked', true);
        } else {
            $('#main_checkbox').prop('checked', false);
        }
        toggleDelAllBtn();
    });

    $(document).on('click', '#delAllBtn', function (e) {
        e.preventDefault();
        let idMenus = [];

        $('input[name="food_checkbox"]:checked').each(function () {
            idMenus.push($(this).data('id'));
        });

        if (idMenus.length > 0) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Kamu Ingin Menghapus Data Menu !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ route('foods.destroySelected') }}", { idMenus: idMenus },
                        function (data) {
                            console.log('Ajax response:', data);
                            Swal.fire(
                                'Success',
                                data.message,
                                'success'
                            );
                            $('#tableMenu').DataTable().ajax.reload(null, false);
                        },
                        "json"
                    );
                }
            });
        }
    });

    $(document).on('click', '#btnRestoreFood', function (e) {
        e.preventDefault();
        let idMenu = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Mengembalikan Data Menu !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, kembalikan data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('foods.restore') }}", { idMenu: idMenu },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        );
                        $('#tableFoodsTrash').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });

    $(document).on('click', '#btnDelPermanen', function (e) {
        e.preventDefault();
        let idMenu = $(this).data('id');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Kamu Ingin Menghapus Data Menu Secara Permanen !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("{{ route('foods.destroyPermanent') }}", { idMenu: idMenu },
                    function (data) {
                        console.log('Ajax response:', data);
                        Swal.fire(
                            'Success',
                            data.message,
                            'success'
                        );
                        $('#tableFoodsTrash').DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });

    function toggleRestoreAllBtn() {
        if ($('input[name="foodTrash_checkbox"]:checked').length > 0) {
            $('#restoreSelectedFoodBtn').text('Restore (' + $('input[name="foodTrash_checkbox"]:checked').length + ')').removeClass('d-none');
            $('#deleteSelectedFoodBtn').text('Delete (' + $('input[name="foodTrash_checkbox"]:checked').length + ')');
        } else {
            $('#restoreSelectedFoodBtn').addClass('d-none');
            $('#deleteSelectedFoodBtn').addClass('d-none');
        }
    }

    $(document).on('click', '#foodTrash_checkbox', function () {
        if ($('input[name="foodTrash_checkbox"]:checked').length == $('input[name="foodTrash_checkbox"]').length) {
            $('#mainTrash_checkbox').prop('checked', true);
        } else {
            $('#mainTrash_checkbox').prop('checked', false);
        }
        toggleRestoreAllBtn();
    });

    $(document).on('click', '#mainTrash_checkbox', function () {
        if (this.checked) {
            $('input[name="foodTrash_checkbox"]').each(function () {
                this.checked = true;
            });
        } else {
            $('input[name="foodTrash_checkbox"]').each(function () {
                this.checked = false;
            });
        }
        toggleRestoreAllBtn();
    });

    $(document).on('click', '#restoreSelectedFoodBtn', function (e) {
        e.preventDefault();
        let idMenus = [];

        $('input[name="foodTrash_checkbox"]:checked').each(function () {
            idMenus.push($(this).data('id'));
        });

        if (idMenus.length > 0) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Kamu Ingin Mengembalikan Data food !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, kembalikan data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post("{{ route('foods.restoreSelected') }}", { idMenus: idMenus },
                        function (data) {
                            console.log('Ajax response:', data);
                            Swal.fire(
                                'Success',
                                data.message,
                                'success'
                            );
                            $('#tableFoodsTrash').DataTable().ajax.reload(null, false);
                        },
                        "json"
                    );
                }
            });
        }
    });

</script>