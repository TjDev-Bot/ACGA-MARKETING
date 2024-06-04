<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>


<body>
<div id="loading" class="">
  <div id="loading2" class=""></div>
</div>

    <div class="main">
        <section class="container">
            <div class="login-container">
                <div class="circle circle-one"></div>
                <div class="form-container">
                    <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
                        alt="illustration" class="illustration" />
                    <h1 class="opacity">LOGIN</h1>

                    <!--ichange lang ang action. gi ana lang sa nako pang next page-->
                    <form id="loginForm" methid="POST">
                        <input type="text" name="username" placeholder="USERNAME" required/>
                        <input type="password" name="password" placeholder="PASSWORD" required/>
                        <button type="submit" class="opacity">SUBMIT</button>
                    </form>
                    <!-- <div class="register-forget opacity">
                        <a href="">REGISTER</a>
                        <a href="">FORGOT PASSWORD</a>
                    </div> -->
                </div>
                <div class="circle circle-two"></div>
            </div>
            <div class="theme-btn-container"></div>
        </section>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="assets/js/handler.js"></script>
</html>