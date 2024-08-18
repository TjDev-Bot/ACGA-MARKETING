$(function () {
  $(".delete_order").click(function () {
    var order_id = $(this).data("order-uid");
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this order!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        // swal("Deleted!", "Order has been deleted!", "success").then(() => {});
          $.ajax({
            url: "../assets/db/delete_order.php",
            type: "POST",
            data: {
              order_id: order_id
            },
            success: function (data) {
              swal("Deleted!", "Order has been deleted!", "success").then((del) => {
                window.location.reload();
                // if(del){
                //   window.location.reload();
                // }
              });
            },
            error: function (xhr, status, error) {
              swal("Error", "There was an error deleting the product. Please try again.", "error");
              console.error("Error deleting product:", error);
            }
          });
      }
    });
  });

  $(".edit_order").click(function () {
    var order_id = $(this).data("order-id");
    $.ajax({
      url: "../assets/db/get_order_products.php",
      type: "GET",
      data: {
        orderID: order_id,
      },
      dataType: "json",
      success: function (response) {
        // console.log(order_id);
        $("#checkoutUID").val(order_id);
        var table = $("#ordered_items").empty();
        $.each(response, function (index, row) {
          // var price = convertToMoney(parseInt(row.price));
          var price = parseInt(row.price);
          var quantity = parseInt(row.quantity);
          var totalPrice = price * quantity;
          var tr = "<tr>";
          tr += "<td>" + row.invoice_id + "</td>";
          tr += "<td>" + row.name + "</td>";
          tr += "<td>x " + row.quantity + "</td>";
          tr += "<td>₱ " + convertToMoney(totalPrice) + "</td>";
          tr += "</tr>";
          table.append(tr);
        });
      },
      error: function (xhr, status, error) {},
    });
  });

  function convertToMoney(price) {
    return price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,");
  }

  $("#editCheckoutOrder").submit(function (e) {
    e.preventDefault();
    var form = new FormData(this);
    $.ajax({
      url: "../assets/db/purchase_order.php?type=hold",
      type: "POST",
      data: form,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $("#editOrder").modal("hide");
      },
      success: function (response) {
        swal("Purchased", "Order has been purchased!", "success").then((ok) => {
          if(ok){
            window.location.reload();
          }
        });
        // console.log(response);
      },
      error: function (xhr, status, error) {
        console.log(error);
      },
    });
  });

});
