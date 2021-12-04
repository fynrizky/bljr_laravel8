/* Ubah Product */

$(document).on("click", "#editdataproduct", function () {
    var idproduct = $(this).data("id");
    var nameproduct = $(this).data("nameproduct");
    var stock = $(this).data("stock");
    var price = $(this).data("price");
    var desc = $(this).data("desc");
    var pict = $(this).data("pict");
    // var gbr_awal = $(this).data("gbr_awal");

    $("#modal-edit #idproduct").val(idproduct);
    $("#modal-edit #nama_barang_edit").val(nameproduct);
    $("#modal-edit #stock").val(stock);
    $("#modal-edit #price").val(price);
    $("#modal-edit #desc").val(desc);
    $("#modal-edit #img").attr("src", pict);
    // $("#modal-edit #gbr_awal").val(gbr_awal);
});

$(document).ready(function () {
    $("#formupdateproduct").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (msg) {
                const url = "/successupdate";
                window.location.href = url;
            },
        });
        // window.location.reload();
    });
});
