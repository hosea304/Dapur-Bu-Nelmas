<script>
    function fetchFoods() {
        let datatable = $("#tableMenu").DataTable({
            processing: true,
            info: true,
            serverSide: true,
            ajax: {
                url: "{{ route('getcart') }}",
                type: "GET",
            },
            columns: [
                {
                    data: "gambar",
                    name: "gambar",
                },
                {
                    data: "name",
                    name: "name",
                },
                {
                    data: "qty",
                    name: "qty",
                },
                {
                    data: "total",
                    name: "total",
                },
                {
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                },
            ],
        });
    }

    function getsubtotal() {
        $.get(
            "{{ route('getsubtotal') }}",
            function (data) {
                $("#subtotal").html(data.total);
            },
            "json"
        );
    }

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        fetchFoods();
        getsubtotal();
    });

    $(document).on("click", "#btnDelFood", function (e) {
        e.preventDefault();
        let id = $(this).data("id");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Kamu Ingin Menghapus Menu Ini Dari Keranjang !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "{{ route('removefromcart') }}",
                    { id: id },
                    function (data) {
                        console.log("Ajax response:", data);
                        Swal.fire("Success", data.message, "success").then(
                            () => {
                                location.reload();
                            }
                        );
                        $("#tableMenu").DataTable().ajax.reload(null, false);
                    },
                    "json"
                );
            }
        });
    });

    $(document).on("submit", "#checkoutform", function (e) {
        e.preventDefault();
        let dataForm = this;

        $.ajax({
            url: $(dataForm).attr("action"),
            type: $(dataForm).attr("method"),
            data: new FormData(dataForm),
            dataType: "JSON",
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(dataForm).find("span.error-text").text("");
            },
            success: function (response) {
                if (response.status == 404) {
                } else if (response.status == 403) {
                    Swal.fire("Warning", response.errors, "warning");
                } else {
                    Swal.fire("Success", response.message, "success");
                    $("#tableMenu").DataTable().ajax.reload(null, false);
                }
            },
        });
    });
</script>