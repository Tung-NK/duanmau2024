<?php
function insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,image,mota,iddm) values ('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_execute($sql);
}

 function loadall_sanpham_home()
 {
     $sql = "select * from sanpham where 1 order by id asc limit 0,9";
     $listsanpham = pdo_query($sql);
     return $listsanpham;
 }


function load_sanpham_new()
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC";
    $spnew = pdo_query($sql);
    return $spnew;
}

function load_sanpham_recommend()
{
    $sql = "SELECT * FROM sanpham ORDER BY RAND()";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}


//function load_sanpham_dmfeatured()
//{
//    $sql = "SELECT * FROM sanpham WHERE iddm = 1";
//    $listsanpham = pdo_query($sql);
//    return $listsanpham;
//}
//
function loadall_sanpham($kyw = "", $iddm = 0)
{
    $sql = "SELECT sp.*, dm.name AS category_name
            FROM sanpham sp
            LEFT JOIN danhmuc dm ON sp.iddm = dm.id
            WHERE 1";

    if ($kyw != "") {
        $sql .= " AND sp.name LIKE '%" . $kyw . "%'";
    }

    if ($iddm > 0) {
        $sql .= " AND sp.iddm = '" . $iddm . "'";
    }

    $sql .= " ORDER BY sp.id DESC";

    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function loadall_sanpham_admin($kyw = "", $iddm)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm = '" . $iddm . "'";
    }
    $sql .= " order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}



function load_ten_dm($iddm)
{
    if ($iddm > 0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    } else {
        return "";
    }
}

function loadone_sanpham($id)
{
    $sql = "select sp.id, sp.name, sp.price, sp.image, sp.mota, dm.name as namedm from sanpham as sp inner join danhmuc as dm on dm.id = sp.iddm where sp.id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function loadone_sanpham_admin($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}

function load_sanpham_cungloai($id, $iddm)
{
    $sql = "select * from sanpham where iddm=" . $iddm . " AND id <>" . $id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}

function update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh)
{
    if ($hinh != "")
        $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "', mota='" . $mota . "', image='" . $hinh . "' where id=" . $id;
    else
        $sql = "update sanpham set iddm='" . $iddm . "', name='" . $tensp . "', price='" . $giasp . "', mota='" . $mota . "' where id=" . $id;
    pdo_execute($sql);
}
