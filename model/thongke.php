<?php
function loadall_thongke()
{
    $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, MAX(sanpham.price) AS maxprice, MIN(sanpham.price) AS minprice,";
    $sql .= " sanpham.id AS masp, sanpham.name AS tensp, COUNT(cart.id) AS soluong";
    $sql .= " FROM sanpham LEFT JOIN danhmuc ON danhmuc.id = sanpham.iddm";
    $sql .= " LEFT JOIN cart ON sanpham.id = cart.idpro";
    $sql .= " GROUP BY danhmuc.id ORDER BY danhmuc.id DESC";

    $result = pdo_query($sql);
    return $result;
}

function getLowestSoldProduct()
{
    $sql = "SELECT sanpham.id AS masp, sanpham.name AS tensp, COUNT(cart.id) AS soluong";
    $sql .= " FROM sanpham LEFT JOIN cart ON sanpham.id = cart.idpro";
    $sql .= " GROUP BY sanpham.id ORDER BY soluong ASC LIMIT 1";

    $result = pdo_query($sql);
    return $result;
}

function doanh_so()
{
    $sql = "SELECT DATE(ngaydathang) AS Ngay, SUM(total) AS TongTienBanRa
        FROM bill
        WHERE ngaydathang IS NOT NULL
        GROUP BY DATE(ngaydathang)
        ORDER BY DATE(ngaydathang) ASC";
    $result = pdo_query($sql);
    return $result;
}
