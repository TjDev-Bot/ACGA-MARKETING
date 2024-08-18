// action="../assets/db/add_product.php"
$("#add_product").submit(function (e) {
  e.preventDefault();
  var form = new FormData(this);

  $.ajax({
    url: "../assets/db/add_product.php",
    type: "POST",
    data: form,
    contentType: false,
    processData: false,
    beforeSend: function () {
      $("#loader").attr("hidden", false);
    },
    success: function (data) {
      var response = JSON.parse(data);
      if(response.status == "success"){
        $("#loader").attr("hidden", true);
        $("#add_product")[0].reset();
        swal("Success", "Product Successfully Added!", "success");
      }else{
        $("#loader").attr("hidden", true);
        swal("Error", "Something went wrong! please try again", "error");
      }
    },
  });
});
$(function () {
  // Fetch and load the product list
  $.ajax({
    url: "../assets/db/get_products.php",
    type: "GET",
    success: function (data) {
      $("#productTable").html(data);
    },
  });

  // Load checkout items
  loadCheckout();

  // Handle adding product to checkout
  $(".addCheckoutProduct").click(function () {
    var productId = $(this).data("target-product-id");
    $.ajax({
      url: "../assets/db/product_payment.php",
      type: "POST",
      data: {
        productId: productId,
      },
      beforeSend: function () {
        $("#loader").attr("hidden", false);
      },
      success: function (data) {
        $("#loader").attr("hidden", true);
        loadCheckout();
        console.log(data);
        var response = JSON.parse(data);
        if (response.status == "success") {
          // swal("Success", "Product Successfully Added!", "success");
        } else {
          swal("Error", response.message, "error");
        }
      },
      error: function (data) {
        console.log(data);
      },
    });
  });
});

function loadCheckout() {
  $.ajax({
    url: "../assets/db/checkout.php",
    type: "GET",
    dataType: "json",
    success: function (data) {
      var checkoutTable = $("#checkoutTable");
      checkoutTable.empty();

      if (data && data.data.length > 0) {
        $.each(data.data, function (index, row) {
            $(".ordr").attr("disabled", false);
            var product_info = row.product_info;
            var tr = "<tr data-product-id='" + row.id + "'>";
            tr += "<td>" + product_info.name + "</td>";
            tr +=
              '<td><div class="input-group input-group-sm mb-3" style="width: 100px">' +
              '<div class="input-group-prepend"><button class="btn btn-primary minusQuantity" id="inputGroup-sizing-sm" type="button">-</button></div>' +
              '<input type="number" class="form-control input-sm text-center quantityNum" aria-label="Small" aria-describedby="inputGroup-sizing-sm" style="width: 0px;" min="0" value="' +
              row.quantity + '" data-initial-value="' + row.quantity + '">' + '<div class="input-group-append">' +
              '<button class="btn btn-primary addQuantity" id="inputGroup-sizing-sm" type="button">+</button></div>';
            tr += "</div></td>";
            tr += "<td id='price' data-price='" + product_info.price + "'>₱ " + product_info.price + "</td>";
            tr += "</tr>";
          checkoutTable.append(tr);
        });

        // Attach event listeners for quantity increment and decrement
        checkoutTable
          .off("click", ".addQuantity")
          .on("click", ".addQuantity", function () {
            var quantityInput = $(this).closest("td").find(".quantityNum");
            var product_id = $(this).closest("tr").data("product-id");
            var quantity = parseInt(quantityInput.val());
            quantity++;
            quantityInput.val(quantity);
            updateQuantityCheckout(product_id, quantity);
            updateTotalPrice();
          });

        checkoutTable
          .off("click", ".minusQuantity")
          .on("click", ".minusQuantity", function () {
            var quantityInput = $(this).closest("td").find(".quantityNum");
            var product_id = $(this).closest("tr").data("product-id");
            var quantity = parseInt(quantityInput.val());
            if (quantity > 1) {
              quantity--;
              quantityInput.val(quantity);
              updateQuantityCheckout(product_id, quantity);
            } else if (quantity === 1) {
              loadQuantityCheckout(product_id);
              quantityInput.val(0);
            }

            updateTotalPrice();
          });
      } else {
        checkoutTable.append(
          "<tr><td colspan='3'>No items in checkout</td></tr>"
        );
        $(".ordr").attr("disabled", true);
      }

      $(".cancel").click(function () {
        swal("Cancelled", "The checkout has been cancelled.", "error");
        $.each(data.data, function (index, row) {
          loadQuantityCheckout(row.id);
        });
      });
      $(".hold").click(function () {
        swal("Held", "The checkout has been held.", "info").then((hold) => {
          if (hold) {
            var min = 10000;
            var max = 99999; 
            var checkoutID = Math.floor(Math.random() * (max - min + 1)) + min;
            $.each(data.data, function (index, row) {
              holdCheckout(row.id, checkoutID);
            });
          }
        });;
        
      });
      $(".purchase").click(function () {
        swal("Purchased", "The checkout has been purchased.", "success").then((okay) => {
            var min = 10000;
            var max = 99999; 
            var checkoutID = Math.floor(Math.random() * (max - min + 1)) + min;
            $.each(data.data, function (index, row) {
              purchaseCheckout(row.id, checkoutID);
            });
        });
      });

      updateTotalPrice();
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    },
  });
}

function updateQuantityCheckout(productid, quantity) {
  $.ajax({
    url: "../assets/db/update_quantity.php",
    type: "POST",
    dataType: "json",
    data: {
      product_id: productid,
      quantity: quantity,
    },
    success: function (data) {
      // console.log(data);
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    },
  });
}
function loadQuantityCheckout(product_id) {
  $.ajax({
    url: "../assets/db/delete_checkout.php",
    type: "POST",
    data: {
      product_id: product_id,
    },
    success: function (data) {
      loadCheckout();
    },
  });
}
function holdCheckout(product_id, checkout_id){
  $.ajax({
    url: "../assets/db/hold_checkout.php",
    type: "POST",
    data: {
      checkout_id: checkout_id,
      product_id: product_id,
    },
    success: function (data) {
      // loadCheckout();
      window.location.reload();
    },
  });
}
function purchaseCheckout(product_id, checkout_id){
  $.ajax({
    url: "../assets/db/purchase_order.php?type=purchase",
    type: "POST",
    data: {
      checkout_id: checkout_id,
      product_id: product_id,
    },
    success: function (data) {
      window.location.reload();
    },
  });
}
function updateTotalPrice() {
  var total = 0;
  $("#checkoutTable tr").each(function () {
    var quantity = parseInt($(this).find(".quantityNum").val());
    var price = parseFloat($(this).find("#price").attr("data-price"));
    // var productid = $(this).closest("tr").data("product-id");
    if (!isNaN(quantity) && !isNaN(price)) {
      total += quantity * price;
    }
  });
  $("#total").html("₱ " + total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, "$&,"));
}

