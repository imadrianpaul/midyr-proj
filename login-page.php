<?php
    include("actions/database-connect.php");
    include("actions/functions.php");

    session_start();

    $message = "";

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="css/images/logo/logo-favicon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Skywrath | Login You Account</title>
</head>
<body class="registration">
    <div class="main-container landing-page">
        <div class="default-navbar">
            <div class="row">
                <div class="col-4 md-4">
                    <a class="navbar-brand" href="#">
                        <img src="css/images/logo/logo.png" alt="logo" width="48" height="48">
                    </a>
                </div>
                <div class="col-4 md-4">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login-page.php">Store Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="faq-page.php">FAQs</a>
                        </li>
                    </ul>
                </div>
                <div class="col-4 md-4">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="login-page.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login-page.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#bf4c41" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid registration-form" id="container">
            <div class="registration-box login">
                <form id="loginForm">
                    <div class="row">
                        <div class="col">
                            <h2>Login!</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="input-data-form" type="email" name="user_account" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input class="input-data-form" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" role="button" class="btn btn-danger btn-login">Sign In</button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <p>Don't have an account? <span><a href="signup-page.php">Sign Up Here!</a></span></p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col">
                            <div id="signinMessage" class="alert alert-warning alert-msg" role="alert"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){

            let container = document.getElementById('container')

            toggle = () => {
                container.classList.toggle('login')
            }

            setTimeout(() => {
                container.classList.add('login')
            }, 200)

            // Login Form
            $('#loginForm').submit(function(){

                var form_data = $('#loginForm').serialize();

                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    data: form_data,
                    url: 'actions/login-function.php',
                    success: function(response) {

                        if (response.status == 'error') {
                            $('#signinMessage').html(response.message);
                        }

                        if (response.status == 'admin') {
                            $('#signinMessage').html(response.message);

                            $('#loginForm .input-data-form').attr('disabled', true)
                            $('#loginForm .btn-login').attr('disabled', true)

                            setTimeout(function(){
                                window.location.href = "/skywrath/admin-index-page.php";
                            }, 2000);
                        }

                        if (response.status == 'user') {
                            $('#signinMessage').html(response.message);

                            $('#loginForm .input-data-form').attr('disabled', true)
                            $('#loginForm .login-btn').attr('disabled', true)

                            setTimeout(function(){
                                window.location.href = "/skywrath/user-index-page.php";
                            }, 2000);
                        }
                    }
                });
                return false;
            });
        });
    </script>
</body>
</html>