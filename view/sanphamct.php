<style>
    .row {
        width: 100%;
        margin: 0 auto;
    }

    .boxfooter {
        width: 100%;
        display: flex;
        background-color: #f9f9f9;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .boxfooter form {
        width: 100%;
        display: flex;
        justify-content: center;
    }


    .boxfooter input[type="text"],
    .boxfooter input[type="submit"] {
        padding: 10px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: calc(100% - 22px);
    }

    .boxfooter input[type="submit"] {
        flex: 10;
        background-color: #303030;
        color: white;
        cursor: pointer;
    }

    .boxfooter input[type="submit"]:hover {
        background-color: #81C408;
        color: #45595B;
    }

    .boxcontent2 {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
    }

    .binhluan table td {
        flex: 10;
        padding: 8px;
        justify-content: center;
        align-items: center;
    }
</style>

<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <?php
                        extract($onesp);
                        $image=$img_path.$image;
                        echo '<div class="col-lg-6">
                        <div class="rounded">
                            <a href="#">
                                <img src="'.$image.'" class="img-fluid rounded" alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">'.$name.'</h4>
                        <p class="mb-3"> Category: '.$namedm.' </p>
                        <h5 class="fw-bold mb-3">'.$price.'VND</h5>
                        <p class="mb-4">'.$mota.'</p>
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
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                        id="nav-about-tab" data - bs - toggle="tab" data - bs - target="#nav-about"
                                        aria - controls="nav-about" aria - selected="true"> Description
                                </button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data - bs - toggle="tab" data - bs - target="#nav-mission"
                                        aria - controls="nav-mission" aria - selected="false"> Reviews
                                </button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria -
                                 labelledby="nav-about-tab">
                                <p> The generated Lorem Ipsum is therefore always free from repetition injected humour,
                                    or non - characteristic words etc .
                                    Susp endisse ultricies nisi vel quam suscipit </p>
                                <p> Sabertooth peacock flounder; chain pickerel hatchetfish, pencilfish snailfish
                                    filefish Antarctic
                                    icefish goldeye aholehole trumpetfish pilot fish airbreathing catfish, electric ray
                                    sweeper .</p>
                                <div class="px-2">
                                    <div class="row g-4">
                                        <div class="col-6">
                                            <div class="row bg-light align-items-center text-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0"> Weight</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"> 1 kg </p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0"> Country of Origin </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"> Agro Farm </p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0"> Quality</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"> Organic</p>
                                                </div>
                                            </div>
                                            <div class="row text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0"> Сheck</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"> Healthy</p>
                                                </div>
                                            </div>
                                            <div class="row bg-light text-center align-items-center justify-content-center py-2">
                                                <div class="col-6">
                                                    <p class="mb-0"> Min Weight </p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-0"> 250 Kg </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria - labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                         style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;"> April 12, 2024 </p>
                                        <div class="d-flex justify-content-between">
                                            <h5> Jason Smith </h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p> The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non - characteristic
                                            words etc . Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                         style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;"> April 12, 2024 </p>
                                        <div class="d-flex justify-content-between">
                                            <h5> Sam Peters </h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark"> The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non - characteristic
                                            words etc . Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark"> Tempor erat elitr rebum at clita . Diam dolor diam ipsum et tempor
                                    sit . Aliqu diam
                                    amet diam et eos labore . 3 </p>
                                <p class="mb-0"> Diam dolor diam ipsum et tempor sit . Aliqu diam amet diam et eos
                                    labore .
                                    Clita erat ipsum et lorem et sit </p>
                            </div>
                        </div>
                    </div>



                        <h4 class="mb-5 fw-bold"> Leave a Reply </h4>
                        <div class="row g-4">
                            <div class="tab-content thumb-content">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $("#binhluan").load("view/binhluan/binhluanform.php", {
                                            idpro: <?= $id ?>
                                        });

                                    });
                                </script>

                                <div class="row" id="binhluan">

                                    <div class="boxfooter box_search formtaikhoan">
                                        <form action="index.php?act=sanphamct" method="post">
                                            <input type="hidden" name="idpro" value="<?= $id ?>">
                                            <input type="text" name="noidung">
                                            <input type="submit" name="guibinhluan" value="Gửi bình luận">
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
<!--                        <div class="input-group w-100 mx-auto d-flex mb-4">-->
<!--                            <input type="search" class="form-control p-3" placeholder="keywords" aria --->
<!--                                   describedby="search-icon-1">-->
<!--                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>-->
<!--                        </div>-->
                        <div class="mb-4">
                            <h4> Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php
                                    foreach ($listdm as $dmct){
                                        extract($dmct);
                                        $linkdm = "index.php?act=sanpham&iddm=" . $id;
                                        echo '<li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="'.$linkdm.'"><i class="fas fa-apple-alt me-2"></i> '.$category_name.'</a>
                                        <span>'.$product_count.'</span>
                                    </div>
                                </li>';
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="fw-bold mb-0"> Related products </h1>
        <div class="vesitable">
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php
                    foreach ($recom as $sp){
                        extract($sp);
                        $linksp = "index.php?act=sanphamct&idsp=" . $id;
                        $hinh = $img_path . $image;
                        $mota_trimmed = strlen($mota) > 150 ? substr($mota, 0, 150) . '...' : $mota;
                        echo ' <div class="border border-primary rounded position-relative vesitable-item">
                    <a href="'.$linksp.'">
                    <div class="vesitable-img">
                        <img src="'.$hinh.'" class="img-fluid w-100 rounded-top" alt="">
                    </div>
                    <div class="p-4 pb-0 rounded-bottom">
                        <h4> '.$name.'</h4>
                        <p>'.$mota_trimmed.'</p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold"> '.$price.' </p>
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
<!--Single Product End-- >