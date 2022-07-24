<?php
include_once("database.php");
$database = new Database();
$res = [];
$searchText= '';
$maxPrice=1000;
$minPrice=0;
    if(isset($_POST) && !empty($_POST) && isset($_POST['search'])){
        $searchText = $_POST['search'];
        $res= $database->searchProduct($_POST['search']);
    }else if(isset($_POST) && !empty($_POST) && isset($_POST['max'])){
      $maxPrice = $_POST['max'];
      $minPrice = $_POST['min'];
      $res= $database->productPrice($maxPrice, $minPrice);
    }else{
        $res = $database->listProducts();
    }

?>


    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projet</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    
</head>
<body>
    <header>
        <div class="container">  
            <div class="left">
                    <img src="img/Logo.png" alt="logo" class="left" style="cursor: pointer;" onclick="alert('Menu');">
                    <div class="left a-container" >
                        <a href="#">HOME</a>
                        <a href="#">SHOP</a>
                        <a href="#">MAGAZINE</a>
                    </div>  
            </div>
            <div class="right " style="margin-top: 25px;">
            
                    <img src="img/Cart Button.png" class="cart" alt="cart" onclick="alert('cart');"> 
                    <div class="right">
                    <a href="logoutUser.php">LOGOUT</a>                      
                    </div>
            </div>
        </div>
        <div class="header-b">
        <form method="POST" >
            
            <div class="search">
                   <input class="search-a" type="text" name="search" value="<?php echo $searchText ?>">
                   <hr class="ligne" size="2" />
            </div>
            <div class="powered">
               <p>Powered by Algolia</p>
           </div>
           <div class="logoo">
               <img src="img/Sajari Logo.png" alt="logo">
           </div>
           <div class="loupe">
               <!--<img src="img/Search.png" alt="loupe" onclick="alert('search');"> -->
               <input type="image" name="submit"  src="img/Search.png" alt="loupe" />
           </div>
          </form>
            <div style="float: left; width: 21.5%;">
                <Select class="liste-deroulante-search">
                    <option>Best match</option>
                </Select>
            </div>

        </div>
    </header>
    <section>
        <div class="wrapper">
            <div class="liste-deroulante">
                <p class="left">FILTER BY</p>
                <div class="liste-deroulante-a">
                    <Select class="collection">
                        <option>Category</option>
                        <option>Black</option>
                    </Select>
                       
                    
                </div>
                              
                <div>
                 
                <div class="filtre">
                  <form method="POST" >
                        <p class="filte-a">Price Range</p>
                        <div class="left range">   
                            <div class="filtre-b">
                                        <span>Min:</span> <input type="number" name ="min"  class="min" value="<?php echo $minPrice ?>">&ensp;$</br> </br>  
                                        <span>Max:</span> <input type="number" name ="max" class="max" value="<?php echo $maxPrice ?>">&ensp;$                      
                            </div>        
                            <div class="left">
                                <input type="submit" value="Ok" class="filterPriceButton" />
                            </div>      
                        </div>  
                                
                  </div>
                </form>
                </div>


            </div>
            <?php 
                foreach($res as $product){
            ?>
            <div class="produit">
                <img src="img/<?php echo $product['name']; ?>.png" alt="produit" class="image-produit" style="cursor: pointer;" onclick="alert('Produit');">
                <div style="margin: 13px;">
                    <a href="#" class="left" onclick="alert('produit')"><?php echo $product['name']; ?></a>
                    <p class="right"><?php echo $product['price']; ?>$</p>
                </div>
                <div style="margin-left: 13px;">
                    <div class="left">
                        <p class="categorie">LOUNGE</p>
                        <div style="margin-top: 10px;">
                            <img src="img/Star - On.png" alt="star" class="left" style="margin-right: 4px;">
                            <img src="img/Star - On.png" alt="star" class="left" style="margin-right: 4px;">
                            <img src="img/Star - On.png" alt="star" class="left" style="margin-right: 4px;">
                            <img src="img/Star - On.png" alt="star" class="left" style="margin-right: 4px;">
                            <img src="img/Star.png" alt="star" class="left">
                        </div>
                    </div>
                    <img src="img/Cart Button.png" class="right" alt="cart" onclick="alert('cart');" style="margin: 6px 13px;cursor: pointer;"> 
                </div>
            </div>
            <?php } ?>
        </div>

     </section>
    <footer>
        <div class="pagination">
            <a class="active" href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">6</a>
            <a href="#">7</a>
            <a href="#">8</a>
            <a href="#">9</a>
            <a href="#">10</a>
            <a href="#">&raquo;</a>
          </div>
        
    </footer>

</body>
</html>