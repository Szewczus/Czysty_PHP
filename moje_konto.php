<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style.css">
<?php
include_once 'klasy/Nawigacja1.php';
include_once 'klasy/Baza.php';
include_once 'klasy/Formularz_logowania.php';
$form1 = new Nawigacja1();
$form1->drukuj();
$bd = new Baza("localhost", "root", "", "biuro_podrozy");
$id='';
$name='sessionId';
if(isset($_COOKIE[$name])){
    $dzisiejsza_sesja1 = $_COOKIE[$name];
    $id=$bd->pokaz_wybrane("Select sessionId from logged_in_users where sessionId='$dzisiejsza_sesja1'", array("sessionId"));
}
if ($id=='') {
    //echo "Cookie o nazwie:". $name. " nie zostało ustawione <br>";
    $form_log = new Formularz_logowania();
    $form_log->drukuj_formularz_logowania();
}
else 
{
    //echo "Cookie o nazwie:". $name. "<br> ma wartość: ". $_COOKIE[$name];

    $name='sessionId';
    $id = $_COOKIE[$name];
    $user = $bd->pokaz_wybrane("select userId from logged_in_users where sessionId='$id'", array("userId"));

    echo "<div id='kontener3'>";
    echo "Zalogowany użytkownik to: " . $bd->pokaz_wybrane("select imie from rejestracja where id='$user'", array("imie"));
    echo " ".$bd->pokaz_wybrane("select nazwisko from rejestracja where id='$user'", array( "nazwisko"));
    echo "<br>".'Na email: ' . $bd->pokaz_wybrane("select email from rejestracja where id='$user'", array("email"));
    $sql = "select * from rezerwacja where userId='$user'";
    
    $dane=$bd->select($sql, array("nazwa_wycieczki", "data_rozpoczecia"));
    if($bd->pokaz_wybrane($sql, array("nazwa_wycieczki", "data_rozpoczecia"))=="")
    {
        echo "<br>Zalogowany uzytkownik nie zarezerwował jeszcze żadnej wycieczki ";
    }
    else
    {
        echo "<br>Wybrane podróże: <br>";
        echo "<h3>" . $dane . "</h3>";
    }
   
    echo "</div>";
}
?>
