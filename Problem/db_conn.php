<?php
$servername = "localhost";
$username = "smartmed_smartmedicalroom";
$password = "qHP5QqssgRV94pqnJnxk";
$dbname = "smartmed_smartmedicalroom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
