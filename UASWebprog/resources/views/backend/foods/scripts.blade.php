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
                $('input[name="foods_checkbox"]').each(function () {
                    $(this).prop('checked', false);
                })
                $('input[name="foods_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }

        fetchFoods();
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
                $('#name').val(data.foods.name);
                $('#photo').val(data.foods.photo);
                $('#harga').val(data.foods.harga);
                $('#stock').val(data.foods.stock);
                $('#status').val(data.foods.status);
                $('#kategori').val(data.foods.id_category);
            },
            "json"
        );
    });

    $(document).on('submit', '#editFormMenu', function (e) {
        e.preventDefault();
        let dataForm = this;

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
</script>