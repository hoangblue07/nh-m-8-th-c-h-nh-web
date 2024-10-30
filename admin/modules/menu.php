<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <style>
        .active {
            background-color: #4B5563; /* Màu nền cho mục đã chọn */
            color: white; /* Màu chữ cho mục đã chọn */
            font-weight: bold; /* Đậm chữ cho mục đã chọn */
        }
    </style>
    
</head>

<body class="bg-gray-100">

    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <div class="flex space-x-4">
                    <a href="index.php?action=quanlydanhmucsanpham&query=them&active=category" class="menu-item rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white <?= (isset($_GET['active']) && $_GET['active'] == 'category') ? 'active' : '' ?>">Quản lý danh mục sản phẩm</a>
                    <a href="index.php?action=quanlysanpham&query=them&active=product" class="menu-item rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white <?= (isset($_GET['active']) && $_GET['active'] == 'product') ? 'active' : '' ?>">Quản lý sản phẩm</a>
                    <a href="index.php?action=quanlydonhang&query=lietke&active=order" class="menu-item rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white <?= (isset($_GET['active']) && $_GET['active'] == 'order') ? 'active' : '' ?>">Quản lý đơn hàng</a>
                    <a href="index.php?action=quanlylienhe&query=lietke&active=contact" class="menu-item rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white <?= (isset($_GET['active']) && $_GET['active'] == 'contact') ? 'active' : '' ?>">Quản lý liên hệ</a>
                </div>
                <div>
                    <?php include("modules/header.php"); ?>
                </div>
            </div>
        </div>
    </nav>

</body>

</html>