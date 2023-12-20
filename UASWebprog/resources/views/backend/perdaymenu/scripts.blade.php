<script>
    function fetchFoods() {
        let datatable = $("#tableMenu")
            .DataTable({
                processing: true,
                info: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('perdaymenu.fetch') }}",
                    type: "GET",
                    data: { date: $("#date").val() },
                },
                columns: [
                    {
                        data: "checkbox",
                        name: "checkbox",
                        orderable: false,
                        searchable: false,
                    },

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
                        data: "photo",
                        name: "photo",
                    },
                    {
                        data: "harga",
                        name: "harga",
                    },
                    {
                        data: "stock",
                        name: "stock",
                    },
                    {
                        data: "slug",
                        name: "slug",
                    },
                    {
                        data: "status",
                        name: "status",
                    },
                    {
                        data: "id_category",
                        name: "id_category",
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
                $('input[name="food_checkbox"]').each(function () {
                    $(this).prop("checked", false);
                });
                $('input[name="food_checkbox"]').prop("checked", false);
                $("#delAllBtn").addClass("d-none");
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

    $(document).on("submit", "#addFormMenu", function (e) {
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
                    $.each(response.errors, function (prefix, val) {
                        $(dataForm)
                            .find("span." + prefix + "_error")
                            .text(val[0]);
                    });
                } else if (response.status == 403) {
                    Swal.fire("Warning", response.errors, "warning");
                } else {
                    Swal.fire("Success", response.message, "success");
                    // Corrected form ID
                    $("#addModalMenu").modal("hide");
                    $("#tableMenu").DataTable().ajax.reload(null, false);
                    $(dataForm)[0].reset();
                }
            },
        });
    });

    $(document).on("click", "#btnDelFood", function (e) {
        e.preventDefault();
        let idMenu = $(this).data("id");

        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Kamu Ingin Menghapus Menu Ini !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, hapus data!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.post(
                    "{{ route('perdaymenu.destroy') }}",
                    { idMenu: idMenu },
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
