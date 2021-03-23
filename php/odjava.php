<?php
session_start();


$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}

if (isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])){
	foreach ($_SESSION['shopping_cart'] as $key => $value) {
		$upitUpdateKol = "UPDATE proizvod SET kolicina = kolicina + '" .$value['kolicina']. "'". " WHERE idProizvoda = '" .$value['id']. "'";
		$rezUpdateKol = $mysqli->query($upitUpdateKol) or die("Greska:" . $mysqli->error);
	}
}

$_SESSION = array();
session_destroy(); 
header("Location: ../index.php");

?>