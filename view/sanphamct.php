<div class="container-fluid py-5 mt-5">
    <div class="container py-5 mt-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <?php
                    extract($onesp);
                    $image = $img_path . $image;
                    echo '<div class="col-lg-6">
                                            <div class="rounded">
                                                <a href="#">
                                                    <img src="' . $image . '" class="img-fluid rounded" alt="Image">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="fw-bold mb-3">' . $name . '</h4>
                                            <p class="mb-3"> Category: ' . $namedm . ' </p>
                                            <h5 class="fw-bold mb-3">' . $price . 'VND</h5>
                                            <p class="mb-4">' . $mota . '</p>
                                            <div class="input-group quantity mb-5" style="width: 100px;">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </div>
                                                <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <a href="#" class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart </a>
                                        </div>';
                    ?>

                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Reviews
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <div class="d-flex">
                                    <img src="view/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                         style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="view/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                         style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                              placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <div class="mb-4">
                            <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php
                                foreach ($listdm as $dmct) {
                                    extract($dmct);
                                    $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                    echo '<li>
                                                                    <div class="d-flex justify-content-between fruite-name">
                                                                        <a href="' . $linkdm . '"><i class="fas fa-apple-alt me-2"></i> ' . $category_name . '</a>
                                                                        <span>' . $product_count . '</span>
                                                                    </div>
                                                                </li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="position-relative">
                            <img src="view/img/banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0">Related products</h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php
                foreach ($recom as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $hinh = $img_path . $image;
                    $mota_trimmed = strlen($mota) > 150 ? substr($mota, 0, 150) . '...' : $mota;
                    echo ' <div class="border border-primary rounded position-relative vesitable-item">
                                    <a href="' . $linksp . '">
                                    <div class="vesitable-img">
                                        <img src="' . $hinh . '" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="p-4 pb-0 rounded-bottom">
                                        <h4> ' . $name . '</h4>
                                        <p>' . $mota_trimmed . '</p>
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold"> ' . $price . ' </p>
                                            <a href="#" class="btn border border-secondary rounded-pill px-3 py-1 mb-4 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart </a>
                                        </div>
                                    </div>
                                    </a>
                                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>








