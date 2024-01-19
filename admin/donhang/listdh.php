<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Basic Datatable</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Số lượng hàng</th>
                                <th>Giá trị đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Ngày đặt hàng</th>
                                <th></th>
                                <th>Huỷ đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($bill_list as $bill) {
                                extract($bill);
                                $suadh = "index.php?act=suadh&id=" . $id;
                                $kh = $bill["bill_name"] . '<br> ' . $bill["bill_email"] . '<br> ' . $bill["bill_diachi"] . ' ' . $bill["bill_phone"];
                                $ttdh = get_ttdh($bill['bill_trangthai']);
                                $countsp = loadall_cart_count($bill["id"]);
                                $xnhuy = "index.php?act=xnhuy&id=" .$id;
                                $huydonhang = $bill["huydon"];
                                $hd = ($huydonhang == 0) ? '' : (($huydonhang == 1) ? '<a href="' . $xnhuy . '">Xác nhận huỷ đơn</a>' : (($huydonhang == 2) ? 'Đã huỷ' : ''));
                                $suaButton = ($huydonhang != 2) ? '<a href="' . $suadh . '"><input type="button" class="btn btn-primary" value="Sửa"></a>' : '';
                                $trangThaiThanhToan = ($bill['bill_tttt'] == 1) ? 'Chưa thanh toán' : (($bill['bill_tttt'] == 0 || $bill['bill_tttt'] == 2) ? 'Đã thanh toán' : '');
                                echo '<tr>
                                        <td>TVY-' . $bill['id'] . '</td>
                                        <td>' . $kh . '</td>
                                        <td>' . $countsp . '</td>
                                        <td>' . $bill["total"] . '</td>
                                        <td>' . $ttdh . '</td>
                                        <td>' . $trangThaiThanhToan . '</td> 
                                        <td>' . $bill["ngaydathang"] . '</td>
                                        <td>'.$suaButton.'</td>
                                        <th>'.$hd.'</th>
                                    </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

