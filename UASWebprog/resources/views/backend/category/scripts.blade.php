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
                    $(this).checked = false;
                })
                $('input[name="main_checkbox"]').prop('checked', false);
                $('#delAllBtn').addClass('d-none');
            });
        }
        fetchCategory();
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
                // Corrected form ID
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
                    $('#addModalKategori').modal('hide');
                    $('#tableKategori').DataTable().ajax.reload(null, false);
                    $(dataForm)[0].reset();
                }
            }
        });
    });

</script>
