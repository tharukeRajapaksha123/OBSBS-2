<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/create_service.css">
   <title>Document</title>
</head>

<body>
   <div class="body">
      <h1> Register Your Shop </h1>

      <div class="glass-card">
         <form action="./register_shop_service.php" method="post" enctype="multipart/form-data">
            <input required type="text" name="name" placeholder="Shop Name">
            <input required type="text" name="address" placeholder="Address">
            <input required type="text" name="contact_number" placeholder="Contact Number">
            <textarea type="text" name="description" placeholder="Short description about your shop" cols="70" rows="5" ></textarea><br>
            Image : <input required type="file" name="image">
            <input type="submit" name="submit" value="Register">
         </form>
      </div>
   </div>
</body>

</html>