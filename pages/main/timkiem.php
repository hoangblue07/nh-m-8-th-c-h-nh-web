<?php
if (isset($_POST['timkiem'])) {
    $key = $_POST['key'];

    $key = mysqli_real_escape_string($connect, $key);

    $sql = "SELECT * FROM sanpham, danhmuc 
            WHERE sanpham.iddanhmuc = danhmuc.iddanhmuc 
            AND sanpham.tensanpham LIKE '%" . $key . "%' 
            AND sanpham.trangthai != 0"; 
    $query = mysqli_query($connect, $sql);
}
?>

<h3 class="text-center font-bold text-gray-500 mt-12">Tìm kiếm: <?php echo htmlspecialchars($key); ?></h3>
<ul class="product-list">
    <div class="grid grid-cols-3">
        <?php
        // Kiểm tra nếu có sản phẩm tìm thấy
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="w-80 m-10 mx-auto">
                    <div class="bg-white rounded-lg m-h-64 p-2 transform hover:translate-y-2 hover:shadow-xl transition duration-300">
                        <figure class="mb-2">
                            <img src="../admin/modules/quanlysanpham/uploads/<?php echo htmlspecialchars($row['hinhanh']); ?>" alt="" class="h-64 ml-auto mr-auto" />
                        </figure>
                        <div class="rounded-lg p-4 bg-gray-600 flex flex-col">
                            <div>
                                <h5 class="text-white text-2xl font-bold leading-none">
                                    <?php echo htmlspecialchars($row['tensanpham']); ?>
                                </h5>
                                <span class="text-xs text-gray-400 leading-none">
                                    <?php echo htmlspecialchars($row['nhasanxuat']); ?>
                                </span>
                            </div>
                            <div class="flex items-center">
                                <div class="text-lg text-white font-light">
                                    <?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ'; ?>
                                </div>
                                <a href="index.php?quanly=sanpham&id=<?php echo htmlspecialchars($row['id']); ?>" class="rounded-full bg-gray-800 text-white hover:bg-white hover:text-purple-900 hover:shadow-xl focus:outline-none w-10 h-10 flex ml-auto transition duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-current m-auto">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php 
            }
        } else {
            echo '<p class="text-center text-gray-500">Không tìm thấy sản phẩm nào.</p>';
        }
        ?>
    </div>
</ul>