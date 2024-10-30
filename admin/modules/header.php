<?php
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['login']);
    header("Location:login.php");
}
?>
<p class="admin-logout text-left">
    <a href="index.php?dangxuat=1" class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200">
        Đăng xuất: 
        <?php
        if (isset($_SESSION['login'])) {
            echo "<span class='ml-2 font-semibold'>" . htmlspecialchars($_SESSION['login']) . "</span>";
        }
        ?>
    </a>
</p>