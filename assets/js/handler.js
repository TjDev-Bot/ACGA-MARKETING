$(function () {
    $('#loginForm').on('submit', function (e) {
      e.preventDefault();
  
      var form = $("#loginForm").serialize();
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
          } else {
            alert('Error!');
            $('#loading').removeClass('loader-container').hide();
            $('#loading2').removeClass('loader');
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
  