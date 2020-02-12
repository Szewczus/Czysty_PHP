<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<?php
include_once 'klasy/Baza.php';
$db = new Baza("localhost", "root", "", "biuro_podrozy");
$name = "sessionId";
$dzisiejsza_sesja = $_COOKIE[$name]; //pobierz id bieżącej sesji (pamiętaj o session_start()
echo "sesia dzisiejsza: " . $dzisiejsza_sesja . "<br>";


$sql1 = "SELECT userId from logged_in_users where `sessionId`='$dzisiejsza_sesja'";
$userId = $db->pokaz_wybrane($sql1, array("userId"));
$sql2 = "DELETE from logged_in_users where `userId`=$userId";
$db->delete($sql2);
//$user=$db->pokaz_wybrane("select id from rejestracja where email='$user'", array("id"));  
    unset($_COOKIE[$name]);
    $_COOKIE[$name]='';
    setcookie($name, "", time() + (86400 * 30), "/");

    if (!isset($_COOKIE[$name])) 
    {
        echo "nie ma cookie <br>";
    }
    else 
    {
        echo "dalej jest cookie";
        echo "<br>cookie:" . $_COOKIE[$name];
    }
    if(isset($_COOKIE['name'])){
        setcookie(session_name(), '', time()-7000000, '/');
    }
    header("location:index.php");
?>

