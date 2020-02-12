<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/style.css">
<?php
include_once 'klasy/Nawigacja1.php';
$form=new Nawigacja1();
$form->drukuj();

include_once 'klasy/Baza.php';
$bd=new Baza("localhost", "root", "", "biuro_podrozy");


$id_z_bazy='';
$name='sessionId';
$id='';
if(isset($_COOKIE[$name]))
{
    $id=$_COOKIE[$name];
    $id_z_bazy=$bd->pokaz_wybrane("select sessionId where logged_in_users where sessionId='$_COOKIE[$name]'", array('sessionId'));
}
else
{}
if($id!=$id_z_bazy && $id!='')
{
//echo "sessionId:".$id."<br>";
$userId=$bd->pokaz_wybrane("select userId from logged_in_users where sessionId='$id'", array('userId'));
//echo "userId:".$userId."<br>";


$ile_rezerwacji=$bd->pokaz_ile("SELECT * from rezerwacja where userId='$userId'", array('id'));
//echo "liczba rezerwacji:".$ile_rezerwacji;



if($ile_rezerwacji==0)
{
    echo "<div id='kontener_warning'><h1>Nie możesz dokonać modyfikacji, poznieważ nie masz żadnych zarezerwowanych wycieczek</h1></div>";
}
else
{
    //-------------------------------------------------------------------------------------------------------
    $id_dla_uzytkownika=$bd->pokaz_wybrane_do_tab("select id from rezerwacja where userId='$userId'", array('id'));

    echo "<h1>Modyfikuj rezerwacje:</h1>";
    echo "<form action='modyfikacja_na_termin.php' method='post'>";
        echo "<select name='termin'>";
        for($i=0; $i<$ile_rezerwacji; $i++)
        {
            $nazwa_wycieczki=$bd->pokaz_wybrane("SELECT nazwa_wycieczki from rezerwacja where id='$id_dla_uzytkownika[$i]'", array('nazwa_wycieczki'));
            $data=$bd->pokaz_wybrane("SELECT data_rozpoczecia from rezerwacja where id='$id_dla_uzytkownika[$i]'", array('data_rozpoczecia'));
            echo "<option value='$id_dla_uzytkownika[$i]'>$nazwa_wycieczki $data</option>";
        }

        echo "</select>";
        
    echo "<input type='submit' value='Modyfikuj' name='submit'>";
    echo '</form>';
}
}
else
{
    $form_log = new Formularz_logowania();
    $form_log->drukuj_formularz_logowania();
}

?>
