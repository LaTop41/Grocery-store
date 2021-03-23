<?php if(isset($_SESSION['idNarudzbenice']) && !empty($_SESSION['idNarudzbenice'])) { ?>


<?php


$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
    die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}




$upitNarudzbenica = "SELECT n.*, k.* from narudzbenica n JOIN korisnik k on n.idKorisnik = k.idKorisnik  WHERE idNarudzbenice = '" . $_SESSION['idNarudzbenice'] . "'";

$rezUpita = $mysqli->query($upitNarudzbenica) or die($mysqli->error);


if($red = $rezUpita->fetch_assoc()){

    $dateT = new DateTime($red['datumVreme']);
    ?>

<p>Narudzbenica - ID: <b><?php echo $red['idNarudzbenice'] ?></b>) datum -
    <b><?php echo date_format($dateT, "d/m/Y"); ?></b> u <b><?php echo date_format($dateT, "h:i A"); ?></b>.</p>
<p>Korisnik - ID: <?php echo $red['idKorisnik'] ?> : <b> <?php echo $red['ime'] . " " . $red['prezime']; ?></b>
    <br>Email adresa: <b><?php echo $red['email']; ?></b>
    <br>Broj telefona: <b><?php echo $red['brojTelefona'] ?></b>
</p>

<p>Naručili ste:</p>

<div id="narudzbeniceDatuma">
    <div class="table-responsive">
        <table class="table tabelaStavke">


            <?php
    $stavkeNar = $mysqli->query("SELECT s.redniBroj, s.idNarudzbenice, s.idProizvoda, 
            s.izabranaKolicina, s.ukupnaCena as ukupnaCenaStavke, v.idProizvoda, v.naziv, v.popust, v.slika, v.ukupnaCena, v.stanje FROM stavka_narudzbenice s JOIN proizvod v ON s.idProizvoda = v.idProizvoda 
            WHERE s.idNarudzbenice = '". $red['idNarudzbenice'] . "'
            ORDER BY s.redniBroj") or die($mysqli->error);
    ?>

            <tr>
                <th width="5%">#</th>
                <th width="10%"></th>
                <th width="25%">Naziv</th>
                <th width="10%">Količina</th>
                <th width="20%">Jedinična cena</th>
                <th>Ukupna cena stavke</th>
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
                <td><?php echo number_format($redStavki['ukupnaCena'], 2, ",", ".") . " Popust:" . $redStavki['popust'] . "%"; ?>
                    RSD</td>
                <?php }
                else{
                    ?>
                <td><?php echo number_format($redStavki['ukupnaCena'], 2, ",", "."); ?> RSD</td>
                <?php
                } ?>
                <td><?php echo number_format($redStavki['ukupnaCena'], 2, ",", "."); ?> RSD</td>
            </tr>

            <?php
    }
    ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Ukupno:<br><b><?php echo number_format($red['NarUkupnaCena'], 2, ",", "."); ?> RSD</b><br>(+250 din
                    za
                    cenu dostave)</td>
            </tr>
        </table>
    </div>
</div>

<?php
}
} 
?>