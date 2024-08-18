$(function () {
    $('#loginForm').submit(function (e) {
      e.preventDefault();
  
      var form = $("#loginForm").serialize();
      // var form =  new FormData(this);
      $.ajax({
        url: "assets/db/login.php",
        type: "POST",
        data: form,
        beforeSend: function () {
          $('#loading').addClass('loader-container').show();
          $('#loading2').addClass('loader');
        },
        success: function (data) {
          if (data === "success") {
            setTimeout(function() {
              $('#loading').removeClass('loader-container').hide();
              $('#loading2').removeClass('loader');
              window.location.href = "views/dashboard.php";
            }, 2000);
          } else if(data === "disabled") {
            $('#loading').removeClass('loader-container').hide();
            $('#loading2').removeClass('loader');
            swal({
              title: "Account Disabled!",
              text: "Your Account is Disabled, Contact Admin for Support!",
              icon: "warning",
              dangerMode: true,
            });
          } else if(data === "error") {
            $('#loading').removeClass('loader-container').hide();
            $('#loading2').removeClass('loader');
            swal("Failed", "Wrong Username or Password", "error");
          } else {
            $('#loading').removeClass('loader-container').hide();
            $('#loading2').removeClass('loader');
            swal("Failed", "Something is wrong!", "error");
          }
        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText);
          $('#loading').removeClass('loader-container').hide();
          $('#loading2').removeClass('loader');
        },
      });
    });
  });
  