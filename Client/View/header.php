<?php 
    include_once("../config/connexionBdd1.php");
    $req = $db->prepare("SELECT * FROM category");
    $req->execute();
    $categories = $req->fetchAll();
?>
<header>
    <div class="head">
        <div class="containerNav">
            <nav id="navbar">
                    <h3><a href="index.php">Eshop</a></h3>
                    <div class="toggle">
                        <i class="bi bi-border-width open ouvrir"></i>
                        <i class="bi bi-x-circle close fermer"></i>
                    </div>
                    <div class="navBar" id="navBar1">
                        <div class="category" id="cat">Category
                            <div class="sousCategory">
                                <?php foreach($categories as $value){ ?>
                                <p class="showCategory"><a href="category_<?php echo $value['id_category'] ?>.php?idCategory=<?php echo $value['id_category'] ?>"><?php echo $value['name_category'] ?></a></p>
                                <?php } ?>
                            </div>
                        </div> 
                        
                        <p id="contact"><a href="contact.php">Contact</a></p>
                        <p id="search">
                            <div>
                                <form method="post" action="showSearchResult.php">
                                    <input type="search" placeholder="Search" name="search" onkeyup="find(this.value)" ><i class="bi bi-search"></i>
                                </form>
                                <div id="result1"></div>
                            </div>
                        </p>
                        
                        <p id="cart"><a href="cart.php"><i class="bi bi-cart4"></i>
                        <?php if(isset($_SESSION['listCart'])){
                            echo $_SESSION['count'];
                            
                            echo "(".$_SESSION['total']." MAD)";
                        } 
                        else{ echo "0 (0.00 MAD)";  } ?>
                        </a></p>
                        <?php if(isset($_SESSION['logged']) AND isset($_SESSION['user'])){ ?>
                        <div class="category" id="user"><?php echo $_SESSION['user']['name'] ?><i class="bi bi-person-circle"></i>
                            <div class="sousCategory">
                                <p class="showCategory"><a href="profile.php">Profile</a></p>
                                <p class="showCategory"><a href="../Controller/logOut.php">Log Out</a></p>
                            </div>
                        </div>
                        <?php }  else { ?>
                        <p id="login"><a href="login.php" class="btn btnLogin">Login</a></p>
                        <p id="register"><a href="register.php" class="btn btnRegister">Register</a></p>
                        <?php } ?>
                    </div>
            </nav>
        </div>
    </div>
    </header>
    <script type="text/javascript">
        let toggle = document.querySelector('.toggle');
        let head = document.querySelector('header');
        let navBar1 = document.getElementById("navBar1");
        toggle.addEventListener('click', function(){
            console.log("toggle");
            head.classList.toggle("open");
        });

        function find(str){
        console.log(str);
        if(str.length == 0){
            document.getElementById("result1").innerHTML = "";
            return;
        } 
        else{
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
                console.log(xhr.readyState);
                console.log(xhr.status);
                if(xhr.readyState == 4 && xhr.status == 200){
                   
                    response = xhr.responseText;
                    
                    document.getElementById("result1").innerHTML = response;
                    
                }
            }
        }
        xhr.open('GET', '../Controller/searchProduct1.php?search='+str, true);
        xhr.send();
    }
    </script>