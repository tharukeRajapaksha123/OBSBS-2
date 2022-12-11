<?php

?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/dashboard.css">
   <title>Dashboard</title>
</head>

<body class="body">
   <div>
      <ul>
         <li><a href="#" onclick="loadHtml('template','bookings.php')">Bookings</a></li>
         <li><a href="#" onclick="loadHtml('template','my_services.php')">Services</a></li>
         <li><a href="#" onclick="loadHtml('template','profile.php')">Profile</a></li>
         <li><a href="#" onclick="loadHtml('template','shop_detils.php')">Shop Details</a></li>
      </ul>
   </div>
   <div id="template" class="template">
      fdsafsf
   </div>



   <script>
      function loadHtml(id, fileName) {
         console.log(`div id ${id}, fileName ${fileName}`);
         let xhttp;
         let element = document.getElementById(id);
         let file = fileName;

         if (file) {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
               if (this.readyState == 4) {
                  if (this.status == 200) {
                     element.innerHTML = this.responseText;
                  }
                  if (this.status == 400) {
                     element.innerHTML = "<h1>Page Not Found</h1>"
                  }
               }
            }
            xhttp.open("GET", `${file}`, true);
            xhttp.send()
            return;
         }
      }
   </script>

</body>




</html>