<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #73f3ad;
      --primary-color-dark: #5fe3c5;
      --secondary-color: #c7fdc7;
      --white: #ffffff;
    }

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      font-family: "Noto Sans Thai", sans-serif;
      background-image: linear-gradient(to right, var(--primary-color-dark), var(--primary-color));
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

    .logo img{
      width: 55px;
      height: 55px;
      border-radius: 30%;
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
      min-height: 100vh;
      display: flex;
      flex-wrap: wrap;
    }

    .container__left,
    .container__right {
      flex: 1 1 100%;
    }

    .container__left {
      background-image: url('picture.jpg');
      background-position: 50% 50%;
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .container__right {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
      text-align: center;
    }

    .left__content h4 {
      font-size: 2rem;
      color: var(--white);
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .right__content h1 {
      font-size: 3rem;
      color: var(--white);
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .right__content h4 {
      font-size: 2rem;
      color: var(--white);
    }

    .right__content p {
      font-size: 1rem;
      color: var(--white);
      margin: 1rem 0;
    }

    .button {
      border-radius: 5px;
      border: none;
      background-color: #ffffff;
      width: 100px;
      height: 40px;
      cursor: pointer;
    }

    .button a {
      text-decoration: none;
      font-size: 1rem;
      font-weight: 600;
      color: gray;
      display: inline-block;
      line-height: 40px;
    }

    .socials {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 1.5rem;
    }

    .socials span {
      font-size: 1.5rem;
      color: white;
      cursor: pointer;
      transition: 0.3s;
    }

    .socials span:hover {
      color: rgb(164, 164, 164);
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
    <img src="SMR.jpg" alt="">
    </div>
    <ul id="menuList">
      <li class="link"><a href="../Show_data/showdata.php">ข้อมูลบุคลากร</a></li>
      <li class="link"><a href="../stock/index.php">ข้อมูลคลังยา</a></li>
      <li class="link"><a href="../Problem/index.php">แจ้งปัญหา</a></li>
      <li class="link"><a href="../Health/addnew.php">เคสล่าสุด</a></li>
    </ul>
    <div class="menu-icon">
      <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
  </nav>

  <div class="container">
    <div class="container__left">
      <div class="left__content">
        <h4>SMART MEDICAL ROOM For Admin </h4>
      </div>
    </div>
    <div class="container__right">
      <div class="right__content">
        <h1>SMR</h1>
        <h4>Smart Medical Room</h4>
        <p>
          ระบบห้องพยาบาลอัจฉริยะที่ใช้เทคโนโลยีอัจฉริยะเพื่อเพิ่มประสิทธิภาพในการบริการด้านสุขภาพและการจัดการข้อมูลทางการแพทย์ ระบบนี้ช่วยให้นักเรียนและบุคลากรสามารถเข้าถึงข้อมูลสุขภาพได้ง่ายขึ้น
        </p>
        <button class="button"><a class="link_ol" href="../logout.php">Logout</a></button>
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
</body>

</html>