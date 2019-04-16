<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("php/head.php"); ?>
    <title>No Beat</title>
</head>
<body>
    
    <?php include("php/nav.php"); ?>
    <div class="hero">

        <img id="earth" src="./roll.gif" class="earth">

    </div>
    <?php //include("php/header.php"); ?>

    <div class="destinations">
        <div class="stuff">
                <div class="package">
            <!-- <div class="navbar">
                <a href="./index.html">Home</a>
                <a href="./package.html">Destinations</a>
                <a href="./registration.html">Registration</a>
                <a href="./contact.html">Contact</a>
            </div> -->
        

            



            <h1>Where would you like to go?</h1>

        </div>
        
    <div class="images">

        <div class="box1"><h2>|  Paris  |</h2></div>
        <div class="box2"></div>
        <div class="box3"><h2>|  Italy  |</h2></div>
        <div class="box4"></div>
        <div class="box5"><h2>|  Rome  |</h2></div>
        <div class="box6"></div>
        <!-- <img src="./images/italy.jpg" alt="">
        <img src="./images/Paris.jpg" alt="">
        <img src="./images/rome.jpg" alt="">
        <img src="./images/sydney.jpg" alt="">
        <img src="./images/sahara.jpg" alt=""> -->
    </div>
        
    </div>
    <?php include("php/footer.php"); ?>
    <script>
        <?php include("php/basejs.php") ?>
    </script>
    <script src="./js/pack.js"></script>
</body>
</html>