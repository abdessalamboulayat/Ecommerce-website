<?php
    include_once("../config/fonctions.php");

    if(isset($_GET['idCategory'])){
        $idCategory = htmlspecialchars($_GET['idCategory']);
    }
        $db;
        $req = $db->prepare("SELECT * FROM products WHERE id_category = ?");
        $req->execute(array($idCategory));
        $productKids = $req->fetchAll();
     
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/style.css" >
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Eshop Clothes</title>
</head>
<body>
    <?php include_once("../View/header.php"); ?>
<div class="containerBody">
            <div>
                <h1>Kids</h1>
                
                <div class="produits">
                <?php foreach($productKids as $value){ 
                ?>
                    <div  id="prod">
                        <div class="favouriteProduit2">
                            <a href="description.php?id=<?php echo $value['id']?>"><img src="./../../uploaded_img/<?php echo $value['image_01'] ?>" width="300" height="300"/></a>
                            <div class="prixPanier">
                                <p><?php echo $value['name'] ?></p>
                                <p><?php echo $value['price'] ?> MAD</p>
                            </div>
                            <div  class="prixPanier">
                                <p><a href="#"><i class="bi bi-cart-plus-fill"></i></a></p>
                                <p><a href="description.php?id=<?php echo $value['id']?> " class="showDetailsBtn">Show Details</a></p>
                            </div>
                        </div>
                    </div>  
                <?php } ?>
                </div>
            </div>
</div>

<?php

include_once("footer.php") ?>
</body>