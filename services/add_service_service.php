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


$service_name = $_POST["name"];
$service_price = $_POST["price"];
$service_image = $_POST["image"];
$id = $_POST["id"];


$sql = "
   INSERT INTO service  
      (name,price,image,shop_id)
   VALUES  
    ( 
      '$service_name',
       $service_price,
      '$service_image',
      $id
   )
";

$result = $conn->query($sql);

if ($result) {
   header("Location: ../shop_owner_dashboard.php");
} else {
   echo ("Error " . $conn->error);
}

?>