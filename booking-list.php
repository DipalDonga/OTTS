<?php
    session_start();
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
head>
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
<style>
    table {
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>

<body>
    <?php
    if(isset($_GET['delete'])){
        $deleteId = $_GET['delete'];
        $qr1 = "DELETE FROM `bookingtable` WHERE `bookingtable`.`bookingID` = $deleteId";
        mysqli_query($con, $qr1);
        $qr2 = "DELETE FROM `seats_booking` WHERE `seats_booking`.`bookingID` = $deleteId";
        mysqli_query($con, $qr2);
    }
    ?>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Booking List</h1>

            <div style="overflow-x:auto;">
                <table>
                    <tr>
                        <th>Sr No.</th>
                        <th>ORDER ID</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>movie</th>
                        <th>Screen</th>
                        <th>bookingDate</th>
                        <th>bookingTime</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql1 = mysqli_query($con, "SELECT bookingtable.*, movie.movieName ,movie.mid
                        FROM bookingtable
                        INNER JOIN movie ON movie.mid = bookingtable.movieID 
                        ORDER BY bookingtable.bookingID desc");
                    $a = 1;
                    while ($mrow = mysqli_fetch_array($sql1)) {
                        echo '<tr>
                            <td>'.$a.'</td>
                            <td>'.$mrow['ORDERID'].'</td>
                            <td>'.$mrow['bookingFName'].'</td>
                            <td>'.$mrow['bookingPNumber'].'</td>
                            <td>'.$mrow['movieName'].'</td>
                            <td>'.$mrow['mid'].'</td>
                            <td>'.$mrow['bookingDate'].'</td>
                            <td>'.$mrow['bookingTime'].'</td>
                            <td><button onclick="cancelBooking('.$mrow['bookingID'].')">Cancel</button></td>
                        </tr>';
                        $a++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="scripts/jquery-3.3.1.min.js"></script>
    <script src="scripts/owl.carousel.min.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/toastr.js"></script>
    <script>
        function cancelBooking(id)
        {
            if(confirm("Are you sure you want to cancel booking?")){
                window.location.href = 'booking-list.php?delete='+id;
            }
        }
    </script>
</body>

</html>