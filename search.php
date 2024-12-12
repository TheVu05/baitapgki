<?php
include "connect.php";
$search = isset($_GET['search']) ? $_GET['search'] : '';
if ($search != '') {
  $search = strtolower($search);
  $search = mysqli_real_escape_string($conn, $search);
}
$sql = "SELECT * FROM table_students WHERE LOWER(fullname) LIKE '%$search%' OR LOWER(hometown) LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kết quả tìm kiếm</title>
  <link rel="stylesheet" href="style_search.css">
</head>

<body>
  <div class="search-results-container">
    <h1>Kết quả tìm kiếm</h1>
    <p class="search-keyword">Từ khóa: <b><i><?php echo "$search"; ?></i></b></p>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <table class="results-table">
        <thead>
          <tr>
            <th>STT</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Trình độ</th>
            <th>Nhóm</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['fullname']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['gender'] == 1 ? 'Nam' : 'Nữ'; ?></td>
              <td><?php echo $row['hometown']; ?></td>
              <td><?php
                  echo $row['level'] == 0 ? 'Tiến sĩ' : ($row['level'] == 1 ? 'Thạc sĩ' : ($row['level'] == 2 ? 'Kỹ sư' : 'Khác'));
                  ?></td>
              <td><?php echo 'Nhóm ' . $row['group']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="no-results">Không tìm thấy kết quả phù hợp cho từ khóa <i><b><?php echo "$search"; ?></b></i>.</p>
    <?php endif; ?>
    <br>
    <div class="Quay lại">
      <a href="index.php" class="btn-back">Quay lại danh sách</a>
    </div>
  </div>
</body>

</html>