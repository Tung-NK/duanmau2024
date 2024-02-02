<?php
session_start();
include '../../model/pdo.php';
include '../../model/binhluan.php';

$idpro = $_REQUEST['idpro'];
$dsbl = load_binhluan($idpro);
?>

<div class="row">
    <div class="boxcontent2 binhluan">
        <table>
            <tr>
                <td><strong>Nội dung</strong></td>
                <td><strong>Người bình luận</strong></td>
                <td><strong>Ngày bình luận</strong></td>
            </tr>
            <?php
            foreach ($dsbl as $bl) {
                extract($bl);
                echo '
                                    <tr>
                                                <td>' . $noidung . '</td>
                                                <td>' . $user . '</td>
                                                <td>' . date("d-m-Y", strtotime($ngaybinhluan)) . '</td>
                                            </tr>';
            }
            ?>

        </table>
    </div>
    <?php
    if (isset($_SESSION['user'])) { // Kiểm tra nếu người dùng đã đăng nhập
        echo '
            <div class="boxfooter binhluanform">
                <form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                    <input type="hidden" name="idpro" value="' . $idpro . '">
                    <input type="text" name="noidung" class="form-control">
                    <input type="submit" name="guibinhluan" value="Gửi bình luận">
                </form>
            </div>';
    } else {
        echo '<a style=" margin-top: 30px; margin-bottom: 0px;" href="index.php?act=dangnhap"><p style="display: inline; text-align: center;">Bạn cần đăng nhập để bình luận.</p></a>';
    }
    ?>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
        $noidung = $_POST['noidung'];
        $idpro = $_POST['idpro'];
        $iduser = $_SESSION['user']['id'];
        // $ngaybinhluan = date("d-m-Y", strtotime($ngaybinhluan));
        insert_binhluan($noidung, $iduser, $idpro, date("Y-m-d H:i:s"));
        header("location: " . $_SERVER['HTTP_REFERER']);
    }

    ?>
</div>
