<?php
ob_start();
session_start();
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'model/taikhoan.php';
include 'model/binhluan.php';
include 'view/header.php';
include 'global.php';

//$listdm = loadall_danhmuc_dm();
$spnew = loadall_sanpham_home();
$dsdm_main = loadall_danhmuc_main();
$newPro = load_sanpham_new();

//$idpro = $_REQUEST['idpro'];

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {


        //Tài khoản
        case 'view_tk':
            include 'view/taikhoan/view_tk.php';
            break;


        case 'dangki':
            if (isset($_POST['dangki'])) {
                $errors = array();

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = trim($_POST['email']);
                    $user = trim($_POST['user']);
                    $pass = trim($_POST['pass']);

                    if (empty($email)) {
                        $errors['email'] = "Vui lòng nhập Email.";
                    }

                    if (empty($user)) {
                        $errors['user'] = "Vui lòng nhập User Name.";
                    }

                    if (empty($pass)) {
                        $errors['pass'] = "Vui lòng nhập Password.";
                    }

                    if (!empty($email) && !preg_match('/^\S+@\S+\.\S+$/', $email)) {
                        $errors['email'] = "Email không hợp lệ.";
                    }

                    if (!empty($pass) && (strlen($pass) < 3 || !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $pass))) {
                        $errors['pass'] = "Mật khẩu cần ít nhất 3 ký tự hoặc số.";
                    }

                    if (empty($errors)) {
                        insert_taikhoan($email, $user, $pass);
                        $thongbao = "Đã đăng ký thành công.";
                    }
                }
            }

            include 'view/taikhoan/dangki.php';
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                if (!empty($email) && !preg_match('/^\S+@\S+\.\S+$/', $email)) {
                    $thongbao = "<span style='color:red;'>Vui đúng định dạng</span>";
                }

                if (empty($email) || empty($pass)) {
                    $thongbao = "<span style='color:red;'>Vui lòng nhập dữ liệu</span>";
                } else {
                    $check_user = check_user($email, $pass);

                    if (is_array($check_user)) {
                        $_SESSION['user'] = $check_user;
                        $thongbao = "Bạn đã đăng nhập thành công.";
                        header('location: index.php');
                    } else {
                        $tbchung = "<span style='color:red;'>Email hoặc mật khẩu không chính xác</span>";
                    }
                }
            }
            include 'view/taikhoan/dangnhap.php';
            break;

        case 'thoat':
            session_unset();
            header('location: index.php');
            break;


        case 'edit_tk':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $phone = $_POST['phone'];
                $id = $_POST['id'];
                $email = $_POST['email'];

                $errors = array();
                if (empty($user)) {
                    $errors['user'] = "Vui lòng điền đầy đủ tên";
                }

                if (empty($email)) {
                    $errors['email'] = "Vui lòng điền đầy đủ Email";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Email không hợp lệ";
                }

                if (empty($pass)) {
                    $errors['pass'] = "Vui lòng điền đầy đủ Password";
                }

                if (empty($phone)) {
                    $errors['phone'] = "Vui lòng điền đầy đủ Số điện thoại";
                } else if (!preg_match('/^\d+$/', $phone)) {
                    $errors['phone'] = "Số điện thoại chỉ chứa các ký tự số";
                }

                if (empty($errors)) {
                    update_taikhoan($id, $user, $pass, $email, $phone);
                    $_SESSION['user'] = check_user($email, $pass);
                    include 'view/taikhoan/edit_tk.php';
                } else {
                    include 'view/taikhoan/edit_tk.php';
                }
            } else {
                include 'view/taikhoan/edit_tk.php';
            }
            break;

        case 'quenmk':
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $sendMailMess = sendMail($email);
            }
            include 'view/taikhoan/quenmk.php';
            break;


        //Sản phẩm
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp']) > 0) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $listdm = loadall_danhmuc_dm();
                $recom = load_sanpham_recommend();
//                $idpro = $_GET['idsp'];
//                $dsbl = load_binhluan($idpro);
                include 'view/sanphamct.php';
            } else {
                include 'view/home.php';
            }
            break;

        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw']) != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            $dssp = loadall_sanpham("", $_GET['iddm']);
            $listdm = loadall_danhmuc_dm();
            $tendm = load_ten_dm($_GET['iddm']);

            if (isset($_GET['iddm']) && ($_GET['iddm']) > 0) {
//              $iddm=$_GET['iddm'];
                $dssp = loadall_sanpham("", $_GET['iddm']);
                $listdm = loadall_danhmuc_dm();
                $tendm = load_ten_dm($_GET['iddm']);
            } else {
                $_GET['iddm'] = 0;
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
ob_end_flush();