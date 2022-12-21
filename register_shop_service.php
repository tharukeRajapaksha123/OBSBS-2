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

$status = $statusMsg = 'asdasd';
if (isset($_POST["submit"])) {
   $name = $_POST["name"];
   $address = $_POST["address"];
   $contact_number = $_POST["contact_number"];
   $description = $_POST["description"];

   $status = 'error';
   if (!empty($_FILES["image"]["name"])) {

      $fileName = basename($_FILES["image"]["name"]);
      $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


      $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
      if (in_array($fileType, $allowTypes)) {
         $image = $_FILES['image']['tmp_name'];
         $imgContent = addslashes(file_get_contents($image));

         $sql = "INSERT INTO shop
         (
               name,
               image,
               address,
               contact_number,
               owner_id,
               description
         )
         VALUES(
            '$name',
            '$imgContent',
            '$address',
            '$contact_number',
            $user_id,
            '$description'
         )";

         $insert = $conn->query($sql);

         if ($insert) {
            $status = 'success';
            $statusMsg = "File uploaded successfully.";
            header("Location: ./shop_owner_dashboard.php");
         } else {
            $statusMsg = "File upload failed  please try again.";
            echo ($conn->error);
         }
      } else {
         $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
      }
   } else {
      $statusMsg = 'Please select an image file to upload.';
   }
}

echo $statusMsg;


?>