<?php
    session_start();
    if(isset($_SESSION['register']['name']) AND $_SESSION['register']['prenom'] AND $_SESSION['register']['email'] AND $_SESSION['register']['telephone']){
        $name = $_SESSION['register']['name'];
        $prenom = $_SESSION['register']['prenom'];
        $email = $_SESSION['register']['email'];
        $telephone = $_SESSION['register']['telephone'];

        unset($_SESSION['register']['name']);
        unset($_SESSION['register']['prenom']);
        unset($_SESSION['register']['email']);
        unset($_SESSION['register']['telephone']);
    }
    else{
        $name ='';
        $prenom='';
        $email='';
        $telephone='';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>s'inscrire</title>
</head>
<body>
    <?php include_once("header.php") ?>
    <div class="corp">
        <img src="../assets/imageInscription.jpg" alt="image" class="imageInscription"/>
        
            <form method="POST" action="../Controller/validateRegister.php">
                <?php
                    if(isset($_SESSION['erreur']['clientExist'])){ ?>
                        <div class="alert">
                            <?php echo $_SESSION['erreur']['clientExist'] ?>
                            <a href="login.php">Login</a>
                    </div>
                    <?php 
                    unset($_SESSION['erreur']['clientExist']);
                }
                if(isset($_SESSION['erreur']['password'] )){ ?>
                    <div class="alert">
                            <?php echo $_SESSION['erreur']['password'];
                                    unset($_SESSION['erreur']['password']);
                            ?>
                    </div>
                 <?php } 
                 if(isset($_SESSION['erreur']['invalidInput'])){ ?>
                    <div class="alert"><?php echo $_SESSION['erreur']['invalidInput'];
                                                   unset($_SESSION['erreur']['invalidInput'] );  ?>
                    </div>
                <?php } ?>
                <h1>Welcome in <br/>CLOTHES STORE</h1>
                <h3>Create your account</h3>
                    <div class="champ">
                        <div>
                            <p><label>Last name: </label></p>
                            <p><input type="text" placeholder="nom" name="name" value="<?php echo $name ?>" required></p>
                        </div>
                        <div>
                            <p><label>First Name: </label></p>
                            <p><input type="text" placeholder="prenom" name="prenom" value="<?php echo $prenom ?>" required></p>
                        </div>
                    </div>
                    <div class="champ">
                        <div>
                            <p><label>Email: </label></p>
                            <p><input type="email" placeholder="Email" name="email" value="<?php echo $email ?>" required></p>
                        </div>
                        <div>
                            <p><label>Number Phone: </label></p>
                            <p><input type="tel" placeholder="Téléphone" name="teleClt" value="<?php echo $telephone ?>" required></p>
                        </div>
                    </div>
                    <div class="champ">
                        <div>
                            <p><label>Password: <span class="caracter">(8 caracters*)</span> </label></p>
                            <p><input type="password" placeholder="Mot de passe" name="password" required></p>
                        </div>
                        <div>
                            <p><label>Confirmez password: </label></p>
                            <p><input type="password" placeholder="Confirmation" name="passwordConfirm" required></p>
                        </div>
                    </div>
                    <button class="btnInscription" name="inscrire">register</button> <span class="or">OR</span>
                    <a href="login.php" class="btnConnecter">login</a>
            </form>
        </div>
</body>
</html>