function outItem(item_id){
    $.ajax({
        url: "../assets/db/get_out_stocks.php",
        type: "GET",
        data: {
            item_id: item_id
        },
        dataType: "json",
        success: function (data) {
            $("#stockID").val(data.id);
            $("#stockCODE").val(data.invoice_id);
            $("#stockNAME").val(data.name);
            // console.log(data);
        },
    });
}

$("#outSpecificProduct").submit(function (e){
    e.preventDefault();
    var form = new FormData(this);

    $.ajax({
        url: "../assets/db/update_stock_branch.php",
        type: "POST",
        data: form,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data = "success") {
                swal("Success", "Stock has been updated", "success").then(() => {
                    window.location.reload();
                });
            }else if(data = "over_limit"){
                swal("Item Cannot be out", "Cannot out more than available quantity", "error").then(() => {
                    window.location.reload();
                });
            }else{
                swal("Error", "Something went wrong", "error").then(() => {
                    window.location.reload();
                });
            }
        },
    });
});