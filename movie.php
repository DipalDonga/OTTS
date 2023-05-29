
<!DOCTYPE html>
<html lang="en">
<?php

include("connection.php");
$htype = $_GET['htype'];
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>ATSE Cinema</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
    <header></header>
    
    <div id="home-section-1" class="movie-show-container">
        <h3>Book a movie now</h3>

        <div class="movies-container">

            <?php

            $sql1 = mysqli_query($con,"select * from movie where htype =".$htype);
             while($mrow = mysqli_fetch_array($sql1)){


                    

                        echo '<div class="movie-box">
                            <img src="img/' . $mrow['image'] . '" alt=" " height="500" width="500">
                            <div class="movie-info ">
                            <h3>' . $mrow['movieName'] . '</h3>
                            <a href="booking.php?id=' . $mrow['mid'] . '"><i class="fas fa-ticket-alt"></i> Book a seat</a>
                            </div>
                            </div>';
                   


                }
            
            ?>
        </div>
    </div>

    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
</body>

</html>
