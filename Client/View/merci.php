<?php
    session_start();
    include_once("../config/connexionBdd1.php");
    if(isset($_SESSION['user'])){
        if(isset($_SESSION['listCart'])){
        $idClient = $_SESSION['user']['id'];
        $total = $_SESSION['total'];
        $produitAcheter = $_SESSION['listCart'];
        $produits = '';
        foreach($_SESSION['listCart']as $value){
            $produits = $produits.' '.$value[0]['name'].'[Categorie: '.$value[0]['id_category'].', Quantite: '.$value[1].']';
        }

        if(isset($_GET['idPayment']) AND isset($_GET['status']) AND isset($_GET['amount'])){
            $idPayment = htmlspecialchars($_GET['idPayment']);
            $status = htmlspecialchars($_GET['status']);
            $amount = htmlspecialchars($_GET['amount']);
            $adresse = $_SESSION['adresse'];
            $typePaiement = $_SESSION['typePaiment'];

            $req = $db->prepare("INSERT INTO orders(user_id, address, total_products, total_price, payment_status,method)
                        VALUES(?,?,?,?,?,?)");
            $req->execute(array($idClient, $adresse, $produits, $total, $status,$typePaiement));
            unset($_SESSION['listCart']);
            unset($_SESSION['total']);
            unset($_SESSION['count']);
        }
        else{
            header("Location: cart.php");
        }}
        else{
            header("Location: index.php");
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Votre commande est faite</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <div class="thankyou">
        <h2>Thank you for your order, you will recieve your products very soon</h2>
        <i class="bi bi-bag-heart-fill"></i>
    </div>

    <?php include_once("footer.php"); ?>
</body>
</html>
<?php 
    }
    else{
        header("Location: index.php");
    }
?>