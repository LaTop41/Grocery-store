

		<div id="dodajProizvod" class="tab-pane fade main">
			<div class="page-header">
				<h2>Dodaj novi</h2>
			</div>

			<form enctype="multipart/form-data" action = "php/dodajProizvodMain.php" method="POST">
				<div class="form-group">
					<label for="kategorijaDropDown" style="margin-right: 15px;">Kategorija:</label>
					<select name="kategorija" id = "kategorijaDropDown" onchange="promenaID()" required="true">
						<option value> izaberite kategoriju </option>
						<option value="pice">Piće, kafa i čaj</option>
						<option value="meso">Mesni proizvodi</option>
						<option value="voce">Voće i povrće</option>
                        <option value="zdrava">Zdrava i dijetalna hrana</option>
						<option value="pekara">Pekara</option>
                        <option value="mleko">Mleko, mlečni proizvodi i jaja</option>
						<option value="cokolada">Čokolade, keks i grickalice</option>
                        <option value="smrznuto">Smrznuta hrana</option>
					</select>
				</div>
				<input type="hidden" name="productID" id="productID">
				<div class="form-group">
					<label for="nazivProizvoda" >Naziv:</label>
					<input type="text" width="50px" name="nazivProizvoda" id="nazivProizvoda" placeholder="Naziv proizvoda" class="form-control" required="true" onfocus>
				</div>

				<div class="form-group"> <!-- dodavanje slike -->
					<input type="hidden" name="max_file_size" value="15000000">

					<label for="slika" style="margin-right: 15px;">Postavi sliku:</label>
					<input type="file" name="slika" id="slika" required="true">

					
			</div> <!-- KRAJ dodavanja slike -->

			<div class="form-group">
				<label for="kolicina" style="margin-right: 15px;">Količina:</label>
				<input type="number" name="kolicina" id="kolicina" min="1" style="width: 45px; border-radius: 7px;" required="true">
			</div>

			<div class="form-group">
				<label for="cena" style="margin-right: 15px;">Cena:</label>
				<input type="number" name="cena" id="cena" min="1" max="20000" style="width: 90px; height: 34px; font-size: 14px; color: #555;" required="true"> RSD
			</div>

			<div class="form-group">
				<label for="popust" style="margin-right: 15px;">Popust:</label>
				<input type="number" name="popust" id="popust" min="0" max="80" style="width: 50px; height: 34px; font-size: 14px; color: #555;"> %
			</div>

			<div class="form-group">
				<label>Stanje:</label>
				<br>
				<label class="radio-inline">
					<input type="radio" name="stanje" id="naStanju" value="Na stanju" checked> Na stanju
				</label>
				<label class="radio-inline">
					<input type="radio" name="stanje" id="nijeNaStanju" value="Nije na stanju"> Nije na stanju
				</label>
			</div>

			
			<div class="form-group">
				<label for="opisProizvoda" style="margin-right: 15px; vertical-align: top;">Opis:</label>
				<textarea name="opis" id="opisProizvoda" placeholder="Unesite opis" 
				style=" border-radius: 5px;" required="true" rows="10" cols="50"></textarea>
			</div>

			<input type="submit" name="btnDodajProizvod" class="btn btn-primary btn-lg" value="Dodaj proizvod" style="margin-left: 50px; width: 200px;">
		</form>
	</div>