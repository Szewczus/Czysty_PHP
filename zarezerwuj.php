<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">

<?php
include_once 'klasy/Formularz_rezerwacji.php';
include_once 'klasy/Formularz_logowania.php';
include_once 'klasy/Baza.php';

$bd=new Baza("localhost", "root", "", "biuro_podrozy");
$form=new Formularz_rezerwacji();
$name='sessionId';
$id_z_bazy="";
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
    $id_z_bazy.=$bd->pokaz_wybrane("select sessionId from logged_in_users where sessionId='$id' ", array("sessionId"));
    
    if($id==$id_z_bazy)
    {
        $form->drukuj();

    }
    else
    {
        $form_log=new Formularz_logowania();
        $form_log->drukuj_formularz_logowania();
    }
}
else
{
    $form_log = new Formularz_logowania();
    $form_log->drukuj_formularz_logowania();
}


?>   
    
    
     
         

    
    
    
    