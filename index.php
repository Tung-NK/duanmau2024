<?php
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'view/header.php';
include 'global.php';

$listdanhmuc = loadall_danhmuc();
$spnew = loadall_sanpham_home();
$dsdm_main = loadall_danhmuc_main();

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if(isset($_GET['idsp'])&& ($_GET['idsp'])>0){
                $onesp = loadone_sanpham($_GET['idsp']);
                include 'view/sanphamct.php';
            }else{
                include 'view/home.php';
            }
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
