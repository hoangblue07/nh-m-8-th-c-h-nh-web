<?php
include('../../config/config.php');

// Lấy dữ liệu từ POST và FILES
$masanpham = isset($_POST['masanpham']) ? $_POST['masanpham'] : '';
$tensanpham = isset($_POST['tensanpham']) ? $_POST['tensanpham'] : '';
$nhasanxuat = isset($_POST['nhasanxuat']) ? $_POST['nhasanxuat'] : '';
$hinhanh = isset($_FILES['hinhanh']['name']) ? $_FILES['hinhanh']['name'] : '';
$hinhanh_tmp = isset($_FILES['hinhanh']['tmp_name']) ? $_FILES['hinhanh']['tmp_name'] : '';
$hinhanh = time() . '_' . $hinhanh;
$mota = isset($_POST['mota']) ? $_POST['mota'] : '';
$tuoisudung = isset($_POST['tuoisudung']) ? (int)$_POST['tuoisudung'] : 0; // Chuyển đổi sang kiểu INT
$cachdung = isset($_POST['cachdung']) ? $_POST['cachdung'] : '';
$thanhphan = isset($_POST['thanhphan']) ? $_POST['thanhphan'] : '';
$gia = isset($_POST['gia']) ? $_POST['gia'] : '';
$trangthai = isset($_POST['trangthai']) ? $_POST['trangthai'] : '';
$danhmuc = isset($_POST['danhmuc']) ? $_POST['danhmuc'] : '';

if (isset($_POST['themsanpham'])) {
    // Kiểm tra danh mục
    $sql_check_danhmuc = "SELECT * FROM danhmuc WHERE iddanhmuc = '$danhmuc'";
    $query_check_danhmuc = mysqli_query($connect, $sql_check_danhmuc);

    if (mysqli_num_rows($query_check_danhmuc) == 0) {
        echo "Danh mục không tồn tại.";
    } else {
        // Câu lệnh INSERT
        $sql_them = "INSERT INTO sanpham (masanpham, tensanpham, nhasanxuat, hinhanh, mota, tuoisudung, cachdung, thanhphan, gia, trangthai, iddanhmuc) 
        VALUES (
            '$masanpham', '$tensanpham', '$nhasanxuat', '$hinhanh', '$mota', $tuoisudung, '$cachdung', '$thanhphan', '$gia', '$trangthai', '$danhmuc'
        )";

        if (mysqli_query($connect, $sql_them)) {
            move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
            header('Location: ../../index.php?action=quanlysanpham&query=them');
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
} elseif (isset($_POST['suasanpham'])) {
    $id = $_GET['id'];

    // Kiểm tra danh mục
    $sql_check_danhmuc = "SELECT * FROM danhmuc WHERE iddanhmuc = '$danhmuc'";
    $query_check_danhmuc = mysqli_query($connect, $sql_check_danhmuc);

    if (mysqli_num_rows($query_check_danhmuc) == 0) {
        echo "Danh mục không tồn tại.";
    } else {
        $sql_del_img = "SELECT * FROM sanpham WHERE id = '$id' LIMIT 1";
        $query = mysqli_query($connect, $sql_del_img);
        $row = mysqli_fetch_array($query);

        // Kiểm tra xem có hình ảnh mới được tải lên không
        if (!empty($hinhanh_tmp)) {
            // Nếu có hình ảnh mới, di chuyển và cập nhật
            move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh);
            $hinhanh_update = ", hinhanh = '$hinhanh'";
        } else {
            // Nếu không có hình ảnh mới, giữ hình ảnh ban đầu
            $hinhanh_update = "";
        }

        // Câu lệnh UPDATE
        $sql_sua = "UPDATE sanpham SET 
                masanpham = '$masanpham', 
                tensanpham = '$tensanpham',
                nhasanxuat = '$nhasanxuat'" .
            $hinhanh_update . // Thêm phần cập nhật hình ảnh (nếu có)
            ", mota = '$mota', 
                tuoisudung = $tuoisudung, 
                cachdung = '$cachdung', 
                thanhphan = '$thanhphan', 
                gia = '$gia',
                trangthai = '$trangthai', 
                iddanhmuc = '$danhmuc' 
                WHERE id = '$id'";

        if (mysqli_query($connect, $sql_sua)) {
            // Nếu có hình ảnh mới, xóa hình ảnh cũ
            if (!empty($hinhanh_tmp) && file_exists('uploads/' . $row['hinhanh'])) {
                unlink('uploads/' . $row['hinhanh']);
            }
            header('Location: ../../index.php?action=quanlysanpham&query=them');
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    }
} else {
    $id = $_GET['id'];
    // Kiểm tra xem sản phẩm có tồn tại không
    $sql_del_img = "SELECT * FROM sanpham WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($connect, $sql_del_img);
    $row = mysqli_fetch_array($query);

    if ($row) {
        if (file_exists('uploads/' . $row['hinhanh'])) {
            unlink('uploads/' . $row['hinhanh']);
        }

        // Câu lệnh DELETE
        $sql_xoa = "DELETE FROM sanpham WHERE id = '$id'";
        if (mysqli_query($connect, $sql_xoa)) {
            header('Location: ../../index.php?action=quanlysanpham&query=them');
        } else {
            echo "Error: " . mysqli_error($connect);
        }
    } else {
        echo "Sản phẩm không tồn tại.";
    }
}
