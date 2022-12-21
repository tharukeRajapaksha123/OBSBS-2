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
$img = null;
$query = $conn->query($fetch_user_query);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      $user_name = $row["name"];
      $user_email = $row["email"];
      $user_contact_number = $row["contact_number"];
      $user_address = $row["address"];
      $img = $row['profile_picture'];
      break;
   }
}
?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"></script>
   <title>Profile</title>
</head>

<body>
   <!-- <div>
      <h1>User Profile</h1>
      <form method="POST" action="./services/update_profile.php">
         Name : <input type="text" name="name" value=""><br>
         Email : <input type="text" name="email" value=""><br>
         Contact Number <input type="text" name="contact_number" value=""><br>
         Address <input type="text" name="address" value=""><br>
         <input type="submit" value="Update Profile">
      </form>
      <?php
      if ($_COOKIE["is_owner"] == 1) {
         echo ("<a href='register_shop.php'>Register My Salon </a>");
      }
      ?>

   </div> -->
   <section style="background-color: #eee;">
      <div class="container py-5">

         <div class="row">
            <div class="col-lg-4">
               <div class="card mb-4">
                  <div class="card-body text-center">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($img); ?>"
                        alt="profile_image" class="rounded-circle img-fluid" style="width: 150px;">

                     <h5 class="my-3"><?php echo ($user_name) ?></h5>

                     <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary">Edit</button>
                        <form action="./services/signout_service.php" method="post">
                           <button type="submit" class="btn btn-outline-primary ms-1">Logout</button>
                        </form>
                     </div>
                  </div>
               </div>

            </div>
            <div class="col-lg-8">
               <div class="card mb-4">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($user_name) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($user_email) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($user_contact_number) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($user_address) ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</body>

</html>