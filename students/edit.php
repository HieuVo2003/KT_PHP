<?php
include '../config/database.php';
include '../controllers/SinhVienController.php';
include '../controllers/NganhController.php';

if (!isset($_GET['id'])) {
    die('Không có mã sinh viên được cung cấp.');
}

$controller = new SinhVienController($conn);
$nganhController = new NganhController($conn);

$student = $controller->detail($_GET['id']);
$nganhs = $nganhController->index(); // Lấy danh sách ngành học
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sinh Viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Cập Nhật Sinh Viên</h1>
        <form action="edit.php?id=<?php echo htmlspecialchars($student['MaSV']); ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="MaSV" value="<?php echo htmlspecialchars($student['MaSV']); ?>">

            <label for="HoTen">Họ Tên:</label>
            <input type="text" id="HoTen" name="HoTen" value="<?php echo htmlspecialchars($student['HoTen']); ?>" required>

            <label for="GioiTinh">Giới Tính:</label>
            <select id="GioiTinh" name="GioiTinh" required>
                <option value="Nam" <?php echo ($student['GioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                <option value="Nữ" <?php echo ($student['GioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
            </select>

            <label for="NgaySinh">Ngày Sinh:</label>
            <input type="date" id="NgaySinh" name="NgaySinh" value="<?php echo htmlspecialchars($student['NgaySinh']); ?>" required>

                        <label for="MaNganh">Ngành:</label>
            <select id="MaNganh" name="MaNganh" required>
                <?php foreach ($nganhs as $nganh): ?>
                    <option value="<?php echo htmlspecialchars($nganh['MaNganh']); ?>" 
                        <?php echo (($student['MaNganh'] ?? '') == $nganh['MaNganh']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($nganh['TenNganh']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="Hinh">Hình Ảnh:</label>
            <input type="file" id="Hinh" name="Hinh">

            <button type="submit">Cập Nhật</button>
        </form>
    </div>
</body>
</html> 