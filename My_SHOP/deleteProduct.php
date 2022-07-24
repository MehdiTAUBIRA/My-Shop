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
<table class="products">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Category_id</th>
        <th>Action</th>
    </tr>
  <?php
  
  foreach ($resultat as $value)
  {
echo 
"<tr>
    <td>" . $value['id'] . "</td>
    <td>" . $value['name'] . "</td>
    <td>" . $value['price'] . "</td>
    <td>" . $value['description'] . "</td>
    <td>" . $value['category_id'] . "</td>
    
    <td><a href='deleteProductStep2.php?id=" . $value['id'] . "'>Delete</a></td>
</tr>";
  }
  ?>
  
</table>
<a href="admin.php">Back</a>
</html>
