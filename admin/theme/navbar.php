<style>
    .nav-link {
        position: relative;
        text-decoration: none;
    }

    .nav-item {
        margin-right: 10px; /* Anda bisa sesuaikan jarak sesuai keinginan Anda */
    }

    .c::after {
        content: "";
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: 0;
        left: 0;
        background-color: #ffffff; /* Change this to your desired color */
        transform: scaleX(0);
        transition: transform 0.3s ease;
    }

    .c:hover::after {
        transform: scaleX(1);
    }

    button.btn2:focus {
        outline: none;
        box-shadow: none;
    }

    .navbar-toggler {
        border: none;
    }
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="home"><b>SIA</b></a>
        <button class="navbar-toggler btn2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon btn-sm"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"><?php include 'theme/name_page-crud.php'?></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link c" aria-current="page" href="home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link c" aria-current="page" href="account-user">Account User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link c" aria-current="page" href="account-admin">Account Admin</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="signout"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>