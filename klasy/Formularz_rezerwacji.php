
<?php
include_once 'klasy/Nawigacja1.php';

$form1=new Nawigacja1();
$form1->drukuj();
class Formularz_rezerwacji {
    function drukuj(){
?>

<link rel="stylesheet" href="css/style.css">
<form action="walidacja_rezerwacji.php" method="post">
<div id="kontener3">
    <div id="oferta">
        <?php
        //header("location:kalendarz.php");
        ?>
        <h1>Formularz rezerwacji:</h1>
        <table>
            
            <tr>
                <td>Termin ropoczęcia:</td>
                <td>
                    
                    <select name="termin_wycieczki" id="wczytywanie">
                        <option id="termin1">01-07-2020 do 14-07-2020</option>
                        <option id="termin2">15-07-2020 do 28-07-2020</option>
                        <option id="termin3">29-07-2020 do 11-08-2020</option>
                        <option id="termin4">12-08-2020 do 16-08-2020</option>
                    </select>
                </td>
                
            </tr>
            
            <tr>
                <td>nazwa wycieczki:</td>
                <td>
                    <select name="nazwa_wycieczki" id="wczytywanie">
                        <option id="nazwa1">Słoneczna przygoda </option>
                        <option id="nazwa2">Malownicze wybrzeże </option>
                        <option id="nazwa3">Niezwykła przygoda </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="rejestruj" value="Rezerwuj" id="wczytywanie"></td>
            </tr>
        </table>
    </div>
</div>
</form>
<?php
}

}
?>
