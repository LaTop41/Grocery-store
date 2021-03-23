<?php 

$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
  die("Greska: " . $mysqli->error);
}

if (isset($_POST['btnDajSve'])) {

	

	$upit = "SELECT n.*, k.* FROM narudzbenica n  JOIN korisnik k ON n.idKorisnik = k.idKorisnik ";

	$rez = $mysqli->query($upit);

	if(!$rez){
		print("Ne moze se izvrsiti upit.");
		die("Greska: " . $mysqli->error);
	}

	if( mysqli_num_rows($rez) <= 0){
		
		print("<b>Nema narudžbenica!</b><br>");
	} 
	else
	{
		?>
		
		
		<?php

		while($red = $rez->fetch_assoc()){ 
			?>
			<?php $dateT = new DateTime($red['datumVreme']) ?>
			<p>Detalji narudzbenice (ID: <b><?php echo $red['idNarudzbenice']; ?></b>):</p>
			<p>Primljena datuma <b> <?php echo date_format($dateT, "d/m/Y"); ?>
			</b> u <b><?php echo date_format($dateT, "H:i"); ?></b> </p>
			<p>Poručena od strane korisnika (ID: <b><?php echo $red['idKorisnik']; ?></b>): <b><?php echo $red['ime']. " " . $red['prezime']; ?></b>
			<br>Email adresa: <b><?php echo $red['email']; ?></b>
			<br>Broj telefona: <?php echo $red['brojTelefona']; ?>
			</p>
			<p>Naručeni proizvodi:</p>

			<div id="narudzbeniceDatuma">
				<div class="table-responsive">
					<table class="table tabelaStavke">

			<?php
			$stavkeNar = $mysqli->query("SELECT s.redniBroj, s.idNarudzbenice, s.idProizvoda, 
				s.izabranaKolicina, s.ukupnaCena as ukupnaCenaStavke, v.idProizvoda, v.naziv,  v.popust, v.slika, v.ukupnaCena FROM stavka_narudzbenice s JOIN proizvod v ON s.idProizvoda = v.idProizvoda 
				WHERE s.idNarudzbenice = '". $red['idNarudzbenice'] . "'
				ORDER BY s.redniBroj") or die($mysqli->error); 
			?>
			
			
					<tr>
						<th width="5%">#</th>
						<th width="10%"></th> 
						<th width="25%">Naziv</th>
						<th width="10%">Količina</th>
						<th width="20%">Jedinična cena</th>
						<th>Ukupna cena</th>
					</tr>
			<?php 
			while($redStavki = $stavkeNar->fetch_assoc()){
			?>
					<tr>
						<td><?php echo $redStavki['redniBroj']; ?></td>
						<td>
							<img src="<?php echo "img/" . $redStavki['slika']; ?>" width="100px" height="100px">
						</td>
						<td><?php echo $redStavki['naziv'] ?></td>
						<td><?php echo $redStavki['izabranaKolicina']; ?></td>
						<?php if($redStavki['popust'] != null && $redStavki['popust'] != 0){ ?>
						<td><?php echo $redStavki['ukupnaCena'] . " (Popust: <b>-" . 
							$redStavki['popust'] . "%</b>)"; ?></td>
					<?php }
					else{
						?>
						<td><?php echo $redStavki['ukupnaCena']; ?></td>
						<?php
					} ?>
					<td><?php echo $redStavki['ukupnaCenaStavke']; ?></td>
					</tr>
			<?php
			}
			?>
					</table>
				</div>
			</div>
			<?php

		}
	}
}


 ?>