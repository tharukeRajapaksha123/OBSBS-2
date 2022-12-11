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

   $sql = "DELETE  FROM booking WHERE _id = " . $_POST['id'];
   $result = $conn->query($sql);

   if ($result) {
      header("Location: bookings.php");
   }

   ?>