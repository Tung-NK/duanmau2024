<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>XShop - Shopping Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="view/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="view/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="view/css/style.css" rel="stylesheet">
</head>

<body>

<!-- Spinner Start -->
<div id="spinner"
     class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                                                                                                 class="text-white">123
                        Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.php" class="navbar-brand">
                <h1 class="text-primary display-6">X-Shop</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="shop.html" class="nav-item nav-link">About</a>
                    <a href="shop-detail.html" class="nav-item nav-link">Contact</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <?php
                            $dsdm_main = loadall_danhmuc_main();
                            foreach ($dsdm_main as $dm_header) {
                                extract($dm_header);
                                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                echo '<a href="' . $linkdm . '" class="dropdown-item">' . $name . '</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Feedback</a>
                    <a href="contact.html" class="nav-item nav-link">FAQ</a>

                </div>

                <?php
                if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                    extract($_SESSION['user']);
                    ?>


                    <div class="d-flex m-3 me-0">
                        <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                                data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                    class="fas fa-search text-primary"></i></button>
                        <a href="index.php?act=viewcart" class="position-relative me-4 my-auto">
                            <?php
                            if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                                $soLuongSanPham = count($_SESSION['mycart']);

                                ?>
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                      style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo $soLuongSanPham; ?></span>
                            <?php } else { ?>
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                      style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                            <?php } ?>

                        </a>
                        <a href="index.php?act=view_tk" class="my-auto">
                            <i class="fas fa-user fa-2x"></i>
                        </a>
                    </div>


                    <?php
                } else {
                ?>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                            data-bs-toggle="modal" data-bs-target="#searchModal"><i
                                class="fas fa-search text-primary"></i></button>
                    <a href="index.php?act=viewcart" class="position-relative me-4 my-auto">
                        <?php
                        if (isset($_SESSION['mycart']) && !empty($_SESSION['mycart'])) {
                            $soLuongSanPham = count($_SESSION['mycart']);

                            ?>
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                  style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo $soLuongSanPham; ?></span>
                        <?php } else { ?>
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                  style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                        <?php } ?>

                    </a>
                    <a href="index.php?act=dangki" class="my-auto">
                        <a href="index.php?act=dangnhap" class="nav-item nav-link">Login</a>
                    </a>
                </div>

            </div>
            <?php } ?>
        </nav>
    </div>
</div>
<!-- Navbar End -->



