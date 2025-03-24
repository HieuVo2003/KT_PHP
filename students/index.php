<?php
include '../config/database.php';
include '../controllers/SinhVienController.php';

$controller = new SinhVienController($conn);
$students = $controller->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h1>Danh Sách Sinh Viên</h1>
        <div style="text-align: right; margin-bottom: 20px;">
            <a href="create.php" class="btn-add">Thêm Sinh Viên</a>
        </div>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Hình</th>
                    <th>Mã SV</th>
                    <th>Họ Tên</th>
                    <th>Giới Tính</th>
                    <th>Ngày Sinh</th>
                    <th>Ngành</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><img src="<?php echo htmlspecialchars($student['Hinh']); ?>" alt="Hình Sinh Viên" class="table-image"></td>
                        <td><?php echo htmlspecialchars($student['MaSV']); ?></td>
                        <td><?php echo htmlspecialchars($student['HoTen']); ?></td>
                        <td><?php echo htmlspecialchars($student['GioiTinh']); ?></td>
                        <td><?php echo htmlspecialchars($student['NgaySinh']); ?></td>
                        <td><?php echo htmlspecialchars($student['TenNganh']); ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo htmlspecialchars($student['MaSV']); ?>">Chi Tiết</a> |
                            <a href="edit.php?id=<?php echo htmlspecialchars($student['MaSV']); ?>">Sửa</a> |
                            <a href="delete.php?id=<?php echo htmlspecialchars($student['MaSV']); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>