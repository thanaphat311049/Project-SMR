<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงชื่อเข้าใช้งาน</title>
    <link rel="stylesheet" href="login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&display=swap" rel="stylesheet">
    <style>
        
  body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background:url(BG.png);
    background-size: cover;
    background-position: center;
  }
    </style>
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="/../login_page/login_check.php">
            <h1>ลงชื่อเข้าใช้งาน</h1>
            <div class="input-box">
                <input type="text" name="username" maxlength="10" class="form-control" placeholder="ชื่อผู้ใช้งาน" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="form-control" placeholder="รหัสผู้ใช้งาน" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">ลงชื่อเข้าใช้งาน</button>
            <div class="register-link">
                <p>สร้างบัญชีใหม่ <a href="register.php">สมัครสมาชิก</a></p>
            </div>

        </form>
    </div>
</body>

</html>