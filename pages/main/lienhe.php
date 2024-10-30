<h3 class="text-3xl font-bold text-center mb-6">Liên hệ</h3>

<?php
if (isset($_POST['gui'])) {
    $tenkhachhang = $_POST['hoten'];
    $email = $_POST['email'];
    $sodienthoai = $_POST['sodienthoai'];
    $noidung = $_POST['message'];

    if ($tenkhachhang == "" || $email == "" || $sodienthoai == "" || $noidung == "") {
        echo '<p class="text-red-500 text-center">Chưa nhập đủ thông tin !!!</p>';
    } else {
        $sql = "INSERT INTO lienhe(hoten, email, sodienthoai, noidung) VALUES ('$tenkhachhang', '$email', '$sodienthoai', '$noidung')";
        $query = mysqli_query($connect, $sql);

        if ($query) {
            echo '<p class="text-green-500 text-center">Gửi thành công !!!</p>';
        } else {
            echo '<p class="text-red-500 text-center">Gửi thất bại !!!</p>';
        }
    }
}
?>

<div class="min-h-screen py-6 px-4">
    <div class="border border-gray-300 rounded-lg p-6 shadow-lg bg-white">
        <form action="" method="POST" autocomplete="off" class="space-y-4">
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Họ & tên</label>
                <input type="text" name="hoten" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nhập họ tên" />
            </div>
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Số điện thoại</label>
                <input type="text" name="sodienthoai" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nhập số điện thoại" />
            </div>
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Email</label>
                <input type="email" name="email" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nhập email" />
            </div>
            <div>
                <label class="text-gray-800 text-sm mb-2 block">Nội dung</label>
                <textarea name="message" rows="6" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Nhập nội dung..."></textarea>
            </div>
            <div>
                <button type="submit" name="gui" class="w-full py-3 px-4 text-sm font-semibold rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none transition duration-200 ease-in-out">
                    Gửi
                </button>
            </div>
        </form>
    </div>
</div>