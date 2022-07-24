<?php
include_once("database.php");
$database = new Database();
$id = $_GET['id'];
$user = $database->oneProduct($id);
if(isset($_POST) && !empty($_POST)){
    $stt = $database->updateProduct($id , $_POST['name'],  $_POST['price'],  $_POST['description'] );
    if($stt){
        echo "Updated successfully!";
        $user = $database->oneProduct($id);
        header('Location:editProduct.php');
    }else{
        echo "Failed to update";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

<link rel="stylesheet" href="style.css">
<body>
</head>
<header>

    <h3>
        Edit product:
    </h3>

</header>
</head>

<form class=editProduct  method="POST">
Name :<input class=nameProduct type="text" name="name" value="<?php echo $user['name'] ?>"/></br></br>
Price :<input class=priceProduct type="number" name="price" value="<?php echo $user['price'] ?>"/></br></br>
Description :<input type="text" name="description" value="<?php echo $user['description'] ?>"/></br></br>
<p>
<input class=inputSave type="submit" value="save"></br>
</form>

<a href="editProduct.php">Back</a></br>
</body>
</html>

