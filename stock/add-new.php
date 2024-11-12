<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $name = $_POST['name'];
   $data = $_POST['data'];
   $quantity = $_POST['quantity'];

   $sql = "INSERT INTO `crud`(`id`, `name`, `data`, `quantity`) VALUES (NULL,'$name','$data','$quantity')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
   <title>ข้อมูลยาภายในคลังยา</title>
</head>
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
      padding: 10px;
      background-color: white;
      position: relative;
      top: 20px;
      height: 320px;
      width: 600px;
      border-radius: 10px;
      box-shadow: 2px 2px 2px 1px rgb(0 0 0 / 20%);
   }

   .text {
      font-size: 50px;
      font-weight: 900;
      position: relative;
      left: 200px;
      right: 100px;
      color: #04AA6D;
      padding: 10px;
   }

   .text_P {
      position: relative;
      left: 150px;
      color: gray;
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
        z-index: 100;
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
      <div class="text-center mb-4">
         <h3>เพิ่มข้อมูลคลังยา</h3>
         <p class="text-muted">กรอกข้อมูลด้านล่างเพื่อเพิ่มข้อมูลในคลังยา</p>
      </div>

      <div class="container-2 d-flex justify-content-center">
         <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="row mb-3">
               <div class="col">
                  <label class="form-label">ชื่อยา :</label>
                  <input type="text" class="form-control" name="name">
               </div>

               <div class="col">
                  <label class="form-label">ข้อมูลตัวยา :</label>
                  <input type="text" class="form-control" name="data">
               </div>
            </div>

            <div class="mb-3">
               <label class="form-label">จำนวน :</label>
               <input type="number" class="form-control" name="quantity">
            </div>


            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
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