<div class="container mb-3">
    <h3 class="mb-3">Orders</h3>
    <div class="table-responsive">
        <table class="table">
            <?php
            if (isset($listbill) && (is_array($listbill))) {
                extract($listbill);
            }
            ?>
            <thead>
            <tr>
                <th>Người đặt hàng</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Tổng tiền</th>
                <th>Phương thức thanh toán</th>
                <th>Ngày đặt hàng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $listbill['bill_name'] ?></td>
                <td><?= $listbill['bill_diachi'] ?></td>
                <td><?= $listbill['bill_email'] ?></td>
                <td><?= $listbill['bill_phone'] ?></td>
                <td><?= $listbill['total'] ?></td>
                <td>
                    <?php
                    $pttt = $listbill['bill_pttt'];
                    $ptthanhtoan = ($pttt == 1) ? 'Thanh toán khi nhận hàng' : (($pttt == 2) ? 'Thanh toán bằng thẻ' :
                        'Thanh toán');
                    echo $ptthanhtoan;
                    ?>
                </td>
                <td><?= $listbill['ngaydathang'] ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <table class="table">
            <?php
            chi_tiet_bill($bill);
            ?>
        </table>
    </div>
    <div class="login-details text-center mb-25" style="white-space: nowrap; overflow: hidden;">
        <a href="index.php?act=mybill">
            <input type="submit" name="mybill" class="login-btn" value="Đồng ý đặt hàng"></input></a>
    </div>
</div>