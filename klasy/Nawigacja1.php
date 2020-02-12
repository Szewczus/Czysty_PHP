

<?php
include_once 'klasy/Nawigacja_dla_niezalogowanych.php';
include_once 'klasy/Baza.php';
include_once 'klasy/Formularz_logowania.php';

class Nawigacja1 {

    function drukuj() {
        
        header('refresh: 3600000;');
        $bd = new Baza("localhost", "root", "", "biuro_podrozy");

        $u='';

        $name = "sessionId";
        
        if (!isset($_COOKIE[$name])) {
            header('refresh: 3600000;');
            //echo "Cookie o nazwie:". $name. " nie zostało ustawione <br>";
            $form = new Nawigacja_dla_niezalogowanych();
            $form->drukuj_nawigacje();
            
        } 
        else 
        {
            $u=$bd->pokaz_wybrane("select userId from logged_in_users where sessionId='$_COOKIE[$name]'", array('userId') );
            if($u!='')
            {
                
            
            //echo "Cookie o nazwie:". $name. "<br> ma wartość: ". $_COOKIE[$name];
            //_______________________________________________________________________________________________



            $id = $_COOKIE[$name];
            $user = $bd->pokaz_wybrane("select userId from logged_in_users where sessionId='$id'", array("userId"));
            $email = $bd->pokaz_wybrane("select email from rejestracja where id='$user'", array('email'));
            ?>


            <nav class="navbar navbar-dark bg-dark navbar-expand-lg  navbar-inverse">

            <?php echo " <a class='navbar-brand' href='#'><img src='zdjecia/pobrane.png' width='40' height='auto' class='d-inline-block mr-1 align-bottom' alt=''>$email</a>" ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="mainmenu">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item" ><a class="nav-link" href="index.php">Strona gówna</a></li>
                        <li class="nav-item" ><a class="nav-link" href="kontakt.php">Kontakt</a></li>
                        <li class="nav-item" ><a class="nav-link" href="zarezerwuj.php">Zarezerwuj</a></li>
                        <li class="nav-item" ><a class="nav-link" href="usun_rezerwacje.php">Usuń rezerwacje</a></li>
                        <li class="nav-item"><a class="nav-link" href="modyfikuj_rezerwacje.php" >Modyfikuj rezerwacje</a></li>
                        <li class="nav-item" ><a class="nav-link" href="moje_konto.php">Moje konto</a></li>
                        <li class="nav-item"><a class="nav-link" href="wyloguj.php" >Wyloguj</a></li>
                        
                    </ul>
                </div>
            </nav>    






        <?php
            }
            else
            {
                header('refresh: 3600000;');
                $form = new Nawigacja_dla_niezalogowanych();
                $form->drukuj_nawigacje();
            }
        }
    }

}
?>