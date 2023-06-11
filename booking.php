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
$sn = $row['mid'];
$sQuery = "SELECT * FROM screen WHERE movie = $sn";
$sId = mysqli_query($con, $sQuery);
$srow = mysqli_fetch_array($sId);

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
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        #Username {
            border: none;
            border-bottom: 1px solid;
        }

        .screen {
            width: 100%;
            height: 20px;
            background: #4388cc;
            color: #fff;
            line-height: 20px;
            font-size: 15px;
        }

        .smallBox::before {
            content: ".";
            width: 15px;
            height: 15px;
            float: left;
            margin-right: 10px;
        }

        .greenBox::before {
            content: "";
            background: Green;
        }

        .redBox::before {
            content: "";
            background: Red;
        }

        .emptyBox::before {
            content="";
            box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
            background-color: #ccc;
        }

        .seats {
            border: 1px solid red;
            background: yellow;
        }



        .seatGap {
            width: 40px;
        }

        .seatVGap {
            height: 40px;
        }

        table {
            text-align: center;
        }


        .Displaytable {
            text-align: center;
        }

        .Displaytable td,
        .Displaytable th {
            border: 1px solid;
            text-align: left;
        }

        textarea {
            border: none;
            background: transparent;
        }



        input[type=checkbox] {
            width: 0px;
            margin-right: 18px;
        }

        input[type=checkbox]:before {
            content: "";
            width: 15px;
            height: 15px;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
            background-color: #ccc;
        }

        input[type=checkbox]:checked:before {
            background-color: Green;
            font-size: 15px;
        }

        .A {}
    </style>
</head>
<body>
    <div class="booking-panel">
        <div class="booking-panel-section booking-panel-section1">
            <h1>RESERVE YOUR TICKET</h1>
        </div>
        <div class="booking-panel-section booking-panel-section2" onclick="window.location.href='index.php'; return false;">
            <i class="fas fa-2x fa-times"></i>
        </div>
        <div class="booking-panel-section booking-panel-section3">
            <div class="movie-box">
                <?php
                echo '<img src="' . $row['image'] . '" alt="">';
                ?>
            </div>
        </div>
        <div class="booking-panel-section booking-panel-section4">
            <div class="title"><?php echo $row['movieName']; ?></div>
            <div class="movie-information">
                <table>
                    <tr>
                        <td>Screen</td>
                        <td><?php echo $row['htype']; ?></td>
                    </tr>
                    <tr>
                        <td>Director</td>
                        <td><?php echo $row['movieDirector']; ?></td>
                    </tr>
                    <tr>
                        <td>Actors</td>
                        <td><?php echo $row['movieActors']; ?></td>
                    </tr>
                    <tr>
                        <td>Genre</td>
                        <td><?php echo $row['movieGenre']; ?></td>
                    </tr>
                    <tr>
                        <td>RELEASE DATE</td>
                        <td><?php echo $row['movieRelDate']; ?></td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td><?php echo $row['movieDuration']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="booking-form-container">
                <!-- <form action="verify.php" method="POST"> -->
                <form action="" method="GET">
                    <select name="id" required>
                        <option value="">THEATRE</option>
                        <option value="<?php echo $row['htype']; ?>" selected><?php echo $row['htype']; ?></option>
                    </select>

                    <select name="type" required>
                        <option value="">TYPE</option>
                        <option value="3d" <?php if(isset($_GET['type'])) if($_GET['type'] == '3d') echo "selected"; ?>>3D</option>
                        <option value="2d" <?php if(isset($_GET['type'])) if($_GET['type'] == '2d') echo "selected"; ?>>2D</option>
                        <option value="imax" <?php if(isset($_GET['type'])) if($_GET['type'] == 'imax') echo "selected"; ?>>IMAX</option>
                        <option value="7d" <?php if(isset($_GET['type'])) if($_GET['type'] == '7d') echo "selected"; ?>>7D</option>
                    </select>

                    <select name="date" required>
                        <option value="">DATE</option>
                        <option value="2023-06-12" <?php if(isset($_GET['date'])) if($_GET['date'] == '2023-06-12') echo "selected"; ?>>Jun 12,2023</option>
                        <option value="2023-06-13" <?php if(isset($_GET['date'])) if($_GET['date'] == '2023-06-13') echo "selected"; ?>>Jun 13,2023</option>
                        <option value="2023-06-14" <?php if(isset($_GET['date'])) if($_GET['date'] == '2023-06-14') echo "selected"; ?>>Jun 14,2023</option>
                        <option value="2023-06-15" <?php if(isset($_GET['date'])) if($_GET['date'] == '2023-06-15') echo "selected"; ?>>Jun 15,2023</option>
                        <option value="2023-06-16" <?php if(isset($_GET['date'])) if($_GET['date'] == '2023-06-16') echo "selected"; ?>>Jun 16,2023</option>
                    </select>

                    <select name="hour" required>
                        <option value="">TIME</option>
                        <option value="09" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '09') echo "selected"; ?>>09:00 AM</option>
                        <option value="12" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '12') echo "selected"; ?>>12:00 AM</option>
                        <option value="15" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '15') echo "selected"; ?>>03:00 PM</option>
                        <option value="18" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '18') echo "selected"; ?>>06:00 PM</option>
                        <option value="21" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '21') echo "selected"; ?>>09:00 PM</option>
                        <option value="00" <?php if(isset($_GET['hour'])) if($_GET['hour'] == '00') echo "selected"; ?>>12:00 PM</option>
                    </select>
                    <button type="submit" value="search" name="submit" class="form-btn">Search</button>
                </form>
                <br />

                <?php
                    if ( isset($row['htype']) && isset($_GET['type']) && isset($_GET['date']) && isset($_GET['hour'])) {
                        ?>
                <form action="verify.php" method="POST" id="BookTicket">
                    <input placeholder="First Name" type="text" name="fName" class="input" required>
                    <input placeholder="Last Name" type="text" name="lName" class="input">
                    <input placeholder="Phone Number" type="text" name="pNumber" class="input" required>
                    <!-- <input placeholder="email" type="email" name="email" required> -->
                    <input type="hidden" name="movie_id" value="<?php echo $id; ?>">
                    <input type="hidden" name="theatre" value="<?php echo $id; ?>">
                    <input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
                    <input type="hidden" name="date" value="<?php echo $_GET['date']; ?>">
                    <input type="hidden" name="hour" value="<?php echo $_GET['hour']; ?>">
                    <br />
                    <br />
                    <?php                        
                        $type = $_GET['type'];
                        $date = $_GET['date'];
                        $hour = $_GET['hour'];

                        $getSheetQ = "SELECT seats_booking.seat_no FROM seats_booking
                        INNER JOIN bookingtable ON seats_booking.bookingID = bookingtable.bookingID 
                        where bookingtable.movieID = $id AND bookingtable.bookingDate = '$date' AND bookingtable.bookingTime = '$hour'";
                        $getSheetQr = mysqli_query($con, $getSheetQ);
                        $sheetsBooed = [];
                        while ($rowData = $getSheetQr->fetch_assoc()) {
                            $sheet = explode(',', $rowData['seat_no']);
                            array_push($sheetsBooed, ...$sheet);
                        }
 
                    if ($row['htype'] == '1' && isset($_GET['type']) && isset($_GET['date']) && isset($_GET['hour'])) {
                    ?>
                        <div class="seatStructure" style="width: 100%;">
                            <center>
                                <p>Screen This Side</p>
                                <table id="seatsBlock">
                                    <p id="notification"></p>
                                    <!-- A -->
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td>A</td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-A" name="sheets[]" value="A1" <?php 
                                                if(in_array('A1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A2" <?php 
                                                if(in_array('A2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A3" <?php 
                                                if(in_array('A3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A4" <?php 
                                                if(in_array('A4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A5" <?php 
                                                if(in_array('A5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A6" <?php 
                                                if(in_array('A6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A7" <?php 
                                                if(in_array('A7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A8" <?php 
                                                if(in_array('A8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td></td>
                                        <td></td>
                                        <!-- 11 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A9" <?php 
                                                if(in_array('A9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 12 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A10" <?php 
                                                if(in_array('A10', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A11" <?php 
                                                if(in_array('A11', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A12" <?php 
                                                if(in_array('A12', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A13" <?php 
                                                if(in_array('A13', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A14" <?php 
                                                if(in_array('A14', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A15" <?php 
                                                if(in_array('A15', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A16" <?php 
                                                if(in_array('A16', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 19 -->
                                        <td>A</td>
                                        <!-- 20 -->
                                        <td></td>
                                        <!-- 21 -->
                                    </tr>
                                    <!-- B -->
                                    <tr>
                                        <td>B</td>
                                        <!-- 1 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B1"  <?php 
                                                if(in_array('B1', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B2"  <?php 
                                                if(in_array('B2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B3"  <?php 
                                                if(in_array('B3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B4"  <?php 
                                                if(in_array('B4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B5"  <?php 
                                                if(in_array('B5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B6"  <?php 
                                                if(in_array('B6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B7"  <?php 
                                                if(in_array('B7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B8"  <?php 
                                                if(in_array('B8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B9"  <?php 
                                                if(in_array('B9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B10"  <?php 
                                                if(in_array('B10', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 11 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B11"  <?php 
                                                if(in_array('B11', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 12 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B12"  <?php 
                                                if(in_array('B12', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B13"  <?php 
                                                if(in_array('B13', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B14"  <?php 
                                                if(in_array('B14', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B15"  <?php 
                                                if(in_array('B15', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B16"  <?php 
                                                if(in_array('B16', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B17"  <?php 
                                                if(in_array('B17', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B18"  <?php 
                                                if(in_array('B18', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B19"  <?php 
                                                if(in_array('B19', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B20"  <?php 
                                                if(in_array('B20', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]"  value="B21"  <?php 
                                                if(in_array('B21', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 22 -->
                                        <td>B</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- C -->
                                    <tr>
                                        <td>C</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-C" name="sheets[]" value="C1" <?php 
                                                if(in_array('C1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C2"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C3"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C4"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C5"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C6"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C7"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C8"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C9"> <?php 
                                                if(in_array('">', $sheetsBooed)) echo "checked disabled";
                                            ?></td>
                                        <!-- 10 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C10" <?php 
                                                if(in_array('C10', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 11 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C11" <?php 
                                                if(in_array('C11', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 12 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C12" <?php 
                                                if(in_array('C12', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C13" <?php 
                                                if(in_array('C13', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C14" <?php 
                                                if(in_array('C14', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C15" <?php 
                                                if(in_array('C15', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C16" <?php 
                                                if(in_array('C16', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C17" <?php 
                                                if(in_array('C17', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C18" <?php 
                                                if(in_array('C18', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C19" <?php 
                                                if(in_array('C19', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C20" <?php 
                                                if(in_array('C20', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-C" name="sheets[]" value="C21" <?php 
                                                if(in_array('C21', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 22 -->
                                        <td>C</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- D -->
                                    <tr>
                                        <td>D</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-D" name="sheets[]" value="D1" <?php 
                                                if(in_array('D1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D2" <?php 
                                                if(in_array('D2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D3" <?php 
                                                if(in_array('D3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D4" <?php 
                                                if(in_array('D4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D5" <?php 
                                                if(in_array('D5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D6" <?php 
                                                if(in_array('D6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D7" <?php 
                                                if(in_array('D7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D8" <?php 
                                                if(in_array('D8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D9" <?php 
                                                if(in_array('D9', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D10" <?php 
                                                if(in_array('D10', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 11 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D11" <?php 
                                                if(in_array('D11', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 12 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D12" <?php 
                                                if(in_array('D12', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D13" <?php 
                                                if(in_array('D13', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D14" <?php 
                                                if(in_array('D14', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D15" <?php 
                                                if(in_array('D15', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D16" <?php 
                                                if(in_array('D16', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D17" <?php 
                                                if(in_array('D17', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D18" <?php 
                                                if(in_array('D18', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D19" <?php 
                                                if(in_array('D19', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D20" <?php 
                                                if(in_array('D20', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-D" name="sheets[]" value="D21" <?php 
                                                if(in_array('D21', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 22 -->
                                        <td>D</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- E -->
                                    <tr>
                                        <td>E</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E1" <?php 
                                                if(in_array('E1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E2" <?php 
                                                if(in_array('E2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E3" <?php 
                                                if(in_array('E3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E4" <?php 
                                                if(in_array('E4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E5" <?php 
                                                if(in_array('E5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E6" <?php 
                                                if(in_array('E6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E7" <?php 
                                                if(in_array('E7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E8" <?php 
                                                if(in_array('E8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E9" <?php 
                                                if(in_array('E9', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E10" <?php 
                                                if(in_array('E10', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 11 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E11" <?php 
                                                if(in_array('E11', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 12 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E12" <?php 
                                                if(in_array('E12', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 13 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E13" <?php 
                                                if(in_array('E13', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 14 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E14" <?php 
                                                if(in_array('E14', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 15 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E15" <?php 
                                                if(in_array('E15', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 16 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E16" <?php 
                                                if(in_array('E16', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 17 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E17" <?php 
                                                if(in_array('E17', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 18 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E18" <?php 
                                                if(in_array('E18', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 19 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E19" <?php 
                                                if(in_array('E19', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 20 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E20" <?php 
                                                if(in_array('E20', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 21 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E21" <?php 
                                                if(in_array('E21', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 22 -->
                                        <td>E</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- F -->
                                    <tr>
                                        <td>F</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F1" <?php 
                                                if(in_array('F1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F2" <?php 
                                                if(in_array('F2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F3" <?php 
                                                if(in_array('F3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F4" <?php 
                                                if(in_array('F4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F5" <?php 
                                                if(in_array('F5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F6" <?php 
                                                if(in_array('F6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F7" <?php 
                                                if(in_array('F7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F8" <?php 
                                                if(in_array('F8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F9" <?php 
                                                if(in_array('F9', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F10" <?php 
                                                if(in_array('F10', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 11 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F11" <?php 
                                                if(in_array('F11', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 12 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F12" <?php 
                                                if(in_array('F12', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 13 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F13" <?php 
                                                if(in_array('F13', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 14 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F14" <?php 
                                                if(in_array('F14', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 15 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F15" <?php 
                                                if(in_array('F15', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 16 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F16" <?php 
                                                if(in_array('F16', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 17 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F17" <?php 
                                                if(in_array('F17', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 18 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F18" <?php 
                                                if(in_array('F18', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 19 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F19" <?php 
                                                if(in_array('F19', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 20 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F20" <?php 
                                                if(in_array('F20', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 21 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F21" <?php 
                                                if(in_array('F21', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 22 -->
                                        <td>F</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- G -->
                                    <tr>
                                        <td>G</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G1" <?php 
                                                if(in_array('G1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G2" <?php 
                                                if(in_array('G2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G3" <?php 
                                                if(in_array('G3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G4" <?php 
                                                if(in_array('G4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G5" <?php 
                                                if(in_array('G5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G6" <?php 
                                                if(in_array('G6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G7" <?php 
                                                if(in_array('G7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G8" <?php 
                                                if(in_array('G8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G9" <?php 
                                                if(in_array('G9', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G10" <?php 
                                                if(in_array('G10', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 11 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G11" <?php 
                                                if(in_array('G11', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 12 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G12" <?php 
                                                if(in_array('G12', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 13 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G13" <?php 
                                                if(in_array('G13', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 14 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G14" <?php 
                                                if(in_array('G14', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 15 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G15" <?php 
                                                if(in_array('G15', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 16 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G16" <?php 
                                                if(in_array('G16', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 17 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G17" <?php 
                                                if(in_array('G17', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 18 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G18" <?php 
                                                if(in_array('G18', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 19 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G19" <?php 
                                                if(in_array('G19', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 20 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G20" <?php 
                                                if(in_array('G20', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 21 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G21" <?php 
                                                if(in_array('G21', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 22 -->
                                        <td>G</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- H -->
                                    <tr>
                                        <td>H</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H1" <?php 
                                                if(in_array('H1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H2" <?php 
                                                if(in_array('H2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H3" <?php 
                                                if(in_array('H3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H4" <?php 
                                                if(in_array('H4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H5" <?php 
                                                if(in_array('H5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H6" <?php 
                                                if(in_array('H6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H7" <?php 
                                                if(in_array('H7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H8" <?php 
                                                if(in_array('H8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H9" <?php 
                                                if(in_array('H9', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H10" <?php 
                                                if(in_array('H10', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 11 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H11" <?php 
                                                if(in_array('H11', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 12 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H12" <?php 
                                                if(in_array('H12', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 13 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H13" <?php 
                                                if(in_array('H13', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 14 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H14" <?php 
                                                if(in_array('H14', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 15 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H15" <?php 
                                                if(in_array('H15', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 16 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H16" <?php 
                                                if(in_array('H16', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 17 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H17" <?php 
                                                if(in_array('H17', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 18 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H18" <?php 
                                                if(in_array('H18', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 19 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H19" <?php 
                                                if(in_array('H19', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 20 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H20" <?php 
                                                if(in_array('H20', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 21 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H21" <?php 
                                                if(in_array('H21', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 22 -->
                                        <td>H</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- I -->
                                    <tr>
                                        <td>I</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-I" name="sheets[]" value="I1" <?php 
                                                if(in_array('I1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I2" <?php 
                                                if(in_array('I2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I3" <?php 
                                                if(in_array('I3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I4" <?php 
                                                if(in_array('I4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I5" <?php 
                                                if(in_array('I5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I6" <?php 
                                                if(in_array('I6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I7" <?php 
                                                if(in_array('I7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I8" <?php 
                                                if(in_array('I8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I9" <?php 
                                                if(in_array('I9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I10" <?php 
                                                if(in_array('I10', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 11 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I11" <?php 
                                                if(in_array('I11', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 12 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I12" <?php 
                                                if(in_array('I12', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I13" <?php 
                                                if(in_array('I13', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I14" <?php 
                                                if(in_array('I14', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I15" <?php 
                                                if(in_array('I15', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I16" <?php 
                                                if(in_array('I16', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I17" <?php 
                                                if(in_array('I17', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I18" <?php 
                                                if(in_array('I18', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I19" <?php 
                                                if(in_array('I19', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I20" <?php 
                                                if(in_array('I20', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-I" name="sheets[]" value="I21" <?php 
                                                if(in_array('I21', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 22 -->
                                        <td>I</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- J -->
                                    <tr>
                                        <td>J</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-J" name="sheets[]" value="J1" <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J2" <?php 
                                                if(in_array('J2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J3" <?php 
                                                if(in_array('J3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J4" <?php 
                                                if(in_array('J4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J5" <?php 
                                                if(in_array('J5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J6" <?php 
                                                if(in_array('J6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J7" <?php 
                                                if(in_array('J7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J8" <?php 
                                                if(in_array('J8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J9" <?php 
                                                if(in_array('J9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td></td>
                                        <!-- 11 -->
                                        <td></td>
                                        <!-- 12 -->
                                        <td></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J13 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J14 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J15 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J16 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J17 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J18 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J19 <?php 
                                                if(in_array('J1', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J20 <?php 
                                                if(in_array('J2', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-J" name="sheets[]" value="J21 <?php 
                                                if(in_array('J2', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 22 -->
                                        <td>J</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- K -->
                                    <tr>
                                        <td>K</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-K" name="sheets[]" value="K1" <?php 
                                                if(in_array('K1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K2" <?php 
                                                if(in_array('K2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K3" <?php 
                                                if(in_array('K3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K4" <?php 
                                                if(in_array('K4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K5" <?php 
                                                if(in_array('K5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K6" <?php 
                                                if(in_array('K6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K7" <?php 
                                                if(in_array('K7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K8" <?php 
                                                if(in_array('K8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K9" <?php 
                                                if(in_array('K9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td></td>
                                        <!-- 11 -->
                                        <td></td>
                                        <!-- 12 -->
                                        <td></td>
                                        <!-- 13 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K13 <?php 
                                                if(in_array('K13', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 14 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K14 <?php 
                                                if(in_array('K14', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 15 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K15 <?php 
                                                if(in_array('K15', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K16 <?php 
                                                if(in_array('K16', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K17 <?php 
                                                if(in_array('K17', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 18 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K18 <?php 
                                                if(in_array('K18', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K19 <?php 
                                                if(in_array('K19', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K20 <?php 
                                                if(in_array('K20', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 21 -->
                                        <td><input type="checkbox" class="seats seat-K" name="sheets[]" value="K21 <?php 
                                                if(in_array('K21', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 22 -->
                                        <td>K</td>
                                        <!-- 23 -->
                                    </tr>
                                    <!-- L -->
                                    <tr>
                                        <td>L</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-L" name="sheets[]" value="L1" <?php 
                                                if(in_array('L1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L2" <?php 
                                                if(in_array('L2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L3" <?php 
                                                if(in_array('L3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L4" <?php 
                                                if(in_array('L4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L5" <?php 
                                                if(in_array('L5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td></td>
                                        <!-- 10 -->
                                        <td></td>
                                        <!-- 11 -->
                                        <td></td>
                                        <!-- 12 -->
                                        <td></td>
                                        <!-- 13 -->
                                        <td></td>
                                        <!-- 14 -->
                                        <td></td>
                                        <!-- 15 -->
                                        <td></td>
                                        <!-- 16 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L16 <?php 
                                                if(in_array('L16', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 17 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L17 <?php 
                                                if(in_array('L17', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 18 -->
                                        <td></td>
                                        <!-- 19 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L19 <?php 
                                                if(in_array('L19', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 20 -->
                                        <td><input type="checkbox" class="seats seat-L" name="sheets[]" value="L20 <?php 
                                                if(in_array('L20', $sheetsBooed)) echo "checked disabled";
                                            ?>"></td>
                                        <!-- 21 -->
                                        <td></td>
                                        <!-- 22 -->
                                        <td>L</td>
                                        <!-- 23 -->
                                    </tr>
                                </table>
                            </center>
                        </div>
                    <?php } ?>
                    <?php
                    if ($row['htype'] == '2' && isset($_GET['type']) && isset($_GET['date']) && isset($_GET['hour'])) {
                    ?>
                        <div class="seatStructure" style="width: 100%">
                            <center>
                                <p>Screen This Side</p>
                                <table id="seatsBlock">
                                    <p id="notification"></p>
                                    <tr>
                                        <td>A</td>
                                        <!-- 15 -->
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <?php 
                                            for($a = 1; $a <= 15; $a++){
                                                $seatA = "A".$a;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-A" name="sheets[]" value="<?php echo $seatA; ?>" <?php 
                                                if(in_array($seatA, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <!-- 17 -->
                                        <td></td>
                                        <td></td>
                                        <?php 
                                            for($b = 1; $b <= 17; $b++){
                                                $seatB = "B".$b;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-B" name="sheets[]" value="<?php echo $seatB; ?>" <?php 
                                                if(in_array($seatB, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td>B</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <!-- 17 -->
                                        <td></td>
                                        <td></td>
                                        <?php 
                                            for($c = 1; $c <= 17; $c++){
                                                $seatC = "B".$c;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-C" name="sheets[]" value="<?php echo $seatC; ?>" <?php 
                                                if(in_array($seatC, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td></td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <!-- 19 -->
                                        <td></td>
                                        <?php 
                                            for($d = 1; $d <= 19; $d++){
                                                $seatD = "D".$d;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-D" name="sheets[]" value="<?php echo $seatD; ?>" <?php 
                                                if(in_array($seatD, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td>D</td>
                                    </tr>
                                    <tr>
                                        <td>E</td>
                                        <!-- 19 -->
                                        <td></td>
                                        <?php 
                                            for($e = 1; $e <= 19; $e++){
                                                $seatE = "E".$e;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="<?php echo $seatE; ?>" <?php 
                                                if(in_array($seatE, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td>E</td>
                                    </tr>
                                    <tr>
                                        <td>F</td>
                                        <!-- 21 -->
                                        <?php 
                                            for($f = 1; $f <= 21; $f++){
                                                $seatF = "F".$f;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="<?php echo $seatF; ?>" <?php 
                                                if(in_array($seatF, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td>F</td>
                                    </tr>
                                    <tr>
                                        <td>G</td>
                                        <!-- 21 -->
                                        <?php 
                                            for($g = 1; $g <= 21; $g++){
                                                $seatG = "G".$g;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="<?php echo $seatG; ?>" <?php 
                                                if(in_array($seatG, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td>G</td>
                                    </tr>
                                    <tr>
                                        <td>H</td>
                                        <!-- 20 -->
                                        <?php 
                                            for($h = 1; $h <= 20; $h++){
                                                $seatH = "H".$h;
                                        ?>
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="<?php echo $seatH; ?>" <?php 
                                                if(in_array($seatH, $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <?php } ?>
                                        <td></td>
                                        <td>H</td>
                                    </tr>
                                </table>
                            </center>
                        </div>
                    <?php } ?>
                    <br />
                    <?php
                    if ($row['htype'] == '3' && isset($_GET['type']) && isset($_GET['date']) && isset($_GET['hour'])) {
                    ?>
                        <!-- <div class="inputForm" style="width: 100%">
                            <center>
                                Name *: <input type="text" id="Username" required>
                                Number of Seats *: <input type="number" id="Numseats" required>
                                <br /><br />
                                <button onclick="takeData()">Start Selecting</button>
                            </center>
                        </div> -->
                        <div class="seatStructure" style="width: 100%">
                            <center>
                                <p>Screen This Side</p>
                                <table id="seatsBlock">
                                    <p id="notification"></p>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td>A</td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-A" name="sheets[]" value="A1" <?php 
                                                if(in_array('A1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A2" <?php 
                                                if(in_array('A2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A3" <?php 
                                                if(in_array('A3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A4" <?php 
                                                if(in_array('A4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A5" <?php 
                                                if(in_array('A5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A6" <?php 
                                                if(in_array('A6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-A" name="sheets[]" value="A7" <?php 
                                                if(in_array('A7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td>A</td>
                                        <!-- 10 -->
                                        <td></td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td>B</td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-B" name="sheets[]" value="B1" <?php 
                                                if(in_array('B1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B2" <?php 
                                                if(in_array('B2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B3" <?php 
                                                if(in_array('B3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B4" <?php 
                                                if(in_array('B4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B5" <?php 
                                                if(in_array('B5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B6" <?php 
                                                if(in_array('B6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B7" <?php 
                                                if(in_array('B7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-B" name="sheets[]" value="B8" <?php 
                                                if(in_array('B8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>B</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-C" name="sheets[]" value="C1" <?php 
                                                if(in_array('C1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C2" <?php 
                                                if(in_array('C2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C3" <?php 
                                                if(in_array('C3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C4" <?php 
                                                if(in_array('C4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C5" <?php 
                                                if(in_array('C5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C6" <?php 
                                                if(in_array('C6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C7" <?php 
                                                if(in_array('C7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C8" <?php 
                                                if(in_array('C8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seatsseat-C" name="sheets[]" value="C9" <?php 
                                                if(in_array('C9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td>C</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td>D</td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-D" name="sheets[]" value="D1" <?php 
                                                if(in_array('D1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D2" <?php 
                                                if(in_array('D2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D3" <?php 
                                                if(in_array('D3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D4" <?php 
                                                if(in_array('D4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D5" <?php 
                                                if(in_array('D5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D6" <?php 
                                                if(in_array('D6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D7" <?php 
                                                if(in_array('D7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seatsseat-D" name="sheets[]" value="D8" <?php 
                                                if(in_array('D8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td>D</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td>E</td>
                                        <!-- 1 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-E" name="sheets[]" value="E1" <?php 
                                                if(in_array('E1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 2 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E2" <?php 
                                                if(in_array('E2', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 3 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E3" <?php 
                                                if(in_array('E3', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 4 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E4" <?php 
                                                if(in_array('E4', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 5 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E5" <?php 
                                                if(in_array('E5', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 6 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E6" <?php 
                                                if(in_array('E6', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 7 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E7" <?php 
                                                if(in_array('E7', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 8 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E8" <?php 
                                                if(in_array('E8', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 9 -->
                                        <td><input type="checkbox" class="seats seat-E" name="sheets[]" value="E9" <?php 
                                                if(in_array('E9', $sheetsBooed)) echo "checked disabled";
                                            ?>></td>
                                        <!-- 10 -->
                                        <td>E</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td>F</td>
                                        <!-- 2 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F1" <?php 
                                                if(in_array('F1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 3 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F2" <?php 
                                                if(in_array('F2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F3" <?php 
                                                if(in_array('F3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F4" <?php 
                                                if(in_array('F4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F5" <?php 
                                                if(in_array('F5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F6" <?php 
                                                if(in_array('F6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F7" <?php 
                                                if(in_array('F7', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-F" name="sheets[]" value="F8" <?php 
                                                if(in_array('F8', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>F</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td></td>
                                        <!-- 2 -->
                                        <td></td>
                                        <!-- 3 -->
                                        <td>G</td>
                                        <!-- 4 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G1" <?php 
                                                if(in_array('G1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G2" <?php 
                                                if(in_array('G2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G3" <?php 
                                                if(in_array('G3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G4" <?php 
                                                if(in_array('G4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G5" <?php 
                                                if(in_array('G5', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-G" name="sheets[]" value="G6" <?php 
                                                if(in_array('G6', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 10 -->
                                        <td>G</td>
                                        <!-- 11 -->
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <!-- 1 -->
                                        <td></td>
                                        <!-- 2 -->
                                        <td></td>
                                        <!-- 3 -->
                                        <td></td>
                                        <!-- 4 -->
                                        <td>H</td>
                                        <!-- 5 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H1" <?php 
                                                if(in_array('H1', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 6 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H2" <?php 
                                                if(in_array('H2', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 7 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H3" <?php 
                                                if(in_array('H3', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 8 -->
                                        <td>
                                            <input type="checkbox" class="seats seat-H" name="sheets[]" value="H4" <?php 
                                                if(in_array('H4', $sheetsBooed)) echo "checked disabled";
                                            ?>>
                                        </td>
                                        <!-- 9 -->
                                        <td>H</td>
                                        <!-- 10 -->
                                        <td></td>
                                        <!-- 11 -->
                                    </tr>
                                </table>
                            </center>
                        </div>
                    <?php } ?>
                    <br />
                    <button type="submit" id="submitButton" value="save" name="submit" class="form-btn">Book a seat</button>
                    
                </form>
                <?php } ?>
            </div>
        </div>
    </div>


    <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/script.js "></script>
    <script src="http://140.116.219.85/chair/seat/js/jquery.seat-charts.js"></script>
    <script>
        $('#BookTicket').submit(function(e) {
            // e.preventDefault();
            // do your things ...
            var valid = true;
            if ($('input[name^=sheets]:checked:not(:disabled)').length <= 0) {
                alert("Please select booking sheets");
            } else {
                var selectCols = []
                $("input[name^=sheets]:checked:not(:disabled)").each(function(index){
                    var rowNumber = $(this).val();
                    var rowName = rowNumber.charAt(0);
                    // alert("checked element value : " + rowName);
                    selectCols.indexOf(rowName) === -1 ? selectCols.push(rowName):'';
                    var rowLength = $(".seat-"+rowName).length;
                    // alert("row rowLength: " + rowLength);
                    // var selectedLength = $(".seat-A:checkbox)").length;
                    // alert("row selectedLength: " + selectedLength);
                    // var newSeats = $(".seat-A:checkbox:checked:not(:disabled))").length;
                    // alert("row newSeats: " + newSeats);
                });
                console.log('selectCols', selectCols);
                $.each( selectCols, function( key, value ) {
                    var rowLength = $(".seat-"+value).length;
                    var bookedLength = $(".seat-"+value).filter("[disabled]").length;
                    var newBookLength = $(".seat-"+value).not("[disabled]").filter(':checked').length;

                    var rangBook = (100 * bookedLength) / rowLength;
                    if(rangBook > 60 && newBookLength == 1){
                        alert('Choose corner seat or different seat for single');
                        valid = false;
                    }
                    // console.log('rowLength:', rowLength);
                    // console.log('bookedLength:', bookedLength);
                    // console.log('newBookLength:', newBookLength);
                });
            }
            if(valid == true){
                console.log('BookTicket');
                return true;
            } else {
                return false;
            }
            // and when you done:
            // $(this).submit();
        });

        // $('#submitButton').click(function () {
        //     console.log('submitButton');
        //     if ($('input[name^=sheets]:checked:not(:disabled)').length <= 0) {
        //         alert("Please select booking sheets");
        //     } else {
        //         var valid = true;
        //         var selectCols = []
        //         $("input[name^=sheets]:checked:not(:disabled)").each(function(index){
        //             var rowNumber = $(this).val();
        //             var rowName = rowNumber.charAt(0);
        //             // alert("checked element value : " + rowName);
        //             selectCols.indexOf(rowName) === -1 ? selectCols.push(rowName):'';
        //             var rowLength = $(".seat-"+rowName).length;
        //             // alert("row rowLength: " + rowLength);
        //             // var selectedLength = $(".seat-A:checkbox)").length;
        //             // alert("row selectedLength: " + selectedLength);
        //             // var newSeats = $(".seat-A:checkbox:checked:not(:disabled))").length;
        //             // alert("row newSeats: " + newSeats);
        //         });
        //         console.log('selectCols', selectCols);
        //         $.each( selectCols, function( key, value ) {
        //             var rowLength = $(".seat-"+value).length;
        //             var bookedLength = $(".seat-"+value).filter("[disabled]").length;
        //             var newBookLength = $(".seat-"+value).not("[disabled]").filter(':checked').length;

        //             var rangBook = (100 * bookedLength) / rowLength;
        //             if(rangBook > 60 && newBookLength == 1){
        //                 alert('You can not book single seat if row book grater then 60%');
        //                 valid = false;
        //             }
        //             // console.log('rowLength:', rowLength);
        //             // console.log('bookedLength:', bookedLength);
        //             // console.log('newBookLength:', newBookLength);
        //         });
        //         if(valid){
        //             console.log('BookTicket');
        //             $("#BookTicket").submit();
        //         }
        //     }
        // });
    </script>
</body>

</html>
