<?php 



$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska: " . $mysqli->error);
}

if(isset($_POST['idIzabranog'])){ 
	$izabraniId = $_POST['idIzabranog'];
	$naziv = null;
	$_SESSION['nazivProizvoda'] = $_POST['nazivProizvoda'];

	$upit = "SELECT * FROM proizvod WHERE idProizvoda = '". $izabraniId."'";


	$rez = $mysqli->query($upit);

	if(!$rez){
		print("Ne moze se izvrsiti upit!");
		die("Greska:" . $mysqli->error);
	}

	
	$azurirajKol = "UPDATE proizvod SET kolicina = kolicina - '".$_POST['izabranaKol']. "'"  . " WHERE idProizvoda = '" . $izabraniId . "'";
	$rezAzurirajKol = $mysqli->query($azurirajKol) or die("Greska prilikom update-a kolicine u bazi:" . $mysqli->error);

	$proizvod_ids = array();
	if($rez){
		if($red = $rez->fetch_assoc()){

			if(isset($_SESSION['shopping_cart'])){
				$count = count($_SESSION['shopping_cart']);
				$proizvod_ids = array_column($_SESSION['shopping_cart'], 'id');

		
				if(!in_array($izabraniId, $proizvod_ids)) {
				$_SESSION['shopping_cart'][$count] = array(
				'id' => $red['idProizvoda'],
				'naziv' => $red['naziv'],
				'kolicina' => $_POST['izabranaKol'],
				'cena' => $red['ukupnaCena']

				);
			}
				else { 
					for($i = 0; $i < count($proizvod_ids); $i++){
						if($proizvod_ids[$i] == $izabraniId){
						$_SESSION['shopping_cart'][$i]['kolicina'] += $_POST['izabranaKol'];
						}
					}

				}
		}
		else { 
		$_SESSION['shopping_cart'][0] = array(
			'id' => $red['idProizvoda'],
			'naziv' => $red['naziv'],
			'kolicina' => $_POST['izabranaKol'],
			'cena' => $red['ukupnaCena']

		);
    }
   }
  }
}


if(filter_input(INPUT_GET, 'action') == 'removeItem'){ 
	foreach ($_SESSION['shopping_cart'] as $key => $value) {
		if($value['id'] == filter_input(INPUT_GET, 'id')){		
			$azurirajKol = "UPDATE proizvod SET kolicina = kolicina + '" .$value['kolicina']. "'" ." WHERE idProizvoda = '" .$value['id']. "'";
			$rezAzurirajKol = $mysqli->query($azurirajKol) or die("Greska prilikom update-a kolicine u bazi: " . $mysqli->error);
			unset($_SESSION['shopping_cart'][$key]);
		}
	}
	$_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);

	

}

?>



<div class="page-header">
    <h2>Proizvodi</h2>
</div>

<?php if(isset($_SESSION['shopping_cart']) && !empty($_SESSION['shopping_cart'])) {	 ?>
<div>
    <table class="table table-striped">
        <tr>
            <th width="40%">Naziv</th>
            <th width="10%">Količina</th>
            <th width="15%">Cena</>
            <th width="15%">Ukupna cena</th> 
            
        </tr>
        <?php 
			if(!empty($_SESSION['shopping_cart'])){

				$UkupnaCena1 = 0; 

				foreach ($_SESSION['shopping_cart'] as $key => $value) {
					?>
        <tr>
            <td><?php echo $value['naziv']; ?></td>
            <td><?php echo $value['kolicina'] ?></td>
            <td><?php echo number_format(($value['cena']), 2, ",", ".") ?> RSD</td>
            <td><?php echo number_format(($value['cena'] * $value['kolicina']), 2, "," , ".") ?> RSD</td>
            <td>
                <a href="korpa.php?action=removeItem&id=
								<?php echo $value['id'] ?>">
                    <button class="btn-danger"><i class="fa fa-trash-alt fa-lg"></i></button>
                </a>
            </td>
        </tr>

        <?php
					$UkupnaCena1 += $value['kolicina'] * $value['cena'];
				} 
				?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Cena svih artikala:</b></td>
            <td><b><?php echo number_format($UkupnaCena1, 2, ",", "."); ?> RSD </b></td>
            <td></td>


        </tr>
    </table>
</div>
<?php
		if(isset($_SESSION['shopping_cart']) && 
			count($_SESSION['shopping_cart']) > 0){
				?>
<form action="php/orderSystem.php" method="POST">
    <div style="position: relative;">
        <div style="position: absolute; right:140px; vertical-align: middle; top: 6px;">
            <?php $_SESSION['totalPrice'] =  $UkupnaCena1; ?>
            Adresa za isporuku: <input type="text" name="adresa" size="30" maxlength="50" placeholder="Adresa"
                style="margin-right: 5px;" required="true">
            Grad: <input type="text" name="grad" size="12" maxlength="25" placeholder="Grad" required="true"
                style="margin-right: 5px;">
            Poštanski broj: <input type="number" name="postanskiBroj" min="1" required="true" style="width: 65px;">
        </div>
        <input type="hidden" name="sadasnjiDatum" id="sadasnjiDatum">
        <button type="submit" name="btnNaruci" id="btnNaruci" class="btn btn-primary"
            onclick="Isporuka()">Naruči</button>
    </div>
</form>
<?php
			}  
		}
		echo "<br><br>";

		?>





<?php
} 
else {
	echo "Vaša korpa je prazna.";
}

?>