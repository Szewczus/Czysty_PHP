<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
include_once 'klasy/Nawigacja1.php';
$form=new Nawigacja1();
$form->drukuj();



include_once 'klasy/Baza.php';
$bd=new Baza("localhost", "root", "", "biuro_podrozy");
$bd->delete("Delete from wolne_terminy");


$termin1='01-07-2020 do 14-07-2020';
$termin2='15-07-2020 do 28-07-2020';
$termin3='29-07-2020 do 11-08-2020';
$termin4='12-08-2020 do 16-08-2020';
$Terminy=array();
$Terminy[0]=$termin1;
$Terminy[1]=$termin2;
$Terminy[2]=$termin3;
$Terminy[3]=$termin4;

$nazwa1='Słoneczna przygoda';
$nazwa2='Malownicze wybrzeże';
$nazwa3='Niezwykła przygoda';
$Nazwy=array();
$Nazwy[0]=$nazwa1;
$Nazwy[1]=$nazwa2;
$Nazwy[2]=$nazwa3;


//ile rezerwacji jest zarezerwowanych:
$ile_rezerwacji=$bd->pokaz_ile("SELECT * from rezerwacja", array('id'));

//Tablica zawiera informacje o rezrwacjach uzytkownika z bazy "nazwa wycieczki data rozpoczecia"
$Tab=$bd->pokaz_wybrane_do_tab("select nazwa_wycieczki,data_rozpoczecia  from rezerwacja", array("nazwa_wycieczki", "data_rozpoczecia"));
$k=0;
for($i=0; $i<$ile_rezerwacji; $i++)
{
    $Tablica[$i]=$Tab[$k]." ".$Tab[$k+1];
    $k=$k+2;
}
//print_r($Tablica);


//tu w tablicy Tablica_terminow mam wszytkie terminy wycieczek i zarezrwowane i niezarezerowane
echo '<br>';
$licznik=0;
$Tablica_terminow=array();
for($i=0; $i<3; $i++)
{
    for($j=0; $j<4; $j++)
    {
        $Tablica_terminow[$licznik]=$Nazwy[$i]." ".$Terminy[$j];
        $sql="INSERT INTO wolne_terminy VALUES('$Tablica_terminow[$licznik]')";
        $bd->insert($sql);
        $licznik++;
    }
}
//echo "<br>Tab terminow:<br>";
//print_r($Tablica_terminow);

//tu bede probować dostac terminy wolne nie zarezerwowane przez nikogo:
for($i=0; $i<$ile_rezerwacji; $i++)
{
    $bd->delete("delete from wolne_terminy where wolne_terminy='$Tablica[$i]'");
}
$Wolne_terminy=$bd->pokaz_wybrane_do_tab("select * from wolne_terminy", array("wolne_terminy"));




echo "<form action='zamien.php' method='post'>";
    
    $dane=0;
    $args=array(
        'termin'=> FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    );
    
    
    $dane= filter_input_array(INPUT_POST, $args);
    $termin=$dane['termin'];
    echo "Wybrany termin to: ";
    $sqla="select nazwa_wycieczki from rezerwacja where id='$termin'";
    $sqlb="select data_rozpoczecia from rezerwacja where id='$termin'";

    $nazwa=$bd->pokaz_wybrane($sqla, array('nazwa_wycieczki'));
    $data=$bd->pokaz_wybrane($sqlb, array('data_rozpoczecia'));
    
    
    echo "<br>";
    echo "<select name='nazwa'>";
        echo "<option>$nazwa</option>";
    echo "</select>";
    
    echo "<select name='data'>";
        echo "<option>$data</option>";
    echo "</select>";
    echo "<br>";
    
    
    echo "Zamień go na:<br>";
    echo "<select name='wolny_termin'>";
    foreach ($Wolne_terminy as $key)
    {
        echo "<option>$key</option>";
    }
    echo "</select>";
    echo "<br>";
    
    echo "<br><input type='submit' value='Zamien'>";
echo "</form>";


?>

