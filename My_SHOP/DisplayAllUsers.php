<?php
include_once("database.php");
$database = new Database();
$resultat = $database->listUsers();
?>

    <html>
    <head>
         <link rel="stylesheet" href="style.css">
    </head>
    <h3 class="title">LIST OF USERS:</h3>
<table class="users">
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Admin</th>
    </tr>
  <?php
  
  foreach ($resultat as $value){
      $isadmin;
      if($value['admin']== 1){
        $isadmin= "true";
      }else{
          $isadmin= "false";
      }
echo 
"<tr>
    <td>" . $value['id'] . "</td>
    <td>" . $value['username'] . "</td>
    <td>" . $value['email'] . "</td>
    <td>" . $isadmin . "</td>
</tr>";
  }
  ?>
  
</table>
<a href="admin.php">Back</a>
</html>

 
