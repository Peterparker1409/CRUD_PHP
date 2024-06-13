<?php
session_start();
// // Nếu không đăng nhập thì quay về trang login.php
// Nếu truy cập trang này qua URL, chuyển hướng đến trang login
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}
// Gọi hoặc yêu cầu tệp function.php
require 'function.php';

// Lấy dữ liệu từ id bằng hàm GET
$nis = $_GET['id'];

// Nếu hàm xóa nhiều hơn 0 / dữ liệu đã bị xóa, hiển thị cảnh báo dưới đây
if (hapus($nis) > 0) {
    echo "<script>
                alert('Dữ liệu học sinh đã được xóa thành công!');
                document.location.href = 'index.php';
            </script>";
} else {
    // Nếu hàm xóa ít hơn 0 / dữ liệu không bị xóa, hiển thị cảnh báo dưới đây
    echo "<script>
            alert('Dữ liệu học sinh không thể xóa!');
        </script>";
}
?>
