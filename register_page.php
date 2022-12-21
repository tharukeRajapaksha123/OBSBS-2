<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/auth_page.css">
   <title>Register</title>
</head>

<body>
   <div id="login-body">
      <div class="content" style="flex:2">
         <img
            src="https://images.unsplash.com/photo-1589710751893-f9a6770ad71b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80">
      </div>
      <div class="content" style="flex:3;padding : 0 100px;">
         <h1>Register User </h1>
         <form action="./services/register_service.php" method="post" enctype="multipart/form-data">
            <label>Name</label> <br> <input type="text" name="name" required><br><br>
            <label>Email :</label> <br> <input type="text" name="email" required><br><br>
            <label>Contact Number:</label> <br> <input type="text" name="contact_number" required><br><br>
            <label> Address :</label> <br> <input type="text" name="address" required><br><br>

            <label>Profile Image</label> <br> <input type="file" name="image" required><br><br>

            <label>Is Owner </label>  <input type="radio" id="owner" name="owner" value="owner" required><br><br>
            <label>Not a Owner</label>  
               <input type="radio" id="owner" name="owner" value="not_owner" required><br><br>
            <label>Password :</label> <br> <input required type="password" name="password" required><br><br>
            <input  id="log" type="submit" value="Register" name="submit">
         </form>
         <p>Already have an account ? <a href="login_page.php">Login Now</a></p>
      </div>
   </div>
</body>

</html>