<?php
session_start();
if (!isset($_SESSION['success'])) {
    header("Location: chat.php");
    exit();
}
?>