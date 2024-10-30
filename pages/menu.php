<?php
$sql = "SELECT * FROM danhmuc ORDER BY iddanhmuc DESC";
$query = mysqli_query($connect, $sql);

if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}

// Kiểm tra xem mục nào đã được nhấp
$active_item = isset($_GET['active']) ? $_GET['active'] : 'home';
?>

<div class="bg-blue-300 px-28 py-2">
    <div class="">
        <ul class="flex justify-between items-center" id="menu-list">
            <li class=" <?= $active_item == 'home' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800">
                <a href="index.php?active=home">Trang chủ</a>
            </li>
            <!-- <?php while ($row = mysqli_fetch_array($query)) { ?>
            <li class=" <?= $active_item == $row['iddanhmuc'] ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800">
                <a href="index.php?quanly=danhmucsanpham&id=<?= $row['iddanhmuc'] ?>&active=<?= $row['iddanhmuc'] ?>"><?= $row['ten'] ?></a>
            </li>
            <?php } ?> -->
            <li class=" <?= $active_item == 'cart' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800">
                <a href="index.php?quanly=giohang&active=cart">Giỏ hàng</a>
            </li>

            <li class=" <?= $active_item == 'contact' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800">
                <a href="index.php?quanly=lienhe&active=contact">Liên hệ</a>
            </li>
            <li class=" <?= $active_item == 'faq' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800">
                <a href="index.php?quanly=giaidap&active=faq">Giải đáp</a>
            </li>
            <?php if (isset($_SESSION['dangky'])) { ?>
                <li>
                    <span class="border-r-2 pr-2 text-blue-600 font-bold text-lg">Xin chào, <?= htmlentities($_SESSION['dangky']) ?></span>
                    <a class=" <?= $active_item == 'logout' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800" href="index.php?dangxuat=1&active=logout">Đăng xuất</a>
                </li>
            <?php } else { ?>
                <li class="">
                    <a class="pr-2  <?= $active_item == 'register' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800" href="index.php?quanly=dangky&active=register">Đăng ký</a>
                    <span>|</span>
                    <a class="pl-2  <?= $active_item == 'dangnhap' ? 'active' : '' ?> px-3 py-2 transition-all hover:bg-gray-100 rounded-md hover:underline text-lg text-white hover:text-blue-800" href="index.php?quanly=dangnhap&active=dangnhap">Đăng nhập</a>
                </li>
            <?php } ?>
            <li class="">
                <form action="index.php?quanly=timkiem" method="POST">
                    <input placeholder="Nhập sản phẩm cần tìm" class="outline-none border-none w-72 p-2" type="text" name="key">
                    <button class="text-white transition-all hover:text-green-300 ml-2" type="submit" name="timkiem">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>

<style>
    .active {
        color: blue;
        font-weight: 500;
    }
</style>