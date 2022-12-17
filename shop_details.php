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

$user_email = $_COOKIE["email"];

$user_id = -1;
$sql = "SELECT * FROM users WHERE email = '$user_email'";

$query = $conn->query($sql);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      break;
   }
}

$shop_name = "";
$shop_image = "";
$shop_address = "";
$shop_contact_number = "";
$shop_description = "";
$shop_found = false;
$sql = "SELECT * FROM shop WHERE owner_id = $user_id";
$query = $conn->query($sql);

if($query->num_rows > 0){
   while($raw = $query->fetch_assoc() ){
      $shop_name = $rwo["name"];
      $shop_email = $rwo["email"];
      $shop_address = $rwo["address"];
      $shop_description = $rwo["description"];
   
      break;
   }
}

?>