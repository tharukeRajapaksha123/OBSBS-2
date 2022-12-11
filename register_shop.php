<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <form action="./register_shop_service.php" method="post" enctype="multipart/form-data">
      <input  required type="text" name="name" placeholder="Shop Name">
      <input required type="text" name="address" placeholder="Address">
      <input required type="text" name="contact_number" placeholder="Contact Number">
      <textarea type="text" name="description" placeholder="Short description about your shop"></textarea>
      Image : <input required type="file" name="image">
      <input type="submit" name="submit" value="Upload" >
   </form>
</body>

</html>