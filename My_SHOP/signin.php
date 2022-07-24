<?php
$host='localhost';
$port=3306;
$db='my_shop';
$user='mehdi';
$pass='academy';

try{
if($_SERVER["REQUEST_METHOD"] == "POST"){
$email=$_POST['email'];
$password=$_POST['password'];
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
}elseif($resultat[0]['admin']!=1){
    echo 'admin not found';
}elseif(!password_verify($password, $resultat[0]['password'])){
    echo "invalid password";
}else{
    session_start();
    $_SESSION['username'] = $resultat[0]['username'];
    header('Location:admin.php');
}

}
}
catch(Exception $e){
    echo "Erreur : " . $e->getMessage();
  }
?>


  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<header>

<h1>Sign in</h1>

</header>

<div class=Container>


    <div class="form">
        <form method="POST" action="signin.php">
            <table>
            
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="Password" name="password" required></td>
                </tr>
            
            </table>

            <p><label><input type="checkbox" name="connect" checked> Stay connected</label</p>

            <div id="button">
                <button>Sign in</button>
            </div>

        </form>
    </div>

</div>
    
</body>
</html>