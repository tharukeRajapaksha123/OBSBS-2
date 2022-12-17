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
         <li><a href="#" onclick="loadHtml('template','shop_details.php')">Shop Details</a></li>
      </ul>
   </div>
   <div id="template" class="template">

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

      function getSearchParameters() {
         var prmstr = window.location.search.substr(1);
         return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
      }

      function transformToAssocArray(prmstr) {
         var params = {};
         var prmarr = prmstr.split("&");
         for (var i = 0; i < prmarr.length; i++) {
            var tmparr = prmarr[i].split("=");
            params[tmparr[0]] = tmparr[1];
         }
         return params;
      }

      var params = getSearchParameters();
      for (var data in params) {
         if (params[data].includes("update")) {
            loadHtml("template", "profile.php")
            break;
         } else {
            loadHtml("template", "bookings.php")
         }
      }

   </script>

</body>




</html>