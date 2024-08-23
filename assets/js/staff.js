$(function () {
  $("#add_staff").submit(function (e) {
    e.preventDefault();
    var form = new FormData(this);

    $.ajax({
      url: "../assets/db/add_staff.php",
      type: "POST",
      data: form,
      dataType: "json",
      contentType: false,
      processData: false,
      beforeSend: function () {
        $("#loader").attr("hidden", false);
      },
      success: function (data) {
        $("#loader").attr("hidden", true);
        if (data.status == "success") {
          $("#add_staff")[0].reset();
          swal("Success", data.message, "success");
        } else {
          swal("Error", data.message, "error");
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });

  $(".deleteStaff").click(function () {
    var staff_id = $(this).data("staff-uid");
    swal({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((del) => {
      if (del) {
        swal("Deleted", "Staff successfully deleted", "success");
      }
    });
  });

  $(".editStaff").click(function () {
    $.ajax({
      url: "../assets/db/get_staff.php",
      type: "GET",
      dataType: "json",
      data: {
        staff_id: $(this).data("staff-id"),
      },
      success: function (response) {
        // console.log(response);
        $("#staffUid").val(response.id);
        $("#staffId").val(response.staff_id);
        $("#staffName").val(
          response.name
            .split(" ")
            .map(
              (word) =>
                word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()
            )
            .join(" ")
        );
        $("#staffUname").val(response.username);
        $("#staffType").val(response.branch_id);
        $("#staffStatus").val(response.status);
      },
    });
  });

  $("#editStaffForm").submit(function (e) {
    e.preventDefault();

    var form = new FormData(this);

    $.ajax({
      url: "../assets/db/update_staff.php",
      type: "POST",
      data: form,
      contentType: false,
      processData: false,
      success: function (data) {
        window.location.reload();
        // $("editStaff").modal("hide");
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      },
    });
  });
});
