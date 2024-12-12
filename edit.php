<?php
include "connect.php";
if (isset($_GET['id']))
  $id = $_GET['id'];
$sql = "SELECT * FROM table_students WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['save'])) {
  $fullname = $_POST['fullname'] ?? $row['fullname'];
  $dob = $_POST['dob'] ?? $row['dob'];
  $gender = $_POST['gender'] ?? $row['gender'];
  $hometown = $_POST['hometown'] ?? $row['hometown'];
  $level = $_POST['level'] ?? $row['level'];
  $group = $_POST['group'] ?? $row['group'];

  $sql = "UPDATE table_students SET 
          fullname = '$fullname', 
          dob = '$dob', 
          gender = '$gender', 
          hometown = '$hometown', 
          level = '$level', 
          `group` = '$group' 
          WHERE id = $id";

  if (mysqli_query($conn, $sql)) {
    header('location: index.php');
  } else {
    echo "Lỗi cập nhật, vui lòng kiểm tra lạilại: " . mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cập nhật thông tin sinh viên</title>
</head>

<body>
  <div class="form-container">
    <h2>Cập nhật thông tin sinh viên</h2>
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname'] ?>">
      </div>
      <br>
      <div class="form-group">
        <label for="dob">Ngày/tháng/năm sinh:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $row['dob'] ?>">
      </div>
      <br>
      <div class="form-group">
        <label>Giới tính:</label>
        <label>
          <input type="radio" name="gender" value="Nam" <?php echo $row['gender'] == '1' ? 'checked' : '' ?> required>
          Nam
        </label>
        <label>
          <input type="radio" name="gender" value="Nữ" <?php echo $row['gender'] == '0' ? 'checked' : '' ?> required>
          Nữ
        </label>
      </div>
      <br>
      <div class="form-group">
        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" value="<?php echo $row['hometown'] ?>">
      </div>
      <br>
      <div class="form-group">
        <label for="level">Trình độ học vấn:</label>
        <select id="level" name="level">
          <option value="0" <?php echo $row['level'] == 0 ? 'selected' : ''; ?>>Tiến sĩ</option>
          <option value="1" <?php echo $row['level'] == 1 ? 'selected' : ''; ?>>Thạc sĩ</option>
          <option value="2" <?php echo $row['level'] == 2 ? 'selected' : ''; ?>>Kỹ sư</option>
          <option value="3" <?php echo $row['level'] == 3 ? 'selected' : ''; ?>>Khác</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="group">Nhóm:</label>
        <input type="number" id="group" name="group" value="<?php echo $row['group'] ?>">
      </div>
      <br>
      <div class="form-actions">
        <button type="submit" name="save">Lưu thông tin</button>
      </div>
    </form>
  </div>
</body>

</html>