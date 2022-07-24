<?php

class Database{
 
    private $connexion;    
    function __construct()
    {
            $host='localhost';
            $port=3306;
            $db='my_shop';
            $user='mehdi';
            $pass='academy';

            $this->connexion = new PDO("mysql:host=$host; port=$port; dbname=$db", $user, $pass);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }
    
    public function listUsers()
    {
        $stt = $this->connexion->prepare("
        SELECT *
        FROM users
            ");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat;
    }

    public function oneUser($id)
    {
        $stt = $this->connexion->prepare("
        SELECT *
        FROM users WHERE
        id = '$id' ");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat[0];
    }

    public function updateUser($id, $username, $email, $admin)
    {
        $query = "UPDATE users SET username ='$username', email='$email', admin='$admin' WHERE id='$id'";
        $stt = $this->connexion->query($query);
        if($stt){
            return true;
        }else{
            return false;
        }
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id='$id'";
        $stt = $this->connexion->prepare($query);
        $stt->execute();
        if($stt){
            return true;
        }else{
            return false;
         }
    }

    public function insertProduct($name, $price, $description)
    {
        $query = "INSERT INTO products(name, price, description) VALUES ('$name', '$price', '$description')";
        $stt = $this->connexion->exec($query);
        if($stt){
            return true;
        }else{
            return false;
         }
    
    }

    public function listProducts()
    {
        $stt = $this->connexion->prepare("
        SELECT *
        FROM products
            ");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat;
    }

    public function oneProduct($id)
    {
        $stt = $this->connexion->prepare("
        SELECT *
        FROM products WHERE
        id = '$id' ");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat[0];
    }

    public function updateProduct($id, $name, $price, $description)
    {
        $query = "UPDATE products SET name ='$name', price='$price', description='$description' WHERE id='$id'";
        $stt = $this->connexion->query($query);
        if($stt){
            return true;
        }else{
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $query = "DELETE FROM products WHERE id='$id'";
        $stt = $this->connexion->prepare($query);
        $stt->execute();
        if($stt)
            {
                return true;
            }
        else
        {
                return false;
        }
    }       
    
    public function searchProduct($value)
    {
        $stt = $this->connexion->prepare("
        SELECT *
        FROM products WHERE
        name LIKE '%$value%' ");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat;
    }

    public function productPrice($max, $min){
        $stt = $this->connexion->prepare("
        SELECT *
        FROM products WHERE
        price BETWEEN  $min and $max");
        $stt-> execute();
        $resultat = $stt->fetchall(PDO::FETCH_ASSOC);

        return $resultat;
    }
}

?>
