<?php
include("./conn.php");

$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];

$sql = "UPDATE shop SET
   name = '$name',
   address = '$address',
   contact_number = '$contact_number',
   description = '$description'

   WHERE _id = $id
";

$query = $conn->query($sql);

if($query === TRUE){
   header("Location: ../shop_owner_dashboard.php");
}else{
   header("<script>alert('Update salon details failed! Please try again')</script>");
}



?>