<?php
include_once("database.php");
$database = new Database();
$id = $_GET['id'];
$user = $database->oneUser($id);
if(isset($_POST) && !empty($_POST)){
    $stt = $database->updateUser($id , $_POST['username'],  $_POST['email'],  $_POST['admin'] );
    if($stt){
        echo "Updated successfully!";
        $user = $database->oneUser($id);
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

</head>
<body>


    <header class=edituser2>
        <h3>EDIT USER:</h3>
    </header>


</head>
<form class=edituser  method="POST">
username :<input type="text" name="username" value="<?php echo $user['username'] ?>"/></br></br>
Email :<input class=emailuser type="email" name="email" value="<?php echo $user['email'] ?>"/></br></br>
Admin :<input class=admin type="text" name="admin" value="<?php echo $user['admin'] ?>"/></br></br>
<p>
<input class=submitUser type="submit" value="save">
</form>

<a href="editUser.php">Back</a>
</body>
</html>

