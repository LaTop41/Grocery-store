<?php 

session_start();


$email = "";
$password1 = "";



$mysqli = new mysqli("localhost", "root", "","prodavnica");

if($mysqli->error){
  die("Greska: " . $mysqli->error);
}


if(isset($_POST['login'])){
  $unetPass = $_POST['password1'];
  $unetEmail = $_POST['email'];
  $upit = "SELECT * FROM korisnik WHERE email = '" .$unetEmail. "' and password = '" .sha1($unetPass). "'";



  $rez=$mysqli->query($upit);

  if(!$rez){
    print("Ne moze se izvrsiti upit!");
    die("Greska:" . $mysqli->error .
      "<br>Broj greske: " . $mysqli->errno);
  }


  if(!($red = $rez->fetch_assoc())){ 
    $_SESSION['message'] = "GREŠKA! Pogresno ste uneli email i password.";
    header('Location: ../index.php');
  }
  else{ 
      $_SESSION['idKorisnik'] = $red['idKorisnik']; 
      $_SESSION['ime'] = $red['ime'];
      $_SESSION['prezime'] = $red['prezime'];
      $_SESSION['loggedIn'] = true;
    if($red['usertype'] == "admin"){
      $_SESSION['usertype'] = "admin";
      header('Location: ../admin.php');
    }
    else{ 
      $_SESSION['usertype'] = "user";
      header('Location: ../index.php');
    }
}
}


?>