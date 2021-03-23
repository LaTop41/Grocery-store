<?php


$email ="";
$password1="";


$mysqli =  new mysqli("localhost","root","","prodavnica");

if($mysqli->error)
{
    die("Greska prilikom konektovanja sa bazom: " . $mysqli->error);
}

?>



<div class="modal fade" id="modalDijalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" id="headerLogin">
                <h3 class="modal-title" id="exampleModalLabel">Prijava</h3>
                <button id="btnX" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bodyLogin">
                <form method="POST" action="php/loginSystem.php">
                    <div class="form-group">
                        <label for="email">E-mail adresa</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
                            placeholder="Unesite e-mail adresu" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1"
                            value="<?php echo $password1 ?>" placeholder="Unesite password" required>
                    </div>
            </div>
            <div class="modal-footer" id="footerLogin">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" name="login" class="btn btn-success">Prijava <span
                        class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>
            </div>
            </form>
        </div>
    </div>
</div>