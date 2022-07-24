<?php
include_once("database.php");
$database = new Database();
$resultat = $database->listProducts();
?>



<html>
    <head>
         <link rel="stylesheet" href="style.css">
    </head>
    <h3 class="title">LIST OF PRODUCT:</h3>
<table class="products">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>category_id</th>
        <th>description</th>
    </tr>
  <?php
  
  foreach ($resultat as $value){
echo 
"<tr>
    <td>" . $value['id'] . "</td>
    <td>" . $value['name'] . "</td>
    <td>" . $value['price'] . "</td>
    <td>" . $value['category_id'] . "</td>
    <td>" . $value['description'] . "</td>
    
</tr>";
  }
  ?>
  
</table>
<a href="admin.php">Back</a>
</html>