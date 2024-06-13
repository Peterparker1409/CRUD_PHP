<?php
// Gọi hoặc yêu cầu tệp function.php
require 'function.php';

// Nếu nút dataSiswa được nhấn
if (isset($_POST['dataSiswa'])) {
    $output = '';

    // Lấy dữ liệu của học sinh từ id được chọn trong dataSiswa
    $sql = "SELECT * FROM siswa WHERE id = '" . $_POST['dataSiswa'] . "'";
    $result = mysqli_query($koneksi, $sql);

    $output .= '<div class="table-responsive">
                    <table class="table table-bordered">';
    foreach ($result as $row) {
        $output .= '<tr align="center">
                        <td colspan="2"><img src="img/' . $row['image'] . '" width="50%"></td>
                    </tr>
                    <tr>
                        <th width="40%">id</th>
                        <td width="60%">' . $row['id'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%">Tên</th>
                        <td width="60%">' . $row['name'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%">Nơi Sinh</th>
                        <td width="60%">' . $row['hometown'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%"> Ngày Sinh</th>
                        <td width="60%">' . date("d M Y", strtotime($row['age'])) . '</td>
                    </tr>
                    <tr>
                        <th width="40%">Giới Tính</th>
                        <td width="60%">' . $row['sex'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%">Chuyên Ngành</th>
                        <td width="60%">' . $row['major'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%">E-Mail</th>
                        <td width="60%">' . $row['email'] . '</td>
                    </tr>
                    <tr>
                        <th width="40%">Địa chỉ</th>
                        <td width="60%">' . $row['address'] . '</td>
                    </tr>
                    ';
    }
    $output .= '</table></div>';
    // Hiển thị $output
    echo $output;
}
?>
