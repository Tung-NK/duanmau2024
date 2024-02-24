<?php
ob_start();
session_start();
include 'model/pdo.php';
include 'model/sanpham.php';
include 'model/danhmuc.php';
include 'model/taikhoan.php';
include 'model/binhluan.php';
include 'model/cart.php';
include 'view/header.php';
include 'global.php';

//$listdm = loadall_danhmuc_dm();
$spnew = loadall_sanpham_home();
$dsdm_main = loadall_danhmuc_main();
$newPro = load_sanpham_new();

//$idpro = $_REQUEST['idpro'];
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // Thanh toán

        case 'bill':
            if (isset($_POST['bill']) && ($_POST['bill'])) {
                $iduser = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;
                $name = $_POST['user'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $phone = $_POST['phone'];
                $pttt = isset($_POST['pttt']) ? $_POST['pttt'] : '';
                $ngaydathang = date("Y-m-d H:i:s");
                $tongdonhang = tongdonhang();

                $errors = [];

                if (empty($name)) {
                    $errors['name'] = "<span style='color:red;'>Vui lòng nhập tên</span>";
                }

                if (empty($email)) {
                    $errors['email'] = "<span style='color:red;'>Vui lòng nhập email</span>";
                } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
                    $errors['email'] = "<span style='color:red;'>Email không hợp lệ</span>";
                }

                if (empty($diachi)) {
                    $errors['diachi'] = "<span style='color:red;'>Vui lòng nhập địa chỉ</span>";
                }

                if (empty($phone)) {
                    $errors['phone'] = "<span style='color:red;'>Vui lòng nhập số điện thoại</span>";
                } elseif (!preg_match("/^[0-9]{10,11}$/", $phone)) {
                    $errors['phone'] = "<span style='color:red;'>Số điện thoại không hợp lệ</span>";
                }

                if (empty($pttt)) {
                    $errors['pttt'] = "<span style='color:red;'>Vui lòng chọn phương thức thanh toán</span>";
                }

                // Kiểm tra nếu có lỗi, hiển thị thông báo lỗi và kết thúc
                if (!empty($errors)) {
                    include 'view/cart/thanhtoan.php'; // Đưa thông tin lỗi đến view để hiển thị
                    exit();
                }

                $idbill = insert_bill($iduser, $name, $email, $diachi, $phone, $pttt, $ngaydathang, $tongdonhang);
                foreach ($_SESSION['mycart'] as $cart) {
                    insert_cart($_SESSION['user']['id'], $cart['0'], $cart['1'], $cart['2'], $cart['3'], $cart['4'], $cart['5'], $idbill);
                }
                unset($_SESSION['mycart']);

                $listbill = loadone_bill($idbill);
                $bill = loadall_cart($idbill);
                include 'view/cart/bill.php';
            }
            break;

        case 'thanhtoan':
            include 'view/cart/thanhtoan.php';
            break;

        //Giỏ hàng
        case 'delcart':
            if (isset($_POST['idcart'])) {
                $_SESSION['mycart'] = [];
            } else {
                array_splice($_SESSION['mycart'], $_POST['idcart'], 1);
            }
            header('location: index.php?act=viewcart');
            break;

        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $image = $_POST['image'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $price * $soluong;

                $productExists = false;
                foreach ($_SESSION['mycart'] as $key => $cart) {
                    if ($cart[0] == $id) {
                        $_SESSION['mycart'][$key][4] += 1;
                        $_SESSION['mycart'][$key][5] = $_SESSION['mycart'][$key][3] * $_SESSION['mycart'][$key][4];
                        $productExists = true;
                        break;
                    }
                }

                if (!$productExists) {
                    $spadd = [$id, $image, $name, $price, $soluong, $ttien];
                    array_push($_SESSION['mycart'], $spadd);
                }
            }
            header('location: index.php?act=viewcart');
            break;

        case 'viewcart':
            include 'view/cart/viewcart.php';
            break;


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

                if (empty($email) || empty($pass)) {
                    $thongbao = "<span style='color:red;'>Vui lòng nhập dữ liệu</span>";
                } else {
                    // Kiểm tra xác thực tại đây
                    $check_user = check_user($email, $pass);

                    if (is_array($check_user)) {
                        $_SESSION['user'] = $check_user;

                        // Kiểm tra nếu là người dùng quản trị
                        if ($check_user['role'] == 1) {
                            header('location: admin/index.php');
                            exit();
                        } else {
                            header('location: index.php');
                            exit();
                        }
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
            $sp_rc =load_sanpham_recommend();

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