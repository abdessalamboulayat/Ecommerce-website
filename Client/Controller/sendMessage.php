<?php
    include_once("../config/connexionBdd1.php");
    session_start();
    if(isset($_SESSION['user'])){
        $id = $_SESSION['user']['id'];
    }
    else{
        $id=0;
    }

    if(isset($_POST['send'])){
        if(isset($_POST['nom']) AND isset($_POST['prenom'])  AND isset($_POST['email']) AND 
        isset($_POST['sujet']) AND isset($_POST['message'])){
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);
            $sujet = htmlspecialchars($_POST['sujet']);

            if(!empty($nom) AND !empty($prenom) AND !empty($email) AND !empty($message) AND !empty($sujet)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $req = $db->prepare("INSERT INTO messages(user_id,email,message,sujet,name) VALUES(?,?,?,?,?)");
                    $req->execute(array($id, $email, $message, $sujet,$nom));
                    $req->closeCursor();
                    $_SESSION['message']['envoye']="message send successfully";
                    header("Location: ../View/contact.php");
                }
                else{
                    $_SESSION['message']['errorEmail'] = "Invalid email";
                    header("Location: ../View/contact.php");
                }
            }
            else{
                $_SESSION['message']['errorInput'] = "Complete form";
                header("Location: ../View/contact.php");
            }
        }
        else{
            $_SESSION['message']['errorInput'] = "Complete form";
            header("Location: ../View/contact.php");
        }
    }
    else{
        header("Location: ../View/contact.php");
    }
?>