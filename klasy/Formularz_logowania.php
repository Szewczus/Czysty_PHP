<link rel="stylesheet" href="css/style.css">
<?php

class Formularz_logowania {
   function drukuj_formularz_logowania(){
?>
    <form method="post" action="haslo.php">
        <div id="logowanie">
        <h4>Proszę się zalogować:</h4>
        <table>
            <tr>
            
                <td><label>Email:</label></td>
                <td><input type="email" name="user" id="wczytywanie"></td>
            </tr>
            <tr>
                <td><label>Hasło:</label></td>
                <td><input type="password" name="pass" id="wczytywanie"></td>
            <tr>
        </table>        
            <input type="submit" name="submit" value="Zaloguj się" id="wczytywanie">
        </div>
<?php 
}

   }
?>
