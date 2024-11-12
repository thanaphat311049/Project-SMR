<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>ข้อมูลยาภายในคลังยา</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: "Noto Sans Thai", sans-serif;
      box-sizing: border-box;
      padding: 0;
      margin: 0;
    }

    body {
      background-image: url('picture.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      backdrop-filter: blur(3px);
      height: 100vh;
      width: 100vw;
      overflow: hidden;
    }

    nav {
      padding: 10px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: #004274;
      position: relative;
      height: 70px;
    }

    .logo {
      color: #fff;
    }

    nav ul {
      display: flex;
      gap: 30px;
      align-items: center;
    }

    nav ul li {
      list-style-type: none;
    }

    nav ul li a {
      text-decoration: none;
      color: #fff;
    }

    .menu-icon {
      display: none;
    }

    .menu-icon i {
      color: #fff;
      font-size: 30px;
    }

    .container {
      margin-top: 20px;
      background-color: aliceblue;
      border-radius: 5px;
      box-shadow: 2px 2px 2px 1px rgb(0 0 0 / 20%);
    }

    .btn {
      background-color: #04AA6D;
      transition-duration: 0.4s;
      color: white;
      margin: 5px;
    }

    .btn:hover {
      background-color: rgb(62, 255, 217);
    }

    .tr {
      background-color: #3498db;
    }
    
    @media only screen and (max-width: 768px) {
      nav ul {
        position: absolute;
        top: 70px;
        left: 0;
        right: 0;
        flex-direction: column;
        text-align: center;
        background: #004274;
        gap: 0;
        overflow: hidden;
      }

      nav ul li {
        padding: 20px;
        padding-top: 0;
      }

      .menu-icon {
        display: block;
      }

      #menuList {
        transition: all 0.5s;
      }
    }
  </style>
</head>

<body>
<nav>
    <div class="logo">
      <h2>ข้อมูลยาภายในคลังยา</h2>
    </div>
    <ul id="menuList">
      <li class="link"><a href="../Show_data/showdata.php">ข้อมูลบุคลากร</a></li>
      <li class="link"><a href="../stock/index.php">ข้อมูลคลังยา</a></li>
      <li class="link"><a href="../Problem/index.php">แจ้งปัญหา</a></li>
      <li class="link"><a href="../Health/addnew.php">เคสล่าสุด</a></li>
      <li class="link"><a href="../login_page/admin.php">หน้าหลัก</a></li>
    </ul>
    <div class="menu-icon">
      <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
  </nav>
  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn">เพิ่มข้อมูล</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr class="tr">
          <th scope="col">ID</th>
          <th scope="col">ชื่อยา</th>
          <th scope="col">ข้อมูลตัวยา</th>
          <th scope="col">จำนวน</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["data"] ?></td>
            <td><?php echo $row["quantity"] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete.php?id=<?php echo $row["id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script>
    let menuList = document.getElementById("menuList")
    menuList.style.maxHeight = "0px";

    function toggleMenu() {
      if (menuList.style.maxHeight == "0px") {
        menuList.style.maxHeight = "300px";
      } else {
        menuList.style.maxHeight = "0px";
      }
    }
  </script>
  <script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>
</body>

</html>