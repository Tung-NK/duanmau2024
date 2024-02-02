<?php
function load_binhluan($idpro){
    $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, acount.user FROM `binhluan`
                LEFT JOIN acount ON binhluan.iduser = acount.id
                LEFT JOIN sanpham on binhluan.idpro = sanpham.id
                WHERE sanpham.id = $idpro";
    $result =  pdo_query($sql);
    return $result;
}

function insert_binhluan($noidung,$iduser,$idpro,$ngaybinhluan){
    $sql = "INSERT INTO binhluan (noidung, iduser, idpro, ngaybinhluan) VALUES ('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}

function delete_binhluan($id){
    $sql = "delete from binhluan where id=".$id;
    pdo_query($sql);
}

function list_binhluan(){
    $sql = "select * from binhluan";
    $listbinhluan=pdo_query($sql);
    return $listbinhluan;
}

function loadall_binhluan($idpro){
    $sql = "select * from binhluan where 1";
    if($idpro>0) $sql.=" AND idpro='".$idpro."'";
    $sql.=" order by id desc";
    $result = pdo_query($sql);
    return $result;
}

