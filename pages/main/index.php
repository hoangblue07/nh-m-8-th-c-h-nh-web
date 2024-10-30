<?php
if (isset($_GET['trang'])) {
    $page = $_GET['trang'];
} else {
    $page = 1;
}

// Thay đổi số sản phẩm mỗi trang thành 9
if ($page == '' || $page == 1) {
    $begin = 0;
} else {
    $begin = ($page * 9) - 9; // Chỉnh sửa để hiển thị 9 sản phẩm mỗi trang
}

$sql = "SELECT * FROM sanpham, danhmuc 
        WHERE sanpham.iddanhmuc = danhmuc.iddanhmuc 
        AND sanpham.trangthai != 0 
        ORDER BY sanpham.id DESC 
        LIMIT $begin, 9"; // Cập nhật LIMIT thành 9
$query = mysqli_query($connect, $sql);
?>
<h3 class="text-center text-gray-400 font-semibold text-2xl my-10">TẤT CẢ SẢN PHẨM</h3>

<div class="grid grid-cols-3">
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
        <div class="w-80 m-10 mx-auto">
            <div class="bg-white rounded-lg m-h-64 p-2 transform hover:translate-y-2 hover:shadow-xl transition duration-300">
                <figure class="mb-2">
                    <img src="../admin/modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" alt="" class="h-64 ml-auto mr-auto" />
                </figure>
                <div class="rounded-lg p-4 bg-gray-600 flex flex-col">
                    <div>
                        <h5 class="text-white text-2xl font-bold leading-none">
                            <?php echo $row['tensanpham'] ?>
                        </h5>
                        <span class="text-xs text-gray-400 leading-none">
                            <?php echo $row['nhasanxuat'] ?>
                        </span>
                    </div>
                    <div class="flex items-center">
                        <div class="text-lg text-white font-light">
                            <?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ' ?>
                        </div>
                        <a href="index.php?quanly=sanpham&id=<?php echo $row['id'] ?>" class="rounded-full bg-gray-800 text-white hover:bg-white hover:text-purple-900 hover:shadow-xl focus:outline-none w-10 h-10 flex ml-auto transition duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current m-auto">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<hr />
<div class="flex justify-center mb-20 mt-5">
    <?php
    $sql2 = "SELECT * FROM sanpham WHERE trangthai != 0";
    $query2 = mysqli_query($connect, $sql2);
    $row = mysqli_num_rows($query2);
    $trang = ceil($row / 9);
    ?>
    <ul class="flex items-center justify-center w-44">
        <!-- Nút Prev -->
        <?php if ($page > 1): ?>
            <li class="p-3 rounded-md">
                <a class="text-red-600 font-bold" href="index.php?trang=<?php echo $page - 1 ?>">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </li>
        <?php endif; ?>

        <?php
        for ($i = 1; $i <= $trang; $i++) {
        ?>
            <li class="p-3 rounded-md"
                <?php if ($i == $page) {
                    echo 'style="background:gray"';
                } else {
                    echo '';
                } ?>><a class="text-red-300 mx-4 font-bold" href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php } ?>

        <!-- Nút Next -->
        <?php if ($page < $trang): ?>
            <li class="p-3 rounded-md">
                <a class="text-red-600 text-center font-bold" href="index.php?trang=<?php echo $page + 1 ?>">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</div>
</div>