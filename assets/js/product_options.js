$(function () {
  $("#searchProduct").on("keyup", function (event) {
    var search = $("#searchProduct").val().toLowerCase();
    if (search === "") {
      $("#productTable tr").show();
    } else {
      $("#productTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
      });
    }
  });

  function searchProduct() {
    var search = $("#searchProduct").val().toLowerCase();
    if (search == "") {
      $("#productTable tr").show();
    } else {
      $("#productTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
      });
    }
  }
  
  $("#editSpecificProduct").submit(function(e){
    e.preventDefault();
    var form = new FormData(this);

    $.ajax({
      url: "../assets/db/edit_product.php",
      type: "POST",
      data: form,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $("#loader").attr("hidden", false);
      },
      success: function (data) {
        $("#loader").attr("hidden", true);
        swal("Success", "Product Successfully Changed!", "success").then(() => {
          window.location.reload();
        });
        $('#editItem').modal('hide');
      },
    });
  });
});
function editItem(item_id){
  $.ajax({
    url: "../assets/db/edit_item.php",
    type: "GET",
    data: {
      item_id: item_id
    },
    dataType: "json",
    success: function (data) {
      $("#prodID").val(data.id);
      $("#prodCODE").val(data.invoice_id);
      $("#prodNAME").val(data.name);
      $("#prodPRICE").val(data.price);
      $("#prodQUANTITY").val(data.quantity);
    },
  });
}

function formatNumberWithCommas(number) {
  return number.replace(/\d(?=(\d{3})+\.)/g, "$&,");
}

function deleteItem(product_id) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this item!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        url: "../assets/db/delete_product.php",
        type: "POST",
        data: {
          prod_id: product_id
        },
        success: function (data) {
          swal("Deleted!", "Product has been deleted!", "success").then(() => {
            window.location.reload();
          });
        },
        error: function (xhr, status, error) {
          swal("Error", "There was an error deleting the product. Please try again.", "error");
          console.error("Error deleting product:", error);
        }
      });
    }
  });
}

