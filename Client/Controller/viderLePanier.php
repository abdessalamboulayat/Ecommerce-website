<?php
    session_start();
    unset($_SESSION['listCart']);
    unset($_SESSION['count']);
    unset($_SESSION['total']);
    header("Location: ../View/Cart.php");

?>