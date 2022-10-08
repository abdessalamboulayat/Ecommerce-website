<?php
    session_start();
    require_once("../config/connexionBdd1.php");
    //verifier l'existence d'un client
    function verifierExistence($email){
        global $db;
        $check = $db->prepare("SELECT * FROM users WHERE email=?");
        $check->execute(array($email));
        $user = $check->fetch();
        return $user;
    }

    if(isset($_POST['connexion'])){
        if(isset($_POST['email']) AND isset($_POST['password'])){
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);

            // $password = hash('md5', $password);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $user = verifierExistence($email);
                $password = hash('md5', $password);
                
                if(!empty($user)){
                    if($password == $user['password']){
                    $_SESSION['logged'] = 'logged';
                    $_SESSION['user'] = $user;
                    
                    if(isset( $_SESSION['url'])){
                        $url =  $_SESSION['url'];
                        header("Location: $url");
                    }
                    else{
                        header('Location: ../View/index.php');
                    }
                }
                    else{
                        $_SESSION['login']['errorUserExist'] = 'Confirm your password';
                        header('Location: ../View/login.php');
                    }
                }
                else{
                    $_SESSION['login']['clientNexistePas']="No Client with this informations!";
                        header('Location: ../View/login.php');
                }
            }
            else{
                $_SESSION['errorLogin']['email']="Please put a validate email";
                header("Location: ../View/login.php");
            }
    }}
    else{
        header("Location: ../View/login.php");
    }

?>