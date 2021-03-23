<?php 
session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online prodaja namernica</title>

  
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mojstil.css">


</head>

<body onload="Vreme()">
    <div class="container">
       >

        <?php include "php/header.php"; ?>
        <?php include "php/logout.php"; ?>
        <?php include "php/nav.php" ?>
        <?php if(isset($_SESSION['porudžbina']) && $_SESSION['porudžbina'] == true){
      ?>
        <p><b style="font-size: 20px;">> Uspešno ste poručoli proizvod(e)!</b></p>
        <p>Proizvodi će biti isporučeni na adresu: <b><?php echo $_SESSION['isporuka']?></b> u roku od narednih 2-4
            radna dana.<br>Isporuka se vrši preko BEX EXPRESS-a.</p>
        <?php
     } ?>
        <br>
        <p>Vaša narudžba:</p>
        <?php include "php/narudzbenicaPodaci.php" ?>
        <?php include "php/footer.php"; ?>


    </div> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vreme.js"></script>
    <script src="js/Isporuka.js"></script>
</body>

</html>