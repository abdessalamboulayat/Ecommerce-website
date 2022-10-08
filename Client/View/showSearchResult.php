<?php
    include_once("../config/connexionBdd1.php");
    session_start();
    function search($string){
        global $db;
        $req = $db->prepare("SELECT * FROM products WHERE name LIKE '%$string%'");
        $req->execute();
        $data = $req->fetchAll();
        return $data;
    }
    if(isset($_POST['search'])){
        $search = htmlspecialchars($_POST['search']);
        $products = search($search);
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
    <title>Eshop Clothes</title>
</head>
<body>
    <?php include_once("../View/header.php"); ?>
<div class="containerBody">
    <section class="showSearchProduct">
            <div>
                <h1>Results</h1>
            <?php if($products != NULL) { ?>
                <div class="produits">
                <?php foreach($products as $value){ 
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
            <?php } else {  
                    echo "No Result";
            }
                ?>
        </section>
</div>
<?php include_once("footer.php") ?>
</body>