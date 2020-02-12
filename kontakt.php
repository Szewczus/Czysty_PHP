<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/Kontakt.css">

<?php
    include_once 'klasy/Nawigacja1.php';
    $form=new Nawigacja1();
    $form->drukuj();
?>

 
 
 
<!DOCTYPE html>


<html>
    <head>
        <title>Dane kontaktowe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <form action="mailto:ewus9999@gmail.com" method="post">
        
    </head>
    <body>
         
        
        
        
        
        <div id="kontener">
        <div id="dane">
        <h1><b>Dane kontaktowe</b></h1>
            <ul id="navigacja">
                <li class="ListType"><i class="fa fa-facebook-square"></i><a href="http://facebook.com/34recpl"> Facebook</a> </li>
                <li class="ListType"> <i class="material-icons" >email</i><a href="mailto:ewus9999@gmail.com" target="_top">ewus9999@gmail.com</a> </li>
                <li class="ListType"><i class="material-icons" >call</i><a href="tel:+48504971449" >504-971-449</a></li>
            </ul>
        </div>
        <div class="slide-container">
            <span id="slider-image6"></span>
            <span id="slider-image2"></span>
            <span id="slider-image3"></span>
            <span id="slider-image4"></span>
            <span id="slider-image5"></span>
            <span id="slider-image1"></span>
            <span id="slider-image7"></span>
            <span id="slider-image8"></span>
            <div class="image-container">
                <img src="zdjecia/slider6.jpg" class="slider-image">
                <img src="zdjecia/slider2.jpg" class="slider-image">
                <img src="zdjecia/slider3.jpg" class="slider-image">
                <img src="zdjecia/slider4.jpg" class="slider-image">
                <img src="zdjecia/slider5.jpg" class="slider-image">
                <img src="zdjecia/slider1.jpg" class="slider-image">
                <img src="zdjecia/slider7.jpg" class="slider-image">
                <img src="zdjecia/slider8.jpg" class="slider-image">
            </div>
            <div class="button-container">
                <a href="#slider-image6" class="slider-button"></a>
                <a href="#slider-image2" class="slider-button"></a>
                <a href="#slider-image3" class="slider-button"></a>
                <a href="#slider-image4" class="slider-button"></a>
                <a href="#slider-image5" class="slider-button"></a>
                <a href="#slider-image1" class="slider-button"></a>
                <a href="#slider-image7" class="slider-button"></a>
                <a href="#slider-image8" class="slider-button"></a>
            </div>
        </div>
        </div>
    </body>
</html>


        
</html>

