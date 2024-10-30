<div>
    <div>
        <div class="main-content">
            <?php
            if (isset($_GET['quanly'])) {
                $tamp = $_GET['quanly'];
            } else {
                $tamp = '';
            }

            if ($tamp == 'danhmucsanpham') {
                include("select/select.php");
                include("main/danhmuc.php");
            } elseif ($tamp == 'giohang') {
                include("main/giohang.php");
            } elseif ($tamp == 'giaidap') {
                include("main/giaidap.php");
            } elseif ($tamp == 'lienhe') {
                include("main/lienhe.php");
            } elseif ($tamp == 'sanpham') {
                include("main/sanpham.php");
            } elseif ($tamp == 'dangky') {
                include("main/dangky.php");
            } elseif ($tamp == 'thanhtoan') {
                include("main/thanhtoan.php");
            } elseif ($tamp == 'dangnhap') {
                include("main/dangnhap.php");
            } elseif ($tamp == 'timkiem') {
                include("main/timkiem.php");
            } elseif ($tamp == 'camon') {
                include("main/camon.php");
            } elseif ($tamp == 'doimatkhau') {
                include("main/doimatkhau.php");
            } elseif ($tamp == 'lienhe') {
                include("main/lienhe.php");
            } else {
                include("select/select.php");
                include("main/index.php");
            }
            ?>
        </div>
        <div class="clear"></div>
    </div>