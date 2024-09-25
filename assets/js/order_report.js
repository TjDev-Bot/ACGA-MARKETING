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
        // console.log(response);
        $.each(response, function (index, row) {
          var price = parseInt(row.unit_price);
          var quantity = parseInt(row.quantity);
          var totalPrice = price * quantity;
          var retailPrice = parseInt(row.retail_price);
          var invoice_id = row.invoice_id.toUpperCase();
          // console.log(row);
          var tr = "<tr>";
          tr += "<td>" + invoice_id + "</td>";
          tr += "<td>" + row.name + "</td>";
          tr += "<td>x " + row.quantity + "</td>";
          tr += "<td>₱ " + convertToMoney(price) + "</td>";
          tr += "<td>₱ " + convertToMoney(retailPrice) + "</td>";
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
    var fromDate = $("#dateFrom").val();
    var toDate = $("#dateTo").val();

    var from = new Date(fromDate);
    var to = new Date(toDate);

    $("#orderTable tr").each(function() {
        var rowDate = $(this).data("date-time");

        if (rowDate === undefined || rowDate === "") {
            $(this).hide();
            return;
        }

        var rowDateObj = new Date(rowDate);

        if (rowDateObj >= from && rowDateObj <= to) {
          $(this).show();
        } else if (!fromDate && !toDate) {
          $(this).show();
        } else {
          $(this).hide();
        }

        // // Show all rows if both date inputs are empty
        // if (!fromDate && !toDate) {
        //   $(this).show();
        // } 
        // // Show all rows if only fromDate is empty
        // else if (!fromDate) {
        //     $(this).show();
        // } 
        // // Show all rows if only toDate is empty
        // else if (!toDate) {
        //     $(this).show();
        // } 
        // // Filter rows based on the date range
        // else if (rowDateObj >= from && rowDateObj <= to) {
        //     $(this).show();
        // } 
        // else {
        //     $(this).hide();
        // }
    });
  });

  $('#generate_report').click(function(){
    var dateFrom = $('#dateFrom').val();
    var dateTo = $('#dateTo').val();
    $.ajax({
      url: "../assets/db/generate_report.php",
      type: "POST",
      data: {
        dateFrom: dateFrom,
        dateTo: dateTo
      },
      dataType: "json",
      success: function (data) {
        console.log(data);
        // window.open(data.pdf_url, '_blank');
        // window.open('gen_report_format.php?data=' + data, '_blank');
      },
    });
    // var filteredData = [];
    // $('#report_table').empty();

    // $('#orderTable tr:visible').each(function() {
    //     var checkoutId = $(this).find('td:eq(1)').text();
    //     var itemCount = $(this).find('td:eq(2)').text();
    //     var totalPrice = $(this).find('td:eq(3)').text();
    //     var date = $(this).find('td:eq(4)').text();
        
    //     filteredData.push({
    //         checkout_id: checkoutId,
    //         item_count: itemCount,
    //         total_price: totalPrice,
    //         date: date
    //     });
    // });

    // $('#report_table').empty();
    // $.each(filteredData, function(index, row) {
    //   var tr = "<tr>";
    //   tr += "<td>" + row.checkout_id + "</td>";
    //   tr += "<td>" + row.item_count + "</td>";
    //   tr += "<td>" + row.total_price + "</td>";
    //   tr += "<td>" + row.date + "</td>";
    //   tr += "</tr>";
    //   $('#report_table').append(tr);
    // });
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
