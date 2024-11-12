// submit_form.php
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

$alias = $_POST['alias'];
$age = $_POST['age'];
$symptoms = $_POST['symptoms'];
$phone = $_POST['phone'];

$sql = "INSERT INTO health_data (alias, age, symptoms, phone) VALUES ('$alias', $age, '$symptoms', '$phone')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
        exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
