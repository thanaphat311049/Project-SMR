<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>กิจกรรม</title>
    <link rel="stylesheet" href="styles_op.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="volunteer.css">

    <script>
        function navigateToSection() {
            const select = document.getElementById("activity-select");
            const selectedOption = select.options[select.selectedIndex].value;
            if (selectedOption) {
                document.getElementById(selectedOption).scrollIntoView({
                    behavior: "smooth"
                });
            }
        }
    </script>
   <style>
        .logo img {
            width: 55px;
            height: 55px;
            border-radius: 30%;
        }
    </style>
</head>

<body>
<nav>
    <div class="logo">
    <img src="SMR.jpg" alt="">
    </div>
    <ul id="menuList">
      <li class="link"><a href="../Appointment/index.php">ขอรับบริการ</a></li>
      <li class="link"><a href="../BMi/index.php">เทคแคร์</a></li>
      <li class="link"><a href="../Health/index.html">คลินิกรักษ์ยิ้ม</a></li>
      <li class="link"><a href="../Volunteer/volunteer.php">ข่าวสารและกิจกรรม</a></li>
      <li class="link"><a href="../Problem/add-new.php">รายงานปัญหา</a></li>
      <li class="link"><a href="../Register/register.php">ข้อมูลนักเรียน</a></li>
      <li class="link"><a href="../login_page/home.php">หน้าหลักของผู้ใช้งาน</a></li>
    </ul>
    <div class="menu-icon">
      <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
  </nav>
    <main>
        <section id="volunteer">
            <h2>ข่าวสารทางการแพทย์</h2>
            <div class="event" id="volunteer1">
                <img src="./images/images7.webp" alt="อาสาพัฒนาชุมชน">
                <h3>ฉีดวัคซีนไข้หวัดใหญ่</h3>
                <p>วัคซีนป้องกันไข้หวัดใหญ่ ปี 2567 พร้อมให้บริการ</p>
            </div>
            <div class="event" id="volunteer2">
                <img src="./images/images8.webp" alt="อาสาสอนหนังสือ">
                <h3>บริจาคเลือด</h3>
                <p>ขอเชิญชวนเข้าร่วมบริจาคโลหิต โรงพยาบาลบ้านนาสาร</p>
            </div>
        </section>
        <section id="internship">
            <h2>กิจกรรมฝึกงาน</h2>
            <div class="event" id="internship1">
                <img src="./images/images6.webp" alt="ฝึกงานที่บริษัท ABC">
                <h3>ฝึกงานที่บริษัท ABC</h3>
                <p>เรียนรู้และพัฒนาทักษะทางวิชาชีพที่สอดคล้องกับสาขาวิชาที่ศึกษา , สัมผัสประสบการณ์การทำงานในสภาพแวดล้อมจริง</p>
            </div>
            <div class="event" id="internship2">
                <img src="./images/images5.webp" alt="ฝึกงานในโรงพยาบาล">
                <h3>ฝึกงานในโรงพยาบาล</h3>
                <p>สัมผัสประสบการณ์การทำงานในสภาพแวดล้อมจริงของโรงพยาบาล</p>
            </div>
        </section>
        <section id="external">
            <h2>กิจกรรมจากภายนอก</h2>
            <div class="event" id="external1">
                <img src="./images/images1.webp" alt="งานสัมมนาวิชาการ">
                <h3>งานสัมมนาวิชาการ</h3>
                <p>ส่งเสริมการแลกเปลี่ยนข้อมูลและความรู้ใหม่ๆ ระหว่างนักวิชาการ ผู้เชี่ยวชาญ และผู้เข้าร่วม</p>
            </div>
            <div class="event" id="external2">
                <img src="./images/images2.webp" alt="งานแสดงสินค้านวัตกรรม">
                <h3>งานแสดงสินค้านวัตกรรม</h3>
                <p>ปิดโอกาสให้ผู้เข้าร่วมได้แลกเปลี่ยนประสบการณ์จากการวิจัยหรือการปฏิบัติงานจริง</p>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; SMART MEDICAL ROOM FOR BANNASAN SCHOOL </p>
    </footer>
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
