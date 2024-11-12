<?php
$servername = "localhost";
$username = "smartmed_smartmedicalroom";
$password = "qHP5QqssgRV94pqnJnxk";
$dbname = "smartmed_smartmedicalroom";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Data</title>
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
            /* เปลี่ยน path เป็นที่อยู่ของไฟล์ภาพ */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            backdrop-filter: blur(4px);
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
        .head {
            background-color: rgba(202, 247, 251, 0.3);
            padding: 10px;

        }

        .head h1 {
            font-size: 28px;
            color: white;
            top: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }


        .box {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .container input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .container button {
            padding: 10px 20px;
            border: none;
            background-color: #3498db;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .container button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
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
      <h2>คลินิกรักษ์ยิ้ม</h2>
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

    <div class="box">
        <form action="addnew.php" method="POST" class="container">
            <input type="text" name="search" placeholder="ชื่อผู้ใช้ หรือ ไอดี">
            <button type="submit">ค้นหา</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Symptoms</th>
                    <th>Age</th>
                    <th>Tel.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $home = isset($_POST['search']) ? $_POST['search'] : '';

                $query = "SELECT id, alias, symptoms, age, phone FROM health_data WHERE id LIKE '%$home%' OR alias LIKE '%$home%'";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['alias']}</td>
                                <td>{$row['symptoms']}</td>
                                <td>{$row['age']}</td>
                                <td>{$row['phone']}</td>
                              </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No records found</td></tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($conn);
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
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

</html>