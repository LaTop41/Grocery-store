<?php 
session_start();

$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}


if(isset($_POST['btnNaruci'])){

	
	$idNarudzbenice = rand(0, 999999);
	$upitDodajNarudzbenicu = "INSERT INTO narudzbenica (idNarudzbenice, idKorisnik, datumVreme, adresa, grad, postanskiBroj,  NarUkupnaCena) VALUES 
	('" . $idNarudzbenice . "', '" 
	. $_SESSION['idKorisnik'] . "', '"
	. $_POST['sadasnjiDatum'] . "', '" 
	. $_POST['adresa'] . "', '"
	. $_POST['grad'] . "', '" 
	.  $_POST['postanskiBroj'] . "', '" 
	. $_SESSION['totalPrice'] . "')";

	$rezUpitaNar = $mysqli->query($upitDodajNarudzbenicu) or die($mysqli->error);
	
	$redniBr = 1; 
	foreach ($_SESSION['shopping_cart'] as $key => $value) {
		$ukupnaCena = $value['cena'] * $value['kolicina'];
		$upitDodajStavkuNar = "INSERT INTO stavka_narudzbenice(idNarudzbenice, idProizvoda, redniBroj, izabranaKolicina, ukupnaCena) VALUES 
		('" . $idNarudzbenice . "', '" 
			. $value['id']. "', '" 
			. $redniBr . "', '" 
			. $value['kolicina'] . "', '" 
			. $ukupnaCena . "')";

		$rezUpitaStavka = $mysqli->query($upitDodajStavkuNar) or die($mysqli->error);

		$redniBr += 1;

	}

	$_SESSION['porudžbina'] = true;
	$_SESSION['isporuka'] = $_POST['adresa'] . ", " . $POST['postanskiBroj'] ." " . $_POST['grad'];
	$_SESSION['idNarudzbenice'] = $idNarudzbenice; 

	unset($_SESSION['shopping_cart']);

	header('Location: ../narudzbenica.php');

}


?>