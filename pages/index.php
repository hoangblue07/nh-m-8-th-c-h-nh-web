<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán thực phẩm chức năng</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.2/flowbite.js" integrity="sha512-LThUFuq6Y8DTeSxG7VgJQu+3slKAhZ1u3z1EJdZESaVuQIEJ7TXC/DV8xNNEDFW01iWF4tUuzeC4RdiyrRPdRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <?php
        session_start();
        include("../admin/config/config.php");
        include("menu.php");
        include("carousel.php");
        include("main.php");
        include("footer.php");
        ?>
    </div>
</body>

</html>