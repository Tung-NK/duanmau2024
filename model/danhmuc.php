<?php
function insert_danhmuc($tenloai)
{
    $sql = "insert into danhmuc(name) values ('$tenloai')";
    pdo_execute($sql);
}

function delete_danhmuc($id)
{
    $sql = "delete from danhmuc where id=" . $id;
    pdo_execute($sql);
}

function loadall_danhmuc()
{
    $sql = "select * from danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadall_danhmuc_dm()
{
    $sql = "SELECT dm.id AS id, dm.name AS category_name, COUNT(sp.id) AS product_count
FROM danhmuc dm
LEFT JOIN sanpham sp ON dm.id = sp.iddm
GROUP BY dm.id, dm.name;";
    $listdm = pdo_query($sql);
    return $listdm;
}

function loadall_danhmuc_main()
{
    $sql = "SELECT * FROM danhmuc ORDER BY id ASC LIMIT 5";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id)
{
    $sql = "select * from danhmuc where id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_danhmuc($id, $name)
{
    $sql = "update danhmuc set name= '" . $name . "' where id=" . $id;
    pdo_execute($sql);
}
