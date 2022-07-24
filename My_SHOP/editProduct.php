<?php
include_once("database.php");
$database = new Database();
$resultat = $database->listProducts();




?>

    <html>
    <head>
         <link rel="stylesheet" href="style.css">
    </head>
    <h3 class="title">LIST OF PRODUCTS:</h3>
<table class="users">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
  <?php
  
  foreach ($resultat as $value){
     
echo 
"<tr>
    <td>" . $value['id'] . "</td>
    <td>" . $value['name'] . "</td>
    <td>" . $value['price'] . "</td>
    <td>" . $value['description'] . "</td>
    
    <td><a href='editProductStep2.php?id=" . $value['id'] . "'>Edit</a></td>
</tr>";
  }
  ?>
  
</table>
<a href="admin.php">Back</a>
</html>
