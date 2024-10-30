<h3 class="text-lg font-semibold mt-4">Giỏ hàng của: 
    <?php 
    if (isset($_SESSION['dangky'])) { 
        echo '<span class="text-blue-500">' . $_SESSION['dangky'] . '</span>'; 
    }
    ?>
</h3>

<form method="POST" action="main/thanhtoan.php" class="mt-6">
    <?php
    if (isset($_SESSION['cart'])) {
    ?>
    <table class="min-w-full bg-white border-collapse border border-gray-200 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="p-3 text-left">Mã sản phẩm</th>
                <th class="p-3 text-left">Tên sản phẩm</th>
                <th class="p-3 text-left">Hình ảnh</th>
                <th class="p-3 text-left">Số lượng</th>
                <th class="p-3 text-left">Thành phần</th>
                <th class="p-3 text-left">Đơn giá</th>
                <th class="p-3 text-left">Thành tiền</th>
                <th class="p-3 text-left">Quản lý</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_SESSION['cart'])) {
            $i = 0;
            $tongtien = 0;
            foreach ($_SESSION['cart'] as $cart_item) {
                if (isset($cart_item['soluong']) && isset($cart_item['gia'])) {
                    $thanhtien = $cart_item['soluong'] * $cart_item['gia'];
                    $tongtien += $thanhtien;
                } else {
                    $thanhtien = 0;
                }
                $i++;
                $id = $cart_item['id'];
                $sql = "SELECT * FROM sanpham WHERE id = $id";
                $query = mysqli_query($connect, $sql);
                $row = mysqli_fetch_array($query);
        ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3"><?php echo $cart_item['masanpham'] ?></td>
                    <td class="p-3"><?php echo $cart_item['tensanpham'] ?></td>
                    <td class="p-3"><img src="../admin/modules/quanlysanpham/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="" class="w-28 h-auto rounded-lg shadow-sm"></td>
                    <td class="p-3">
                        <a href="main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="text-green-500 hover:text-green-700"><i class="fa-solid fa-plus"></i></a>
                        <span class="mx-2"><?php echo $cart_item['soluong'] ?></span>
                        <a href="main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="text-red-500 hover:text-red-700"><i class="fa-solid fa-minus"></i></a>
                    </td>
                    <td class="p-3"><?php echo $row['thanhphan'] ?></td>
                    <td class="p-3"><?php echo number_format($cart_item['gia'], 0, ',', '.') . ' VNĐ' ?></td>
                    <td class="p-3"><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                    <td class="p-3"><a href="main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="text-white hover:text-red-700 bg-red-700 hover:bg-gray-300 transition-all px-3 py-2">Xóa</a></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="9" class="p-3 text-right bg-gray-100">
                    <p class="float-left text-2xl font-bold">Tổng tiền: <?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></p>
                    <p class="float-right"><a href="main/themgiohang.php?xoatatca=1" class="text-white hover:text-red-700 bg-red-700 hover:bg-gray-300 transition-all px-3 py-2">Xóa tất cả</a></p>
                    <div class="clear-both float-left">
                        <?php
                        if (isset($_SESSION['dangky'])) {
                        ?>
                            <p><input type="submit" value="Đặt hàng" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded cursor-pointer transition duration-200"></p>
                        <?php
                        } else {
                        ?>
                            <p><a href="index.php?quanly=dangky" class="text-red-500 hover:text-red-700 font-bold">Vui lòng đăng ký để đặt hàng</a></p>
                        <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="8" class="p-3 text-center">Giỏ hàng trống</td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } ?>
</form>
