<?php include_once('connect.php'); ?>
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
    margin: 20px auto;
    padding: 20px;
    max-width: 800px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.1);
}

.box {
    margin: 20px auto;
    padding: 20px;
    background-color: white;
    border-radius: 5px;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.1);
}

.row_tt {
    margin: 20px;
    letter-spacing: 1px;
    font-weight: bold;
    text-transform: uppercase;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table,
th,
td {
    border: 1px solid #ddd;
}

th,
td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f4f4f4;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

.try th {
    background-color: #004274;
    color: white;
    font-size: 1.1em;
    font-weight: bold;
}

input[type="text"] {
    width: calc(100% - 100px);
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    padding: 10px 20px;
    border: none;
    background-color: #3498db;
    color: white;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #2980b9;
}

.navbar_tt {
    align-items: center;
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
        <h1>ข้อมูลบุคลากร</h1>
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
        <form action="showdata.php" method="POST" class="container">
            <input type="text" name="search" placeholder="ชื่อผู้ใช้ หรือ ไอดี">
            <button type="submit">ค้นหา</button>
        </form>
        <table>
            <div class="row_tt">
                <thead>
                    <tr class="try">
                        <th >ID</th>
                        <th >ชื่อ</th>
                        <th >นามสกุล</th>
                        <th >ยาที่แพ้</th>
                        <th >น้ำหนัก</th>
                        <th >ส่วนสูง</th>
                        <th >เบอร์โทรศัพท์</th>
                    </tr>
                </thead>
            </div>
            <tbody>
                <?php
                if (isset($_POST['search'])) {
                    $home = $_POST['search'];
                } else {
                    $home = "";
                }
                $query = "SELECT id, name, lastname, telephone, lastname, medicine, height, weight  FROM member WHERE ID LIKE '%$home%' or name LIKE '%$home%' or lastname LIKE '%$home%'";
                $path = mysqli_query($conn, $query);

                if ($path) {
                    if (mysqli_num_rows($path) > 0) {
                        while ($row = mysqli_fetch_assoc($path)) {
                ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['lastname']; ?></td>
                                <td><?php echo $row['medicine']; ?></td>
                                <td><?php echo $row['height']; ?></td>
                                <td><?php echo $row['weight']; ?></td>
                                <td><?php echo $row['telephone']; ?></td>
                            </tr>
                <?php
                        }
                    } else {
                        echo '<tr><td colspan="5">No results found</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Error: ' . mysqli_error($conn) . '</td></tr>';
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