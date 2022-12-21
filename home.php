<?php 
   if($_COOKIE["email"] == null){
      header("Location: login_page.php");
   }

?>





<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

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
         <a href="bookings.php">Bookings</a>
         <a href="profile.php">profile</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

   <!-- header section ends -->

   <!-- home section starts  -->

   <section class="home">

      <div class="swiper home-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
               <div class="content">
                  <h3>Put Some "suite" in Your Life</h3>
                  <a href="salons.php" class="btn">discover more</a>
               </div>
            </div>

            <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
               <div class="content">
                  <h3>We Will Style While You Smile</h3>
                  <a href="salons.php" class="btn">discover more</a>
               </div>
            </div>

         </div>

         <div class="swiper-button-next"></div>
         <div class="swiper-button-prev"></div>

      </div>

   </section>

   <!-- home section ends -->



   <!-- home about section starts  -->

   <section class="home-about">

      <div class="image">
         <img src="images/about-img.jpg" alt="">
      </div>

      <div class="content">
         <h3>about us</h3>
         <p>We’re the people who can help you put your passion to work and the space you need to build the business of
            your dreams. As a salon professional, no matter your specialty, you’ll find kindred spirits and comfortable
            surroundings when you join with us</p>
         <a href="about.php" class="btn">read more</a>
      </div>

   </section>

   <!-- home about section ends -->




   <!-- home salons section starts  -->

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

   $sql = "SELECT * FROM shop";
   $result = $conn->query($sql);

   ?>
   <section class="home-salonss">

      <h1 class="heading-title"> Top Salons </h1>

      <div class="box-container">

         <?php

         if ($result->num_rows > 0) { // output data of each row
            while ($row = $result->fetch_assoc()) { ?>
         <div class="box">
            <div class="image">
               <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']);?>" />
            </div>
            <div class="content">
               <h3>
                  <?php echo ($row["name"]); ?>
               </h3>
               <p>
                  <?php echo ($row["description"]); ?>
               </p>
               <a href=<?php echo ("salon.php?id=".$row["_id"]); ?> class="btn">see more</a>
            </div>
         </div>
         <?php }
         }
         ?>

      </div>

      <div class="load-more"> <a href="salons.php" class="btn">load more</a> </div>

   </section>



   <!-- home salonss section ends -->

















   <!-- footer section starts  -->

   <section class="footer">

      <div class="box-container">

         <div class="box">
            <h3>quick links</h3>
            <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
            <a href="about.php"> <i class="fas fa-angle-right"></i> book</a>
            <a href="salons.php"> <i class="fas fa-angle-right"></i> about us</a>
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