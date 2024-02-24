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
    <h1 class="text-center text-white display-6">Cart</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active text-white">Cart</li>
    </ol>
</div>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Products</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <?php
                $tong = 0;
                // $img_path = "upload/";
                foreach ($_SESSION['mycart'] as $cart) {
                    $id = $cart[0];
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $hinh = $img_path. $cart[1];
                    $price_number = number_format($cart[3], 0, '.', '.');
                    $ttien = $cart[3] * $cart[4];
                    $tong += $ttien;
                    $xoasp = "index.php?act=delcart&idcart=" . $id;

                    echo '<tbody>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <a href="' . $linksp . '"><img src="' . $hinh . '" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="Hình ảnh sản phẩm"></a>
                                </div>
                            </th>
                            <td>
                                <a href="' . $linksp . '"><p class="mb-0 mt-4">' . $cart[2] . '</p></a>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">' . $price_number . '</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">' . $cart[4] . '</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4">' . number_format($ttien, 0, ',', '.') . '</p>
                            </td>
                            <td>
                                <button class="btn btn-md rounded-circle bg-light border mt-4">
                                   <a href="' . $xoasp . '"><i class="fa fa-times text-danger"></i></a>
                                </button>
                            </td>
                        </tr>
                    </tbody>';
                }
                $tong = number_format($tong, 0, ',', '.');
                ?>

            </table>
        </div>

        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <?php
                        echo '<div class="d-flex justify-content-between mb-4">
                                    <h5 class="mb-0 me-4">Subtotal:</h5>
                                    <p class="mb-0">' . $tong . ' VND</p>
                               </div>
                               
                               <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                    <h5 class="mb-0 me-4">Total</h5>
                                    <p class="mb-0">' . $tong . ' VND</p>
                                </div>';
                        ?>
                    </div>
                    <a href="index.php?act=thanhtoan">
                        <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
                                type="button">Proceed Checkout
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->