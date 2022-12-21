<?php
setcookie("email", null,time()+3600*24*30, '/');
setcookie("is_owner", null,time()+3600*24*30, '/');
header("Location:  ../home.php");
?>