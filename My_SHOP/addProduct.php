<?php
include_once("database.php");
$database = new Database();

if(isset($_POST) && !empty($_POST)){
    $stt = $database->insertProduct( $_POST['name'],  $_POST['price'],  $_POST['description'] );
    if($stt){
        echo "Added successfully!";
    }else{
        echo "Failed to add product";
    }
    if (($_FILES['image']['name']!="")){
    
        $target_dir = "img/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = $_POST['name'];
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".png";
        move_uploaded_file($temp_name,$path_filename_ext);
    
    }
}


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
<body>


    <header class=addproduct>
        <h3>ADD PRODUCT:</h3>
    </header>

<title>
    <h3>
        Add product:
    </h3>

</title>
</head>
<body>
<form class=added  method="POST" enctype="multipart/form-data">
Name :<input class=nameInput type="text" name="name"/></br></br>
Description :<input type="text" name="description"/></br></br>
Price :<input class=priceInput type="number" name="price"/></br></br>
Picture :<input type="file" name="image" accepte="image/png"/></br></br>

<input type="submit" value="save">
</form>

<a href="admin.php">Back</a>
</body>
</html>

