<?php
include_once 'klasy/Baza.php';
$bd=new Baza("localhost", "root", "", "biuro_podrozy");
$dane=0;
        $args=array(
            
            
            'nazwa' =>  ['filter' => FILTER_SANITIZE_SPECIAL_CHARS],


            'data' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,

             
            'wolny_termin'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            
        );
        $dane= filter_input_array(INPUT_POST, $args);
        
        $nazwa=$dane['nazwa'];
        $data=$dane['data'];
        $wolny_termin=$dane['wolny_termin'];
        
        echo "Nazwa:"."$nazwa".'<br>';
        echo "Data:"."$data".'<br>';
        echo "Wolny termin:".$wolny_termin.'<br>';
        
        if(strpos( $wolny_termin, "Słoneczna przygoda" ) !== false)
        {
            $name_wolnego="Słoneczna przygoda";
            $rest = substr($wolny_termin, 20, 30); 
        }
        if(strpos( $wolny_termin, "Malownicze wybrzeże" ) !== false)
        {
            $name_wolnego="Malownicze wybrzeże";
            $rest = substr($wolny_termin, 21, 29);
        }
        if(strpos( $wolny_termin, "Niezwykła przygoda" ) !== false)
        {
            $name_wolnego="Niezwykła przygoda";
            $rest = substr($wolny_termin, 20, 29);
        }
        
        //----------------------------------------------------------------------------------------
        $link = mysqli_connect("localhost", "root", "", "biuro_podrozy");
        echo "nazwa wolnego terminu:".$name_wolnego."<br>";
        echo "data wolnego terminu:".$rest."<br>";
        
        $sql="UPDATE rezerwacja
        SET nazwa_wycieczki = '$name_wolnego', data_rozpoczecia = '$rest'
        WHERE nazwa_wycieczki='$nazwa' and data_rozpoczecia='$data'";
        
        //$bd->select($sql, array("nazwa_wycieczki", "data_rozpoczecia"));
        if(mysqli_query($link,$sql))
        {
            echo "zapdejotowane";
        }
header("location:index.php");
?>
