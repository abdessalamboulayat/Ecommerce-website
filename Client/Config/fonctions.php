<?php
    include_once("connexionBdd1.php");
    //Récuperer tout les produits
    function recupererToutLesproduits(){
        global $db;
        $req = $db->prepare("SELECT * FROM products");
        $req->execute();
        $products = $req->fetchAll();
        return $products;
    }

    function getProductsByCategory($id){
        global $db;
        $req = $db->prepare("SELECT * FROM products WHERE id_category = ? limit 6");
        $req->execute(array($id));
        $products = $req->fetchAll();
        $req->closeCursor();
        return $products;
    }

    //Récuperer par Id:
    function recupererProduitParId($id){
        global $db;
        $req = $db->prepare("SELECT * FROM products WHERE id=? LIMIT 1");
        $req->execute(array($id));
        $product = $req->fetch();
        return $product;
    }
    //recuperer le nom du produit par id
    function recupererNomProduitParId($id){
        global $db;
        $req = $db->prepare("SELECT * FROM produits WHERE id=? LIMIT 1");
        $req->execute(array($id));
        $produit = $req->fetch();
        return $produit['name'];
    }
   
    //recuperer client par Id
    function recupererClientParId($id, $idClient){
        global $db;
        $req = $db->prepare("SELECT * FROM clients WHERE id=? LIMIT 1");
        $req->execute(array($idClient));
        $client = $req->fetch();
        return $client;
    }
    //get orders for any clients
    function getOrders($id){
        global $db;
        $req = $db->prepare("SELECT id,total_products , total_price, date FROM orders where user_id = ?");
        $req->execute(array($id));
        $orders = $req->fetchAll();
        return $orders;
    }

    //Get Products form wishlist by id Product and id User
    function getProductWishList($idProd , $idUser){
        global $db;
        $req=$db->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?");
        $req->execute(array($idUser, $idProd));
        $product = $req->fetch();
        return $product;
    }
    //add to favoutite
    function addToFavourite($idProd, $idUser){
        global $db;
        $req = $db -> prepare("INSERT INTO wishlist(product_id, user_id) VALUES(?,?)");
        $req->execute(array($idProd,$idUser));
        $req->closeCursor();
    }
    //delete product from favourite
    function deleteFromFavourite($idProd, $idUser){
        global $db;
        $req = $db -> prepare("DELETE FROM wishlist WHERE product_id = ? AND user_id = ?");
        $req->execute(array($idProd, $idUser));
        $req->closeCursor();
    }
    //favourite products of any user
    function getFavouriteProducts($idUser){
        global $db;
        $req = $db->prepare("SELECT * FROM wishlist WHERE user_id = ?");
        $req->execute(array($idUser));
        $favouriteProducts  = $req->fetchAll();
        return $favouriteProducts;
    }
    //
    function getNumberFavouriteProducts($idUser){
        global $db;
        $req = $db->prepare("SELECT * FROM wishlist WHERE user_id = ?");
        $req->execute(array($idUser));
        $number = $req->rowCount();
        return $number;
    }
    
?>