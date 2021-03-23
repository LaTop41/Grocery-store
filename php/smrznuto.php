<?php  

$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
  die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}


$upit = "SELECT * FROM proizvod WHERE kategorija = 'smrznuta'";

$rez = $mysqli->query($upit);

if(!$rez){
  print("Ne moze se izvrsiti upit!");
  die("Greska:" . $mysqli->error);
}



?>
<div class="page-header">
    <h2>Smrznuta hrana</h2>
</div>
<?php if(isset($_SESSION['dodatoUKorpu']) && isset($_SESSION['nazivProizvoda'])){
  ?>
<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    Proizvod <b><?php echo $_SESSION['nazivProizvoda']; ?></b> ste uspešno dodali u vašu korpu!
</div>
<?php 
  unset($_SESSION['dodatoUKorpu']);
} 
?>

<div class="row">
    <?php  if($rez->num_rows == 0){
      ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <strong><?php echo "Trenutno nema proizvoda!"  ?></strong>
    </div>
    <?php
  }
  else{

    while($red = $rez->fetch_assoc()){

      $_SESSION['idProizvoda'] = $red['idProizvoda'];
      if(($red['popust'] != null) && ($red['popust'] != 0)){ 
        $ukupnaCena = $red['cena'] * (1 - $red['popust']/100);
      }
      else{
        $ukupnaCena = $red['cena'];
      }
      $red["ukupnaCena"] = $ukupnaCena;
      $azuriraj = "UPDATE proizvod SET "
                              . "ukupnaCena = '" .$ukupnaCena . "'"
                              . " WHERE idProizvoda = '" . $red['idProizvoda'] . "'";
      $rezultat = $mysqli->query($azuriraj) or die($mysqli->error);

    ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail thumbpc">
            <h3> <?php echo $red['naziv']; ?> </h3>
            <img src="<?php echo "img/" . $red['slika']; ?>" class="slika" hight="335px" width="335px">
            <div class="caption">
                <p>Cena:<b> <?php echo number_format($red["ukupnaCena"], 2, ',', '.') ?> RSD </b> <?php if($red['popust'] != null)  {
                            ?>
                    <small style="color: red;"><?php echo $red['cena'];?> rsd (pre popusta)</small>
                    <?php
                        }
                  ?>
                </p>
                <div style="display: flex; ">
                    <form action="proizvod.php" method="POST" class="form-inline">
                        <input type="hidden" name="idInfo" value="<?php echo $red['idProizvoda']; ?>">
                        <button type="submit" class="btn btn-info" name="btnInfo" style="width: 200px;">Info <i
                                class="fa fa-arrow-circle-right"></i></button>
                    </form>
                    <form action="korpa.php" method="POST" class="form-inline">
                        <?php $_SESSION['stranica'] = 'prodavnicaSmrznuto.php'; ?>
                        <input type="hidden" name="idIzabranog" value="<?php echo $red['idProizvoda']; ?>">
                        <input type="hidden" name="naziv" value="<?php echo $red['naziv'] ?>">
                        <input type="hidden" name="izabranaKol" value="1">
                        <?php if (isset($_SESSION['loggedIn'])) { ?>
                        <?php if($red['kolicina'] <= 0){ ?>
                        <button type="submit" name="btnUbaciUKorpu" class="btn btn-primary" style="margin-left: 5px;"
                            disabled="true"><span class="glyphicon glyphicon-shopping-cart"
                                aria-hidden="true"></span></button>
                        <?php } else{
                ?>
                        <button type="submit" name="btnUbaciUKorpu" class="btn btn-primary"
                            style="margin-left: 5px;"><span class="glyphicon glyphicon-shopping-cart"
                                aria-hidden="true"></span></button>
                        <?php
                    }
              }
               ?>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <?php
    } 
  }
?>
</div>