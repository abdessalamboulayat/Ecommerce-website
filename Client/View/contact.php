<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/style.css">
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Eshop Contact</title>
</head>
<body>
    <?php include_once("header.php"); ?>
    <section class="sectionContact">
        <?php
            if(isset($_SESSION['message']['envoye'])){ ?>
                <div class="alert"> <?php echo $_SESSION['message']['envoye'] ?></div>
        <?php unset( $_SESSION['message']['envoye']); }
        ?>
       <?php if(isset($_SESSION['message']['errorInput'])){ ?>
                    <div class="alert"><?php echo $_SESSION['message']['errorInput'] ?></div>
                <?php 
                unset($_SESSION['message']['errorInput']);
            } ?>
    <h3>Contact  us</h3>
    <form method="POST" action="../Controller/sendMessage.php">
            <div>
                <div>
                    <p><label>last name</label></p>
                    <p><input type="text" placeholder="last name" name="nom"/></p>
                </div>
                <div>
                    <p><label>first name</label></p>
                    <p><input type="text" placeholder="first name" name="prenom"/></p>
                </div>
                <div>
                    <p><label>Email </label></p>
                    <p><input type="email" placeholder="email@example.com" name="email"/></p>
                </div>
                <div>
                    <p><label>Subject </label></p>
                    <p><input type="text" placeholder="Sujet" name="subject"/></p>
                </div>
                <div>
                    <p><label>Message </label></p>
                    <p><textarea rows="5" cols="41" name="message"></textarea></p>
                </div>
            </div>
            <button class="btnEnvoyer btn" name="send" type="submit">Send</button>
            <?php 
                if(isset($_SESSION['message']['errorEmail'])){ ?>
                    <div class="alert" > <?php echo $_SESSION['message']['errorEmail'] ?></div>
                <?php unset($_SESSION['message']['errorEmail']); }
                ?>
        </form>
    </section>
    <?php include_once("footer.php") ?>
</body>
</html>