<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "salon_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$id = $_POST["id"];
$service_name = $_POST["name"];
$service_price = $_POST["price"];
$service_image = $_POST["image"];


echo ($id."\n");
$sql = "
   UPDATE service 
   SET 
      name = '$service_name',
      price = $service_price,
      image = '$service_image'
   WHERE  _id = $id
";

$result = $conn->query($sql);

if ($result) {
   header("Location: shop_owner_dashboard.php");
} else {
   echo ("Error " . $conn->error);
}

?>