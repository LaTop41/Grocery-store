<?php 


$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}




if(isset($_POST["btnTrazi1"])){

	foreach ($_POST['pretragaProizvoda'] as $selekovanaVr) {
		$upitKorisnik = "SELECT * FROM proizvod WHERE $selekovanaVr = '" . $_POST['podatak1'] . "'";
	}

	$rezUpita = $mysqli->query($upitKorisnik) or die($mysqli->error . " " . $mysqli->errno);

	if($red = $rezUpita->fetch_assoc()){

		?>
<p>Slika: <b><img src="img/<?php echo $red['slika']; ?>" width="100px" height="100px">



        <form action="php/azurirajProSystem.php" method="POST" style="margin-bottom: 15px;"
            enctype="multipart/form-data">
            <!--Ispis korisnika! -->
            <input type="file" name="slika" id="slika">
            <p>Podaci Proizvoda(ID: <b><?php echo $red['idProizvoda']; ?></b>):</p>
            <p>Naziv: <b><input name="naziv" type="text" value="<?php echo $red['naziv']?>" /></b></p>

            <p>Kategorija:<b><select name="kategorija" id="kategorijaProDropDown" required="true">
                        <option value="<?php echo $red['kategorija'] ?>"> izaberite kategoriju </option>
                        <option value="pice">Piće, kafa i čaj</option>
                        <option value="meso">Mesni proizvodi</option>
                        <option value="voce">Voće i povrće</option>
                        <option value="zdrava">Zdrava i dijetalna hrana</option>
                        <option value="pekara">Pekara</option>
                        <option value="mleko">Mleko, mlečni proizvodi i jaja</option>
                        <option value="cokolada">Čokolade, keks i grickalice</option>
                        <option value="smrznuto">Smrznuta hrana</option>
                    </select></b></p>
            <p>Cena: <b><input name="cena" type="number" value="<?php echo $red['cena']?>" /></b></p>
            <p>Popust: <b><input name="popust" type="number" value="<?php echo $red['popust']?>" /></b></p>
            <p>stanje: <b><input type="radio" name="stanje" id="naStanju" value="Na stanju" checked> Na stanju </b>
                <b><input type="radio" name="stanje" id="nijeNaStanju" value="Nije na stanju" checked> Na stanju </b>
            </p>
            <p>Kolicina: <b><input name="kolicina" type="number" value="<?php echo $red['kolicina']?>" /></b></p>
            <p>Opis: <b><textarea name="opis" rows="10"
                        cols="50"><?php echo htmlspecialchars($red['opis']); ?></textarea></b>
            </p>

            <input type="submit" name="btnAzuriraj" value="Ažuriraj" style="margin-right: 15px;"
                class="btn btn-warning">

            <?php $_SESSION['izabraniProizvod'] = $red['idProizvoda'];
	        	$_SESSION['nazivP'] = $red['naziv']; ?>
            <input type="submit" name="btnObrisi" value="Obriši proizvod" class="btn btn-danger">
        </form>
        <?php


	}
	else{
		foreach ($_POST['pretragaProizvoda'] as $selekovanaVr) {
		echo "Nema traženog proizvoda sa zadatim kriterijumom (<b>" 
		. $selekovanaVr . " = " . $_POST['podatak1'] . "</b>)";
		}
	}



}


 ?>