<?php
session_start();

include("php/db_connection.php");
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
   <!-- All Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignLab">
    <!-- ... Other meta tags ... -->

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page Title Here -->
    <title>MSHS: Login</title>

    <!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/ico" href="images/logo.ico">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="body h-100">
    <div class="authincation d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="login-aside text-center d-flex flex-column flex-row-auto">
            <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
                <div class="text-center mb-lg-4 mb-2 pt-5 logo">
                    <img src="images/logo.png" alt="Logo" width="100" height="100">
                    <svg width="360" height="65" xmlns="http://www.w3.org/2000/svg">
						<text x="0" y="25" font-family="Poppins" font-size="30" fill="white">
						Management &amp; Science<tspan x="0" dy="30">High School</tspan>
						</text>
					</svg>
                </div>
                <h3 class="mb-2 text-white">Welcome Back!</h3>
                <p class="mb-4">MSHS School Management System<br>Powered with Machine Learning for Quality Education</p>
            </div>
            <div class="aside-image position-relative" style="background-image:url(images/background/pic-2.png);">
                <img class="img1 move-1" src="images/logo.png" alt="">
                <img class="img2 move-2" src="images/logo.png" alt="">
                <img class="img3 move-3" src="images/logo.png" alt="">
            </div>
        </div>
        <div class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
            <div class="d-flex justify-content-center h-100 align-items-center">
                <div class="authincation-content style-2">
                    <div class="row no-gutters">
                        <div class="col-xl-12 tab-content">
                            <div id="sign-in" class="auth-form tab-pane fade show active form-validation">
                                <form method="POST" action="php/login.php" id="loginForm">
                                    <div class="text-center mb-4">
                                        <a class="nav-link bell dz-theme-mode" href="javascript:void(0);">
                                            <i id="icon-light-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sun"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg></i>
                                            <i id="icon-dark-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></i>
                                        </a>
                                        <br>
                                        <h3 class="text-center mb-2 text-black">Sign In</h3>
                                    </div>
                                    <div class="mb-3">
                                        <label for="id" class="form-label mb-2 fs-13 label-color font-w500">Matric ID</label>
                                        <input type="number" class="form-control" id="id" name="id" placeholder="Enter your Matric ID">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label mb-2 fs-13 label-color font-w500">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                                    </div>
                                    <a href="page-forgot-password.html" class="text-primary float-end mb-4">Forgot Password ?</a>
                                    <button type="submit" class="btn btn-block btn-primary">Sign In</button>
                                </form>
                                <div class="new-account mt-3 text-center">
                                    <p class="font-w500">Don't have an account? <a class="text-primary" href="register.html" data-toggle="tab">Sign Up</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!--**********************************
		Modal
	***********************************-->

    <!--Invalid Credentials-->
    <div class="modal fade" id="userModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Details</h5>
                </div>
                <div class="modal-body">
                    <p>Invalid Credentials.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>

    <!--Go to register-->
    <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Login Details</h5>
                </div>
                <div class="modal-body">
                    <p>User does not exists. Please register first.</p>
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-primary">Back</a>
                    <a href="register.html" id="goToRegisterButton" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        if (error === 'invalidcredentials') {
            // Display modal for invalid credentials
            new bootstrap.Modal(document.getElementById('userModal')).show();
        } else if (error === 'nouser') {
            // Display modal for no such user
            new bootstrap.Modal(document.getElementById('registerModal')).show();
        }
    });
    </script>

</body>
</html>
