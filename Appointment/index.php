<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>ขอรับบริการ</title>
    <link rel="stylesheet" href="index.css" />
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
                    <a href="../logout.php" class="nav_link">
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
        <form id="appointmentForm" action="sendinfo.php" method="post" onsubmit="return validateForm()">
            <h2>ฟอร์มนัดเข้าใช้บริการ</h2>
            <?php if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <div class="input-group">
                <input type="text" placeholder="ชื่อ-นามสกุล" id="name" name="name" required>
            </div>
            <div class="input-group">
                <textarea id="service" placeholder="ยาที่แพ้ (ถ้ามี)" name="service" rows="4" cols="53"></textarea>
            </div>
            <div class="input-group">
                <textarea id="symptoms" placeholder="อาการ" name="symptoms" rows="4" cols="53" required></textarea>
            </div>
            <div class="input-group">
                <input type="number" placeholder="อายุ" id="age" name="age" min="0" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="น้ำหนัก (กก.)" id="weight" name="weight" min="0" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="ส่วนสูง (ซม.)" id="height" name="height" min="0" required>
            </div>
            <button type="submit" name="submit">ส่งแบบฟอร์ม</button>
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
<script src="https://kit.fontawesome.com/f8e1a90484.js" crossorigin="anonymous"></script>

</html>