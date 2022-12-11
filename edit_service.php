<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "salon_db";
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);



// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
   $url = "https://";
} else {
   $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$id = $params["id"];

$sql = "SELECT * FROM service WHERE _id = $id";

$query = $conn->query($sql);

$service_name = "";
$service_price = "";
$service_image = "";


if($query->num_rows > 0){
   while($row=$query->fetch_assoc()){
      $id = $row["_id"];
      $service_name = $row["name"];
      $service_price = $row["price"];
      $service_image = $row["image"];
      break;
   }
}


?>

<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Service</title>
</head>
<body>
   <h1>Edit Service</h1>
   <form action="edit_service_service.php" method="post">
   
      <input name="id" value=<?php echo($id) ?> style= "display:none">
      Name : <input name="name" value=<?php echo($service_name) ?> > <br>
      Image Link : <input name="image" value=<?php echo($service_image) ?> placeholder="Paste your service image link here" ><br>
      Price : <input name="price" value=<?php echo($service_price) ?> ><br>
      <input type="submit" value="Update Service">
   </form>
   <form action="delete_service.php" method="post">
          <input style="display: none;" name="id" value=<?php echo ($id) ?> >
      <input type="submit" value="delete service">
   </form>
</body>
</html>