/* jQuery Code */
// const flashData = $(".flash-data").data("flashdata");

// if (flashData) {
//     Swal.fire({
//         title: "Success ",
//         text: "Data " + flashData,
//         icon: "success",
//         showConfirmButton: false,
//         timer: 3000,
//     });
// }

/* Javascript Code */
const flashData = document
    .querySelector(".flash-data")
    .getAttribute("data-flashdata");
if (flashData) {
    Swal.fire({
        title: "Success ",
        text: "Data " + flashData,
        icon: "success",
        // position: "top-end",
        showConfirmButton: false,
        timer: 2500,
    });
}

/* hapus */
$(document).on("click", "#deleteproduct", function (e) {
    e.preventDefault();
    // const id = $(this).data("id");
    const nameproduct = $(this).attr("data-nm_product");
    const action = $(this).attr("action");
    Swal.fire({
        // title: "Yakin Data Di Hapus ?" + id,
        title: "Yakin Data Di Hapus ?",
        text: "Produk " + nameproduct + " Akan Di Hapus !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            // window.location.href = "/deleteproducts." + id;
            $("form#deleteproduct").submit();
        }
    });
    // window.location.reload();
});
