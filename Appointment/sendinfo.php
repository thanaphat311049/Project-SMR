<?php 

    session_start();

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $service = $_POST['service'];
        $symptoms = $_POST['symptoms'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];

        $sToken = "IjwD2vm4YIRjvPZCaKnCcpxnkpBuQcoQMsGqeBwpAnq";
        $sMessage = "รายละเอียดการสั่งยา\n";
        $sMessage .= "Name: " . $name . "\n";
        $sMessage .= "Service: " . $service . "\n";
        $sMessage .= "Symptoms: " . $symptoms . "\n";
        $sMessage .= "Age: " . $age . "\n";
        $sMessage .= "Weight: " . $weight . "\n";
        $sMessage .= "Height: " . $height . "\n";
 
 
$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt( $chOne, CURLOPT_POST, 1);
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage);
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );

if($result) {
    $_SESSION['success'] = "ระบบได้ส่งข้อมูลให้เจ้าหน้าที่พยาบาลเรียบร้อยแล้ว";
    header("Location: page.php");
} else {
    $_SESSION['error'] = "ส่งข้อมูลผิดพลาด";
    header("Location: page.php");
}
    }
 ?>  