<?php
    session_start();
    if(isset($_SESSION['user'])){
        if(isset($_POST['submit'])){
            if(isset($_POST['adresse']) AND isset($_POST['typePaiment'])){
                $adresse = $_POST['adresse'];
                $typePaiment = $_POST['typePaiment'];
                $_SESSION['adresse'] = $adresse;
                $_SESSION['typePaiment'] = $typePaiment;
            }
        }
        else{
            //header("Location: cart.php");
        }
    }
    else{
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Css/style.css" >
    <link rel="stylesheet" href="../Css/mediaquery.css" >
    <title>Paiement</title>
</head>
<body>
<?php 
    include_once("header.php"); ?>
    <div class="paiement">
          <p>Paiement type: <?php echo $typePaiment; ?></p>
    
                <?php
                        foreach($_SESSION['listCart'] as $key => $value) { 
                    ?>
                    <p>Product: <?php echo $value[0]['name'] ?> | Quantity: <?php echo $value[1] ?> </p>
                <?php } 
        ?>
          <p>Total: <?php  echo $_SESSION['total'] ?> MAD</p>
            
    <?php
    $total = $_SESSION['total'] /10;
     if($typePaiment == 'paypal') { ?>
     <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfKG-0r-DRVQ3V_1A2y5I8qZvQLsZAdIYQTSfgR53W6W2sTYRB7zxZFkbkajN4Ip4FH6AVXdceEeuUwp&currency=USD&disable-funding=credit,card"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total ?>' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            window.location.replace("merci.php?idPayment="+transaction.id+"&status="+transaction.status+"&amount="+transaction.amount.value);
          });
        }
      }).render('#paypal-button-container');
      
    <?php } 
    else { ?>
      <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfKG-0r-DRVQ3V_1A2y5I8qZvQLsZAdIYQTSfgR53W6W2sTYRB7zxZFkbkajN4Ip4FH6AVXdceEeuUwp&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total ?>' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
            window.location.replace("merci.php?idPayment="+transaction.id+"&status="+transaction.status+"&amount="+transaction.amount.value);
          });
        }
      }).render('#paypal-button-container');
      <?php } ?>
    </script>
    </div>
</body>
</html>