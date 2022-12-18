<?php
$shop_id = $_POST["shop_id"];
$user_id = $_POST["user_id"];
$name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$booked_date = $_POST['booked_date'];
$total_cost = $_POST['total_cost'];
$booked_time = $_POST["selected_time"];
$contact_number_shop = $_POST["contact_number_shop"];



$insert_query = "
   INSERT INTO booking (
      service_name,
      total_cost,
      booked_date,
      booked_by,
      booked_to,
      customer_name,
      contact_number_shop,
      contact_number_customer,
      booked_time
   )
   VALUES (
      'shanitha',
      $total_cost,
      '$booked_date',
      $user_id,
      $shop_id,
      '$name',
      '$contact_number_shop',
      '$phone',
      '$booked_time'
   )
";

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

$result = $conn->query($insert_query);

if ($result === TRUE) {
   $last_id = $conn->insert_id;
   echo "<script>alert('Succesfully booked your appointment');
      window.location = '../salons.php';
   </script>";
   setcookie("selected_date", null);
   //header("Location: home.php");
} else {
   echo "Error: " . $insert_query . "<br>" . $conn->error;
}

?>