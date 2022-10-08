<?php
    session_start();
    if(isset($_SESSION['user'])){
        include_once("../config/fonctions.php");
        if(isset($_GET['id'])){
            $id = htmlspecialchars($_GET['id']);
            $produit = recupererProduitParId($id);
        }
        else{
            header("Location: ../View/index.php");
        }
        if(isset($_SESSION['listCart'])){
            
            $nbrProduitDansLePanier = count($_SESSION['listCart']);
            $id = htmlspecialchars($_GET['id']);
            $produitAjouterDejaDansLePanier=FALSE;
            
            foreach($_SESSION['listCart'] as $key => $value){
                 
                if(in_array($id, $value[0])){
                    $produitAjouterDejaDansLePanier=true;
                    break;
                }
            }

            if(isset($_POST['quantity'])){
                $quantity = htmlspecialchars($_POST['quantity']);
            }
            else{
                $quantity = 1;
            }

            if($produitAjouterDejaDansLePanier){
                $_SESSION['error']['dejaAjouterAuPanier'] = "<div class=\"alert\" role=\"alert\">
            Vous avez déjà ajouter ce produit au panier
            </div>";
                header("Location: ../View/cart.php");
            }
            else{
                $prixTotalduProduit = intval($produit['price'])*intval($quantity);
                $_SESSION['total'] = $_SESSION['total'] + $prixTotalduProduit;
                $produitAjouter = array(
                $produit, $quantity,$prixTotalduProduit
            );
            $_SESSION['count'] = $_SESSION['count'] + 1;
            $_SESSION['listCart'][$nbrProduitDansLePanier] = $produitAjouter;
            header('Location: ../View/index.php');
            }
            // 
        }
        else{
            
            if(isset($_POST['quantity'])){
                $quantity = htmlspecialchars($_POST['quantity']);
            }else{
                $quantity = 1;
            }
            $prixTotalduProduit = intval($produit['price'])*intval($quantity);
            if(isset($_SESSION['total'])){
                $_SESSION['total'] = $_SESSION['total'] + $prixTotalduProduit;}
            else{
                $_SESSION['total'] = $prixTotalduProduit;
            }
            $produitAjouter = array(
                $produit, $quantity, $prixTotalduProduit
            );
            $_SESSION['listCart'][0] = $produitAjouter;
            if(isset($_SESSION['count'])){
                $_SESSION['count'] = $_SESSION['count'] + 1;
            }
            else{
                $_SESSION['count']=1;
            }
            header('Location: ../View/index.php');
        }
     }
     else{
         $_SESSION['ajouteAuPanier']['msg']="Open your account";
         $_SESSION['url'] = $_SERVER['HTTP_REFERER'];
            header('Location: ../View/login.php');
     }
?>