<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../tailwind.config.js"></script>
    <title>Admin</title>
</head>

<body class="flex flex-col min-h-screen">
    <div class="flex-grow">
        <?php
        include("config/config.php");
        include("modules/dashboard.php");
        include("modules/menu.php");
        include("modules/main.php");
        ?>
    </div>
    <?php include("modules/footer.php"); ?>
</body>

</html>