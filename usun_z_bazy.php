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
$dane=0;
$args=array(                        
            'rezerwacja' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,            
           );
$dane= filter_input_array(INPUT_POST, $args);



$termin=$dane['rezerwacja'];
echo "termin:".$termin;
$bd->delete("delete from rezerwacja where id='$termin'");
header("location:index.php");
?>

