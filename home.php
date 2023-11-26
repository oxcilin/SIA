<?php session_start();
include "db_conn.php"; 
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or any other appropriate page if the user is not logged in
    header("Location: .");
    exit();
}?>

<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:site_name" content`="<?php include 'admin/theme/name_page.php'?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://booth.oxa.biz.id/ban.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="800" />
    <meta property="twitter:card" content="summary_large_image" />

    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="logo/logo.png" type="image/x-icon" />

    <!--=============== REMIX ICONS ===============-->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      rel="stylesheet"
    />

    <!--=============== CSS ===============-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />

    <!--=============== TITLE ===============-->
    <title><?php include 'admin/theme/name_page.php'?></title>

    <!--=============== FONT ===============-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Chivo:wght@300&display=swap"
      rel="stylesheet"
    />

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <style>
        body {
            font-family: "Chivo";
            user-select: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .nav-link {
            position: relative;
            text-decoration: none;
        }

        .nav-item {
            margin-right: 10px; /* Anda bisa sesuaikan jarak sesuai keinginan Anda */
        }

        button.btn2:focus {
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler {
            border: none;
        }

        .big-btn {
            font-size: 40px; /* Adjust the font size as needed */
            padding: 60px 80px; /* Adjust padding to increase button size */
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust the height as needed */
            overflow: hidden; /* Prevent content from causing scrolling */
        }

        .alert {
            /* Add styles for your alert if needed */
            margin-bottom: 20px; /* Adjust spacing between the alert and button */
        }

        .table-width {
            width: 100%;
            max-width: 100px; /* Set a maximum width as needed */
        }

        .login-form {
            width: 400px;
        }

        .login-form .btn {
            width: 100%;
        }

        /* Media query for screens larger than 768px (laptop screens) */
        @media (min-width: 768px) {
            .login-form {
                width: 500px; /* Adjust the width as per your requirement */
            }

            .login-form .btn {
                width: 100%; /* Set the button width to 100% within the larger screens */
            }
        }
    </style>
    <body>
        <nav class="navbar sticky-top bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="home"><b>SIA</b></a>
                <button class="navbar-toggler btn2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon btn-sm"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Raise Hand</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="signout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class="alert alert-dark login-form" role="alert">
                <div class="col-sm-10 col-sm-offset-1">
                    <table width="100%" cellpadding="5" cellspacing="5">
                        <tbody>
                            <tr>
                                <td width="30%" align="left"> Name &nbsp; </td>
                                <td width="2%"> : </td>
                                <td> <b style="text-transform: uppercase;"><?php echo $_SESSION['name']; ?></b> </td>
                            </tr>
                            <tr>
                                <td align="left"> User ID &nbsp; </td>
                                <td> : </td>
                                <td> <b><?php echo $_SESSION['login_id']; ?></b> </td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>

            <div class="raise">
                <form action="_raise" method="POST" class="row g-3 needs-validation login-form" novalidate autocomplete="off">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['login_id']; ?>">
                    <input type="hidden" name="name_user" value="<?php echo $_SESSION['name']; ?>">

                    <button type="submit" class="btn btn-outline-light btn-lg big-btn"><i class="fas fa-fist-raised"></i></button>
                </form>
            </div>

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
        </div>
    </body>
  </head>
</html>
