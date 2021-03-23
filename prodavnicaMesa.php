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

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/mojstil.css">

 

</head>
<body onload="Vreme()">

  <div class="container"><!--  pocetak kontejnera -->
    
    <?php include "php/header.php"; ?>
    <?php include "php/logout.php"; ?>
    <?php include "php/login.php"; ?>
    <?php include "php/nav.php"; ?>
   <?php include "php/meso.php"; ?> 
    <?php include "php/footer.php"; ?> 


  </div> <!-- kraj kontejnera -->



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/vreme.js"></script>
</body>
</html>