<?php
$servername = "localhost";
$username = "smartmed_smartmedicalroom";
$password = "qHP5QqssgRV94pqnJnxk";
$dbname = "smartmed_smartmedicalroom";

// สร้างการเชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    if ($height > 0 && $weight > 0) {
        $bmi = $weight / (($height / 100) ** 2);
        $category = "";

        if ($bmi < 18.5) {
            $category = "ผอมเกินไป";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = "น้ำหนักปกติ";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = "น้ำหนักเกิน";
        } elseif ($bmi >= 30 && $bmi < 34.9) {
            $category = "อ้วน (ระดับ 1)t";
        } elseif ($bmi >= 35 && $bmi < 39.9) {
            $category = " อ้วน (ระดับ 2)";
        } else {
            $category = "อ้วนมาก (ระดับ 3)";
        }

        // เตรียมและ bind
        $stmt = $conn->prepare("INSERT INTO bmi_records (name, height, weight, bmi, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sddds", $name, $height, $weight, $bmi, $category);

        if ($stmt->execute()) {
            $success_message = "ค่าดัชนีมวลกายของคุณคือ: $category";
        } else {
            $error_message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error_message = "โปรดกรอกค่าน้ำหนักส่วนสูงของคุณอีกครั้ง หรือแจ้งปัญหา";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>เทคแคร์</title>
    <link rel="stylesheet" href="bmi.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url(picture.jpg);
            background-position: 50% 50%;
            background-size: cover;
            background-repeat: no-repeat;
            transition: all 0.5s ease;

        }

        .navbar img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        body.dark {
            --white-color: #a4a4a4;
            --blue-color: #fff;
            --grey-color: #f2f2f2;
            --grey-color-light: #c8fffd;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo_item">
            <i class="bx bx-menu" id="sidebarOpen"></i>
            <img src="Logo SMR.png" alt=""></i>SMART MEDICAL ROOM
        </div>
        <div class="navbar_content">
            <i class="bi bi-grid"></i>
            <i class='bx bx-sun' id="darkLight"></i>
        </div>
    </nav>

    <nav class="sidebar">
        <div class="menu_content">
            <ul class="menu_items">
                <div class="menu_title menu_editor"></div>
                <li class="item">
                    <a href="../login_page/home.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='home-circle' type='solid'></box-icon>
                        </span>
                        <span class="navlink">หน้าหลัก</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Appointment/index.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='capsule' type='solid'></box-icon>
                        </span>
                        <span class="navlink">ขอรับบริการ</span>
                    </a>
                </li>
                <!-- End -->

                <li class="item">
                    <a href="../BMi/index.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='chat' type='solid'></box-icon>
                        </span>
                        <span class="navlink">เทคแคร์</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Health/index.html" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='plus-medical'></box-icon>
                        </span>
                        <span class="navlink">คลินิกรักษ์ยิ้ม</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Volunteer/volunteer.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='news' type='solid'></box-icon>
                        </span>
                        <span class="navlink">ข่าวสารและกิจกรรม</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../Problem/add-new.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon name='megaphone' type='solid'></box-icon>
                        </span>
                        <span class="navlink">รายงานปัญหา</span>
                    </a>
                </li>
                <li class="item">
                    <a href="../login_page/logout.php" class="nav_link">
                        <span class="navlink_icon">
                            <box-icon type='solid' name='log-in-circle'></box-icon>
                        </span>
                        <span class="navlink">ออกจากระบบ</span>
                    </a>
                </li>
            </ul>

            <!-- Sidebar Open / Close -->
            <div class="bottom_content">
                <div class="bottom expand_sidebar">
                    <span> Expand</span>
                    <i class='bx bx-log-in'></i>
                </div>
                <div class="bottom collapse_sidebar">
                    <span>TAP</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>


    <div class="form-container">
        <form method="post" action="index.php">
            <h1>ค่าดัชนีมวลกาย</h1>

            <button class="takecare"><a class="link" href="gpt.php">เทคแคร์</a></button>

            <div class="input-group">
                <input type="text" placeholder="ชื่อ-นามสกุล" id="name" name="name" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="ส่วนสูง (ซม.)" id="height" name="height" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="น้ำหนัก (กก.)" id="weight" name="weight" required>
            </div>
            <button type="submit">คำนวณค่าดัชนีมวลกาย</button>
            <div class="echo">
                <?php if (!empty($success_message)) {
                    echo "<p class='success'>$success_message</p>";
                } ?>
                <?php if (!empty($error_message)) {
                    echo "<p class='error'>$error_message</p>";
                } ?>
            </div>
        </form>
    </div>


</body>
<script>
    const body = document.querySelector("body");
    const darkLight = document.querySelector("#darkLight");
    const sidebar = document.querySelector(".sidebar");
    const submenuItems = document.querySelectorAll(".submenu_item");
    const sidebarOpen = document.querySelector("#sidebarOpen");
    const sidebarClose = document.querySelector(".collapse_sidebar");
    const sidebarExpand = document.querySelector(".expand_sidebar");
    sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

    sidebarClose.addEventListener("click", () => {
        sidebar.classList.add("close", "hoverable");
    });
    sidebarExpand.addEventListener("click", () => {
        sidebar.classList.remove("close", "hoverable");
    });

    sidebar.addEventListener("mouseenter", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.remove("close");
        }
    });
    sidebar.addEventListener("mouseleave", () => {
        if (sidebar.classList.contains("hoverable")) {
            sidebar.classList.add("close");
        }
    });

    darkLight.addEventListener("click", () => {
        body.classList.toggle("dark");
        if (body.classList.contains("dark")) {
            document.setI
            darkLight.classList.replace("bx-sun", "bx-moon");
        } else {
            darkLight.classList.replace("bx-moon", "bx-sun");
        }
    });

    submenuItems.forEach((item, index) => {
        item.addEventListener("click", () => {
            item.classList.toggle("show_submenu");
            submenuItems.forEach((item2, index2) => {
                if (index !== index2) {
                    item2.classList.remove("show_submenu");
                }
            });
        });
    });

    if (window.innerWidth < 768) {
        sidebar.classList.add("close");
    } else {
        sidebar.classList.remove("close");
    }
</script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</html>