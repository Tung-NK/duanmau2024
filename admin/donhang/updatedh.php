<?php
if (is_array($donhang)) {
    extract($donhang);
}
?>

<form action="index.php?act=updatedh" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="card-body">
        <h4 class="card-title">Thông tin đơn hàng</h4>

        <div class="form-group row">
            <label class="col-md-2 text-center m-t-15">Trạng thái</label>
            <div class="col-md-9 ">
                <select name="bill_trangthai" value="<?= $bill_trangthai ?>" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                    <?php if ($bill_trangthai == 0) : ?>
                        <option value="0" selected>Chờ xác nhận</option>
                        <option value="1">Đang chuẩn bị hàng</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                    <?php elseif ($bill_trangthai == 1) : ?>
                        <option value="1" selected>Đang chuẩn bị hàng</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                    <?php elseif ($bill_trangthai == 2) : ?>
                        <option value="2" selected>Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                    <?php else : ?>
                        <option value="3" selected>Đã giao hàng</option>
                    <?php endif; ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-2 text-center m-t-15">Trạng thái thanh toán</label>
            <div class="col-md-9">
                <select name="bill_tttt" value="<?= $pttt ?>" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                    <?php
                    extract($donhang);
                    $pttt = $donhang['bill_pttt'];
                    $ptthanhtoan = ($pttt == 1) ? 'Thanh toán khi nhận hàng' : (($pttt == 2) ? 'Thanh toán bằng thẻ' : '');
                    ?>
                    <?php if ($pttt == 1) : ?>
                        <option>1<span>. Chưa thanh toán</span></option>
                        <option>2<span>. Đã thanh toán</span></option>
                    <?php else : ?>
                        <option selected>2<span <?php if ($pttt == 2) echo 'readonly'; ?>>. Đã thanh toán</span></option>
                    <?php endif; ?>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="id" class="col-sm-2 text-center control-label col-form-label">ID</label>
            <div class="col-sm-9">
                <input type="text" name="id" class="form-control" id="user_id" placeholder="User" value="<?= $id ?>" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Khách hàng</label>
            <div class="col-sm-9">
                <input type="text" name="bill_name" class="form-control" id="lname" placeholder="Khách hàng" value="<?= $bill_name ?>" readonly>
            </div>
        </div>


        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Địa chỉ</label>
            <div class="col-sm-9">
                <input type="text" name="bill_diachi" class="form-control" id="lname" placeholder="Địa chỉ" value="<?= $bill_diachi ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Số điện thoại</label>
            <div class="col-sm-9">
                <input type="text" name="bill_phone" class="form-control" id="lname" placeholder="Số điện thoại" value="<?= $bill_phone ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" name="bill_email" class="form-control" id="lname" placeholder="Email" value="<?= $bill_email ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <?php
            extract($donhang);
            $pttt = $donhang['bill_pttt'];
            $ptthanhtoan = ($pttt == 1) ? 'Thanh toán khi nhận hàng' : (($pttt == 2) ? 'Thanh toán bằng thẻ' : '');
            echo '<label for="lname" class="col-sm-2 text-center control-label col-form-label">Phương thức thanh toán</label>
            <div class="col-sm-9">
                <input type="text" name="bill_pttt" class="form-control" id="lname" placeholder="Phương thức thanh toán" value="' . $ptthanhtoan . '" readonly>
            </div>';
            ?>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Ngày đặt hàng</label>
            <div class="col-sm-9">
                <input type="text" name="ngaydathang" class="form-control" id="lname" placeholder="Ngày đặt hàng" value="<?= $ngaydathang ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="lname" class="col-sm-2 text-center control-label col-form-label">Tổng</label>
            <div class="col-sm-9">
                <input type="text" name="total" class="form-control" id="lname" placeholder="Tổng" value="<?= $total ?>" readonly>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="card-title m-b-0">Thông tin đơn hàng</h5>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Tổng tiền</th>
                </tr>
            </thead>
            <?php
            $ct = loadall_cart($_GET['id']);
            if (is_array($ct)) {
                foreach ($ct as $item) {
                    // global $img_path;
                    // $hinh = $img_path . $item['image'];

                    $hinhpath = "../upload/" . $item['image'];
                    if (is_file($hinhpath)) {
                        $hinh = "<img src='" . $hinhpath . "' height='100'>";
                    } else {
                        $hinh = "Không có hình ảnh";
                    }

                    echo '<tr>
                                        <td>' . $item['idpro'] . '</td>
                                        <td><img src="' . $hinh . '"></td>
                                        <td>' . $item['name'] . '</td>
                                        <td>' . $item['price'] . '</td>
                                        <td>' . $item['soluong'] . '</td> 
                                        <td>' . $item['thanhtien'] . '</td> 
                                    </tr>';
                }
            }
            ?>
        </table>
    </div>
    <div class="border-top text-center">
        <div class="card-body">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit" name="capnhatdh" class="btn btn-primary" value="Cập nhật">
            <input type="reset" class="btn btn-danger" value="Nhập lại">
        </div>
    </div>
    <?php
    if (isset($thongbao) && ($thongbao != ""))
        echo $thongbao;
    ?>
</form>