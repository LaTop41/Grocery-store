
<style>
h1{
     font-family: "Times New Roman", Times, serif;
        font-size: 30px;
}
</style>

<div class="row" id= header>
    <div class="col-md-10">
        <div class="page-header">
            <h1> <a href="index.php"></a><img src="img/logo.jpg" id="logo"><i>Klikom do hrane</i></h1>
        </div>
    </div>
    <br>
    <div class="col-md-2">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
            </span>
            <form name="vremeForma"><input type="text" id="cifre" name="cifre" class="form-control"></form>
        </div>
        <br>
        <form class="form-inline">
            <div class="form-group">
                <?php 
        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){ 
         if(isset($_SESSION['ime']) && !empty($_SESSION['ime']) && isset($_SESSION['prezime']) && !empty($_SESSION['prezime'])){
            echo $_SESSION['ime']. " " . $_SESSION['prezime'];
          }
            ?>
                <input type="button" name="btnLogout" value="Odjavite se" id="btnLogout" data-toggle="modal" data-target="#logout">
            <?php 
        }
            ?>
            </div>
        </form>
    </div>
</div>
<br>