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
    <link href="css/mojstil.css" rel="stylesheet">


    
</head>

<body onload="Vreme()">
    <div class="container">

        
        <?php include "php/header.php"; ?>
        <?php include "php/logout.php"; ?>

        <div class="container">

            <?php include "php/navAdmin.php" ?>

            <div class="tab-content">

                <?php if(isset($_SESSION['dodatPorizvod']) && isset($_SESSION['kolDodatogProizvoda'])){
                 ?>
                
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    Uspešno ste dodali proizvod:<strong><?php echo $_SESSION['dodatPorizvod'] . " Količina: " .$_SESSION['kolDodatogProizvoda'];  ?></strong>
                </div>
                <?php
        unset($_SESSION['dodatPorizvod']);
        unset($_SESSION['kolDodatogProizvoda']);
         } ?>

                <?php include "php/dodajProizvod1.php" ?>
                <?php include "php/azurirajProizvod.php" ?>
                <?php include "php/pregledNarudzbenicaPoDatumu.php" ?>
                <?php include "php/SveNarudzbenice.php"?>
                <?php include "php/SvePoruke.php"?>
                
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vreme.js"></script>
    <script src="js/proveraKr.js"></script>
    <script src="js/proveraPr.js"></script>
    <script src="js/proveraID.js"></script>
    
    <script>
    $('#tabovi a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    var hash = window.location.hash;
    $('#tabovi a[href="' + hash + '"]').tab('show');
    </script>

</body>

</html>