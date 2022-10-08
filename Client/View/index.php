<?php
    include_once("../config/fonctions.php");
    include_once("../config/connexionBdd1.php");
    session_start();
    $productsMen = getProductsByCategory(1);
    $productsWomen = getProductsByCategory(2);
    $productsKids = getProductsByCategory(3);
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="../Js/fichier.js"></script>
    <link rel="stylesheet" href="../Css/style.css" >
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Eshop Clothes</title>
</head>
<body>
    <?php include_once("header.php"); 
       

    ?>
    <section>
        <div class="imgDefilante">
            <div class="containerBody">
                <p>Ready to dress styles everyday</p>
                <a href="#man">Start Shoping Now</a>
            </div>
        </div>
        <div class="containerBody">
            <div id="man">
                <h1>Men</h1>
                
                <div class="produits" >
                <?php
                 foreach($productsMen as $value){ 
                ?>
                    <div id="prod" class="prod">
                        <div>
                        <?php 
                            if(isset($_SESSION['user'])){
                                $idProduit = $value['id'];
                                $idUser = $_SESSION['user']['id'];
                                $product = getProductWishList($idProduit, $idUser);
                                if(empty($product)){ ?>
                        <i class="bi bi-heart iconeFavourite favouriteFalse" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                        <?php } else{ ?>
                            <i class="bi bi-heart-fill iconeFavourite favouriteTrue" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                            <?php } } ?>
                        <div class="favouriteProduit2">
                            <a href="description.php?id=<?php echo $value['id']?>"><img src="./../../uploaded_img/<?php echo $value['image_01'] ?>" width="300" height="300"/></a>
                            <div class="prixPanier">
                            
                                <p><?php echo $value['name'] ?></p>
                                <p><?php echo $value['price'] ?> MAD</p>
                            </div>
                            <div  class="prixPanier">
                                <p><a href="../Controller/addToCart.php?id=<?php echo $value['id'] ?>"><i class="bi bi-cart-plus-fill"></i></a></p>
                                <p><a href="description.php?id=<?php echo $value['id']?> " class="showDetailsBtn">Show Details</a></p>
                            </div>
                        </div>
                        </div>
                    </div>  
                <?php } ?>
                </div>
            </div>
            
            <div>
                <h1>Women</h1>
                <div class="produits">
                <?php foreach($productsWomen as $value){ ?>
                    <div>
                        <div>
                        <?php 
                            if(isset($_SESSION['user'])){
                                $idProduit = $value['id'];
                                $idUser = $_SESSION['user']['id'];
                                $product = getProductWishList($idProduit, $idUser);
                                if(empty($product)){ ?>
                        <i class="bi bi-heart iconeFavourite favouriteFalse" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                        <?php } else{ ?>
                            <i class="bi bi-heart-fill iconeFavourite favouriteTrue" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                            <?php } } ?>
                        <div class="favouriteProduit2">
                            <a href="description.php?id=<?php echo $value['id']?>"><img src="./../../uploaded_img/<?php echo $value['image_01'] ?>" width="300" height="300"/></a>
                            <div class="prixPanier">
                                <p><?php echo $value['name'] ?></p>
                                <p><?php echo $value['price'] ?> MAD</p>
                            </div>
                            <div  class="prixPanier">
                                <p><a href="../Controller/addToCart.php?id=<?php echo $value['id'] ?>"><i class="bi bi-cart-plus-fill"></i></a></p>
                                <p><a href="description.php?id=<?php echo $value['id']?>" class="showDetailsBtn">Show Details</a></p>
                            </div>
                        </div>
                        </div>
                    </div>  
                <?php } ?>
                </div>
            </div>
            <div>
                <h1>Kids</h1>
                <div class="produits">
                    <?php foreach($productsKids as $value){ ?>
                    <div>
                        <div>
                        <?php 
                            if(isset($_SESSION['user'])){
                                $idProduit = $value['id'];
                                $idUser = $_SESSION['user']['id'];
                                $product = getProductWishList($idProduit, $idUser);
                                if(empty($product)){ ?>
                        <i class="bi bi-heart iconeFavourite favouriteFalse" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                        <?php } else{ ?>
                            <i class="bi bi-heart-fill iconeFavourite favouriteTrue" id="heart_<?php echo $value['id']?>" onclick="favourite(<?php echo $value['id']?>)"></i>
                            <?php } } ?>
                        <div class="favouriteProduit2">
                            <a href="description.php?id=<?php echo $value['id']?>"><img src="./../../uploaded_img/<?php echo $value['image_01'] ?>" width="300" height="300"/></a>
                            <div class="prixPanier">
                                <p><?php echo $value['name'] ?></p>
                                <p><?php echo $value['price'] ?> MAD</p>
                            </div>
                            <div  class="prixPanier">
                                <p><a href="../Controller/addToCart.php?id=<?php echo $value['id'] ?>"><i class="bi bi-cart-plus-fill"></i></a></p>
                                <p><a href="description.php?id=<?php echo $value['id']?>" class="showDetailsBtn">Show Details</a></p>
                            </div>
                            </div>
                        </div>
                    </div>  
                    <?php } ?>
                </div>
            </div>
        </div>
            
    </section>
    
    <?php include_once("footer.php") ?>
    
    <script>
        //AJAX Favourite products
            function favourite(id){

            let xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(){
                if(xhr.readyState == 4 && xhr.status == 200){
                    console.log(xhr.responseText);
                    let response = xhr.responseText;
                    console.log(response);
                    // document.getElementById("heart_"+id).innerHTML = xhr.responseText;
                    if(response == 1){
                        console.log("yes");
                    (document.getElementById("heart_"+id)).classList.add("bi-heart-fill");
                    (document.getElementById("heart_"+id)).classList.add("favouriteTrue");
                    (document.getElementById("heart_"+id)).classList.remove("bi-heart");
                    }
                    else{
                        (document.getElementById("heart_"+id)).classList.remove("bi-heart-fill");
                        (document.getElementById("heart_"+id)).classList.add("favouriteFalse");
                        (document.getElementById("heart_"+id)).classList.add("bi-heart");
                    }
                    console.log(document.getElementById("heart_"+id));
                    
                }
            }
            xhr.open('GET', '../Controller/whishlist.php?id='+id, true);
            xhr.send();
            }

    </script>
</body>
</html>