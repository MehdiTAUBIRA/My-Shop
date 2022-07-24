<?php
$host = 'localhost';
$port = 3306;
$db = 'my_shop';
$user = 'mehdi';
$pass = "academy";
    
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST['name']) and ( strlen($_POST['name'])< 3 or strlen($_POST['name']) > 10)){
    echo "Invalid name";
}elseif(isset($_POST['email']) and !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "Invalid email";
}elseif($_POST['password'] !== $_POST['password_confirmation']){
    echo "Invalid password or password confirmation";
}else {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = crypt($_POST['password']);
    try{
        $connexion = new PDO("mysql:host=$host; port=$port; dbname=$db", $user, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO users(username,email,password,admin)
                VALUES('$name','$email','$password' , false)";
        
        $connexion->exec($sql);
        echo 'User created';
    }
    
    catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<header>

    <h3>Inscription User</h3>

</header>

<div class="Container">


    <div class="form">
        <form class="form-a" method="POST" action="inscription.php">
            <table class="tableInscription">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" required>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="Password" name="password" required></td>
                </tr>
                <tr>
                    <td>Password confirmation</td>
                    <td><input type="Password" name="password_confirmation" required></td>
                </tr>
            </table>
            <div class="button" id="button">
                <button>Sign up</button>
            </div>

        </form>
    </div>

</div>

</body>
</html>

