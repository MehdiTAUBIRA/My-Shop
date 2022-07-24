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
    <header class=login>
        <h3>LOGIN TO MY SHOP:</h3>
    </header>
<form action="login.php" method="post">
    <div class=login2>
    <p class=emaillogin class="email">Email : <input type="email" name="Email" /></p>
    <p class="password">Password : <input type="password" name="Password" /></p>
    <p class="submit"><input type="submit" value="LOGIN"></p>
    </div>
</form>
</html>
<?php
$host='localhost';
$port=3306;
$db='my_shop';
$user='rekkad';
$pass='P@ssw0rd';

try{
if($_SERVER["REQUEST_METHOD"] == "POST"){
$email=$_POST['Email'];
$password=$_POST['Password'];
$connexion = new PDO("mysql:host=$host; port=$port; dbname=$db", $user, $pass);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sth = $connexion->prepare("
                SELECT *
                FROM users
                WHERE email = '$email';
            ");
$sth-> execute();
$resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
if(empty($resultat)){
    echo "Invalid email";
}elseif(!password_verify($password, $resultat[0]['password'])){
    echo "invalid password";
}else{
    session_start();
    $_SESSION['username'] = $resultat[0]['username'];
    header('Location:index.php');
}

}
}
catch(Exception $e){
    echo "Erreur : " . $e->getMessage();
  }