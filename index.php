<?php
session_start();
?>

<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta property="og:site_name" content`="<?php include 'admin/theme/name_page.php'?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:image" content="https://booth.oxa.biz.id/ban.png"/>
        <meta property="og:image:type" content="image/png"/>
        <meta property="og:image:width" content="1280"/>
        <meta property="og:image:height" content="800"/>
        <meta property="twitter:card" content="summary_large_image"/>

        <meta name="msapplication-TileColor" content="#ffffff"/>
        <meta
        name="theme-color" content="#ffffff"/>
        <!--=============== FAVICON ===============-->
        <link
        rel="shortcut icon" href="logo/logo.png" type="image/x-icon"/>

        <!--=============== REMIX ICONS ===============-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet"/>

        <!--=============== CSS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"/>
        <link
        rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>

        <!--=============== TITLE ===============-->
        <title><?php include 'admin/theme/name_page.php'?></title>

        <!--=============== FONT ===============-->
        <link rel="preconnect" href="https://fonts.googleapis.com"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
        <link href="https://fonts.googleapis.com/css2?family=Chivo:wght@300&display=swap" rel="stylesheet"/>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://sutomo-mdn.sch.id/pengumuman/assets/js/gsdk-bootstrap-wizard.js"></script>
        <script src="https://sutomo-mdn.sch.id/pengumuman/assets/js/jquery.bootstrap.wizard.js"></script>
        <script src="https://sutomo-mdn.sch.id/pengumuman/assets/css/gsdk-bootstrap-wizard.css"></script>


        <style>
            html,
            body {
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: "Chivo";
                user-select: none;
            }

            .login-form {
                width: 400px;
            }

            .login-form .btn {
                width: 100%;
            }

            .form-group input {
                width: 100%;
            }

            /* Media query for screens larger than 768px (laptop screens) */
            @media(min-width: 768px) {
                .login-form {
                    width: 500px; /* Adjust the width as per your requirement */
                }

                .login-form .btn {
                    width: 100%; /* Set the button width to 100% within the larger screens */
                }

                .alert {
                    widht: 500px;
                }
            }

            .logo-container {
                display: flex;
                flex-direction: column; /* Change flex-direction to column */
                align-items: center;
                justify-content: center;
                margin: 0; /* Remove margin for the text-muted class */
            }

            .logo-title {
                filter: drop-shadow(0px 0px 10px rgba(255, 255, 255, 0.5)) brightness(1.1);
            }

            .form-control:focus,
            .form-control:active {
                outline: none;
                box-shadow: none;
            }

            .form-control:focus {
                border-color: #fff;
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            }

            select.form-select:focus,
            select.form-select:active {
                outline: none;
                box-shadow: none;
            }

            select.form-select:focus {
                border-color: #fff;
                box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            }

            input[type="number"]::-webkit-outer-spin-button,
            input[type="number"]::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        </style>
        <body>
            <div class="container">
                <div class="row">
                    <div class="login">
                        <div class="result-container">
                            <div class="col-md-12">
                                <form action="_login" method="POST" class="row g-3 needs-validation login-form" novalidate autocomplete="off">
                                    <div class="logo-container">
                                        <b>
                                            <h1 class="logo-title">SIA</h1>
                                        </b>
                                        <p class="text-muted">USER's PAGE</p>
                                    </div>
                                    <br/>

                                    <?php
                                        if (isset($_SESSION['error'])) {
                                            echo '
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-triangle px-2"></i>' . $_SESSION['error'] . '
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>';
                                            unset($_SESSION['error']); // Clear the error message from the session
                                        } 
                                    ?>

                                    <div class="mb-3">
                                        <label class="form-label">ID</label>
                                        <input type="number" class="form-control" id="user_id" name="user_id" required autofocus/>
                                        <div class="invalid-feedback">
                                            Please enter your valid id.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        
                                        <div class="mb-3">
                                            <button type="submit" class="w-100 btn btn-outline-light">
                                                LOGIN
                                            </button>
                                        </div>
                                        <center style="text-align: right;">
                                            <a href="admin" class="admin-login" style="color: white; font-size: 13px; text-decoration: none;">Admin Login</a>
                                        </center>
                                    </form>
                                    <?php include 'admin/theme/script_form.php'?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'admin/theme/footer.php'?>
        </body>
    </head>
</html>

