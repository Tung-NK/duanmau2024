<?php
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'view/header.php';
include 'global.php';

//$listdm = loadall_danhmuc_dm();
$spnew = loadall_sanpham_home();
$dsdm_main = loadall_danhmuc_main();
$newPro = load_sanpham_new();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp']) > 0) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $listdm = loadall_danhmuc_dm();
                $recom = load_sanpham_recommend();
                include 'view/sanphamct.php';
            } else {
                include 'view/home.php';
            }
            break;

        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            }else{
                $kyw = "";
            }
            $dssp=loadall_sanpham("", $_GET['iddm']);
            $listdm = loadall_danhmuc_dm();
            $tendm = load_ten_dm($_GET['iddm']);

            if (isset($_GET['iddm']) && ($_GET['iddm']) > 0) {
//              $iddm=$_GET['iddm'];
                $dssp=loadall_sanpham("", $_GET['iddm']);
                $listdm = loadall_danhmuc_dm();
                $tendm = load_ten_dm($_GET['iddm']);
            } else {
                $_GET['iddm']=0;
            }
            include 'view/sanpham.php';
            break;

        case 'gioithieu';
            include 'view/gioithieu.php';
            break;

        default:
            include 'view/home.php';
            break;
    }
} else {
    include 'view/home.php';
}

include 'view/footer.php';
