<?php
session_start();
// Nếu người dùng chưa đăng nhập thì chuyển hướng về trang login.php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Include file function.php
require 'function.php';

// Xử lý khi form được submit (tombol 'simpan' ditekan)
if (isset($_POST['simpan'])) {
    // Gọi hàm tambah và kiểm tra xem có thành công không
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Thêm dữ liệu học sinh thành công!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Thêm dữ liệu học sinh thất bại!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- CSS tùy chỉnh -->
    <link rel="stylesheet" href="css/style.css">

    <title>Thêm Dữ Liệu | PHP Native | CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP Native | CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Đăng Xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Đóng Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-person-plus-fill"></i>&nbsp;Thêm Dữ Liệu Học Sinh</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <input type="number" class="form-control w-50" id="id" placeholder="Nhập id" min="1" name="id" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control form-control-md w-50" id="name" placeholder="Nhập Tên" name="name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="hometown" class="form-label">Nơi Sinh</label>
                        <input type="text" class="form-control w-50" id="hometown" placeholder="Nhập Nơi Sinh" name="hometown" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control w-50" id="age" name="age" max="2006-01-01" required>
                    </div>
                    <div class="mb-3">
                        <label>Giới Tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="Laki - Laki" value="Nam">
                            <label class="form-check-label" for="Nam">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="Perempuan" value="Nữ">
                            <label class="form-check-label" for="Nữ">Nữ</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Ngành Học</label>
                        <select class="form-select w-50" id="major" name="major">
                            <option disabled selected value>------------------------------------Chọn Ngành Học--------------------------------------------</option>
                            <option value="Kỹ Thuật Mạng">Kỹ Thuật Mạng</option>
                            <option value="Kỹ Thuật Máy Tính và Mạng">Kỹ Thuật Máy Tính và Mạng</option>
                            <option value="Đa Phương Tiện">Đa Phương Tiện</option>
                            <option value="Kỹ Sư Phần Mềm">Kỹ Sư Phần Mềm</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control w-50" id="email" placeholder="Nhập E-Mail" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình Ảnh</label>
                        <input class="form-control form-control-sm w-50" id="image" name="image" type="file">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa Chỉ</label>
                        <textarea class="form-control w-50" id="address" rows="5" name="address" placeholder="Nhập Địa Chỉ" autocomplete="off" required></textarea>
                    </div>
                    <hr>
                    <a href="index.php" class="btn btn-secondary">Quay Lại</a>
                    <button type="submit" class="btn btn-primary" name="simpan">Lưu</button>
                </form>
            </div>
        </div>
    </div>
 
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
        
    </footer>
    <!-- Đóng Footer -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
