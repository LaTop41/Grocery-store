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

        <?php if((isset($_POST['btnDodajProizvodUKorpu']) || isset($_POST['btnDodajUKorpu'])) && isset($_SESSION['stranica'])){
   
    $_SESSION['dodatoUKorpu'] = true;
    $_SESSION['idIzabranog'] = $_POST['idIzabranog'];
    $stranica = $_SESSION['stranica'];
    header("Location: $stranica");
  }
  ?>
        <?php include "php/header.php"; ?>
        <?php include "php/logout.php"; ?>
        <?php include "php/login.php"; ?>
        <?php include "php/nav.php"; ?>
        <?php include "php/shopfront.php"; ?>
        <?php include "php/footer.php"; ?>



    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/vreme.js"></script>
    <script src="js/Isporuka.js"></script>
</body>

</html>