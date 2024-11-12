<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="gpt.css">
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
      <li class="link"><a href="../login_page/home.php">หน้าหลัก</a></li>
    </ul>
    <div class="menu-icon">
      <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
  </nav>

  <div class="chatbox-wrapper">
    <div class="message-box">
      <div class="chat response">
        <img src="bot.png" alt="Chatbot">
        <span>สวัสดีครับ <br> 
          มีอะไรให้ผมช่วยแนะนำไหมครับ
        </span>
      </div>
    </div>
    <div class="messagebar">
      <div class="bar-wrapper">
        <input type="text" placeholder="Enter your message...">
        <button>
          <span class="material-symbols-rounded">
            send
          </span>
        </button>
      </div>
    </div>
  </div>
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
  <script src="script.js" type="module"></script>
</body>
</html>
