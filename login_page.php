<!DOCTYPE html>
<html>

<head>
   <title>Login Form</title>
   <link rel="stylesheet" type="text/css" href="./css/auth_page.css">
</head>

<body>
   <h2>Welcome Back</h2><br>
   <div class="login">
      <form id="login" method="POST" action="./services/login_service.php">
         <label><b>Email
            </b>
         </label>
         <br><br>
         <input required type="text" name="email" id="Uname" placeholder="Email">
         <br><br>
         <label><b>Password
            </b>
         </label>
         <br><br>
         <input required type="Password" name="password" id="Pass" placeholder="Password">
         <br><br>
         <input type="button" name="log" id="log" onclick="submitForm()" value="Log In Here">
         <br><br>
      </form>
   </div>
   <script>
      function validMail(mail) {
         return /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+([^<>()\.,;:\s@\"]{2,}|[\d\.]+))$/.test(mail);
      }
      function submitForm() {
         const email = document.getElementById("Uname").value;
         if (validMail(email)) {
            document.getElementById("login").submit();
         } else {
             alert("Please enter valid email")
            
         }
      }
   </script>
</body>

</html>