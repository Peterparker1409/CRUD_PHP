<?php
// Kết nối CSDL
$koneksi = mysqli_connect("localhost", "root", "", "phpdasar");

// Hàm truy vấn dữ liệu thành mảng
function query($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// Hàm thêm dữ liệu
function tambah($data)
{
    global $koneksi;

    $id = htmlspecialchars($data['id']);
    $name = htmlspecialchars($data['name']);
    $hometown = htmlspecialchars($data['hometown']);
    $age = $data['age'];
    $sex = $data['sex'];
    $major = $data['major'];
    $email = htmlspecialchars($data['email']);
    $image = upload();
    $address = htmlspecialchars($data['address']);

    if (!$image) {
        return false;
    }

    $sql = "INSERT INTO siswa VALUES ('$id','$name','$hometown','$age','$sex','$major','$email','$image','$address')";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Hàm xóa dữ liệu
function hapus($id)
{
    global $koneksi;

    mysqli_query($koneksi, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

// Hàm sửa dữ liệu
function ubah($data)
{
    global $koneksi;

    $id = $data['id'];
    $name = htmlspecialchars($data['name']);
    $hometown = htmlspecialchars($data['hometown']);
    $age = $data['age'];
    $sex = $data['sex'];
    $major = $data['major'];
    $email = htmlspecialchars($data['email']);
    $address = htmlspecialchars($data['address']);

    $imageLama = $data['imageLama'];

    if ($_FILES['image']['error'] === 4) {
        $image = $imageLama;
    } else {
        $image = upload();
    }

    $sql = "UPDATE siswa SET name = '$name', hometown = '$hometown', age = '$age', sex = '$sex', major = '$major', email = '$email', image = '$image', address = '$address' WHERE id = $id";

    mysqli_query($koneksi, $sql);

    return mysqli_affected_rows($koneksi);
}

// Hàm upload ảnh
function upload()
{
    $nameFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo "<script>alert('Vui lòng chọn file ảnh!');</script>";
        return false;
    }

    $extValid = ['jpg', 'jpeg', 'png'];
    $ext = explode('.', $nameFile);
    $ext = strtolower(end($ext));

    if (!in_array($ext, $extValid)) {
        echo "<script>alert('File bạn tải lên không phải là file ảnh!');</script>";
        return false;
    }

    if ($ukuranFile > 3000000) {
        echo "<script>alert('Kích thước file ảnh của bạn quá lớn!');</script>";
        return false;
    }

    $nameFileBaru = uniqid();
    $nameFileBaru .= '.';
    $nameFileBaru .= $ext;

    move_uploaded_file($tmpName, 'img/' . $nameFileBaru);

    return $nameFileBaru;
}
?>
