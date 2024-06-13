<?php
session_start();
// Nếu đã đăng nhập thì chuyển hướng đến index.php
if (isset($_SESSION['login'])) {
    header('location:index.php');
    exit;
}

// Gọi hoặc yêu cầu tệp function.php
require 'function.php';

// Nếu nút đăng nhập được nhấn
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    // Mã hóa password bằng md5

    // Lấy dữ liệu từ người dùng với username tương ứng
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    $cek = mysqli_num_rows($result);

    // Nếu $cek lớn hơn 0, đăng nhập thành công và chuyển hướng đến index.php
    if ($cek > 0) {
        $_SESSION['login'] = true;

        header('location:index.php');
        exit;
    }
    // Nếu $cek là 0 thì hiển thị lỗi
    $error = true;  
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/login.css">

    <title> CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"> CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng nhập</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 text-center login" style="background-image: url('img/bg/memphis-colorful.png');">
                <h4 class="fw-bold">Đăng nhập </></h4>
                <!-- Hiển thị thông báo lỗi nếu không thể đăng nhập -->
                <?php if (isset($error)) : ?>
                    <?php echo '<script>alert("Tên đăng nhập hoặc Mật khẩu không đúng!");</script>'; ?>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="form-group user">
                        <input type="text" class="form-control w-50" placeholder="Nhập Tên Đăng Nhập" name="username" autocomplete="off" required>
                    </div>
                    <div class="form-group my-5">
                        <input type="password" class="form-control w-50" placeholder="Nhập Mật Khẩu" name="password" autocomplete="off" required>
                    </div>
                    <p class="text-center mb-0"> Nếu bạn chưa có tài khoản --> <a  style="text-decoration: none;" href="register.php">đăng ký</a></p>
                    <button class="btn btn-primary text-uppercase" type="submit" name="login">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>
