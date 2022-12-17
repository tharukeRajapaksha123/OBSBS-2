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

$email = $_POST["email"];
$password = $_POST["password"];


$sql = "SELECT * FROM users WHERE email = '$email'";

$result = $conn->query($sql);


$confirm_dialog = "
   <script>
      if (confirm('Login Failed')) {
               window.location.href = '../login_page.php'
      }
   </script>
";


if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      if ($password === $row["PASSWORD"]) {
         setcookie("email", $email, time()+3600*24*30, '/');
         setcookie("is_owner", $row["is_owner"], time()+3600*24*30, '/');
      
         if ($row["is_owner"] == 1) {
          header("Location: ../shop_owner_dashboard.php");
         } else {
            header("Location: ../home.php");
         }
         return;
      }
   }

   echo ($confirm_dialog);

} else {
   echo ($confirm_dialog);
}



?>