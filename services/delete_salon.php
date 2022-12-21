<?php
include("./conn.php");
$id = $_POST["id"];
$sql = "DELETE FROM shop WHERE _id = $id";

$query = $conn->query($sql);

if($query === TRUE){
   header("Location: ../shop_owner_dashboard.php");
}else{
   echo ("<script>alert('Delete shop failed,Please try again')</script>");
}

?>