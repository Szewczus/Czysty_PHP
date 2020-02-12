<?php


class Baza {
    
    private $mysqli; //uchwyt do BD
//----------------------------------------------------------------


    public function __construct($serwer, $user, $pass, $baza) 
    {
        $this->mysqli = new mysqli($serwer, $user, $pass, $baza);
        /****************** sprawdz połączenie *************************/
        if ($this->mysqli->connect_errno) 
        {
            printf("Nie udało sie połączenie z serwerem: %s\n",
            $this->mysqli->connect_error);
            exit();
        }
        else
        {
           // echo "polaczenie powieodło sie";
        }

        /******************* zmien kodowanie na utf8 *******************/
        if ($this->mysqli->set_charset("utf8")) 
        {
            
        }
     } 


//----------------------------------------------------------------


     function __destruct() 
     {
        $this->mysqli->close();
     }


//----------------------------------------------------------------


     public function select($sql, $pola) 
     {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) 
        {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            $tresc.="<table><tbody>";
            while ($row = $result->fetch_object()) 
            {
                $tresc.="<tr>";
                for ($i = 0; $i <$ilepol; $i++) 
                {
                    $p=$pola[$i];
                    $tresc.="<td width='200px'>" . $row->$p . "</td>";
                }
                $tresc.="</tr>";
            }
            $tresc.="</table></tbody>";
            $result->close(); /* zwolnij pamięć */
        }
     return $tresc;
    }

    
//----------------------------------------------------------------

    
    public function pokaz_ile($sql, $pola)
    {
        $licz=0;
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) 
        {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            while ($row = $result->fetch_object()) 
            {
                for ($i = 0; $i <$ilepol; $i++) 
                {
                    $tresc = "";
                    $p=$pola[$i];
                    $tresc= $row->$p;
                }
                if($tresc!=='')
                {
                    $licz++;
                }
            }
            $result->close(); /* zwolnij pamięć */
        }
     return $licz;
    }
    
    
//-----------------------------------------------------------------
    public function insert($sql) 
    {
        if( $this->mysqli->query($sql)) 
            return true;
        else 
            return false;
     }
     
     
//----------------------------------------------------------------

     
     function getMysqli() 
    {
        return $this->mysqli;

    }
    
    
//----------------------------------------------------------------
  
    
    public function pokaz_wybrane($sql, $pola)
    {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) 
        {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            while ($row = $result->fetch_object()) 
            {
                for ($i = 0; $i <$ilepol; $i++) 
                {
                    $p=$pola[$i];
                    $tresc.= $row->$p;
                }
            }
            $result->close(); /* zwolnij pamięć */
        }
     return $tresc;
    }
    
    
//--------------------------------------------------------------

    public function pokaz_wybrane_po_przecinku($sql, $pola)
    {
        $tresc = "";
        if ($result = $this->mysqli->query($sql)) 
        {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            while ($row = $result->fetch_object()) 
            {
                for ($i = 0; $i <$ilepol; $i++) 
                {
                    $p=$pola[$i];
                    $tresc.= $row->$p;
                }
                $tresc.=",";
            }
            $result->close(); /* zwolnij pamięć */
        }
     return $tresc;
    }
    
//---------------------------------------------------------------



 public function pokaz_wybrane_do_tab($sql, $pola)
    {
        $j=0;
        $tab=array();
        if ($result = $this->mysqli->query($sql)) 
        {
            $ilepol = count($pola); //ile pól
            $ile = $result->num_rows; //ile wierszy
            while ($row = $result->fetch_object()) 
            {
                for ($i = 0; $i <$ilepol; $i++) 
                {
                    $p=$pola[$i];
                    $tab[$j]= $row->$p;
                    $j++;
                }
            }
            $result->close(); /* zwolnij pamięć */
        }
     return $tab;
    }    

//----------------------------------------------------------------

    
     public function delete($sql) 
     {
         if( $this->mysqli->query($sql)) 
            return true;
        else 
            return false;
     }
 
//----------------------------------------------------------------     
     
}
?>

