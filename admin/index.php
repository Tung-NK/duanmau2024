<?php
ob_start();
include '../model/pdo.php';
include 'header.php';
include '../model/danhmuc.php';
include '../model/sanpham.php';
include '../global.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/listdm.php';
            break;

        case 'adddm':
            $thongbao = "";
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $tenloai = trim($_POST['tenloai']);
                    if (empty($_POST['tenloai'])) {
                        $thongbao = "<span style='color:red;'>Error: Vui lòng nhập dữ liệu</span>";
                    } else {
                        insert_danhmuc($tenloai);
                        $thongbao = "Thêm thành công";
                        header('Location: index.php?act=listdm');
                    }
                }
            }
            include 'danhmuc/adddm.php';
            break;



        case 'listsp':
            if (isset($_POST['listOK']) && ($_POST['listOK'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc($iddm);
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include 'sanpham/listsp.php';
            break;

        case 'addsp':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];
                if (empty($_POST['iddm']) || empty($_POST['tensp']) || empty($_POST['giasp']) || empty($_POST['mota']) || empty($_FILES['hinh']['name'])) {
                    $errors[] = "<span style='color:red;'>Error: Vui lòng nhập đầy đủ thông tin</span>";
                } else {
                    $iddm = trim($_POST['iddm']);
                    $tensp = trim($_POST['tensp']);
                    $giasp = trim($_POST['giasp']);
                    $mota = trim($_POST['mota']);
                    $hinh = trim($_FILES['hinh']['name']);
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                    if ($giasp <= 0) {
                        $errors[] = "Giá sản phẩm phải lớn hơn 0.";
                    }
                    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                        // File uploaded successfully
                    } else {
                        $errors[] = "Có lỗi khi tải lên tệp của bạn.";
                    }
                }

                if (empty($errors)) {
                    insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                    $thongbao = "Thêm thành công";
                    header('location: index.php?act=listsp');
                    exit();
                }
            }

            $listdanhmuc = loadall_danhmuc();
            include 'sanpham/add.php';
            break;

        default:
            include 'home.php';
            break;
    }
} else {
    include 'home.php';
}


include 'footer.php';
ob_end_flush();
