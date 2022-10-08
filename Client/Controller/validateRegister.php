<?php
    session_start();
    require_once("../config/connexionBdd1.php");
    //Fonction ajouter client
    function ajouterClient($nom, $email, $password){
        global $db;
        $req = $db->prepare("INSERT INTO users(name, email, password) VALUES(?,?,?)");
        $req->execute(array($nom, $email, $password));
    }
    //Fonction verifier l'existence
    function verifierExistence($email){
        global $db;
        $check = $db->prepare("SELECT * FROM users WHERE email=?");
        $check->execute(array($email));
        $user = $check->fetch();
        return $user;
    }

    if(isset($_POST['inscrire'])){
        if(isset($_POST['name']) AND isset($_POST['prenom']) AND isset($_POST['email']) AND isset($_POST['teleClt'])
        AND isset($_POST['password']) AND isset($_POST['passwordConfirm'])){
            $name = htmlspecialchars($_POST['name']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $teleClt = htmlspecialchars($_POST['teleClt']);
            $password = htmlspecialchars($_POST['password']);
            $passwordConfirm = htmlspecialchars($_POST['passwordConfirm']);

                    $_SESSION['register']['name'] = $name;
                    $_SESSION['register']['prenom'] = $prenom;
                    $_SESSION['register']['email'] = $email;
                    $_SESSION['register']['telephone'] = $teleClt;
                    
            $user = verifierExistence($email);

            if(empty($user)){
                if(preg_match('/^[a-zA-Z]{1,30}$/', $name) AND preg_match('/^[a-zA-Z]{1,30}$/', $prenom)){
                    
                if( strlen($password)>=8 AND $password === $passwordConfirm){
                    $password = hash('md5', $password);
                    $passwordConfirm = hash('md5', $password);

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        ajouterClient($name,$email,$password);
                        $_SESSION['success']['user'] = "successfully registered,";
                        header("Location: ../View/login.php");
                    }
                    else{
                        $_SESSION['erreur']['email'] = "Please put a validate email";
                        header("Location: ../View/register.php");
                    }
                }
                else{
                    $_SESSION['erreur']['password'] = "verify password";
                    header("Location: ../View/register.php");
                }
                
                
            }
            else{
                $_SESSION['erreur']['invalidInput'] = "Invalid name or first name";
                header("Location: ../View/register.php");
            }
            }
            else{
                
                $_SESSION['erreur']['clientExist'] = "Client already registered";
                header('Location: ../View/register.php');
            }
            // $_SESSION['success']['user'] = "Votre compte est crée Veuillez se connecter";
            // header("Location: ../View/login.php");
        }
        else{
            
            $_SESSION['erreur']['input'] = "don't let inputs empty";
            header("Location: ../View/register.php");
        }
    }
    else{
        header("Location: ../View/login.php");
    }  
?>