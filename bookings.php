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
$user_email = $_COOKIE["email"];
$fetch_user_query = "SELECT * FROM users WHERE email = '$user_email'";
$query = $conn->query($fetch_user_query);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      break;
   }
}
$query_value = "booked_to";

if ($_COOKIE["is_owner"] == 0) {
   $query_value = "booked_by";
}

$sql = "SELECT * FROM booking WHERE $query_value = $user_id";

$query = $conn->query($sql);

?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/bookings.css">
   <title>My Bookings</title>
</head>

<body>
   <table id="customers" style="">
      <tr>
         <th>ID</th>
         <th>Service Name</th>
         <th>Total Cost</th>
         <th>Booked Date</th>
         <?php if ($_COOKIE["is_owner"] == 1) {
            echo ("<th>Customer Name</th>");
         } ?>
         <th>Contact Number</th>
         <th>Actions</th>
      </tr>
      <?php
      if ($query->num_rows > 0) {
         while ($row = $query->fetch_assoc()) { ?>

      <form action="delete_booking.php" method ="post">
         <input style="display: none;"  name="id" value=<?php echo($row["_id"]) ?> >
         <tr>
            <td>
               <?php echo ($row["_id"]) ?>
            </td>
            <td>
               <?php echo ($row["service_name"]) ?>
            </td>
            <td>
               <?php echo ($row["total_cost"]) ?>
            </td>
            <td>
               <?php echo ($row["booked_date"]) ?>
            </td>
            <?php
            if ($_COOKIE["is_owner"] == 1) {
               echo (" <td>" . $row['total_cost'] . ")</td>");
            }
            ?>
            <td>
               <?php
                  if ($_COOKIE["is_owner"] == 1) {
                     echo ( $row['contact_number_customer'] );
                  } else {
                     echo ( $row['contact_number_shop'] );
                  }
               ?>
            </td>
            <td>
               <input type="submit" value="delete" class="button">
            </td>
         </tr>
      </form>



      <?php }
      }
      ?>
   </table>
</body>

</html>