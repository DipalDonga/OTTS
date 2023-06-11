<!DOCTYPE html>
<?php
    session_start();
    include("connection.php");

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>ATSE Cinema</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>
<?php  
    include("includes/header.php");
?>
<body>
    <?php
    $sql = "SELECT * FROM movie";
    ?>
    
    <div id="home-section-1" class="movie-show-container"><br><br><br>
        <h3>Book a movie now</h3>

        <div class="movies-container">

              <?php

            $sql1 = mysqli_query($con,"select * from movie ORDER BY htype");
             while($mrow = mysqli_fetch_array($sql1)){


                    

                        echo '<div class="movie-box">
                            <img src="' . $mrow['image'] . '" alt=" " >
                            <div class="movie-info ">
                            <h3>' . $mrow['movieName'] . '</h3>
                            <h3>Screen - ' . $mrow['htype'] . '</h3>
                            <a href="booking.php?id=' . $mrow['mid'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>
                            </div>
                            </div>';
                   


                }
            
            ?>
        </div>
    </div>

    
   <div id="home-section-2" class="services-section">
        <h1>Choose your Screen</h1>
        <h3>3 Simple steps to book your favourit movie!</h3>

        <div class="services-container">
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-video"></i>
                </div>
                <h2>1. Choose your favourite movie</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-credit-card"></i>
                </div>
                <h2>2. Pay for your tickets</h2>
            </div>
            <div class="service-item">
                <div class="service-item-icon">
                    <i class="fas fa-4x fa-theater-masks"></i>
                </div>
                <h2>3. Pick your seats & Enjoy watching</h2>
            </div>
            <div class="service-item"></div>
            <div class="service-item"></div>
        </div>
    </div>
     

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
