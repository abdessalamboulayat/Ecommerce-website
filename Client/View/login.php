<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/style.css" >
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Clothes Store : Connexion</title>
</head>
<body >
    <?php include_once("header.php") ?>
    <?php if(isset($_SESSION['ajouteAuPanier']['msg'])) { ?>
            <div class="alert">
                <?php echo $_SESSION['ajouteAuPanier']['msg']; 
                unset($_SESSION['ajouteAuPanier']['msg']); ?>
            </div>
        <?php } 
        if(isset($_SESSION['success']['user']) ){ ?>
            <div class="success"><?php echo $_SESSION['success']['user'] ;
            unset($_SESSION['success']['user']) ?></div>
       <?php } ?>
    <div class="corpLogin">
        <img src="../assets/loginImage.jpg" alt="imagelogin" class="loginImage"/>
        <div>
            <form method="POST" action="../Controller/validateLogin.php">
                <h1>Welcome in CLOTHES STORE!</h1>
                <h3>login to your account</h3>
                <div>
                    <div>
                        <p><label>Email</label></p>
                        <p><input type="email" placeholder="email@example.com" name="email"/></p>
                    </div> 
                    <div>
                        <p><label>Password</label></p>
                        <p><input type="password" placeholder="*********" name="password"/></p>
                    </div>
                </div>
                <button class="btnConnexion" name="connexion">Login</button>
            </form>
            <a href="register.php" class="inscrire">Register</a>
            <?php 
                if(isset($_SESSION['error']['clientNexistePas'])){
                    if($_SESSION['error']['clientNexistePas']==true){?>
                        <div class="alert">
                            No client with this information, 
                            <a href="inscription.php">register</a>
                    </div>
                <?php    }
                } 
                unset($_SESSION['error']['clientNexistePas']);
                //Error utilisateur existe mais le mot de passe est incorrect
                if(isset($_SESSION['login']['errorUserExist'])){
                    if($_SESSION['login']['errorUserExist']==true){?>
                        <div class="alert">
                            verify your information
                    </div>
                <?php    }
                } 
                unset($_SESSION['login']['errorUserExist']); ?>
        </div>
    </div>
</body>
</html>