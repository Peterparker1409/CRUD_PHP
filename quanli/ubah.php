<?php
session_start();
// Nếu chưa đăng nhập thì chuyển hướng về trang login.php
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Gọi file function.php
require 'function.php';

// Lấy thông tin từ URL (id)
$id = $_GET['id'];

// Lấy thông tin học sinh từ database dựa trên id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

// Xử lý khi form được submit (nút Ubah được nhấn)
if (isset($_POST['ubah'])) {
    // Gọi hàm ubah từ function.php để cập nhật thông tin học sinh
    if (ubah($_POST) > 0) {
        echo "<script>
                alert('Dữ liệu học sinh đã được cập nhật thành công!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('Dữ liệu học sinh không thể cập nhật!');
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
    <!-- Own CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Sửa thông tin | CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP | CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Close Navbar -->

    <!-- Container -->
    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="fw-bold text-uppercase"><i class="bi bi-pencil-square"></i>&nbsp;Sửa thông tin học sinh</h3>
            </div>
            <hr>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Input hidden để lưu tên ảnh cũ -->
                    <input type="hidden" name="imageLama" value="<?= $siswa['image']; ?>">
                    <div class="mb-3">
                        <label for="id" class="form-label">id</label>
                        <!-- Input id chỉ đọc (không thay đổi) -->
                        <input type="number" class="form-control w-50" id="id" value="<?= $siswa['id']; ?>" name="id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <!-- Input cho Tên -->
                        <input type="text" class="form-control w-50" id="name" value="<?= $siswa['name']; ?>" name="name" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="hometown" class="form-label">Nơi sinh</label>
                        <!-- Input cho Nơi sinh -->
                        <input type="text" class="form-control w-50" id="hometown" value="<?= $siswa['hometown']; ?>" name="hometown" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Ngày sinh</label>
                        <!-- Input cho Ngày sinh -->
                        <input type="date" class="form-control w-50" id="age" value="<?= $siswa['age']; ?>" name="age" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label>Giới tính</label>
                        <!-- Radio buttons cho Giới tính -->
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="Laki - Laki" value="Nam" <?php if ($siswa['sex'] == 'Nam') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Laki - Laki">Nam</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="Perempuan" value="Nữ" <?php if ($siswa['sex'] == 'Nữ') { ?> checked='' <?php } ?>>
                            <label class="form-check-label" for="Perempuan">Nữ</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Chuyên ngành</label>
                        <!-- Dropdown cho Chuyên ngành -->
                        <select class="form-select w-50" id="major" name="major">
                            <option disabled selected value>--------------------------------------------Chọn một chuyên ngành--------------------------------------------</option>
                            <option value="Kỹ thuật mạng truy cập" <?php if ($siswa['major'] == 'Kỹ thuật mạng truy cập') { ?> selected='' <?php } ?>>Kỹ thuật mạng truy cập</option>
                            <option value="Kỹ thuật máy tính và mạng" <?php if ($siswa['major'] == 'Kỹ thuật máy tính và mạng') { ?> selected='' <?php } ?>>Kỹ thuật máy tính và mạng</option>
                            <option value="Đa phương tiện" <?php if ($siswa['major'] == 'Đa phương tiện') { ?> selected='' <?php } ?>>Đa phương tiện</option>
                            <option value="Kỹ thuật phần mềm" <?php if ($siswa['major'] == 'Kỹ thuật phần mềm') { ?> selected='' <?php } ?>>Kỹ thuật phần mềm</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <!-- Input cho Email -->
                        <input type="email" class="form-control w-50" id="email" value="<?= $siswa['email']; ?>" name="email" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh <i>(Hiện tại)</i></label> <br>
                        <!-- Ảnh hiện tại -->
                        <img src="img/<?= $siswa['image']; ?>" width="50%" style="margin-bottom: 10px;">
                        <!-- Input để tải lên Ảnh mới -->
                        <input class="form-control form-control-sm w-50" id="image" name="image" type="file">

                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <!-- Textarea cho Địa chỉ -->
                        <textarea class="form-control w-50" id="address" rows="5" name="address" autocomplete="off"><?= $siswa['address']; ?></textarea>
                    </div>
                    <hr>
                    <!-- Nút Quay lại và Sửa -->
                    <a href="index.php" class="btn btn-secondary">Quay lại</a>
                    <button type="submit" class="btn btn-warning" name="ubah">Sửa</button>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center" style="padding: 5px;">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>