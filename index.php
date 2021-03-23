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
    <script src="https://kit.fontawesome.com/5cdf2c4e76.js" crossorigin="anonymous"></script>

</head>

<body onload="Vreme()">


    <div class="container">
        
        <?php include "php/header.php"; ?>
        <?php include "php/logout.php"; ?>
        <?php include "php/login.php"; ?>
        <?php  if(isset($_SESSION['message']) && !empty($_SESSION['message'])){ 
      ?>
        <div class="alert alert-warning alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php echo $_SESSION['message']; ?></strong>
        </div>
        <?php 
           $_SESSION = array();
           session_destroy();
          ?>
        <?php
    } ?>
        <?php include "php/nav.php";?>
        <?php include "php/banner.php";?>
        <?php include "php/main.php";?>
        <?php include "php/artikli.php";?>
        <?php include "php/footer.php";?>




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        <script src="js/vreme.js"></script>

    
    } 
    

</body>

</html>