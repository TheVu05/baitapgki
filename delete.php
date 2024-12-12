<?php
include "connect.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM table_students WHERE id = '$id'";

  if (mysqli_query($conn, $sql)) {
    header('location: index.php');
  } else {
    echo "Không thể xóa sinh viên" . mysqli_error($conn);
  }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xóa sinh viên</title>
</head>

<body>

  <p>Đã xóa sinh viên</p>
  <a href="index.php">
    Quay lại danh sách sinh viên tổ</a>
  </div>
</body>

</html>