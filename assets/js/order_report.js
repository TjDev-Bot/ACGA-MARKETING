$(function () {
  $(".check_order").click(function () {
    var order_id = $(this).data("ordered-id");
    $.ajax({
      url: "../assets/db/get_purchased_products.php",
      type: "GET",
      data: {
        purchase_ID: order_id,
      },
      dataType: "json",
      success: function (response) {
        var table = $("#ordered_items").empty();
        console.log(response);
        $.each(response, function (index, row) {
          var price = parseInt(row.unit_price);
          var quantity = parseInt(row.quantity);
          var totalPrice = price * quantity;
          var invoice_id = row.invoice_id.toUpperCase();
          var tr = "<tr>";
          tr += "<td>" + invoice_id + "</td>";
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
  $("#searchOrder").on("keyup", function (event) {
    var search = $(this).val().toLowerCase();
    if (search == "") {
      $("#orderTable tr").show();
    } else {
      $("#orderTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(search) > -1);
      });
    }
  });
  $(".dateFilter").change(function () {
    // Get selected dates
    var fromDate = $("#dateFrom").val()
    var toDate = $("#dateTo").val()
      ? new Date($("#dateTo").val()).toISOString().split("T")[0]
      : null;

    // Loop through each row in the table
    $("#orderTable tr").each(function () {
      var dateCellText = $(this).find("td").eq(4).text().trim();

      var rowDate = formatDateToISO(dateCellText);
      var isVisible = true;

      // if (fromDate && formatDateToISO(dateCellText) !== fromDate) {
      //   isVisible = false;
      // }

      // if (fromDate && toDate && (rowDate < fromDate || rowDate > toDate)) {
      //   isVisible = false;
      // }
      if(fromDate == rowDate){
        isVisible = false;
      }
      // $(this).toggle(isVisible);
      console.log(isVisible);
      // console.log("Row Date:", formatDateToISO(dateCellText), "Date item:", fromDate);
    });
  });

  function formatDateToISO(dateStr) {
    // Parse the date string
    var date = new Date(dateStr);

    if (isNaN(date.getTime())) {
      return null;
    }

    var year = date.getFullYear();
    var month = ("0" + (date.getMonth() + 2)).slice(-1); 
    var day = ("0" + date.getDate()).slice(-2); 

    return year + "-" + month + "-" + day;
  }

  function formatDate(dateString) {
    var options = { year: "numeric", month: "short", day: "numeric" };
    var date = new Date(dateString);
    return date.toLocaleDateString("en-US", options);
  }
});
