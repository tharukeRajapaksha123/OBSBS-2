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
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
   $url = "https://";
} else {
   $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$id = $params["id"];
$service_id = $params["service_id"];
$sql = "SELECT * FROM shop WHERE _id = $id";
$user_id = 1;
$user_email = $_COOKIE["email"];
$fetch_user_query = "SELECT * FROM users WHERE email = '$user_email'";
$fethc_services_query = "SELECT * FROM service WHERE _id = $service_id";


$user_name = "";
$user_contact_number = "";
$user_email = "";


//shop details
$shop_name = "";
$shop_image = "";
$shop_address = "";
$shop_contact_number = "";
$shop_description = "";

$service_name = "";
$service_image = "";
$service_address = "";
$service_cost = 0;

$query = $conn->query($sql);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $shop_name = $row["name"];
      $shop_image = $row["image"];
      $shop_address = $row["address"];
      $shop_contact_number = $row["contact_number"];
      $shop_description = $row["description"];
      break;
   }
}
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
$query = $conn->query($fethc_services_query);

if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $service_name = $row["name"];
      $service_cost = $row["price"];

      break;
   }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>book</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- header section starts  -->

   <section class="header">

      <a href="home.php" class="logo">just for you</a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="about.php">about</a>
         <a href="salons.php">salons</a>
         <a href="book.php">book</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

   <!-- header section ends -->

   <div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
      <h1>book now</h1>
   </div>

   <!-- booking section starts  -->

   <section class="booking">
      <form action="book_form.php" method="post" class="book-form">
         <div class="flex">
            <div class="inputBox">
               <span>name :</span>
               <input required value="<?php echo ($user_name) ?>" type="text" placeholder="enter your name" name="customer_name">
            </div>
            <div class="inputBox">
               <span>email :</span>
               <input value="<?php echo ($user_email) ?>" type="email" placeholder="enter your email" name="email">
            </div>
            <div class="inputBox">
               <span>phone :</span>
               <input value="<?php echo ($user_contact_number) ?>" type="number" placeholder="enter your number"
                  name="phone">
            </div>
            <div class="inputBox">
               <span>address :</span>
               <input value="<?php echo ($user_address) ?>" type="text" placeholder="enter your address" name="address">
            </div>
            <div class="inputBox">
               <span>Salon :</span>
               <input value="<?php echo ($shop_name) ?>" disabled type="text" placeholder="place you want to visit"
                  name="salon">
            </div>
            <div class="inputBox">
               <span>how many :</span>
               <input type="number" placeholder="number of guests" name="guests">
            </div>
            <div class="inputBox">
               <span>Service :</span>
               <input disabled value="<?php echo ($service_name) ?>" type="text" name="servsice_name">
            </div>
            <div class="inputBox">
               <span>arrivals :</span>
               <input type="date" name="booked_date">
            </div>
         </div>
         <div style="display: none;">
            <input type="text" name="shop_id" value="<?php echo ($id) ?>">
            <input type="text" name="user_id" value="<?php echo ($user_id) ?>">
            <input type="number" name="total_cost" value="<?php echo ($service_cost) ?>">
            <input type="number" name="contact_number_shop" value="<?php echo ($shop_contact_number) ?>">
            <input type="text" name="service_name" value="<?php echo ($service_name) ?>">
         </div>
         <input type="submit" value="submit" class="btn" name="send">

      </form>

   </section>

   <!-- booking section ends -->

















   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>quick links</h3>
            <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> book</a>
            <a href="package.php"> <i class="fas fa-angle-right"></i> about us</a>
            <a href="book.php"> <i class="fas fa-angle-right"></i> help</a>
         </div>

         <div class="box">
            <h3>extra links</h3>
            <a href="#"> <i class="fas fa-angle-right"></i> about us</a>
            <a href="#"> <i class="fas fa-angle-right"></i> privacy policy</a>
            <a href="#"> <i class="fas fa-angle-right"></i> terms of use</a>
         </div>

         <div class="box">
            <h3>contact info</h3>
            <a href="#"> <i class="fas fa-phone"></i> +94 1123 45956 </a>
            <a href="#"> <i class="fas fa-phone"></i> +94 7661 56302 </a>
            <a href="#"> <i class="fas fa-envelope"></i> justforyou@gmail.com </a>
            <a href="#"> <i class="fas fa-map"></i> Colombo, Sri Lanka </a>
         </div>

         <div class="box">
            <h3>follow us</h3>
            <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
            <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
            <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
            <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
         </div>

      </div>

      <div class="credit"> created by <span>team all in one</span> | all rights reserved. </div>

   </section>

   <!-- footer section ends -->









   <!-- swiper js link  -->
   <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>