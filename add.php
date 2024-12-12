<?php
include "connect.php";
if (isset($_POST['add'])) {
  $fullname = $_POST['fullname'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];  // Đảm bảo nhận giá trị từ radio button
  $hometown = $_POST['hometown'];
  $level = $_POST['level'];
  $group = $_POST['group'];

  $sql = "INSERT INTO table_students(fullname, dob, gender, hometown, level, `group`)
          VALUES('$fullname', '$dob', '$gender', '$hometown', '$level', '$group')";

  mysqli_query($conn, $sql);
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sinh viên</title>
</head>

<body>
  <div class="form-container">
    <h1>Thêm sinh viên</h1>
    <form method="post">
      <div class="form-group">
        <label for="fullname">Họ và tên:</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>
      <br>
      <div class="form-group">
        <label for="dob">Ngày/tháng/năm sinh:</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      <br>
      <div class="form-group">
        <label>Giới tính:</label>
        <label>
          <input type="radio" name="gender" value="Nam" required>
          Nam
        </label>
        <label>
          <input type="radio" name="gender" value="Nữ" required>
          Nữ
        </label>
      </div>
      <br>
      <div class="form-group">
        <label for="hometown">Quê quán:</label>
        <input type="text" id="hometown" name="hometown" required>
      </div>
      <br>
      <div class="form-group">
        <label for="level">Trình độ học vấn:</label>
        <select id="level" name="level" required>
          <option value="0">Tiến sĩ</option>
          <option value="1">Thạc sĩ</option>
          <option value="2">Kỹ sư</option>
          <option value="3">Khác</option>
        </select>
      </div>
      <br>
      <div class="form-group">
        <label for="group">Nhóm:</label>
        <input type="number" id="group" name="group" required>
      </div>
      <br>
      <div class="form-actions">
        <button type="submit" name="add">Thêm sinh viên</button>
      </div>
    </form>
  </div>

</body>

</html>