<?php
$id = $_GET['id'];
$sql = "SELECT * FROM sanpham WHERE id = '" . mysqli_real_escape_string($connect, $id) . "' LIMIT 1";
$query = mysqli_query($connect, $sql);
?>
<p class="text-2xl font-bold mb-6 text-center text-blue-600">Sửa sản phẩm</p>
<?php
while ($row = mysqli_fetch_array($query)) {
?>
    <form action="modules/quanlysanpham/xuly.php?id=<?php echo $row['id']; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow-md rounded-lg">
        <table class="min-w-full">
            <tr>
                <td class="py-3 px-4">Mã sản phẩm</td>
                <td class="py-3 px-4">
                    <input type="text" name="masanpham" value="<?php echo htmlentities($row['masanpham']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Tên sản phẩm</td>
                <td class="py-3 px-4">
                    <input type="text" name="tensanpham" value="<?php echo htmlentities($row['tensanpham']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Nhà sản xuất</td>
                <td class="py-3 px-4">
                    <input type="text" name="nhasanxuat" value="<?php echo htmlentities($row['nhasanxuat']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Hình ảnh</td>
                <td class="py-3 px-4">
                    <input type="file" name="hinhanh" class="border rounded-md p-2 w-full">
                    <img src="modules/quanlysanpham/uploads/<?php echo htmlentities($row['hinhanh']); ?>" width="100" alt="Hình ảnh sản phẩm" class="mt-2 rounded-md shadow-sm">
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Mô tả</td>
                <td class="py-3 px-4">
                    <input type="text" name="mota" value="<?php echo htmlentities($row['mota']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Tuổi sử dụng từ</td>
                <td class="py-3 px-4">
                    <input type="number" name="tuoisudung" value="<?php echo htmlentities($row['tuoisudung']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Cách dùng</td>
                <td class="py-3 px-4">
                    <input type="text" name="cachdung" value="<?php echo htmlentities($row['cachdung']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Thành phần</td>
                <td class="py-3 px-4">
                    <input type="text" name="thanhphan" value="<?php echo htmlentities($row['thanhphan']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Giá sản phẩm</td>
                <td class="py-3 px-4">
                    <input type="text" name="gia" value="<?php echo htmlentities($row['gia']); ?>" class="border rounded-md p-2 w-full" required>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Trạng thái</td>
                <td class="py-3 px-4">
                    <select name="trangthai" class="border rounded-md p-2 w-full" required>
                        <option value="1" <?php echo $row['trangthai'] == 1 ? 'selected' : ''; ?>>Kích hoạt</option>
                        <option value="0" <?php echo $row['trangthai'] == 0 ? 'selected' : ''; ?>>Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="py-3 px-4">Tên danh mục</td>
                <td class="py-3 px-4">
                    <select name="danhmuc" class="border rounded-md p-2 w-full" required>
                        <?php
                        $sqldanhmuc = "SELECT * FROM danhmuc ORDER BY iddanhmuc DESC";
                        $querydanhmuc = mysqli_query($connect, $sqldanhmuc);
                        while ($rowdanhmuc = mysqli_fetch_array($querydanhmuc)) {
                        ?>
                            <option value="<?php echo $rowdanhmuc['iddanhmuc']; ?>" <?php echo $rowdanhmuc['iddanhmuc'] == $row['iddanhmuc'] ? 'selected' : ''; ?>>
                                <?php echo htmlentities($rowdanhmuc['ten']); ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <input type="submit" value="Sửa sản phẩm" name="suasanpham" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 transition duration-150">
                </td>
            </tr>
        </table>
    </form>
<?php } ?>