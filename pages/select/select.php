<div class="flex items-center m-5">
    <select onchange="location = this.value;" class="border-none outline-none p-2">
        <option value="">Chọn hãng sản xuất</option>
        <?php
            $sql = "SELECT * FROM danhmuc ORDER BY iddanhmuc DESC";
            $query = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_array($query)) {
        ?>
        <option value="index.php?quanly=danhmucsanpham&id=<?php echo $row['iddanhmuc'] ?>">
            <?php echo $row['ten'] ?>
        </option>
        <?php } ?>
    </select>
</div>