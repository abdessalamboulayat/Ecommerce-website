<?php
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=projetphp;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
?>