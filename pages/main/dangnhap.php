<?php
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phone = $_POST['sodienthoai'];
    $sql = "select * from dangky where email='" . $email . "' and matkhau='" . $password . "' and sodienthoai='" . $phone . "' limit 1";
    $row = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['tenkhachhang'];
        $_SESSION['id'] = $row_data['id'];
        echo '
        <div class="bg-orange-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
             <p class="font-bold">Success!</p>
            <p>Đăng nhập thành công.</p>
        </div>
        ';
        echo '<script type="text/javascript">
        setTimeout(function() {
            window.location.href = "index.php";
        }, 1500); // Chờ 2 giây trước khi chuyển hướng
      </script>';
    } else {
        echo '<p style="color: red">Mật khẩu hoặc email sai !!!</p>';
    }
}
?>




<div class="font-sans">
    <div class="min-h-screen flex items-center justify-center py-6 px-4">
        <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-lg">
            <h3 class="text-gray-800 text-3xl font-extrabold text-center">Đăng nhập khách hàng</h3>
            <form action="" method="POST" autocomplete="off" class="space-y-4">
                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Email</label>
                    <input type="email" name="email" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg" placeholder="Nhập email" />
                </div>
                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Số điện thoại</label>
                    <input type="text" name="sodienthoai" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg" placeholder="Nhập số điện thoại" />
                </div>
                <div>
                    <label class="text-gray-800 text-sm mb-2 block">Mật khẩu</label>
                    <input type="password" name="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg" placeholder="Nhập mật khẩu" />
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                        <label for="remember-me" class="ml-2 block text-sm text-gray-800">Nhớ mật khẩu</label>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" name="dangnhap" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
                        Đăng nhập
                    </button>
                </div>
                <p class="text-sm text-center text-gray-800 mt-4">Bạn chưa có tài khoản? <a href="index.php?quanly=dangky" class="text-blue-600 font-semibold hover:underline">Đăng ký ngay</a></p>
            </form>
        </div>
    </div>
</div>