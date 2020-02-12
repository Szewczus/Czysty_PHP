<link rel="stylesheet" href="css/style.css">
<?php


include_once 'klasy/Baza.php';
include_once 'zarezerwuj.php';
$bd=new Baza("localhost", "root", "", "biuro_podrozy");

class Walidacja_formularza_rezer {

public function walidacja($bd)
    {
    

       $dane=0;
        $args=array(
            
            
            'termin_wycieczki' =>  ['filter' => FILTER_SANITIZE_SPECIAL_CHARS],


            'nazwa_wycieczki' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,


            
        );
        $dane= filter_input_array(INPUT_POST, $args);
        
        
    
        $errors="";
        foreach($dane as $key=>$val)
        {
            if($val===false or $val===NULL)
            {
                $errors.=$key." ";
                echo $errors;
            }
        }
    
    
    
        /* Jezeli nie ma błędów to wczytaj rekordy z formularza do bazy*/
        if($errors=="")
        {
            return $dane;
        }
        else
        {
            echo 'Bledne dane';
            $dane=0;
            return $dane;
        }
    }
    
    
/****************************************************************dodaj***************************************************************/    


    function dodaj($bd)
    {
        echo "<div id='kontener3'>";
        echo "<span id='tresc'>";
            $dane=$this->walidacja($bd);
         
            if($dane==0)
            {
                echo "nie mozna zapisac do bazy bo nie sa podane wszystkie dane lub są one niepraiwdlowe";
            }
            else
            {
                $termin_wycieczki = $dane['termin_wycieczki'];
                $nazwa_wycieczki = $dane['nazwa_wycieczki'];
                $name='sessionId';
                $id='';
                if(isset($_COOKIE[$name]))
                {
                $id= $_COOKIE[$name];
                
                $user=$bd->pokaz_wybrane("select userId from logged_in_users where sessionId='$id'",array( "userId"));    
                }
                
               
                $sql="SELECT * FROM rezerwacja  WHERE rezerwacja.nazwa_wycieczki='$nazwa_wycieczki' and rezerwacja.data_rozpoczecia like '$termin_wycieczki'";
                if($bd->pokaz_wybrane($sql,array("userId", "nazwa_wycieczki", "data_rozpoczecia"))!=="")
                {
                    
                    echo "<h1>Ten termin jest zarezwowany wybierz inny!</h1>";
                    //echo "<h1>Zarezerwowane terminy:</h1><br>";
                    echo "<h1>Wolne terminy:</h1>";
                    include_once 'terminy_wolne.php';
                    //echo $bd->select("Select  nazwa_wycieczki, data_rozpoczecia from rezerwacja", array( "nazwa_wycieczki", "data_rozpoczecia"));
                    
                }else
                {
                    $sql = "INSERT INTO rezerwacja VALUES('NULL','$user','$nazwa_wycieczki','$termin_wycieczki')";
                    $bd->insert($sql);
                    echo "Termin został zarezerwowny!";        
                }
            }
            echo "</span>";
        echo "</div>";
    }
    
/****************************************************************zapisz do pliku***************************************************************/    



    
}
