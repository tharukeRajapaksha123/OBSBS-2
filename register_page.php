<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
</head>

<body>
   <h1>Register User </h1>
   <form action="register_service.php" method="post" enctype="multipart/form-data">
      Name : <input required type="text" name="name"><br>
      Email : <input required type="text" name="email"><br>
      Contact Number: <input required type="text" name="contact_number"><br>
      Address : <input required type="text" name="address"><br>

      Profile Image <input required type="file" name="image"><br>

      Is Owner <input type="radio" id="owner" name="owner" value="owner">
      Not a Owner <input type="radio" id="owner" name="owner" value="not_owner">
      Password : <input required type="password" name="password"><br>
      <input type="submit" value="Register" name="submit">
   </form>
   <p>Already have an account ? <a href="login_page.php">Login Now</a></p>
</body>

</html>