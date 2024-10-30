<div class="clear"></div>
<div class="main">
    <?php
        if(isset($_GET['action']) && isset($_GET['query'])){
            $tamp = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tamp = '';
            $query = '';
        }

        if($tamp == 'quanlydanhmucsanpham' && $query == 'them'){
            include("modules/quanlydanhmuc/them.php");
            include("modules/quanlydanhmuc/lietke.php");
        }elseif($tamp == 'quanlydanhmucsanpham' && $query == 'sua'){
            include("modules/quanlydanhmuc/sua.php");
        }elseif($tamp == 'quanlysanpham' && $query == 'them'){
            include("modules/quanlysanpham/them.php");
            include("modules/quanlysanpham/lietke.php");
        }elseif($tamp == 'quanlysanpham' && $query == 'sua'){
            include("modules/quanlysanpham/sua.php");
        }elseif($tamp == 'quanlydonhang' && $query == 'lietke'){
            include("modules/quanlydonhang/lietke.php");
        }elseif($tamp == 'donhang' && $query == 'xemdonhang'){
            include("modules/quanlydonhang/chitietdonhang.php");
        }elseif($tamp == 'quanlylienhe' && $query == 'lietke'){
            include("modules/quanlylienhe/lietke.php");
        }
    ?>
</div>