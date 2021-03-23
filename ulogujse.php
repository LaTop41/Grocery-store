<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online prodavnica namernica</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mojstil.css">

</head>

<body>
    <div class="container">

        <?php include "php/header.php";?>
        <?php include "php/navLogin.php";?>
        <?php include "php/login.php";?>
        <?php include "php/footer.php";?>

    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/vreme.js"></script>
</body>

</html>