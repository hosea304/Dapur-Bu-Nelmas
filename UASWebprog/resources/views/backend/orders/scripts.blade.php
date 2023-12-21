<script>
    function fetchFoods() {
        let datatable = $("#tableMenu")
            .DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('orders.fetch') }}",
                    type: "GET",
                    data: { date: $("#date").val() },
                },
                columns: [
                    {
                        data: null,
                        name: "no",
                        render: function (data, type, full, meta) {
                            return meta.row + 1;
                        },
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "status",
                        name: "status",
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                    },
                    {
                        data: "alamat",
                        name: "alamat",
                    },
                    {
                        data: "noTelp",
                        name: "noTelp",
                    },
                    {
                        data: "action",
                        name: "action",
                        orderable: false,
                        searchable: false,
                    },
                ],
            })
            .on("draw", function () {
                $("#delAllBtn").addClass("d-none");
            });
    }

    function fetchDetail(id) {
        let datatable = $("#tableDetail")
            .DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('orders.detail') }}",
                    type: "GET",
                    data: { id: id },
                },
                columns: [
                    {
                        data: null,
                        name: "no",
                        render: function (data, type, full, meta) {
                            return meta.row + 1;
                        },
                    },
                    {
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "harga",
                        name: "harga",
                    },
                    {
                        data: "qty",
                        name: "qty",
                    },
                    {
                        data: "subtotal",
                        name: "subtotal",
                    },
                ],
            })
            .on("draw", function () {
                $("#detailModal").modal("show");
            });
    }

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear() + "-" + month + "-" + day;
        $("#date").val(today);

        fetchFoods();
    });

    $(document).on("click", "#btnPerDay", function (e) {
        e.preventDefault();
        let dataForm = $("#date").val();

        console.log("Form action URL:", dataForm);
        $("#tableMenu").dataTable().fnClearTable();
        $("#tableMenu").dataTable().fnDestroy();
        fetchFoods();
    });

    $(document).on("click", "#detail", function (e) {
        e.preventDefault();
        let idOrder = $(this).data("id");
        $("#id_order").val($(this).data("id"));

        $("#tableDetail").dataTable().fnClearTable();
        $("#tableDetail").dataTable().fnDestroy();
        fetchDetail(idOrder);
    });

    $(document).on("click", "#changestatus", function (e) {
        e.preventDefault();
        let status = $("#status").val();
        let id = $("#id_order").val();

        console.log("Form action URL:", status);
        $.post(
            "{{ route('orders.changestatus') }}",
            { status: status, id: id },
            function (data) {
                console.log("Ajax response:", data);
                Swal.fire("Success", data.message, "success");
                $("#tableMenu").DataTable().ajax.reload(null, false);
            },
            "json"
        );
    });
</script>