<div id="azurirajProizvod" class="tab-pane fade main">

	<?php if(isset($_SESSION["message1"])){ ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Promene izvršene!</strong> <?php echo $_SESSION["message1"]; ?>
		</div>
	<?php 
		unset($_SESSION["message1"]);
	 }
	 ?>

	 
	 <?php if(isset($_SESSION['obrisaniPro'])){
	 	?>
	 	<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo $_SESSION['obrisaniPro']; ?>
		</div>
	 <?php
	 	unset($_SESSION['obrisaniPro']);
	 } 
	 ?>
	<div class="page-header">
		<h2>Ažuriraj proizvod</h2>
	</div>


	<form action="#azurirajProizvod" method="POST">
		<div class="form-group">

			<label for="kriterijumDropDown" style="margin-right: 15px;">Izaberite kriterijum pretrage:</label>
			<select name="pretragaProizvoda[]" id="kriterijumDropDown" required="true" onchange="proveraPr();"> 
				<option value>---Izaberite kriterijum---</option>
				<option value="idProizvoda">ID Proizvoda</option>
				<option value="naziv">Naziv</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="podatak1" style="margin-right: 15px;">Unesite podatak:</label>
			<input type="text" name="podatak1" id="podatak1" required="true" placeholder="Kriterijum" style="margin-right: 20px; width: 250px;">
			<input type="submit" name="btnTrazi1" class="btn btn-primary" value="Traži" style="width: 90px; vertical-align: bottom;">
		</div>
	</form>
	<br>

	<?php include "php/azurirajProizvodMain.php" ?>


</div>