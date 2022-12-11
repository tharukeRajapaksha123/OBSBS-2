<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
</head>
<body>
   <form action="register_service.php" method="post" enctype="multipart/form-data">
         <input required type="text" name="name">
         <input required type="text" name="email">
         <input required type="text" name="contact_number">
         <input required type="text" name="address">
         <input required type="text" name="address">
         <input required type="file" name="image">
        
         Is Owner  <input type="radio" id="owner" name="owner" value="owner">
         Not a Owner  <input type="radio" id="owner" name="owner" value="not_owner">
         <input required type="password" name="password">
         <input type="submit" value="Register" name="submit">
   </form>
</body>
</html>