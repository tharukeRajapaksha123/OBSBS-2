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


$status = $statusMsg = 'asdasd';
if (isset($_POST["submit"])) {
   $name = $_POST["name"];
   $email = $_POST["email"];
   $contact_number = $_POST["contact_number"];
   $address = $_POST["address"];
   $pass = $_POST["password"];
   $is_owner = $_POST["owner"];

   $owner_value = 1;

   if ($is_owner === "not_owner") {
      $owner_value = 0;
   }


   $status = 'error';
   if (!empty($_FILES["image"]["name"])) {

      $fileName = basename($_FILES["image"]["name"]);
      $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


      $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
      if (in_array($fileType, $allowTypes)) {
         $image = $_FILES['image']['tmp_name'];
         $imgContent = addslashes(file_get_contents($image));

         $sql = "
            INSERT INTO users (
               name,
               email,
               contact_number,
               address,
               profile_picture,
               is_owner,
               password
            )
            VALUES (
               '$name',
               '$email',
               '$contact_number',
               '$address',
               '$image',
               $owner_value,
               '$pass'
            );
";

         $insert = $conn->query($sql);

         if ($insert) {
            setcookie("email", $email);
            setcookie("is_owner", $owner_value);
            if ($owner_value == 1) {
               header("Location: shop_owner_dashboard.php");
            } else {
               header("Location: home.php");
            }

            $status = 'success';
            $statusMsg = "File uploaded successfully.";
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