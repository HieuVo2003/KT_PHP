<?php
include '../config/database.php';
include '../controllers/SinhVienController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new SinhVienController($conn);
    $controller->create($_POST, $_FILES);
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Thêm Sinh Viên</h1>
        <form action="create.php" method="POST" enctype="multipart/form-data">
            <label for="MaSV">Mã Sinh Viên:</label>
            <input type="text" id="MaSV" name="MaSV" required>

            <label for="HoTen">Họ Tên:</label>
            <input type="text" id="HoTen" name="HoTen" required>

            <label for="GioiTinh">Giới Tính:</label>
            <select id="GioiTinh" name="GioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>

            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" id="NgaySinh" name="NgaySinh" required>

            <label for="MaNganh">Mã Ngành:</label>
            <input type="text" id="MaNganh" name="MaNganh" required>

            <label for="Hinh">Hình Ảnh:</label>
            <input type="file" id="Hinh" name="Hinh" required>

            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>