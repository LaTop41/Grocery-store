<div class="row">
    <div class="col-md-6">
        
        <div class="page-header">
            <h2>Registruj se</h2>
        </div>

        
        <form action="registracija.php" method="POST" onSubmit="return validation();" name="registration">
            <?php

                $conn = new mysqli("localhost","root","","prodavnica");
                if($conn->error)
                {
                    die("Greska:" .$conn->error);
                }

                $ime = "";
                $prezime = "";
                $email = "";
                $brojTelefona = "";
                $password1="";
                $password2="";
                $usertype = "user";
                if(isset($_POST['dodaj']))
                {
                    
                        if((!$_POST['ime']) ||  (!$_POST['prezime']) || (!$_POST['email']) || (!$_POST['brojTelefona']) || (!$_POST['password1']) || (!$_POST['password2'])){
                            echo "Niste uneli sva neophodna polja u registraciji!";
                        }
                    else
                    {
                        $idKor = rand(0, 999999); 
                        $upit = "INSERT INTO korisnik (idKorisnik, ime, prezime, password, brojTelefona, email, pol, usertype) values ('"
                        .$idKor ."', '"
                        .$_POST['ime'] ."', '"
                        .$_POST['prezime'] ."', '"
                        .sha1($_POST['password1']) ."', '"
                        .$_POST['brojTelefona'] ."', '"
                        .$_POST['email'] ."', '"
                        .$_POST['pol'] ."', '"
                        .$usertype ."')";


                        if($_POST['password1']===$_POST['password2']) $rez=$conn->query($upit);
                        else $rez=false;
                        if($rez){
                        ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Uspešno ste se registrovali!</strong> Sa Vašim podacima, možete da se ulogujete!
            </div>
            <?php
                     }else{
                         ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>Niste se registrovali!</strong> Probajte ponovo. Pažljivo unesite zahtevana polja!
            </div>
            <?php
                     }

                }
            }
            ?>
            <div class="form-group">
                <label for="ime">Vaše ime</label>
                <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $ime; ?>"
                    placeholder="Unesite ime" required>
            </div>
            <div class="form-group">
                <label for="prezime">Vaše prezime</label>
                <input type="text" class="form-control" id="prezime" name="prezime" value="<?php echo $prezime; ?>"
                    placeholder="Unesite prezime" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail adresa</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"
                    placeholder="Unesite e-mail adresu" required>
            </div>
            <div class="form-group">
                <label>Pol</label>
                <br>
                <label class="radio-inline">
                    <input type="radio" name="pol" id="pol" value="M"> Muški
                </label>
                <label class="radio-inline">
                    <input type="radio" name="pol" id="pol" value="Ž"> Ženski
                </label>
            </div>
            <div class="form-group">
                <label for="brojTelefona">Broj telefona</label>
                <input type="tel" class="form-control" id="brojTelefona" name="brojTelefona"
                    value="<?php echo $brojTelefona; ?>" placeholder="Unesite broj telefona" required>
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
                <input type="password" class="form-control" id="password1" name="password1"
                    value="<?php echo $password1 ?>" placeholder="Unesite password" required>
            </div>
            <div class="form-group">
                <label for="password2">Ponovite password</label>
                <input type="password" class="form-control" id="password2" name="password2"
                    value="<?php echo $password2 ?>" placeholder="Ponovite vaš password" required>
            </div>
            <button type="submit" name="dodaj" value="dodaj"  class="btn btn-warning btn-lg btn-block"
                id="registracijaBtn"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Registrujte
                se</button>



        </form>



    </div> 

   