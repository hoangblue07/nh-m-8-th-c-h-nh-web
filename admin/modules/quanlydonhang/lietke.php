<p class="text-2xl font-bold mb-6 text-center text-blue-600">Đơn hàng</p>
<?php
$sql = "SELECT * FROM giohang, dangky WHERE giohang.idkhachhang = dangky.id ORDER BY giohang.id DESC";
$query = mysqli_query($connect, $sql);
?>
<div class="overflow-x-auto">
    <form action="modules/quanlydanhmuc/xuly.php" method="POST" class="bg-white shadow-md rounded-lg">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Mã giỏ hàng</th>
                    <th class="py-3 px-4">ID khách hàng</th>
                    <th class="py-3 px-4">Tên khách hàng</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Số điện thoại</th>
                    <th class="py-3 px-4">Tình trạng</th>
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
                    <td class="py-2 px-4"><?= htmlentities($row['madonhang']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['idkhachhang']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['tenkhachhang']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['email']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['sodienthoai']) ?></td>
                    <td class="py-2 px-4">
                        <?php
                        if ($row['trangthai'] == 1) {
                            echo '<a href="modules/quanlydonhang/xuly.php?code=' . $row['madonhang'] . '" class="text-blue-500 hover:text-blue-700">Đơn hàng mới</a>';
                        } else {
                            echo 'Đã thanh toán';
                        }
                        ?>
                    </td>
                    <td class="py-2 px-4">
                        <a href="?action=donhang&query=xemdonhang&code=<?= $row['madonhang'] ?>" class="text-blue-500 hover:text-blue-700">Xem đơn hàng</a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</div>