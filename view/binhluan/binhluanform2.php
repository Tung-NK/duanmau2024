<?php
session_start();
include '../../model/pdo.php';
include '../../model/binhluan.php';

$idpro = $_REQUEST['idpro'];
$dsbl = load_binhluan($idpro);
?>

<?php
$navTabPrinted = false; // Biến để theo dõi xem phần mã HTML đã được in hay chưa

foreach ($dsbl as $bl) {
    extract($bl);
    // In phần mã HTML chỉ một lần
    if (!$navTabPrinted) {
        echo '<div class="col-lg-12">
        <nav>
            <div class="nav nav-tabs mb-3">
                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                        aria-controls="nav-mission" aria-selected="false">Reviews
                </button>
            </div>
        </nav>';
        $navTabPrinted = true;
    }

    echo '<div class="tab-content mb-5">
        <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
            <div class="d-flex">
                <img src="view/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                     style="width: 100px; height: 100px;" alt="">
                <div class="">
                    <p class="mb-2" style="font-size: 14px;">' . date("d-m-Y", strtotime($ngaybinhluan)) . '</p>
                    <div class="d-flex justify-content-between">
                        <h5>' . $user . '</h5>
                    </div>
                    <p>' . $noidung . '</p>
                </div>
            </div>
        </div>
    </div>';
}

echo '</div>'; // Đóng thẻ div bên ngoài vòng lặp
?>


<?php
if (isset($_SESSION['user'])) {
    echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
    <h4 class="mb-5 fw-bold">Leave a Reply</h4>
    <div class="row g-4">
        <input type="hidden" name="idpro" value="' . $idpro . '">
        <div class="col-lg-12">
            <div class="border-bottom rounded my-4">
                <textarea name="noidung" id="" class="form-control border-0"
                          cols="30" rows="8"
                          placeholder="Your Review *"></textarea>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="d-flex justify-content-between py-3 mb-5">
                <input type="submit" name="guibinhluan"
                       class="btn border border-secondary text-primary rounded-pill px-4 py-3" value="Post Comment">
            </div>
        </div>
    </div>
</form>';


    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
//     $ngaybinhluan = date("d-m-Y", strtotime($ngaybinhluan));
        insert_binhluan($noidung, $iduser, $idpro, date("Y-m-d H:i:s"));
        header("location: " . $_SERVER['HTTP_REFERER']);
    }


} else {
    echo '<a class="text-center my-5" href="index.php?act=dangnhap">Login to be able to rate the product</a>';
}
?>







