<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: pages/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DICT Region IX and BASULTA | Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <img src="images/dict-logo.png" alt="DICT" style="width: 100px; height: 100px;">
            </div>
            <h4>Welcome to</h4>
            <h3>Supply Management System</h3> 
            <p>Log in to manage your inventory, withdrawals, property transfer, and stay updated with real-time data. Your role helps keep everything running smoothly on the ground.</p>
            <p>Login to see it in action.</p>
            <form id="login-form" class="m-t" role="form">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                <div id="error-message" class="text-danger"></div>
                <div id="loading-spinner" style="display: none;">
                    <img src="images/loader.gif" alt="Loading..."> Please wait...
                </div>
                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small></small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login as Admin</a>
            </form>
            <p class="m-t"> <small>DICT Region IX and BASULTA &copy; 2025</small> </p>
        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <script>
        $('#login-form').on('submit', function(event) {
            event.preventDefault();
            
            var username = $('#username').val();
            var password = $('#password').val();
            
            if (username == "" || password == "") {
                $('#error-message').text('Username and password cannot be empty');
                return;
            }

            $('#loading-spinner').show();
            
            $.ajax({
                url: 'auth/login-user.php', 
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {
                    setTimeout(function () {
                        $('#loading-spinner').hide();

                        if (response === "success") {
                            window.location.href = 'user/dashboard.php';
                        } else {
                            $('#error-message').text(response);
                        }
                    }, 1000);
                },
                error: function() {
                    setTimeout(function () {
                        $('#loading-spinner').hide();
                        $('#error-message').text('There was an error processing your request. Please try again.');
                    }, 1000);
                }
            });
        });
    </script>
</body>
</html>
