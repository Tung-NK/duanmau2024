<?php
function hoadon($tong)
{
    $sql = "INSERT INTO hoadon(tongtien) VALUES ('$tong')";
    pdo_execute($sql);
}

function hoadonct($soluong)
{
    $sql = "INSERT INTO hoadonct(soluong) VALUES ('$soluong')";
    pdo_execute($sql);
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}

function chi_tiet_bill($bill)
{

    global $img_path;
    $tong = 0;
    $i = 0;

    echo '<thead>
    <tr>
        <th>Hình ảnh</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
    </tr>
</thead>';

    foreach ($bill as $cart) {
        $hinh = $img_path . $cart['image'];
        $tong += $cart['thanhtien'];

        echo '<tbody>
                <tr>
                    <td><img src="' . $hinh . '" alt=""></td>
                    <td>' . $cart['name'] . '</td>
                    <td>' . $cart['price'] . '</td>
                    <td>' . $cart['soluong'] . '</td>
                    <td>' . $cart['thanhtien'] . '</td>
                </tr>
                
            </tbody>';
        $i += 1;
    }
}


function insert_bill($iduser, $name, $email, $diachi, $phone, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill(iduser,bill_name,bill_email,bill_diachi,bill_phone,bill_pttt,ngaydathang,total) 
    values ('$iduser','$name', '$email', '$diachi','$phone','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_lastInsertId($sql);
}

function insert_cart($iduser, $idpro, $image, $name, $price, $soluong, $thanhtien, $idbill)
{
    $sql = "insert into cart(iduser,idpro,image,name,price,soluong,thanhtien,idbill) 
    values ('$iduser', '$idpro', '$image','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill_ct = pdo_query_one($sql);
    return $bill_ct;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}


function loadall_cart_count($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return sizeof($bill);
}


function loadall_bill($iduser)
{
    $sql = "select * from bill where 1";
    if($iduser>0) $sql.=" AND iduser=".$iduser;
    $sql.= " order by id desc";
    $bill_list = pdo_query($sql);
    return $bill_list;
}


function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Chờ xác nhận";
            break;
        case '1':
            $tt = "Đang chuẩn bị hàng";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;

        default:
            $tt= "Chờ xác nhận";
            break;
    }
    return $tt;
}

function get_tttt($a)
{
    switch ($a) {
        case '1':
            $tt = "";
            break;
        case '2':
            $tt = "Đã thanh toán";
            break;

        default:
            $tt= "";
            break;
    }
    return $tt;
}

function load_trangthai()
{
    $sql = "SELECT DISTINCT bill_trangthai FROM bill";
    $trangthai_bill = pdo_query($sql);
    return $trangthai_bill;
}

function update_donhang($id, $bill_trangthai,$bill_tttt)
{
    $sql = "update bill set bill_trangthai= '" . $bill_trangthai . "', bill_tttt = '".$bill_tttt."' where id=" . $id;
    pdo_execute($sql);
}

function huydon($id){
    $sql = "UPDATE bill SET huydon = 1 WHERE id =" .$id;
    pdo_execute($sql);
}

function bohuydon($id){
    $sql = "UPDATE bill SET huydon = 0 WHERE id =" .$id;
    pdo_execute($sql);
}

function xnhuydon($id){
    $sql = "UPDATE bill SET huydon = 2 WHERE id =" .$id;
    pdo_execute($sql);
}

