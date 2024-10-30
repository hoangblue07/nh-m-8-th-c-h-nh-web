<?php
    if(isset($_POST['doimatkhau'])){
        $email = $_POST['email'];
        $new_password = md5($_POST['password_new']);
        $old_password = md5($_POST['password_old']);
        $sql = "select * from dangky where email='".$email."' and matkhau='".$old_password."' limit 1";
        $row = mysqli_query($connect,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql2 = "update dangky set matkhau = '".$new_password."' where email = '".$email."'";
            $query2 = mysqli_query($connect,$sql2);
            echo '<p style="color: green">Mật khẩu đã được thay đổi !!!</p>';
        }else{
            echo '<p style="color: red">Mật khẩu cũ không đúng !!!</p>';
        }
    }
?>

<h3>Đổi mật khẩu</h3>
<form action="" method="POST" autocomlete="off">
    <table class="khachhanglogin" border="1" width="50%" style="border-collapse: collapse">
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" size="50">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu cũ</td>
            <td>
                <input type="password" name="password_old" size="50" style="width: 100%;padding: 8px;box-sizing: border-box;margin-bottom: 10px;">
            </td>
        </tr>
        <tr>
            <td>Mật khẩu mới</td>
            <td>
                <input type="password" name="password_new" size="50" style="width: 100%;padding: 8px;box-sizing: border-box;margin-bottom: 10px;">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="doimatkhau" value="Đổi mật khẩu">
            </td>
        </tr>
    </table>
</form>