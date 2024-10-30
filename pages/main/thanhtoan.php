<h3>Thanh toán đơn hàng</h3>

<?php
    session_start();
    include("../../admin/config/config.php");
    if(isset($_POST['thanhphan'])){
        $_SESSION['tp'] = $_POST['thanhphan'];
    }
    var_dump($_SESSION['tp']);

    
    $idkhachhang = $_SESSION['id'];
    $madonhang = rand(0,999999);
    $sql = "insert into giohang (idkhachhang,madonhang,trangthai) value ('".$idkhachhang."', '".$madonhang."', 1)";
    $query = mysqli_query($connect,$sql);
    if($query){
        foreach($_SESSION['cart'] as  $id => $cart_item){
            $idsanpham = $cart_item['id'];
            $tp_sanpham = isset($_SESSION['tp'][$idsanpham]) ? $_SESSION['tp'][$idsanpham] : '';
            $soluong = $cart_item['soluong'];
            $sql2 = "insert into donhang (madonhang,idsanpham,soluongsp,thanhphan) value ('".$madonhang."', '".$idsanpham."', '".$soluong."', '".$tp_sanpham."')";
            mysqli_query($connect,$sql2);
        }
    }
    //unset($_SESSION['cart']);
    unset($_SESSION['tp']);
    header("Location:../index.php?quanly=camon");
?>