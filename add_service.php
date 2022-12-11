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
$user_id = 1;
$shop_id = 1;
$user_email = $_COOKIE["email"];
$fetch_user_query = "SELECT * FROM users WHERE email = '$user_email'";

$query = $conn->query($fetch_user_query);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      break;
   }
}
$fetch_shop_query = "SELECT * FROM shop WHERE owner_id = '$user_id'";
$query = $conn->query($fetch_shop_query);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $shop_id = $row["_id"];
      break;
   }
}



?>


<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Service</title>
</head>

<body>
   <h1>Create Service</h1>
   <form action="add_service_service.php" method="post">
      <input name="id" value=<?php echo ($shop_id) ?> style= "display:none">
      Name : <input name="name" required> <br>
      Image Link : <input name="image" requiredplaceholder="Paste your service image link here"><br>
      Price : <input name="price" required><br>
      <input type="submit" value="Create Service">
   </form>

</body>

</html>