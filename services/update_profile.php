<?php
use function UI\quit;

include("./conn.php");

$name = $_POST["name"];
$email = $_POST["email"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];

$sql = "
   UPDATE users SET
      name = '$name',
      email = '$email',
      contact_number = '$contact_number',
      address = '$address'
   WHERE email = '$email';
";

$result = $conn->query($sql);

if($result === true){
   header("Location: ../shop_owner_dashboard.php?page='update'");
}else{
   echo ("<script>alert('Update profile failed')");
}

?>