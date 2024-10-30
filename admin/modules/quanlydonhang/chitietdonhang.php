<h3 class="text-2xl font-bold mb-6 text-center text-blue-600">Chi tiết đơn hàng</h3>
<?php
$code = $_GET['code'];
$sql = "SELECT * FROM donhang, sanpham WHERE donhang.idsanpham = sanpham.id AND donhang.madonhang = '" . mysqli_real_escape_string($connect, $code) . "' ORDER BY donhang.id DESC";
$query = mysqli_query($connect, $sql);
?>
<div class="overflow-x-auto">
    <form action="modules/quanlydanhmuc/xuly.php" method="POST" class="bg-white shadow-md rounded-lg">
        <table class="min-w-full border-collapse">
            <thead>
                <tr class="bg-gradient-to-r from-blue-500 to-purple-500 text-white">
                    <th class="py-3 px-4">ID</th>
                    <th class="py-3 px-4">Mã đơn hàng</th>
                    <th class="py-3 px-4">Tên sản phẩm</th>
                    <th class="py-3 px-4">Số lượng</th>
                    <th class="py-3 px-4">Đơn giá</th>
                    <th class="py-3 px-4">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            $tongtien = 0;
            while ($row = mysqli_fetch_array($query)) {
                $i++;
                $thanhtien = $row['gia'] * $row['soluongsp'];
                $tongtien += $thanhtien;
            ?>
                <tr class="<?= $i % 2 == 0 ? 'bg-gray-100' : 'bg-white' ?> hover:bg-gray-200 transition duration-150 text-center">
                    <td class="py-2 px-4"><?= $i ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['madonhang']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['tensanpham']) ?></td>
                    <td class="py-2 px-4"><?= htmlentities($row['soluongsp']) ?></td>
                    <td class="py-2 px-4"><?= number_format($row['gia'], 0, ',', '.') . ' VNĐ' ?></td>
                    <td class="py-2 px-4"><?= number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="6" class="text-right py-3 px-4 font-bold">
                    <p>Tổng tiền: <?= number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></p>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>