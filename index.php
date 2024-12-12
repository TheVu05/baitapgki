<?php
include "connect.php";

$sql = "SELECT * FROM table_students";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách sinh viên</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h2>Danh sách sinh viên tổ</h2>

    <form action="search.php" method="get" class="search">
      <input type="text" id="search" name="search" placeholder="Nhập từ khóa" required>
      <button type="submit" name="find">Tìm kiếm</button>
    </form>

    <table class="student-table">
      <thead>
        <tr>
          <th>STT</th>
          <th>Họ và tên</th>
          <th>Ngày/tháng/năm sinh</th>
          <th>Giới tính</th>
          <th>Quê quán</th>
          <th>Trình độ học vấn</th>
          <th>Nhóm</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['fullname']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td> <?php
                    if ($row['gender'] == 1) {
                      echo 'Nam';
                    } else {
                      echo 'Nữ';
                    }
                    ?>
              </td>
              <td><?php echo $row['hometown']; ?></td>
              <td>
                <?php
                switch ($row['level']) {
                  case '0':
                    echo 'Tiến sĩ';
                    break;
                  case '1':
                    echo 'Thạc sĩ';
                    break;
                  case '2':
                    echo 'Kỹ sư';
                    break;
                  default:
                    echo 'Khác';
                }
                ?>
              </td>
              <td><?php echo "Nhóm " . $row['group']; ?></td>
              <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
              </td>
            </tr>
          <?php
          }
        } else {
          ?>
          <tr>
            <td colspan="8"></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <a href="add.php" class="add-button">
      <button>Thêm sinh viên</button>
    </a>
  </div>
</body>

</html>