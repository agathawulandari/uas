<?php 
    session_start();
    if (isset($_SESSION["username"])){ 
    // $_SESSION["username"] = true;
    include("../koneksi.php");

    $username = $_SESSION["username"];
    $query = "SELECT * FROM pengguna WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Carousel Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="../carousel/carousel.css" rel="stylesheet">
    <link href="../pricing/pricing.css" rel="stylesheet">
    <link href="../checkout/checkout.css" rel="stylesheet">
</head>


    <body>
    <header data-bs-theme="dark">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="?page=home">Badminton</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=akun">Data Pemesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=akun">Data Barang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=data-pengguna">Data Pengguna</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=akun">Akun</a>
                            </li>
                        </ul>
                    </div>
                    <a href="?page=logout" class="btn btn-danger">Keluar</a>
                </div>
            </nav>
        </header>

        <main role="main">
                <div class="">
                        <?php 
                            $page = isset($_GET['page']) ? $_GET['page'] : 'default';

                            $pages = [
                                'akun' => 'akun.php',
                                'data-pengguna' => 'data-pengguna/data-pengguna.php',
                                'tambah-pengguna' => 'data-pengguna/tambah-pengguna.php',
                                'perbarui-pengguna' => 'data-pengguna/perbarui-pengguna.php',
                                'hapus-pengguna' => 'data-pengguna/hapus-pengguna.php',
                                'logout' => '../umum/logout.php',
                                'default' => 'home.php',
                            ];

                            include(isset($pages[$page]) ? $pages[$page] : $pages['default']);
                        ?>
                </div>
            </main>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <!-- FOOTER -->
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2023 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer>
    </body>
</html>
<?php } else {
    header('location:../umum/index.php?page=home');
    exit();
    }  
?>