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

$sql = "SELECT * FROM service WHERE shop_id = $shop_id";

$query = $conn->query($sql);

?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/bookings.css">
   <title>My Services</title>
</head>

<body>
   <h1>Services</h1>
   <a href="add_service.php">Add Service </a>
   <table id="customers">
      <tr>
         <th>ID</th>
         <th>Service Name</th>
         <th>Price</th>
         <th>Image</th>

         <th>Actions</th>
      </tr>
      <?php
      if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) { ?>

      <form action="delete_service.php" method="post">
         <input style="display: none;" name="id" value=<?php echo ($row["_id"]) ?> >
         <tr>
            <td>
               <?php echo ($row["_id"]) ?>
            </td>
            <td>
               <?php echo ($row["name"]) ?>
            </td>
            <td>
               <?php echo ($row["price"]) ?>
            </td>
            <td>
               <?php echo ($row["image"]) ?>
            </td>

            <td style="display: flex;">
               
               <a href=<?php echo("edit_service.php?id=".$row["_id"]) ?>><button class="button" style="background-color:green;margin : 0 4px;">Edit</button></a>
            </td>
         </tr>
      </form>



      <?php }
      }
      ?>
   </table>
</body>

</html>