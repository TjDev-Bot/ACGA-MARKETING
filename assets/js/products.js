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
    success: function (data) {
      $("#add_product")[0].reset();
      //    $('#products').html(data);
    },
  });
});

$(function () {
  $.ajax({
    url: "../assets/db/get_products.php",
    type: "GET",
    //   dataType: "html",
    success: function (data) {
      $("#productTable").html(data);
    },
  });
});
