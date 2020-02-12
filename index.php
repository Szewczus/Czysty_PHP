<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <?php

            include_once 'klasy/Nawigacja1.php';
            $form=new Nawigacja1();
            $form->drukuj();
            
            
            
            
            
            
        ?>
        <section class="jumpers">
                    <div id="oferta"><h2>Nasza oferta:</h2></div>    
                    <h1><b>Niezwykła przygoda</b></h1>
                    <br>
                    
                    <img src="zdjecia/lwow.jpeg" alt="Lwow" class="img-fluid">
        
                    
                    <h1>Tylko we Lwowie:</h1>
                    <ul>
                        <li>Rynek i Starówka</li>
                        <li>prospekt Swobody</li>
                        <li>Opera Lwowska</li>
                        <li>Cmentarz Łyczakowski i Orlat Lwowskich</li>
                    </ul>
                    <h2>Cena 99 zł/os</h2>
                    <br>
                    <br>
                    <br>
                    <h1><b>Słoneczna przygoda</b></h1>
                    <h1>ZŁOTA PRAGA</h1>
                    <img src="zdjecia/praga.jpg" alt="Praga" width="300px">
                    <ul>
                        <li>Zamek na Hradczanach</li>
                        <li>Złota Uliczka</li>
                        <li>Katedra św Wita</li>
                        <li>Most Karola</li>
                        <li>Mala Strana</li>
                        <li>Rynek Starego Miasta ze słynnym zegarem Orloj</li>
                        <li>Valcawskie Namesti</li>
                    </ul>
                    <h2>Cena 100 zł/os</h2>
                    <br>
                    <br>
                    <br>
                    <h1><b>Malownicze wybrzeże</b></h1>
                    <h2>Niezwykła Tajlandia</h2>
                    <img src="zdjecia/tajlandia.jpg" alt="Tajlandia" width="300px">
                    <ul>
                        <li>relaks na statku</li>
                        <li>krystalicznie czysta woda i rafy koralowe</li>
                        <li>czas na snurkowanie</li>
                    </ul>
                    <h2>Cena 200 zł/os</h2>
            
            
            </div>
            </section>
        
    </body>
</html>
