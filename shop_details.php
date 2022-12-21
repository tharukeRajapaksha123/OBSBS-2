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

$user_id = -1;
$sql = "SELECT * FROM users WHERE email = '$user_email'";

$query = $conn->query($sql);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $user_id = $row["_id"];
      break;
   }
}

$shop_id = 0;
$shop_name = "";
$shop_image = "";
$shop_address = "";
$shop_contact_number = "";
$shop_description = "";
$shop_found = false;
$sql = "SELECT * FROM shop WHERE owner_id = $user_id";
$query = $conn->query($sql);

if ($query->num_rows > 0) {
   while ($raw = $query->fetch_assoc()) {
      $shop_id = $raw["_id"];
      $shop_name = $raw["name"];
      $shop_description = $raw["description"];
      $shop_address = $raw["address"];
      $shop_description = $raw["description"];
      $shop_image = $raw["image"];
      $shop_contact_number = $raw["contact_number"];
      $shop_found = true;
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
   </div> -->
   <!-- Button trigger modal -->

   <section style="background-color: #eee;">

      <div class="container py-5">

         <div class="row">
            <div class="col-lg-4">
               <div class="card mb-4">
                  <div class="card-body text-center">
                     <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($shop_image); ?>"
                        alt="profile_image" class="rounded-circle img-fluid" style="width: 150px;">

                     <h5 class="my-3"><?php echo ($shop_name) ?></h5>

                     <div class="d-flex justify-content-center mb-2">
                        <a href=<?php

                        if ($shop_found) {
                           echo ("./edit_shop_details.php?id=$shop_id");
                        } else {
                           echo ("./register_shop.php");
                        }
                        ?>> <button type="button" class="btn btn-primary">

                              <?php
                              if ($shop_found) {
                                 echo ("Edit");
                              } else {
                                 echo ("Add");
                              }

                              ?>
                           </button></a>
                        <form action="./services/delete_salon.php" method="post">
                           <input name="id" value=<?php echo ("$shop_id"); ?> style="display:none">
                           <button type="submit" class="btn btn-outline-primary ms-1">Delete</button>
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
                           <p class="mb-0">Salon Name</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($shop_name) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Description</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($shop_description) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Phone</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($shop_contact_number) ?></p>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-3">
                           <p class="mb-0">Address</p>
                        </div>
                        <div class="col-sm-9">
                           <p class="text-muted mb-0"><?php echo ($shop_address) ?></p>
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