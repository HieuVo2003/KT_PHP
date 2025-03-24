<?php
include '../config/database.php';
include '../controllers/SinhVienController.php';

if (!isset($_GET['id'])) {
    die('Không có mã sinh viên được cung cấp.');
}

$controller = new SinhVienController($conn);
$student = $controller->detail($_GET['id']);


$defaultImage = '/uploads/default.jpg';
$studentImage = !empty($student['Hinh']) ? htmlspecialchars($student['Hinh']) : $defaultImage;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sinh Viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Chi Tiết Sinh Viên</h1>
        <div class="student-detail">
            <img src="<?php echo $studentImage; ?>" alt="Hình Sinh Viên" class="student-image">
            <p><strong>Mã Sinh Viên:</strong> <?php echo htmlspecialchars($student['MaSV']); ?></p>
            <p><strong>Họ Tên:</strong> <?php echo htmlspecialchars($student['HoTen']); ?></p>
            <p><strong>Giới Tính:</strong> <?php echo htmlspecialchars($student['GioiTinh']); ?></p>
            <p><strong>Ngày Sinh:</strong> <?php echo htmlspecialchars($student['NgaySinh']); ?></p>
            <p><strong>Ngành:</strong> <?php echo htmlspecialchars($student['TenNganh']); ?></p>
        </div>
        <a href="index.php" class="btn-back">Quay Lại</a>
    </div>
</body>
</html>