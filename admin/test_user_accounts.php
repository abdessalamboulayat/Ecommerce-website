<?php

include_once '../components/fonctions.php';

$list_Users = listUsers();
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users accounts</title>
    <!-- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    <?php include '../components/admin_header.php';?>
    <section calss="accounts">
        <h1 class="heading">user accounts</h1>
        <div class="box-container">
            <?php
                
                    if($list_Users==null){
                        echo "No User";
                    }
                    else{
                        foreach($list_Users as $value){
            ?>
            <div calss="box">
                <p> user id : <span><?php echo $value['id']; ?></span></p>
                <p> username : <span><?php echo $value['name']; ?></span> </p>
                <p> email : <span><?php echo $value['email']; ?></span> </p>
                <a href="users_accounts.php?delete=<?php echo $value['id']; ?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="delete-btn">delete</a>
            </div>
            <?php
                    }
                }
            ?>
        </div>
    </section>
    
</body>
</html>