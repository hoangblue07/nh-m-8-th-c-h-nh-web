<p class="text-2xl font-bold mb-6 text-center text-blue-600">Thêm sản phẩm</p>
<form action="modules/quanlysanpham/xuly.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-lg">
    <table class="min-w-full">
        <tr>
            <td class="py-3 px-4">Mã sản phẩm</td>
            <td class="py-3 px-4">
                <input type="text" name="masanpham" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Tên sản phẩm</td>
            <td class="py-3 px-4">
                <input type="text" name="tensanpham" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Nhà sản xuất</td>
            <td class="py-3 px-4">
                <input type="text" name="nhasanxuat" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Hình ảnh</td>
            <td class="py-3 px-4">
                <input type="file" name="hinhanh" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Mô tả</td>
            <td class="py-3 px-4">
                <input type="text" name="mota" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Tuổi sử dụng từ</td>
            <td class="py-3 px-4">
                <input type="number" name="tuoisudung" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Cách dùng</td>
            <td class="py-3 px-4">
                <input type="text" name="cachdung" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Thành phần</td>
            <td class="py-3 px-4">
                <input type="text" name="thanhphan" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Giá sản phẩm</td>
            <td class="py-3 px-4">
                <input type="text" name="gia" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Trạng thái</td>
            <td class="py-3 px-4">
                <select name="trangthai" class="border rounded-md p-2 w-full" required>
                    <option value="1">Kích hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>
        <tr>
            <td class="py-3 px-4">Tên danh mục</td>
            <td class="py-3 px-4">
                <select name="danhmuc" class="border rounded-md p-2 w-full" required>
                    <?php
                    $sql = "SELECT * FROM danhmuc ORDER BY iddanhmuc DESC";
                    $query = mysqli_query($connect, $sql);
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $row['iddanhmuc']; ?>"><?php echo htmlentities($row['ten']); ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="text-center">
                <input type="submit" value="Thêm sản phẩm" name="themsanpham" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition duration-150">
            </td>
        </tr>
    </table>
</form>