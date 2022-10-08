<?php
    session_start();
    include_once("../config/fonctions.php");
    
        if($_SESSION['user']){
        if(isset($_GET['id'])){
            $idProduit = htmlspecialchars($_GET['id']);
            $idUser = $_SESSION['user']['id'];
            $product = getProductWishList($idProduit, $idUser);
            if(empty($product)){
                addToFavourite($idProduit, $idUser);
                
                echo TRUE;
            }
            else{
                deleteFromFavourite($idProduit, $idUser);
                
                echo FALSE;
            }
        }
    }
    else{
        
        header("Location: ../View/login.php");
    }

?>