<?php
function loadall_thongke()
{
    $sql = "SELECT danhmuc.id AS madm, danhmuc.name AS tendm, COUNT(sanpham.id) as countsp ,MAX(sanpham.price) AS maxprice, MIN(sanpham.price) AS minprice,AVG(sanpham.price) as avgprice";
    $sql .= " from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql .= " group by danhmuc.id order by danhmuc.id desc";
    $result = pdo_query($sql);
    return $result;
}

