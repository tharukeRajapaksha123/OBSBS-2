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
$fetch_user_query = "SELECT * FROM users WHERE email = '$user_email'";


$user_name = "";
$user_contact_number = "";
$user_email = "";
$user_id = 0;

$query = $conn->query($fetch_user_query);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      $user_name = $row["name"];
      $user_email = $row["email"];
      $user_contact_number = $row["contact_number"];
      $user_address = $row["address"];
      break;
   }
}

?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Profile</title>
</head>

<body>
   <div>
      <h1>User Profile</h1>
      <form method="POST" action="./services/update_profile.php">
         Name : <input type="text" name="name" value="<?php echo ($user_name) ?>"><br>
         Email : <input type="text" name="email" value="<?php echo ($user_email) ?>"><br>
         Contact Number <input type="text" name="contact_number" value="<?php echo ($user_contact_number) ?>"><br>
         Address <input type="text" name="address" value="<?php echo ($user_address) ?>"><br>
         <input type="submit" value="Update Profile">
      </form>
      <?php
   if ($_COOKIE["is_owner"] == 1) {
      echo ("<a href='register_shop.php'>Register My Salon </a>");
   }
   ?>

   </div>
</body>

</html>