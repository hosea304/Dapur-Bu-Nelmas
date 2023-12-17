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

    function toggleDelAllBtn() {
        if ($('input[name="food_checkbox"]:checked').length > 0) {
            $("#delAllBtn")
                .text(
                    "Hapus (" +
                        $('input[name="food_checkbox"]:checked').length +
                        ")"
                )
                .removeClass("d-none");
        } else {
            $("#delAllBtn").addClass("d-none");
        }
    }

    $(document).on("click", "#main_checkbox", function () {
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

    $(document).on("click", "#food_checkbox", function () {
        if (
            $('input[name="food_checkbox"]:checked').length ==
            $('input[name="food_checkbox"]').length
        ) {
            $("#main_checkbox").prop("checked", true);
        } else {
            $("#main_checkbox").prop("checked", false);
        }
        toggleDelAllBtn();
    });

    $(document).on("click", "#delAllBtn", function (e) {
        e.preventDefault();
        let idMenus = [];

        $('input[name="food_checkbox"]:checked').each(function () {
            idMenus.push($(this).data("id"));
        });

        if (idMenus.length > 0) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Kamu Ingin Menghapus Data Menu !",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus data!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post(
                        "{{ route('perdaymenu.destroySelected') }}",
                        { idMenus: idMenus },
                        function (data) {
                            console.log("Ajax response:", data);
                            Swal.fire("Success", data.message, "success");
                            $("#tableMenu")
                                .DataTable()
                                .ajax.reload(null, false);
                        },
                        "json"
                    );
                }
            });
        }
    });
</script>
