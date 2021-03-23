<?php 


$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
  die("Greska: " . $mysqli->error);
}

if (isset($_POST['btnProuke'])) {

	

	$upit = "SELECT * FROM poruke ";

	$rez = $mysqli->query($upit);

	if(!$rez){
		print("Ne moze se izvrsiti upit.");
		die("Greska: " . $mysqli->error);
	}


	if( mysqli_num_rows($rez) <= 0){
		
		print("<b>Nema poruka!</b><br>");
	} 
	else
	{
			?>


			<?php

		while($red = $rez->fetch_assoc()){ 
			?>

		<p>Ime i prezime:<b><?php echo $red['imeIprezime']; ?></b></p>
		<p>Email:<b> <?php echo $red['email']; ?></b> </p>
        <p>Broj telefona: <b><?php echo $red['telefon']; ?></b></p>
        <p>Naslov: <b><?php echo $red['naslov']; ?></b></p>
        <p>Poruka: <b><?php echo $red['poruka']; ?></b></p>
		<br>
        <?php
        	}
		}
  } ?>