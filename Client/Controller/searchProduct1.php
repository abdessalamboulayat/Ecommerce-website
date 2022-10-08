<?php

   include "../config/connexionBdd1.php";
   if(isset($_GET['search'])){ 
      $mot = htmlspecialchars($_GET['search']);

     
      $sql = "SELECT id, name FROM products WHERE name LIKE '%$mot%'";
      $stmt = $db->prepare($sql);
      $stmt->execute();
      $products = $stmt->fetchAll();
      foreach($products as $value){
         echo '<p><a href="'.'description.php?id='.$value['id'].'">'.$value['name'].'</a></p>';
      }
    }
    else{  
        header("Location: ../View/index.php");
    }
?>