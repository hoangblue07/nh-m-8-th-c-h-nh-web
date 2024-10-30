<h3 class="text-2xl text-green-600 font-semibold text-center mt-5">Chi tiết sản phẩm</h3>
<?php
$id = $_GET['id'];
$sql = "select * from sanpham,danhmuc where sanpham.iddanhmuc=danhmuc.iddanhmuc and sanpham.id='" . $id . "' limit 1";
$query = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($query)) {
?>
    <form style='background-color:rgba(0, 0, 0, 0)' method="POST" action="main/themgiohang.php?id=<?php echo $row['id'] ?>">
        <div class="container px-5 py-24 mx-auto" style="cursor: auto;">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded" src="../admin/modules/quanlysanpham/uploads/<?php echo $row['hinhanh'] ?>" style="cursor: auto;">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0" style="cursor: auto;">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest" style="cursor: auto;">MÃ: <?php echo $row['masanpham'] ?></h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1" style="cursor: auto;"><?php echo $row['tensanpham'] ?></h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                            </svg>
                        </span>

                    </div>
                    <p class="leading-relaxed">Nhà sản xuất: <?php echo $row['nhasanxuat'] ?></p>
                    <p class="leading-relaxed">Mô tả: <?php echo $row['mota'] ?></p>
                    <p class="leading-relaxed">Sử dụng từ tuổi: <?php echo $row['tuoisudung'] ?></p>
                    <p class="leading-relaxed">Cách dùng: <?php echo $row['cachdung'] ?></p>
                    <p class="leading-relaxed">Thành phần: <?php echo $row['thanhphan'] ?></p>



                    <hr />
                    <div class="flex mt-5">
                        <span class="title-font font-medium text-2xl text-gray-900"> <?php echo number_format($row['gia'], 0, ',', '.') . ' VNĐ' ?></span>
                        <button name="themgiohang" type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Thêm vào giỏ hàng</button>

                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>