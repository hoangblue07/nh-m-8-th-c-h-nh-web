<div class="h-full bg-white md:h-full">
    <div class="grid md:grid-cols-2 items-center gap-8 h-full">
        <div class="max-md:order-1 p-4">
            <img src="https://readymadeui.com/signin-image.webp" class="lg:max-w-[85%] w-full h-full object-contain block mx-auto" alt="login-image" />
        </div>
        <div class="flex items-center md:p-8 p-6 bg-[#0C172C] h-full lg:w-11/12 lg:ml-auto">
            <form class="max-w-lg w-full mx-auto" method="POST">
                <div class="mb-12">
                    <h3 class="text-3xl font-bold text-yellow-400">Đăng ký</h3>
                </div>
                <?php
                if (isset($_POST['dangky'])) {
                    // Xử lý đăng ký
                    $tenkhachhang = $_POST['hoten'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $sodienthoai = $_POST['sodienthoai'] ?? '';
                    $diachi = $_POST['diachi'] ?? '';
                    $matkhau = $_POST['matkhau'] ?? '';
                    $kiemtramatkhau = $_POST['ktmk'] ?? '';

                    // Kiểm tra dữ liệu
                    $select_name = mysqli_query($connect, "SELECT * FROM dangky WHERE tenkhachhang = '$tenkhachhang'");
                    $select_email = mysqli_query($connect, "SELECT * FROM dangky WHERE email = '$email'");

                    if (mysqli_num_rows($select_name) > 0) {
                        echo '<p class="text-red-500">Tên người dùng đã tồn tại !!!</p>';
                    } elseif (mysqli_num_rows($select_email) > 0) {
                        echo '<p class="text-red-500">Email đã tồn tại !!!</p>';
                    } elseif (empty($tenkhachhang) || empty($email) || empty($sodienthoai) || empty($diachi) || empty($matkhau)) {
                        echo '<p class="text-red-500">Chưa nhập đủ thông tin !!!</p>';
                    } elseif ($matkhau !== $kiemtramatkhau) {
                        echo '<p class="text-red-500">Xác nhận mật khẩu sai !!!</p>';
                    } else {
                        $matkhau_md5 = md5($matkhau);
                        $sql = "INSERT INTO dangky (tenkhachhang, email, sodienthoai, diachi, matkhau) VALUES ('$tenkhachhang', '$email', '$sodienthoai', '$diachi', '$matkhau_md5')";
                        $query = mysqli_query($connect, $sql);
                        if ($query) {
                            $_SESSION['dangky'] = $tenkhachhang;
                            $_SESSION['id'] = mysqli_insert_id($connect);
                            echo '
                            <div class="bg-orange-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                                 <p class="font-bold">Success!</p>
                                <p>Đăng kí thành công.</p>
                            </div>
                            ';
                            echo '<script type="text/javascript">
                            setTimeout(function() {
                                window.location.href = "index.php?quanly=giohang";
                            }, 1500); // Chờ 2 giây trước khi chuyển hướng
                          </script>';                        }
                    }
                }
                ?>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Họ & tên</label>
                    <input name="hoten" type="text" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập họ & tên" />
                </div>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Email</label>
                    <input name="email" type="email" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập email" />
                </div>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Số điện thoại</label>
                    <input name="sodienthoai" type="text" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập số điện thoại" />
                </div>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Địa chỉ</label>
                    <input name="diachi" type="text" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập địa chỉ" />
                </div>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Mật khẩu</label>
                    <input name="matkhau" type="password" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập mật khẩu" />
                </div>
                <div class="mt-8">
                    <label class="text-white text-xs block mb-2">Nhập lại mật khẩu</label>
                    <input name="ktmk" type="password" required class="w-full bg-transparent text-sm text-white border-b border-gray-300 focus:border-yellow-400 px-2 py-3 outline-none" placeholder="Nhập lại mật khẩu" />
                </div>
                <div class="mt-12">
                    <button type="submit" name="dangky" class="w-full shadow-xl py-3 px-6 text-sm text-gray-800 font-semibold rounded-md bg-yellow-400 hover:bg-yellow-500 focus:outline-none">
                        Đăng ký
                    </button>
                    <p class="text-sm text-white mt-8">Đã có tài khoản? <a href="index.php?quanly=dangnhap" class="text-yellow-400 font-semibold hover:underline ml-1">Đăng nhập ở đây</a></p>
                </div>
            </form>
        </div>
    </div>
</div>