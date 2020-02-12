
<?php


class Sprawdz_logowanie {

public function spr(){
$form=new Formularz_logowania();
if (filter_input(INPUT_POST, 'submit')) 
{
    
    include_once "klasy/Baza.php";
    $db = new Baza('localhost', 'root', '', 'biuro_podrozy');
    $user = filter_input(INPUT_POST, 'user');
    $pass = filter_input(INPUT_POST, 'pass');
    $hashpass=hash('sha256', $pass);
    $sql = "select * from rejestracja where email='$user' and hasło='$hashpass'";
    $wynik = $db->getMysqli()->query($sql);
    $ile_rek = $wynik->num_rows;
    if ($ile_rek <> 1) 
    {
        
?>      
        <div id="kontener_warning">
            <h4> Niepoprawna nazwa użytkownika lub hasło!
            Spróbuj jeszcze raz</h4>
        </div>
<?php 
    } 
    else 
    { //$ile_rek=1
        session_start();
        $_SESSION['id']= session_id();
        $id=$_SESSION['id'];
        $user=$db->pokaz_wybrane("select id from rejestracja where email='$user'", array("id"));
        $_SESSION['user']=$user;
        echo "<h4> Hasło zaakceptowane, zalogowany użytkownik o userId:,$user!</h4>"; 
        $sql="INSERT INTO logged_in_users VALUES('$id','$user')";
        $db->insert($sql);
        //--------------------------------------------------------------------------------------------
        //coooooooookie:
        echo "3)parametry cookie:<br>";
        $name = "sessionId";
        $value = $id;
        setcookie($name, $value, time() + (86400 * 30), "/");
       
        header("location:index.php");
    }
    } 
    
}



}
