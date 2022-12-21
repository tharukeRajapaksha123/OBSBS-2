<?php
include("./services/conn.php");
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

$sql = "SELECT * FROM shop WHERE _id = $id";

$query = $conn->query($sql);

$salon_name = "";
$salon_address = "";
$salon_contact_number = "";
$salon_image = "";
$salon_description = "";


if ($query->num_rows > 0) {
   while ($row = $query->fetch_assoc()) {
      $id = $row["_id"];
      $salon_name = $row["name"];
      $salon_contact_number = $row["contact_number"];
      $salon_image = $row["image"];
      $salon_description = $row["description"];
      $salon_address = $row["address"];
      break;
   }
}


?>

<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/create_service.css">
   <title>Edit salon</title>
</head>

<body>
   <div class="body">
      <h1>Edit salon</h1>
      <div class="glass-card">
         <form action="./services/edit_salon.php" method="post">

            <input name="id" value=<?php echo ($id) ?> style="display:none">
            Name : <input name="name" value=<?php echo ($salon_name) ?>> <br>
            Description :<br> <textarea name="description" cols="40" rows="5" ><?php echo ($salon_description) ?></textarea> <br>
            Address :<br> <textarea name="address" cols="40" rows="5" ><?php echo ($salon_address) ?></textarea> <br>
       
            contact_number : <input name="contact_number" value=<?php echo ($salon_contact_number) ?>><br>
            <input id="btn" type="submit" value="Update salon">
         </form>
        
      </div>
   </div>
</body>

</html>