<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">

<?php
include_once 'klasy/Nawigacja1.php';
$form1=new Nawigacja1();
$form1->drukuj();
?>
<link rel="stylesheet" href="css/style.css">
<form action="walidacja_rejestracji.php" method="post">
    <div id="logowanie">
        <div id="nazwa_biura"><h1>Formularz rejestracji:</h1></div>
    <table>
        <tr>
            <td><label>Imie:</label></td>
            <td><input type="text" name="imie" id="wczytywanie"></td>
        </tr>
        <tr>
            <td><label>Nazwisko:</label></td>
            <td><input type="text" name="nazwisko" id="wczytywanie"></td>
        </tr>
        <tr>
            <td><label>Email:</label></td>
            <td><input type="email" name="email" id="wczytywanie"></td>
        </tr>
        <tr>
            <td><label>Hasło:</label></td>
            <td><input type="password" name="haslo" id="wczytywanie"></td>
        </tr>
        <tr>
            <td><input type="submit" name="rejestruj" value="Rejestruj" id="wczytywanie"></td>
        </tr>
    </table>
    </div>
   
</form>



