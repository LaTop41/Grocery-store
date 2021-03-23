<?php
session_start();



$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}



if(isset($_FILES["slika"])){
	$valid_types = array("image/jpg", "image/jpeg", "image/png");

	$tipFajla = $_FILES['slika']['type'];
					if(in_array($tipFajla, $valid_types)){ 

						
						$source = $_FILES['slika']['tmp_name'];
						$target = '../img/' . $_FILES['slika']['name'];

						move_uploaded_file($source, $target);
						
				

						
					}
					else {
						
					}
				}
				


				if(isset($_POST['btnDodajProizvod'])){

					$nazivSlike = $_FILES['slika']['name'];
					

					$upitDodaj = "INSERT INTO proizvod(idProizvoda, naziv, kategorija, kolicina, opis, cena, popust, slika, stanje) VALUES ('"
					. $_POST['productID'] . "', '"
                    . $_POST['nazivProizvoda'] . "', '"
                    . $_POST['kategorija'] . "', '"
					. $_POST['kolicina'] . "', '"
					. $_POST['opis'] . "', '"
					. $_POST['cena'] . "', '"
					. $_POST['popust'] . "', '"
					. $nazivSlike . "', '"
					. $_POST['stanje'] . "')";


					$rezUpita = $mysqli->query($upitDodaj) or die($mysqli->error);

					$_SESSION['dodatProizvod'] = $_POST['nazivProizvoda'];
					$_SESSION['kolDodatogProizvoda'] = $_POST['kolicina'];
	header('Location: ../admin.php'); 

				


}


?>