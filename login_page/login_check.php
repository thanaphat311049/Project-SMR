<?php
include 'condb.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $password = hash('sha512', $password);

    $sql = "SELECT * FROM member WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    $status=$row['status'];

    if ($row) {
        $_SESSION["username"] = $row['username'];
        $_SESSION["pw"] = $row['password'];
        $_SESSION["firstname"] = $row['name'];
        $_SESSION["lastname"] = $row['lastname'];
        if($status == '0'){
            header("Location: home.php");
            exit();
        }elseif($status == '1'){
            header("Location: admin.php");
            exit();
        }
    } else {
        $_SESSION["error"] = "<p>Your username or password is invalid</p>";
        header("Location: ../index.php");
        exit();
    }
}
?>
