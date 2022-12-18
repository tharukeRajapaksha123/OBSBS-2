<!DOCTYPE html>
<html>

<head>
   <title>Login Form</title>
   <link rel="stylesheet" type="text/css" href="./css/auth_page.css">
</head>

<body>
   <div id="login-body">
      <div class="content" style="flex:2">
         <img
            src="https://images.unsplash.com/photo-1637777277435-3c44f82fd0c9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=384&q=80"
            alt="home">
      </div>

      <div class="content" style="flex:3;padding: 100px;">
         <h2>Welcome Back</h2>
         <p>asdjoaijd aosijdad masidaiodioada aisdaiosd</p>
         <div >
            <form id="login" method="POST" action="./services/login_service.php">
               <label><b>Email
                  </b>
               </label>
               <br>
               <input required type="text" name="email" id="Uname" placeholder="Email">
               <br><br>
               <label><b>Password
                  </b>
               </label>
               <br>
               <input required type="Password" name="password" id="Pass" placeholder="Password">
               <br><br>
               <input type="button" name="log" id="log" onclick="submitForm()" value="Log In Here">
               <br><br>
            </form>
            <p> Don't have an account <a href="register_page.php"> register </a> now </p> 
         </div>
      </div>

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