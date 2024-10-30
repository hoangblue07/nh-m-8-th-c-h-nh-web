<?php
$sql = "SELECT * FROM lienhe";
$query = mysqli_query($connect, $sql);
?>

<p class="text-2xl font-bold mb-6 text-center text-blue-600">Liên hệ của khách hàng</p>
<form action="modules/quanlydanhmuc/xuly.php" method="POST" class="bg-white p-6 shadow-md rounded-lg">
    <table class="min-w-full border-collapse">
        <thead>
            <tr class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Họ tên</th>
                <th class="py-3 px-4">Email</th>
                <th class="py-3 px-4">Số điện thoại</th>
                <th class="py-3 px-4">Nội dung</th>
                <th class="py-3 px-4">Chức năng</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {
            $i++;
        ?>
            <tr class="<?= $i % 2 == 0 ? 'bg-gray-100' : 'bg-white' ?> hover:bg-gray-200 transition duration-150 text-center">
                <td class="py-2 px-4"><?= $i ?></td>
                <td class="py-2 px-4"><?= htmlentities($row['hoten']) ?></td>
                <td class="py-2 px-4"><?= htmlentities($row['email']) ?></td>
                <td class="py-2 px-4"><?= htmlentities($row['sodienthoai']) ?></td>
                <td class="py-2 px-4"><?= htmlentities($row['noidung']) ?></td>
                <td class="py-2 px-4">
                    <a href="modules/quanlylienhe/xuly.php?id=<?php echo $row['id'] ?>" class="text-red-500 hover:text-red-700 font-semibold">Xóa</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</form>