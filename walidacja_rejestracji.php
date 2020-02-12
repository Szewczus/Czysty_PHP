<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="style.css">

<?php
include_once 'klasy/Baza.php';
include_once 'rejestruj.php';
$bd=new Baza("localhost", "root", "", "biuro_podrozy");

 function walidacja($bd)
    {
       $dane=0;
        $args=array(
            
            
            'imie' =>  [ 'filter' => FILTER_VALIDATE_REGEXP, 
                           'options' => ['regexp' => '/^[A-Z]{1}[a-ząćęńóśżźł]{1,25}$/']],


            'nazwisko' => [ 'filter' => FILTER_VALIDATE_REGEXP, 
                           'options' => ['regexp' => '/^[A-Z]{1}[a-ząćęńóśżźł]{1,25}$/']],

            'email' =>  [ 'filter' => FILTER_SANITIZE_EMAIL],


            'haslo' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            
            
        );
        $dane= filter_input_array(INPUT_POST, $args);
        
    
    
        $errors="";
        foreach($dane as $key=>$val)
        {
            if($val===false or $val===NULL)
            {
                $errors.=$key." ";
                
            }
        }
    
    
    
        /* Jezeli nie ma błędów to wczytaj rekordy z formularza do bazy*/
        if($errors=="")
        {
            //sprawdzam czy emil nie powtarza sie w bazie
            $walidacja_email=$dane['email'];
            $sql="select email from rejestracja where email='$walidacja_email'";
            $spr_email=$bd->pokaz_wybrane($sql, array("email"));
            if($spr_email!=="")
            {
                echo "<div id='kontener_warning'>";
                echo "<h1>Email znajduje sie już w bazie!!!</h1>";
                echo "</div>";
                $dane=0;
            }
            return $dane;
        }
        else
        {
            
            
            echo "<div id='kontener_warning'>";
            echo '<h1>Bledne dane w '.$errors."!!!</h1>";
            echo '</div>';
            $dane=0;
            return $dane;
        }
    }
    
    
/****************************************************************dodaj***************************************************************/    


    function dodaj($bd)
    {
        $dane=walidacja($bd);
            if($dane==0)
            {
               // echo "<div id='kontener_warning'>";
               // echo "<h1>nie mozna zapisac do bazy bo nie sa podane wszystkie dane lub są one niepraiwdlowe!!!</h1>";
               // echo "</div>";
            }
            else
            {
                $imie = $dane['imie'];
                $nazwisko = $dane['nazwisko'];
                $email = $dane['email'];
                $haslo = $dane['haslo'];
                $haslo=hash('sha256', $haslo);
                $sql = "INSERT INTO rejestracja VALUES('NULL','$imie','$nazwisko','$email','$haslo')";
                $bd->insert($sql);
                echo "<div id='kontener_warning'>";
                echo "<h1>Dodano do bazy :)</h1>";
                echo "</div>";
                
            }

    }
    
/****************************************************************zapisz do pliku***************************************************************/    

if(filter_input(INPUT_POST, 'rejestruj'))
        {
            $przycisk=filter_input(INPUT_POST, 'rejestruj');
            switch ($przycisk)
            {
                case "Rejestruj": dodaj($bd); 
             //   header("location:index.php");
                break;
                
                
            }
        }

    

?>


