<?php
    include_once("../Config/fonctions.php");
    session_start();
    
    if(isset($_GET['id'])){
        $id = htmlspecialchars($_GET['id']);
        $product = recupererProduitParId($id);
    }
    
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
    <script src="../Js/fichier.js"></script>
    <title>Description</title>
</head>
<body>
    <?php include_once("header.php") ?>
    
    <section>
        <div class="description containerBody">
            <div>
                <div class="img-zoom-container">
                        <img  src="./../../uploaded_img/<?php echo $product['image_01'] ?>" width="400" height="400" id="imgPrincipal">
                        <div id="myresult" class="img-zoom-result"></div>
                    
                    <div class="sousImage">
                        <img src="./../../uploaded_img/<?php echo $product['image_01'] ?>" width="40" height="40" class="img1">
                        <img src="./../../uploaded_img/<?php echo $product['image_02'] ?>" width="40" height="40" class="img1">
                        <img src="./../../uploaded_img/<?php echo $product['image_03'] ?>" width="40" height="40" class="img1">
                    </div>
                </div>
            </div>
            <div class="desc">
                <div class="nomPrix">
                    <h3><?php echo $product['name'] ?></h3>
                    <h3><?php echo $product['price'] ?> MAD</h3>
                </div>
                <p>
                <div class="details">
                    <h1>Description</h1>
                    <?php echo $product['details'] ?>
                </div>
                </p>
                <form action="../Controller/addToCart.php?id=<?php echo $id ?>" method="POST">
                    <p>Quantité: 
                        
                        <input type="number" name="quantity" value="1" min="1" max="100" id="inputNumber">
                        
                    <p>
                    <button type="submit" class="btn">Add to Cart</button>
                </form>
                
            </div>
        </div>
    </section>
    <?php include_once("footer.php") ?>
</body>
</html>