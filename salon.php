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

$sql = "SELECT * FROM shop WHERE _id = $id";
$fethc_services_query = "SELECT * FROM service WHERE shop_id = $id";

//shop details
$shop_name = "";
$shop_image = "";
$shop_address = "";
$shop_contact_number = "";
$shop_description = "";

$query = $conn->query($sql);
if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $shop_name = $row["name"];
      $shop_image = "data:image/jpg;charset=utf8;base64,".base64_encode($row['image']);
      $shop_address = $row["address"];
      $shop_contact_number = $row["contact_number"];
      $shop_description = $row["description"];
      break;
   }
}

$result = $conn->query($fethc_services_query);



?>


<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="./css/style.css">
   <link rel="stylesheet" href="./css/salon.css">
   <title>
      <?php echo ("$shop_name") ?>
   </title>
</head>

<body>
   <section class="home">
      <div class="swiper home-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide container" style=<?php echo ("background:url($shop_image) no-repeat") ?>>
               <div class="shadow-wrapper">
                  <h1 class="salon-name">
                     <?php echo ("$shop_name") ?>
                  </h1>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section class="salon-details">
      <div class="shop-data">
         <p>
            <?php echo ("$shop_description"); ?>
         </p>

      </div>
      <div class="shop-data">
         <p>
            Contact Us :
            <?php echo ("$shop_contact_number"); ?>
         </p>
         <p>
            Address :
            <?php echo ("$shop_address"); ?>
         </p>
      </div>
   </section>
   <section class="home-salonss">
      <h1 class="heading-title"> Our Services </h1>
      <div class="box-container">
         <?php

   if ($result->num_rows > 0) { // output data of each row
      while ($row = $result->fetch_assoc()) { ?>
         <div class="box">
            <div class="image">
               <img src='<?php echo ($row["image"]); ?>' alt="my-image">
            </div>
            <div class="content">
               <h3>
                  <?php echo ($row["name"]); ?>
               </h3>
               <p>
                  Rs. <?php echo ($row["price"]); ?>
               </p>
               <a href=<?php echo ("book.php?service_id=".$row['_id']."&id=".$id); ?> class="btn">Book Now</a>
            </div>
         </div>
         <?php }
   }
         ?>
      </div>
   </section>
</body>

</html>