<p class="text-xl font-semibold mb-4">Thêm danh mục sản phẩm</p>
<form action="modules/quanlydanhmuc/xuly.php" method="POST" class="bg-white p-4 rounded-lg shadow-md">
    <table class="min-w-full">
        <tr>
            <td class="py-2 px-4">Tên danh mục</td>
            <td class="py-2 px-4">
                <input type="text" name="tendanhmuc" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td class="py-2 px-4">Thứ tự</td>
            <td class="py-2 px-4">
                <input type="text" name="thutu" class="border rounded-md p-2 w-full" required>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="py-2 px-4 text-center">
                <input type="submit" value="Thêm danh mục sản phẩm" name="themdanhmuc" class="bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">
            </td>
        </tr>
    </table>
</form>