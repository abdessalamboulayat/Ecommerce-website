<?php
    session_start();
    if(isset($_GET['key'])){
        $key = htmlspecialchars($_GET['key']);
        if(isset($_SESSION['count'])){
            $_SESSION['count']--;
        }
        if($_SESSION['total']){
            $_SESSION['total'] = $_SESSION['total'] -  $_SESSION['listCart'][$key][2];
        }
        unset($_SESSION['listCart'][$key]);
        header("Location: ../View/cart.php");
    }
    else{
        header("Location: ../View/cart.php");
    }
?>