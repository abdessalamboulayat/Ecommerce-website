<?php
    session_start();
    if(isset($_SESSION['user'])){
        $idUser = $_SESSION['user']['id'];
        include_once("../config/fonctions.php");
        $favoutiteProducts = getFavouriteProducts($idUser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>My favourite Products</title>
</head>
<body>
    <?php include_once("header.php") ?>
        <section class="favouriteProduit">
            <div class="favouriteProduit1">
                <?php 
                    foreach($favoutiteProducts as $value){
                        $product = recupererProduitParId($value['product_id']);
                ?>
                <div class="favouriteProduit2">
                    <a href="description.php?id=<?php echo $product['id']?>">
                        <img src="./../../uploaded_img/<?php echo $product['image_01'] ?>"  >
                        <div class="prixPanier">
                            <p><?php echo $product['name'] ?></p>
                            <p><?php echo $product['price'] ?> MAD</p>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?> 
        </section>
</body>
</html>
<?php 
    }
    else{
        $_SESSION['url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location: login.php");
    }
?>