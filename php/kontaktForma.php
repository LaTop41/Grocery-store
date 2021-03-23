

<?php
$mysqli = new mysqli("localhost", "root", "", "prodavnica");

if($mysqli->error){
	die("Greska prilikom konektovanja s bazom: " . $mysqli->error);
}

if(isset($_POST['btnPosalji'])){

    if((!$_POST['imeIprezime']) ||  (!$_POST['email']) || (!$_POST['telefon']) || (!$_POST['naslov']) || (!$_POST['poruka'])){
        echo "Niste uneli sva neophodna polja!";
    }
    else
    {
        $upitDodaj = "INSERT INTO poruke(imeIprezime, email, telefon, naslov, poruka) VALUES ('"
        . $_POST['imeIprezime'] . "', '"
        . $_POST['email'] . "', '"
        . $_POST['telefon'] . "', '"
        . $_POST['naslov'] . "', '"
        . $_POST['poruka'] . "')";

        $rez = $mysqli->query($upitDodaj);
        
        if($rez){
            ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <strong>Uspešno ste poslali poruku!</strong> 
</div>
<?php
                     }else{
                         ?>
<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    <strong>Niste poslali poruku!</strong> Probajte ponovo.
</div>
<?php
                     }

                }
            }
?>




<div class="row">
    <div class="col-md-6">
        <h2 class="page-header" >
            Kontakt
        </h2>
    <form enctype="multipart/form-data" action = "kontakt.php" method="POST">
        <div class="form-group">
            <label for="imeIprezime">Vaše ime i prezime</label>
            <input type="text" class="form-control" name="imeIprezime" placeholder="Upišite Vaše ime i prezime">
        </div>
        <div class="form-group">
            <label for="email">Vaš e-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Upišite Vaš e-mail">
        </div>
        <div class="form-group">
            <label for="telefon">Vaš telefonski broj</label>
            <input type="tel" class="form-control" name="telefon" placeholder="Upišite Vaš telefonski broj">
        </div>
        <div class="form-group">
            <label for="naslov">Naslov poruke</label>
            <input type="text" class="form-control" name="naslov" placeholder="Naslov Vaše poruke">
        </div>
        <div class="form-group">
            <label for="poruka">Tekst poruke</label>
            <textarea class="form-control" rows="5" name="poruka"></textarea>
        </div>
        <button type="submit" name="btnPosalji" class="btn btn-danger btn-lg btn-block">Pošaljite</button>
    </form>
    </div>
    <div class="col-md-6">
        <h2 class="page-header">
            Gde se nalazimo
        </h2>
        <p><i class="fas fa-map-maker" aria-hidden="true"></i>
            Savski nasip 7, Beograd 11000
        </p>
        <p><i class="fas fa-phone" aria-hidden="true"></i>
            +381 11 40 11 216
        </p>
        <p><i class="fas fa-envelope" aria-hidden="true"></i>
            office@its.edu.rs
        </p>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11323.816732120766!2d20.402573537570763!3d44.8021223655773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6f92363f1881%3A0x550c0955fccddcc2!2z0KHQsNCy0YHQutC4INC90LDRgdC40L8gNywg0JHQtdC-0LPRgNCw0LQgMTEwNzA!5e0!3m2!1ssr!2srs!4v1582588634992!5m2!1ssr!2srs"
            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>