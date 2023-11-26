<?php session_start(); 
  include "../db_conn.php"; 
  if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
      // User is not an admin; redirect them to another page
      $_SESSION['admin_error'] = "You are not allowed to access this page!";
      header("Location: .");
      exit;
  } 
?>

<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:site_name" content`="<?php include 'theme/name_page.php'?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="https://booth.oxa.biz.id/ban.png" />
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="1280" />
    <meta property="og:image:height" content="800" />
    <meta property="twitter:card" content="summary_large_image" />

    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#ffffff" />
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="../logo/logo.png" type="image/x-icon" />

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
    <title><?php include 'theme/name_page.php'?></title>

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

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
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

        button.btn-close:focus {
            outline: none;
            box-shadow: none;
        }
    </style>
    <body>
      <?php include 'theme/navbar.php'?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center style="text-align: right;">
                        <button type="button" class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#addData">
                            <i class="fas fa-plus"></i> Add New Account
                        </button>
                    </center>

                    <!-- Add Data Modal -->
                    <div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="addDataLabel">Record a New Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="_account-admin" method="POST" class="row g-3 needs-validation login-form" novalidate autocomplete="off">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" oninput="this.value = this.value.toUpperCase();" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid name.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email/Username</label>
                                            <input type="text" class="form-control" id="email" name="email" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid email or username.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid password.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <input type="number" class="form-control" id="role" name="role" required>
                                            <div class="invalid-feedback">
                                                Please enter a valid role.
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-primary" name="buttonSave">Add Data</button>
                                </div>
                                <?php include 'theme/script_form.php'?>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                        if (isset($_SESSION['error'])) {
                            echo '
                            <br>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle px-2"></i>' . $_SESSION['error'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['error']); // Clear the error message from the session
                        };
            
                        if (isset($_SESSION['success'])) {
                            echo '
                            <br>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle px-2"></i>' . $_SESSION['success'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                            unset($_SESSION['success']); // Clear the error message from the session
                        } 
                    ?>

                    <?php
                        // Fetch data from the 'admin' table
                        $sql = "SELECT * FROM admin";
                        $result = mysqli_query($conn, $sql);
                        $no = 1; // A variable to keep track of row numbers

                        ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email/Username</th>
                                    <th scope="col-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <th class="col-auto col-sm-1" scope="row">
                                            <?= $no++ ?>
                                        </th>
                                        <td class="col-auto">
                                            <?= $row['id'] ?>
                                        </td>
                                        <td class="col-auto">
                                            <?= $row['role'] ?>
                                        </td>
                                        <td class="col-auto">
                                            <?= $row['name'] ?>
                                        </td>
                                        <td class="col-auto">
                                            <?= $row['email'] ?>
                                        </td>
                                        <td class="col-auto col-sm-2">
                                            <a type="button" class="badge btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#editData<?= $no ?>"><i class="fa-solid fa-pen-nib"></i></a>
                                            <a type="button" class="badge btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#deleteData<?= $no ?>"><i class="fa-solid fa-trash-can"></i></a>
                                        </td>
                                    </tr>

                                    <!-- Edit Data Modal -->
                                    <div class="modal fade" id="editData<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDataLabel<?= $no ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editDataLabel<?= $no ?>">Edit Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="_account-admin" method="POST" class="row g-3 needs-validation edit-form" novalidate autocomplete="off">
                                                        <input type="hidden" name="editId" value="<?= $row['id'] ?>">
                                                        <div class="mb-3">
                                                            <label for="editName<?= $no ?>" class="form-label">Name</label>
                                                            <input type="text" class="form-control" id="editName<?= $no ?>" name="editName" value="<?= $row['name'] ?>" oninput="this.value = this.value.toUpperCase();" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a valid name.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editEmail<?= $no ?>" class="form-label">Email/Username</label>
                                                            <input type="text" class="form-control" id="editEmail<?= $no ?>" name="editEmail" value="<?= $row['email'] ?>" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a valid email or username.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editPassword<?= $no ?>" class="form-label">Password</label>
                                                            <input type="password" class="form-control" id="editPassword<?= $no ?>" value="<?= $row['password'] ?>" name="editPassword">
                                                            <div class="invalid-feedback">
                                                                Please enter a valid password.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="editRole<?= $no ?>" class="form-label">Role</label>
                                                            <input type="number" class="form-control" id="editRole<?= $no ?>" name="editRole" value="<?= $row['role'] ?>" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a valid role.
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="buttonEdit" class="btn btn-outline-primary">Save Changes</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Data Modal -->
                                    <div class="modal fade" id="deleteData<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteDataLabel<?= $no ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="deleteDataLabel<?= $no ?>">Delete Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="_account-admin" method="POST" class="row g-3 needs-validation edit-form" novalidate autocomplete="off">
                                                        <p>Are you sure to delete this data?</p>

                                                        <ul>
                                                            <li>ID: <b><?= $row['id'] ?></b></li>
                                                            <li>Nama: <b><?= $row['name'] ?></b></li>
                                                            <li>Email/Username: <b><?= $row['email'] ?></b></li>
                                                            <li>Role: <b><?= $row['role'] ?></b></li>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <input type="hidden" name="deleteId" value="<?= $row['id'] ?>">
                                                        <button type="submit" name="buttonDelete" class="btn btn-outline-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<td colspan="6">No records found.</td>';
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php

                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
        <?php include 'theme/footer.php'?>
    </body>
  </head>
</html>

<?php } else { header("Location: ."); exit(); } ?>