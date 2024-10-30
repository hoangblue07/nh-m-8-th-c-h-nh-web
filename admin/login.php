<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body>
    <section class="bg-gray-100 min-h-screen flex box-border justify-center items-center">
        <div class="bg-[#dfa674] rounded-2xl flex max-w-3xl p-5 items-center">
            <div class="md:w-1/2 px-8">
                <h2 class="font-bold text-3xl text-[#002D74]">Login Admin</h2>
                <form action="" method="post" class="flex flex-col gap-4">
                    <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username" required>
                    <div class="relative">
                        <input class="p-2 rounded-xl border w-full" type="password" name="password" id="password" placeholder="Password" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="togglePassword"
                            class="bi bi-eye-slash-fill absolute top-1/2 right-3 -z-1 -translate-y-1/2 cursor-pointer"
                            viewBox="0 0 16 16" onclick="togglePassword()">
                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"></path>
                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"></path>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" id="mama"
                            class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer z-20 opacity-100 hidden"
                            viewBox="0 0 16 16" onclick="togglePassword()">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                        </svg>
                        
                    </div>
                    <?php
                    session_start();
                    include("config/config.php");
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1";
                        $row = mysqli_query($connect, $sql);
                        $count = mysqli_num_rows($row);
                        if ($count > 0) {
                            $_SESSION['login'] = $username;
                            header("Location:index.php");
                            exit();
                        } else {
                            echo '<p style="color: red">Mật khẩu hoặc Tài khoản sai !!!</p>';
                        }
                    }
                    ?>
                    <button name="login" class="bg-[#002D74] text-white py-2 rounded-xl hover:scale-105 duration-300 hover:bg-[#206ab1] font-medium" type="submit">Login</button>
                </form>
            </div>
            <div class="md:block hidden w-1/2">
                <img class="rounded-2xl max-h-[1600px]" src="https://images.unsplash.com/photo-1552010099-5dc86fcfaa38?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHwxfHxmcmVzaHxlbnwwfDF8fHwxNzEyMTU4MDk0fDA&ixlib=rb-4.0.3&q=80&w=1080" alt="login form image">
            </div>
        </div>
    </section>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeSlashIcon = document.getElementById('togglePassword');
            const eyesIcon = document.getElementById('mama');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeSlashIcon.classList.add('hidden');
                eyesIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeSlashIcon.classList.remove('hidden');
                eyesIcon.classList.add('hidden');
            }
        }
    </script>
</body>

</html>