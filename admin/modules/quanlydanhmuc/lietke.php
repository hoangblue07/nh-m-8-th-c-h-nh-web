<?php
$sql = "SELECT * FROM danhmuc ORDER BY thutu DESC";
$query = mysqli_query($connect, $sql);
?>

<p class="text-xl font-semibold mb-4">Liệt kê danh mục sản phẩm</p>
<table class="min-w-full border border-collapse">
    <thead>
        <tr class="bg-gray-200 text-gray-700">
            <th class="py-2 px-4 border">ID</th>
            <th class="py-2 px-4 border">Tên danh mục</th>
            <th class="py-2 px-4 border">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {
            $i++;
        ?>
            <tr class="<?= $i % 2 == 0 ? 'bg-gray-100' : 'bg-white' ?>">
                <td class="py-2 px-4 border"><?= $i ?></td>
                <td class="py-2 px-4 border"><?= htmlentities($row['ten']) ?></td>
                <td class="py-2 px-4 border">
                    <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?= $row['iddanhmuc'] ?>" class="text-blue-500 hover:text-blue-700">Sửa</a> | 
                    <a href="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?= $row['iddanhmuc'] ?>" class="text-red-500 hover:text-red-700">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>