<nav class="navbar navbar-default">
   
    <div class="container-fluid">
       
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                Početna strana</a>
        </div>

       
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a href="Onama.php">O nama</a></li>
                <li><a href="Galerija.php">Galerija</a></li>
                
            </ul>
            <form class="navbar-form navbar-left" action="pretraga.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="trazi" id="trazi"  class="form-control" placeholder="Traži...">
                </div>
                <button type="submit" name="btnSearch" id="btnSearch" class="btn btn-default"><span class="glyphicon glyphicon-search"
                        aria-hidden="true"></span></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){ ?>
                <li><a href="korpa.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
                <?php } else { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                        aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="#" data-toggle="modal" data-target="#modalDijalog">Prijavite se</a>
                        </li>


                        <li><a href="Registracija.php">Registruj se</a></li>

                    </ul>
                </li>
                <?php } ?>
                <li><a href="Kontakt.php">Kontakt</a></li>
               
                </li>
            </ul>
        </div>
    </div>
</nav> 