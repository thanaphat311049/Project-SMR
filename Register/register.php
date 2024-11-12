<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>ข้อมูลนักเรียน</title>
    <link rel="stylesheet" href="style.css" />
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
            <img src="Logo SMR1.png" alt=""></i>SMART MEDICAL ROOM
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
                    <span> Collapse</span>
                    <i class='bx bx-log-out'></i>
                </div>
            </div>
        </div>
    </nav>
    <div class="form-container">
        <form id="registerForm" action="register.php" method="POST">
            <h2>Student Information</h2>
            <div class="input-group">
                <input type="text" placeholder="ชื่อ-นามสกุล" id="firstname" name="firstname" required>
            </div>
            <div class="input-group">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="ยาที่แพ้" id="lastname" name="lastname" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="อายุ" id="age" name="age" required>
            </div>
            <div class="input-group">
                <input type="number" placeholder="ส่วนสูง" id="height" name="height" required>
            </div>
            <div class="input-group">
                <input type="date" placeholder="วัน/เดือน/ปีเกิด" id="dob" name="dob" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="เลขประจำตัวบัตรประชาชน" id="idcard" name="idcard" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="สัญชาติ" id="organization" name="organization" required>
            </div>
            <div class="input-group">
                <i class="fas fa-flag"></i>
                <input type="text" placeholder="ตำแหน่ง" required onfocus="changeIconColor(this)" onblur="resetIconColor(this)">
            </div>
            <button type="submit">Submit</button>
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