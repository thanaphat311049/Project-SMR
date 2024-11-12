<?php
$servername = "localhost";
$username = "smartmed_smartmedicalroom";
$password = "qHP5QqssgRV94pqnJnxk";
$dbname = "smartmed_smartmedicalroom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";