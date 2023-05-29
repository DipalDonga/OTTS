<!DOCTYPE html>
<html lang="en">
<?php
$id = $_GET['id'];
//conditions
if ((!$_GET['id'])) {
    echo "<script>alert('You are Not Suppose to come Here Directly');window.location.href='index.php';</script>";
}
include "connection.php";
$movieQuery = "SELECT * FROM movie WHERE mid = $id";
$movieImageById = mysqli_query($con, $movieQuery);
$row = mysqli_fetch_array($movieImageById);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="style/seatLayout.css">
        <link rel="stylesheet" href="http://140.116.219.85/chair/seat/css/jquery.seat-charts.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Book <?php echo $row['movieName']; ?> Now</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
       <style>
       #holder {
  height: 200px;
  width: 550px;
  background-color: #F5F5F5;
  border: 1px solid #A4A4A4;
  margin-left: 10px;
}
#place {
  position: relative;
  margin: 7px;
}
#place a {
  font-size: 0.6em;
}
#place li {
  list-style: none outside none;
  position: absolute;
}
#place li:hover {
  background-color: yellow;
}
#place .seat {
  background: url("img/available_seat_img.gif") no-repeat scroll 0 0 transparent;
  height: 33px;
  width: 33px;
  display: block;
}
#place .selectedSeat {
  background-image: url("img/booked_seat_img.gif");
}
#place .selectingSeat {
  background-image: url("img/selected_seat_img.gif");
}
#place .row-3,
#place .row-4 {
  margin-top: 10px;
}
#seatDescription {
  padding: 0px;
}
#seatDescription li {
  verticle-align: middle;
  list-style: none outside none;
  padding-left: 35px;
  height: 35px;
  float: left;
}
    </style>
</head>

<body style="background-color:#6e5a11;">
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.history.go(-1); return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="img/' .$row['image'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieName']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>Cast</td>
                        <td><?php echo $row['movieCast']; ?></td>
                    </tr>
                    <tr>
                        <td>Facts</td>
                        <td><?php echo $row['facts']; ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php echo $row['description']; ?></td>
                    </tr>
                    <tr>
                        <td>Rating</td>
                        <td><?php echo $row['rating']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
               <form action="verify.php" method="POST">


                    <select name="theatre" required>
                        <option value="" disabled selected>THEATRE</option>
                        <option value="1">Main Hall</option>
                        <option value="2">VIP Hall</option>
                        <option value="3">Private Hall</option>
                    </select>

                    <select name="type" required>
                        <option value="" disabled selected>TYPE</option>
                        <option value="3d">3D</option>
                        <option value="2d">2D</option>
                        <option value="imax">IMAX</option>
                        <option value="7d">7D</option>
                    </select>

                    <select name="date" required>
                        <option value="" disabled selected>DATE</option>
                        <option value="12-3">March 12,2019</option>
                        <option value="13-3">March 13,2019</option>
                        <option value="14-3">March 14,2019</option>
                        <option value="15-3">March 15,2019</option>
                        <option value="16-3">March 16,2019</option>
                    </select>

                    <select name="hour" required>
                        <option value="" disabled selected>TIME</option>
                        <option value="09-00">09:00 AM</option>
                        <option value="12-00">12:00 AM</option>
                        <option value="15-00">03:00 PM</option>
                        <option value="18-00">06:00 PM</option>
                        <option value="21-00">09:00 PM</option>
                        <option value="24-00">12:00 PM</option>
                    </select>

                    <input placeholder="First Name" type="text" name="fName" required>

                    <input placeholder="Last Name" type="text" name="lName">

                    <input placeholder="Phone Number" type="text" name="pNumber" required>
                    <input placeholder="email" type="email" name="email" required>
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
                    <?php 

                    if ($row['htype']=='1'){
                    ?>
                    
   <h2 style="font-size:1.2em;"> Choose seats by clicking the corresponding seat in the layout below:</h2>
       <div id="holder"> 
        <ul  id="place">
        </ul>    
       </div>
     <div style="width:600px;text-align:center;overflow:auto"> 
        <ul id="seatDescription">
        <li style="background:url('img/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
        <li style="background:url('img/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
        <li style="background:url('img/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
        </ul>        
    </div>
    <div style="width:580px;text-align:left;margin:5px">    
        <input type="button" id="btnShowNew" value="Show Selected Seats" />
        <input type="button" id="btnShow" value="Show All" />            
    </div>
    <div id="sSeats"> </div>
<?php } ?>

                    <button type="submit" value="save" name="submit" class="form-btn">Book a seat</button>

                </form> 
               

            </div>
        </div>
    </div>


    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
        <script src="http://140.116.219.85/chair/seat/js/jquery.seat-charts.js"></script>
<script>
    $(function() {
    var settings = {
        rows: 5,
        cols: 15,
        rowCssPrefix: 'row-',
        colCssPrefix: 'col-',
        seatWidth: 35,
        seatHeight: 35,
        seatCss: 'seat',
        selectedSeatCss: 'selectedSeat',
        selectingSeatCss: 'selectingSeat'
    };
    var init = function(reservedSeat) {
        var str = [],
            seatNo, className;
        for (i = 0; i < settings.rows; i++) {
            for (j = 0; j < settings.cols; j++) {
                seatNo = (i + j * settings.rows + 1);
                className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                    className += ' ' + settings.selectedSeatCss;
                }
                str.push('<li class="' + className + '"' +
                    'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                    '<a title="' + seatNo + '">' + seatNo + '</a>' +
                    '</li>');
            }
        }
        $('#place').html(str.join(''));
    };
    //case I: Show from starting
    //init();
    //Case II: If already booked
        var bookedSeats = [5, 10, 25];
        init(bookedSeats);
        $('.' + settings.seatCss).click(function() {
            if ($(this).hasClass(settings.selectedSeatCss)) {
               
                alert('This seat is already reserved');
            } else {
                $(this).toggleClass(settings.selectingSeatCss);
            }
        });
    $('#btnShow').click(function() {
        var str = [];
        $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.' + settings.selectingSeatCss + ' a'), function(index, value) {
            str.push($(this).attr('title'));
        });
        alert(str.join(','));
    })
    $('#btnShowNew').click(function() {
        var str = [],
            item;
        $.each($('#place li.' + settings.selectingSeatCss + ' a'), function(index, value) {
            item = $(this).attr('title');
            str.push(item);
        });
        $('#sSeats').html('<h3> Your selected seats are: ' + str.join(',') + '</h3>');
        // alert(str.join(','));
        $.ajax({
            type: 'POST',
            url: 'includes/allfunction.php?action=seat_process',
            data: {
                selectedSeats: str.join(',')
            },
            success: function(e) {
                alert(e);
            }
        })
    })
});
</script>
</body>

</html>
