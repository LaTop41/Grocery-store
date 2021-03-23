<?php 

$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska: " . $mysqli->error);
}




if(isset($_POST['btnSearch'])){
    $search = mysqli_real_escape_string($mysqli, $_POST['trazi']);
    $sql = "SELECT * FROM proizvod WHERE naziv LIKE '%$search%' OR
    opis LIKE '%$search%'";

    $result = mysqli_query($mysqli,$sql);
    $queryResult = mysqli_num_rows($result);

    if($queryResult > 0){
        while($row = mysqli_fetch_assoc($result)){?>
<div class="row">
    <div class="col-md-6">
        <img class="slikaProizvoda" src="<?php  echo "img/". $row['slika'];?>">
    </div>
    <div class="col-md-6">
        <div class="row">
            <div>
                <span id="cena">Cena: </span>
                <span
                    style="color: #EDF5E1; font-size: 20px"><b><?php echo number_format($row["ukupnaCena"], 2, ',', '.'); ?></b>
                    RSD</span>
            </div>
            <div>
                <div>
                    <?php if($row['popust'] == null){ ?>
                    <span id="popust">Popust: </span>
                    <span style="color: #EDF5E1; font-size: 20px; margin-left: 5px;">0%</span>
                    <?php 
						}
						else { ?>
                    <span id="popust">Popust: </span>
                    <span
                        style="color: #EDF5E1; font-size: 20px; margin-left: 5px;"><?php echo $row['popust']; ?>%</span>
                    <?php  
						}?>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){ ?>
                <?php $_SESSION['stranica'] = 'proizvod.php' ?>
                <form method="post" action="korpa.php" class="form-inline">
                    <input type="hidden" name="idIzabranog" value="<?php echo $row['idProizvoda']; ?>">
                    <input type="number" name="izabranaKol" min="1" max="<?php echo $row['kolicina'] ?>"
                        style="margin-right: 10px; border-radius:6px; width: 45px; height: 40px; text-align: center;"
                        required>
                    <?php if($row['kolicina'] > 0) { ?>
                    <input type="submit" name="btnDodajProizvodUKorpu" class="btn btn-primary" value="Dodaj u korpu">
                    <?php }
						else{ ?>
                    <input type="submit" name="btnDodajUKorpu" class="btn btn-primary" value="Dodaj u korpu"
                        disabled="true" data-toggle="tooltip" title="Proizvoda nema na stanju!" data-animation="true">
                    <?php } ?>
                </form>
                <?php } ?>
            </div>

        </div>
        <div class="row">
            <div>
                <span id="stanje">Stanje:</span>
                <?php if($row['kolicina'] <= 0){
						?>
                <span style="color: #EDF5E1; font-size: 20px;">NEMA NA STANJU</span>
                <?php }  else{
						?>
                <span style="color: #EDF5E1; font-size: 20px;">NA STANJU</span>
                <?php }
					?>
            </div>
        </div>
        <div>
            <div>
                <div class="page-header" style="margin-top: 0px;">
                    <h3>OPIS</h3>
                </div>
                <p><?php echo $row['opis']; ?></p>
            </div>
        </div>
    </div>
</div>
<?php
    }
}else{
        echo "Doslo je do greske!";
}
}
?>