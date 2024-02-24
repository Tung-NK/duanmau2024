<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Shop</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active text-white">Shop</li>
    </ol>
</div>

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4"><?= $tendm ?></h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                        <form action="index.php?act=sanpham" method="post">
                            <div class="input-group w-100 mb-4 mx-auto d-flex">

                                <input name="kyw" type="text" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                <button name="timkiem" type="submit" id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></button>

                            </div>
                        </form>
                    </div>
                    <div class="col-6"></div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <?php
                                        foreach ($listdm as $dm) {
                                            extract($dm);
                                            $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                            echo '<li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="' . $linkdm . '"><i class="fas fa-apple-alt me-2"></i>' . $category_name . '</a>
                                                <span>' . $product_count . '</span>
                                            </div>
                                        </li>';
                                        } ?>

                                    </ul>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <h4 class="mb-3">Featured products</h4>
                                <?php
                                foreach ($sp_rc as $sp) {
                                    extract($sp);
                                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                    $hinh = $img_path . $image;
                                    $mota_trimmed = strlen($mota) > 150 ? substr($mota, 0, 150) . '...' : $mota;
                                    echo '<div class="d-flex align-items-center justify-content-start">
                                    <div class="rounded me-4" style="width: 100px; height: 100px;">
                                        <img src="'.$hinh.'" class="img-fluid rounded" alt="">
                                    </div>
                                    <div>
                                        <h6 class="mb-2">'.$name.'</h6>
                                     
                                        <div class="d-flex mb-2">
                                            <h5 class="fw-bold me-2">'.$price.' VND</h5>
                                        </div>
                                    </div>
                                </div> ';
                                }
                                ?>


                            </div>
                            <div class="col-lg-12">
                                <div class="position-relative">
                                    <img src="view/img/bannersp.jpg" class="img-fluid w-100 rounded" alt="">
                                    <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                        <!-- <h3 class="text-secondary fw-bold"> <br> Fruits <br> Banner</h3> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            <?php
                            foreach ($dssp as $sp) {
                                extract($sp);
                                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                                $hinh = $img_path . $image;

                                $mota_trimmed = strlen($mota) > 50 ? substr($mota, 0, 50) . '...' : $mota; // Cắt chuỗi và thêm dấu "..." nếu vượt quá giới hạn
                                echo '<div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                    <a href="' . $linksp . '">
                                        <div class="fruite-img">
                                            <img src="' . $hinh . '" class="img-fluid w-100 rounded-top"
                                                 alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                             style="top: 10px; left: 10px;">' . $category_name . '
                                        </div>
                                        <div class="p-4 text-center border border-secondary border-top-0 rounded-bottom">
                                            <h4>' . $name . '</h4>
                                            <p>' . $mota_trimmed . '</p>
                                            <div class="d-flex justify-content-center flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-1">' . $price . 'đ</p>
                                                <form action="index.php?act=addtocart" method="post">
                                                            <input type="hidden" name="id" value="' . $id . '">
                                                            <input type="hidden" name="name" value="' . $name . '">
                                                            <input type="hidden" name="image" value="' . $image . '">
                                                            <input type="hidden" name="price" value="' . $sp['price'] . '">
                                                            <input class="border-secondary rounded-pill px-4 py-2 mb-4 text-primary" type="submit" name="addtocart" value="Add to cart">
                                                </form>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>