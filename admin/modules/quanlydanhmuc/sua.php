<?php
$id = $_GET['iddanhmuc'];
$sql = "SELECT * FROM danhmuc WHERE iddanhmuc = '" . mysqli_real_escape_string($connect, $id) . "' LIMIT 1";
$query = mysqli_query($connect, $sql);
?>
<p class="text-xl font-semibold mb-4">Sửa danh mục sản phẩm</p>
<form action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo urlencode($id); ?>" method="POST" class="bg-white p-4 rounded-lg shadow-md">
    <table class="min-w-full">
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td class="py-2 px-4">Tên danh mục</td>
            <td class="py-2 px-4">
                <input type="text" value="<?php echo htmlentities($row['ten']); ?>" name="tendanhmuc" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-2 px-4">Thứ tự</td>
            <td class="py-2 px-4">
                <input type="text" value="<?php echo htmlentities($row['thutu']); ?>" name="thutu" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="py-2 px-4 text-center">
                <input type="submit" value="Sửa danh mục sản phẩm" name="suadanhmuc" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </td>
        </tr>
        <?php } ?>
    </table>
</form>