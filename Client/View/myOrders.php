<?php 
    include_once('../config/fonctions.php');
    session_start();
    if(isset($_SESSION['user'])){
        $orders = getOrders($_SESSION['user']['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/bootstrap.css" >
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css">
    <title>Document</title>
</head>
<body>
<?php include_once("header.php") ?>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Number Order</th>
      <th scope="col">Order</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php 
        foreach($orders as $value){
    ?>
    <tr>
      <!-- <th scope="row"><</th> -->
      <td><?php echo $value['id'] ?></td>
      <td><?php echo $value['total_products'] ?></td>
      <td><?php echo $value['total_price'] ?> MAD</td>
      <td><?php echo $value['date'] ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php include_once("footer.php") ?>
</body>
</html>
<?php 
}
else{
  $_SESSION['url'] = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location: login.php");
}
?>