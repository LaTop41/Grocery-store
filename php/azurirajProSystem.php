<?php 
session_start();

//konektovanje sa bazom!
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
						echo "<p>Izabrali ste pogresnu ekstenziju fajla!</p>";
					}
				}

				if(isset($_POST['btnAzuriraj'])){

					$nazivSlike = $_FILES['slika']['name'];

					$upitAdmin = "UPDATE proizvod SET naziv='".$_POST['naziv']."',
					kategorija='".$_POST['kategorija']."',
					slika = '".$nazivSlike."',
					cena='".$_POST['cena']."',
					popust='".$_POST['popust']."',
					stanje='".$_POST['stanje']."',
					kolicina='".$_POST['kolicina']."',
					opis='".$_POST['opis']."' WHERE idProizvoda = '" . $_SESSION['izabraniProizvod'] . "'";

					$rezUpita = $mysqli->query($upitAdmin) or die($mysqli->error . " " . $mysqli->errno);
					
					$_SESSION['message1'] = "Proizvod <b>" . $_SESSION['nazivP'] . "</b> (ID: <b>" . $_SESSION['izabraniProizvod'] . "</b>) ste uspešno unapredili u <b>admina</b>!";

					header('Location: ../admin.php#azurirajProizvod'); 

				}


if(isset($_POST['btnObrisi'])){

	$upitBrisanje = "DELETE FROM proizvod WHERE idProizvoda = '" 
		. $_SESSION['izabraniProizvod'] . "'";

	$rezBrisanja = $mysqli->query($upitBrisanje) or die($mysqli->error ." ". $mysqli->errno);

	if($mysqli->affected_rows != 0){
		$_SESSION['obrisaniPro'] = "Korisnik <b>" . $_SESSION['nazivP'] . "</b> (ID: <b>" . $_SESSION['izabraniProizvod'] . "</b>) je <b>obrisan!</b>";
	}else{
		$_SESSION['obrisaniPro'] = "<b>Brisanje nije uspelo!</b> Probajte ponovo.";
	}

	header('Location: ../admin.php#azurirajKorisnika');


}


 ?>