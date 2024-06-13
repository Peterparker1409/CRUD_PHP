<?php
session_start();
// Nếu không đăng nhập thì quay về trang login.php
// Nếu truy cập trang này qua URL thì chuyển hướng đến trang đăng nhập
if (!isset($_SESSION['login'])) {
    header('location:login.php');
    exit;
}

// Gọi hoặc bao gồm tập tin function.php
require 'function.php';

// Lấy tất cả dữ liệu từ bảng siswa sắp xếp theo id giảm dần
$siswa = query("SELECT * FROM siswa ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
   
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   
    <link rel="stylesheet" href="css/style.css">

    <title>PHP/ CRUD</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase">
        <div class="container">
            <a class="navbar-brand" href="index.php">PHP / CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Kết thúc Navbar -->

    <div class="container">
        <div class="row my-2">
            <div class="col-md">
                <h3 class="text-center fw-bold text-uppercase">Danh sách sinh viên</h3>
                <hr>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-md">
                <a href="addData.php" class="btn btn-primary"><i class="bi bi-person-plus-fill"></i>&nbsp;Thêm dữ liệu</a>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md">
                <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Giới tính</th>
                            <th>Độ tuổi</th>
                            <th>Chuyên ngành</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['sex']; ?></td>
                                <?php
                                $now = time();
                                $timeTahun = strtotime($row['age']);
                                $setahun = 31536000;
                                $hitung = ($now - $timeTahun) / $setahun;
                                ?>
                                <td><?= floor($hitung); ?> Tuổi</td>
                                <td><?= $row['major']; ?></td>
                                <td>
                                    <button class="btn btn-success btn-sm text-white detail" data-id="<?= $row['id']; ?>" style="font-weight: 600;"><i class="bi bi-info-circle-fill"></i>&nbsp;Chi tiết</button> |

                                    <a href="ubah.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm" style="font-weight: 600;"><i class="bi bi-pencil-square"></i>&nbsp;Sửa</a> |

                                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" style="font-weight: 600;" onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu của <?= $row['name']; ?> ?');"><i class="bi bi-trash-fill"></i>&nbsp;Xóa</a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Kết thúc Container -->

    <!-- Modal Chi tiết Dữ liệu -->
    <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="detail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-uppercase" id="detail">Chi tiết Dữ liệu Sinh viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="detail-siswa">
                </div>
            </div>
        </div>
    </div>
    <!-- Kết thúc Modal Chi tiết Dữ liệu -->

    <!-- Footer -->
    <!-- <div class="container-fluid">
        <div class="row bg-dark text-white">
            <div class="col-md-6 my-2" id="about">
                <h4 class="fw-bold text-uppercase">Giới thiệu</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae dolore sed porro modi mollitia quaerat? Nam, error fugit sed, maiores illum architecto, officiis voluptate nesciunt voluptatibus aut reprehenderit perspiciatis doloremque!</p>
            </div>
            <div class="col-md-6 my-2 text-center link">
                <h4 class="fw-bold text-uppercase">Liên kết tài khoản</h4>
                <a href="https://web.facebook.com/vikry.surya.5/" target="_blank"><i class="bi bi-facebook fs-3"></i></a>
                <a href="https://github.com/vikrysurya24" target="_blank"><i class="bi bi-github fs-3"></i></a>
                <a href="https://www.instagram.com/vikrysurya_/" target="_blank"><i class="bi bi-instagram fs-3"></i></a>
                <a href="https://twitter.com/vikrysurya_" target="_blank"><i class="bi bi-twitter fs-3"></i></a>
            </div>
        </div>
    </div> -->
    <footer class="bg-dark text-white text-center" style="padding: 5px;">
    </footer>
    <!-- Kết thúc Footer -->
    <!-- Close Footer -->

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Data Tables -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#data').DataTable();
        // var_dump($data);
        
        // Xử lý sự kiện khi click vào nút Chi tiết
        $('.detail').click(function() {
            var dataSiswa = $(this).attr("data-id");
            $.ajax({
                url: "detail.php",
                method: "post",
                data: {
                    dataSiswa,
                    dataSiswa
                },
                success: function(data) {
                    $('#detail-siswa').html(data);
                    $('#detail').modal("show");
                }
            });
        });
    });
</script>
</body>

</html>

</body>

</html>