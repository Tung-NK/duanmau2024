<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                           aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="index.php?act=viewcart">Cart</a></li>
        <li class="breadcrumb-item active text-white">Checkout</li>
    </ol>
</div>

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Billing details</h1>
        <form action="index.php?act=bill" method="post">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <?php
                    if (isset($_SESSION['user'])) {
                        $name = $_SESSION['user']['user'];
                        $diachi = $_SESSION['user']['diachi'];
                        $email = $_SESSION['user']['email'];
                        $phone = $_SESSION['user']['phone'];
                    } else {
                        $name = "";
                        $diachi = "";
                        $email = "";
                        $phone = "";
                    }
                    ?>
                    <div class="form-item">
                        <label class="form-label my-3">Name<sup>*</sup></label>
                        <input name="user" value="<?= $name ?>" type="text" class="form-control">
                        <?php if (isset($errors['name'])) { ?>
                            <span class="error"><?php echo $errors['name']; ?></span>
                        <?php } ?>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Address <sup>*</sup></label>
                        <input name="diachi" value="<?= $diachi ?>" type="text" class="form-control"
                               placeholder="House Number Street Name">
                        <?php if (isset($errors['diachi'])) { ?>
                            <span class="error"><?php echo $errors['diachi']; ?></span>
                        <?php } ?>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Mobile<sup>*</sup></label>
                        <input name="phone" value="<?= $phone ?>" type="text" class="form-control">
                        <?php if (isset($errors['phone'])) { ?>
                            <span class="error"><?php echo $errors['phone']; ?></span>
                        <?php } ?>
                    </div>

                    <div class="form-item">
                        <label class="form-label my-3">Email Address<sup>*</sup></label>
                        <input name="email" value="<?= $email ?>" type="text" class="form-control">
                        <?php if (isset($errors['email'])) { ?>
                            <span class="error"><?php echo $errors['email']; ?></span>
                        <?php } ?>
                    </div>

                    <?php

                    if (!isset($_SESSION['user'])) {
                        echo '<a href="index.php?act=dangki"">
                    <div class=" my-3">
                         <label class="form-check-label" for="Account-1">Create an account?</label>
                    </div>
                    </a>';
                    } else {
                        echo '<a href="index.php?act=dangki"">
                    <div class=" my-3">
                         <label class="form-check-label" for="Account-1"></label>
                    </div>
                    </a>';
                    }
                    ?>
                    <hr>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-5">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Products</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>


                            <?php
                            $tong = 0;
                            foreach ($_SESSION['mycart'] as $cart) {
                                $id = $cart[0];
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                $hinh = $cart[1];
                                $price_number = number_format($cart[3], 0, '.', '.');
                                $ttien = $cart[3] * $cart[4];
                                $tong += $ttien;
                                extract($cart);
                                echo '<tbody>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center mt-2">
                                        <img src="' . $hinh . '" class="img-fluid rounded-circle"
                                             style="width: 90px; height: 90px;" alt="">
                                    </div>
                                </th>
                                <td class="py-5">' . $cart[2] . '</td>
                                <td class="py-5">' . $price_number . '</td>
                                <td class="py-5">' . $cart[4] . '</td>
                                <td class="py-5">' . number_format($ttien, 0, ',', '.') . '</td>
                            </tr>
                            
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark text-uppercase py-3">TOTAL</p>
                                </td>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark">' . number_format($tong, 0, ',', '.') . '</p>
                                    </div>
                                </td>
                            </tr>
                            </tbody>';
                            }
                            ?>

                        </table>
                    </div>

                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input value="1" name="pttt" type="radio" class="form-check-input bg-primary border-0" >
                                <label class="form-check-label" for="Payments-1">Check Payments</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <div class="col-12">
                            <div class="form-check text-start my-3">
                                <input value="2" name="pttt" type="radio" class="form-check-input bg-primary border-0" >
                                <label class="form-check-label" for="Delivery-1">Cash On Delivery</label>
                            </div>
                        </div>

                    </div>
                    <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
                        <?php if (isset($errors['pttt'])) { ?>
                            <span class="error"><?php echo $errors['pttt']; ?></span>
                        <?php } ?>
                    </div>


                    <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<a href="index.php?act=thanhtoan"></a>
                                    <input class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" type="submit" name="bill" value="Place Order">';
                        } else {
                            echo '<a style=" margin-top: 30px; margin-bottom: 0px;" href="index.php?act=dangnhap"><p style="display: inline; text-align: center;">Bạn cần đăng nhập để thanh toán.</p></a>';
                        }
                        ?>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->