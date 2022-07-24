<?php
include_once("database.php");
$database = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

<link rel="stylesheet" href="style.css">

</head>

<a href="logoutAdmin.php" class="logout-admin">Logout</a></br>
<form class=liens method="POST" action="DisplayingAllUsers.php">
<a href="displayAllUsers.php">Display all users</a></br></br>
<a href="editUser.php">Edit user</a></br></br>
<a href="deleteUser.php">Delete user</a></br></br>
<a href="addProduct.php">Add product</a></br></br>
<a href="displayAllProducts.php">Display all products</a></br></br>
<a href="editProduct.php">Edit product</a></br></br>
<a href="deleteProduct.php">Delete product</a></br></br>
</form>
