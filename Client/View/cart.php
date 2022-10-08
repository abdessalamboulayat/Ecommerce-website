<?php session_start(); 
  if(isset($_SESSION['total'])){
    $total= $_SESSION['total'];
  }
  if(isset($_SESSION['user'])){
    $idClient = $_SESSION['user']['id'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="../Js/fichier.js"></script>
    <link rel="stylesheet" href="../Css/style.css" >
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Document</title>
</head> 
<body>
    <?php include_once("header.php") ?>
    <?php
        if(isset($_SESSION['error']['dejaAjouterAuPanier'])){
            echo $_SESSION['error']['dejaAjouterAuPanier'];
            unset($_SESSION['error']['dejaAjouterAuPanier']);
        }?>

  <div class="cart1">
    
  <section class="cart">
    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <?php if(isset($_SESSION['listCart'])) { ?>
                    <tbody>
                    <?php 
                        foreach($_SESSION['listCart'] as $key => $value) { 
                    ?>
                    <tr>
                        <th scope="row"><?php echo $value[0]['name'] ?></th>
                        <td><img src="./../../uploaded_img/<?php echo $value[0]['image_01'] ?>" whidth="100" height="100"></td>
                        <td><?php echo $value[0]['price'] ?></td>
                        <td><?php echo $value[1] ?></td>
                        <td><?php echo $value[2] ?></td>
                        <td></td>
                        <td><a href="../Controller/deleteProductFromPanier.php?key=<?php echo $key ?>" class="btnSupprimer">supprimer</a></td>
                    </tr>
                    <?php }  }
              else{ 
              echo "<h4>Your Cart is empty</h4>" ; }
              ?>
                    </tbody>
                </table>
                <?php if(isset($_SESSION['listCart'])) { ?>
                <div>
                    <p><a href="../Controller/viderLePanier.php" class="btnRed">Vider Panier</a></p>
                    <div ><p>Le total à payer: <?php echo $total ?> MAD</p></div>
                </div>
                <div><p class="btn" id="buyNow">Buy Now</p></div>
                <div class="formPaiment" id="paymentForm">
                  <form method="POST" action="paiement.php">
                    <p><label>Adresse: </label></p>
                    <p><input type="text" placeholder="Adresse" name="adresse"></p>
                    <p>Mode de Paiement: </p>
                    <p><input type="radio"  name="typePaiment" value="paypal">Paypal</p>
                    <p><input type="radio"  name="typePaiment" value="carte banquaire">Carte Banquaire</p>
                    <button type="submit" name="submit" class="btn">Valider commande</button>
                    <span class="btnRed" id="cancel">Cancel</span>
                  </form>
                  
                </div>
                <?php }
              ?>
        
    </section>
    </div>
    <?php include_once("footer.php") ?>
    
</body>
</html>