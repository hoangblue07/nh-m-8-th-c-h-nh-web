<?php
include('../../config/config.php');
    $tendanhmuc = $_POST['tendanhmuc'];
    $thutu = $_POST['thutu'];

    if(isset($_POST['themdanhmuc'])){
        $sql_them = "insert into danhmuc(ten,thutu) value ('".$tendanhmuc."','".$thutu."')";
        mysqli_query($connect,$sql_them);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }elseif(isset($_POST['suadanhmuc'])){
        $id = $_GET['iddanhmuc'];
        $sql_sua = "update danhmuc set ten = '".$tendanhmuc."', thutu = '".$thutu."' where iddanhmuc = '".$id."' ";
        mysqli_query($connect,$sql_sua);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }else{
        $id = $_GET['iddanhmuc'];
        $sql_xoa = "delete from danhmuc where iddanhmuc = '".$id."'";
        mysqli_query($connect,$sql_xoa);
        header('location:../../index.php?action=quanlydanhmucsanpham&query=them');
    }
?>