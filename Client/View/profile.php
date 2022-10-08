<?php session_start();
include_once('../config/fonctions.php');
if(isset($_SESSION['user'])){
    $orders = getOrders($_SESSION['user']['id']);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/bootstrap.css" >
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css">
    <title>Profile: <?php echo $_SESSION['user']['name']  ?></title>
</head>
<body>
  <?php include_once("header.php") ?>

    <section class="profile">
      <h2>Name: <?php echo $_SESSION['user']['name']  ?></h2>
    <div class="elementProfile">
        <div class="element1">
            <p><a href="myOrders.php">See my orders</a></p>
        </div>
  
        <div class="element2">
            <p><a href="favouriteProducts.php">my favourite products</a></p>
        </div>
    
    </div>
</section>
<?php include_once("footer.php"); ?>
</body>
</html>
<?php 
}
else{
    $_SESSION['url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location: login.php");
}
?>