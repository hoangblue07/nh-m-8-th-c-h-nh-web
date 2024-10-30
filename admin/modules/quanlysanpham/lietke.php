<?php
$sql = "SELECT * FROM sanpham, danhmuc WHERE sanpham.iddanhmuc = danhmuc.iddanhmuc ORDER BY sanpham.id DESC";
$query = mysqli_query($connect, $sql);
?>
<p class="text-2xl font-bold mb-6 text-center text-blue-600">Liệt sản phẩm</p>
<form action="modules/quanlydanhmuc/xuly.php" method="POST">
    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
            <tr>
                <th class="py-3 px-4 text-left whitespace-nowrap">ID</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Mã sản phẩm</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Tên sản phẩm</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Nhà sản xuất</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Hình ảnh</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Mô tả</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Tuổi sử dụng</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Cách dùng</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Thành phần</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Giá</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Trạng thái</th>
                <th class="py-3 px-4 text-left whitespace-nowrap">Danh mục</th>
                <th class="py-3 px-4 text-left whitespace-nowrap" width="80px">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($query)) {
                $i++;
            ?>
                <tr class="<?= $i % 2 == 0 ? 'bg-gray-100' : 'bg-white' ?> hover:bg-gray-200 transition duration-150">
                    <td class="py-2 px-4"><?= $i ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['masanpham']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['tensanpham']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['nhasanxuat']) ?></td>
                    <td class="py-2 px-4 text-center">
                        <img src="modules/quanlysanpham/uploads/<?= htmlentities($row['hinhanh']) ?>" width="100" alt="Hình ảnh sản phẩm" class="rounded-md shadow-sm">
                    </td>
                    <td class="py-2 px-4"><?= htmlentities($row['mota']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['tuoisudung']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['cachdung']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['thanhphan']) ?></td>
                    <td class="py-2 px-4 whitespace-nowrap"><?= htmlentities($row['gia']) ?> đ</td>
                    <td class="py-2 px-4"><?= $row['trangthai'] == 1 ? '<span class="text-green-500 font-bold">Kích hoạt</span>' : '<span class="text-red-500 font-bold">Ẩn</span>' ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['ten']) ?></td>
                    <td class="py-2">
                        <a href="?action=quanlysanpham&query=sua&id=<?= $row['id'] ?>" class="text-blue-500 hover:text-blue-700 font-semibold">Sửa</a> |
                        <a href="modules/quanlysanpham/xuly.php?id=<?= $row['id'] ?>" class="text-red-500 hover:text-red-700 font-semibold">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</form>