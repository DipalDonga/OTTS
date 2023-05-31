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
     body
{
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}

#Username
{
  border:none;
  border-bottom:1px solid;
}

.screen
{
  width:100%;
  height:20px;
  background:#4388cc;
  color:#fff;
  line-height:20px;
  font-size:15px;
}

.smallBox::before
{
  content:".";
  width:15px;
  height:15px;
  float:left;
  margin-right:10px;
}
.greenBox::before
{
  content:"";
  background:Green;
}
.redBox::before
{
  content:"";
  background:Red;
}
.emptyBox::before
{
  content="";
  box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

.seats
{
  border:1px solid red;background:yellow;
} 



.seatGap
{
  width:40px;
}

.seatVGap
{
  height:40px;
}

table
{
  text-align:center;
}


.Displaytable
{
  text-align:center;
}
.Displaytable td, .Displaytable th {
    border: 1px solid;
    text-align: left;
}

textarea
{
  border:none;
  background:transparent;
}



input[type=checkbox] {
    width:0px;
    margin-right:18px;
}

input[type=checkbox]:before {
    content: "";
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align:middle;
    text-align: center;
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

input[type=checkbox]:checked:before {
    background-color:Green;
    font-size: 15px;
}
</style>

</head>

<body >
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
            <div class="">
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
                    
  
<div class="inputForm">
<center>
  Name *: <input type="text" id="Username" required>
  Number of Seats *: <input type="number" id="Numseats" required>
  <br/><br/>
  <button onclick="takeData()">Start Selecting</button>
</center>
</div>
  

<div class="seatStructure">
<center>
  
<table id="seatsBlock">
 <p id="notification"></p>
  <tr>
    <td colspan="14"><div class="screen">SCREEN</div></td>
    <td rowspan="20">
      <div class="smallBox greenBox">Selected Seat</div> <br/>
      <div class="smallBox redBox">Reserved Seat</div><br/>
      <div class="smallBox emptyBox">Empty Seat</div><br/>
       <button onclick="cancelseat()">Cancel seat</button>
    </td>
    
    <br/>
  </tr>
  
  <tr>
    <td></td>&nbsp;
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td></td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
</tr>
  
<tr>
    <td>A</td>
    <td><input type="checkbox" class="seats" value="A1"></td>
    <td><input type="checkbox" class="seats" value="A2"></td>
    <td><input type="checkbox" class="seats" value="A3"></td>
    <td><input type="checkbox" class="seats" value="A4"></td>
    <td><input type="checkbox" class="seats" value="A5"></td>
    <td class="seatGap"></td>
    <td><input type="checkbox" class="seats" value="A6"></td>
    <td><input type="checkbox" class="seats" value="A7"></td>
    <td><input type="checkbox" class="seats" value="A8"></td>
    <td><input type="checkbox" class="seats" value="A9"></td>
    <td><input type="checkbox" class="seats" value="A10"></td>
    <td><input type="checkbox" class="seats" value="A11"></td>
    <td><input type="checkbox" class="seats" value="A12"></td>
    <td>A</td>
  </tr>
  
  <tr>
    <td>B</td>
    <td><input type="checkbox" class="seats" value="B1"></td>
    <td><input type="checkbox" class="seats" value="B2"></td>
    <td><input type="checkbox" class="seats" value="B3"></td>
    <td><input type="checkbox" class="seats" value="B4"></td>
    <td><input type="checkbox" class="seats" value="B5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="B6"></td>
    <td><input type="checkbox" class="seats" value="B7"></td>
    <td><input type="checkbox" class="seats" value="B8"></td>
    <td><input type="checkbox" class="seats" value="B9"></td>
    <td><input type="checkbox" class="seats" value="B10"></td>
    <td><input type="checkbox" class="seats" value="B11"></td>
    <td><input type="checkbox" class="seats" value="B12"></td>
    <td>B</td>
  </tr>
  
  <tr>
    <td>C</td>
    <td><input type="checkbox" class="seats" value="C1"></td>
    <td><input type="checkbox" class="seats" value="C2"></td>
    <td><input type="checkbox" class="seats" value="C3"></td>
    <td><input type="checkbox" class="seats" value="C4"></td>
    <td><input type="checkbox" class="seats" value="C5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="C6"></td>
    <td><input type="checkbox" class="seats" value="C7"></td>
    <td><input type="checkbox" class="seats" value="C8"></td>
    <td><input type="checkbox" class="seats" value="C9"></td>
    <td><input type="checkbox" class="seats" value="C10"></td>
    <td><input type="checkbox" class="seats" value="C11"></td>
    <td><input type="checkbox" class="seats" value="C12"></td>
</tr>
  
<tr>
    <td>D</td>
    <td><input type="checkbox" class="seats" value="D1"></td>
    <td><input type="checkbox" class="seats" value="D2"></td>
    <td><input type="checkbox" class="seats" value="D3"></td>
    <td><input type="checkbox" class="seats" value="D4"></td>
    <td><input type="checkbox" class="seats" value="D5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="D6"></td>
    <td><input type="checkbox" class="seats" value="D7"></td>
    <td><input type="checkbox" class="seats" value="D8"></td>
    <td><input type="checkbox" class="seats" value="D9"></td>
    <td><input type="checkbox" class="seats" value="D10"></td>
    <td><input type="checkbox" class="seats" value="D11"></td>
    <td><input type="checkbox" class="seats" value="D12"></td>
</tr>
  
<tr>
    <td>E</td>
    <td><input type="checkbox" class="seats" value="E1"></td>
    <td><input type="checkbox" class="seats" value="E2"></td>
    <td><input type="checkbox" class="seats" value="E3"></td>
    <td><input type="checkbox" class="seats" value="E4"></td>
    <td><input type="checkbox" class="seats" value="E5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="E6"></td>
    <td><input type="checkbox" class="seats" value="E7"></td>
    <td><input type="checkbox" class="seats" value="E8"></td>
    <td><input type="checkbox" class="seats" value="E9"></td>
    <td><input type="checkbox" class="seats" value="E10"></td>
    <td><input type="checkbox" class="seats" value="E11"></td>
    <td><input type="checkbox" class="seats" value="E12"></td>
</tr>
  
<tr class="seatVGap"></tr>
  
<tr>
    <td>F</td>
    <td><input type="checkbox" class="seats" value="F1"></td>
    <td><input type="checkbox" class="seats" value="F2"></td>
    <td><input type="checkbox" class="seats" value="F3"></td>
    <td><input type="checkbox" class="seats" value="F4"></td>
    <td><input type="checkbox" class="seats" value="F5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="F6"></td>
    <td><input type="checkbox" class="seats" value="F7"></td>
    <td><input type="checkbox" class="seats" value="F8"></td>
    <td><input type="checkbox" class="seats" value="F9"></td>
    <td><input type="checkbox" class="seats" value="F10"></td>
    <td><input type="checkbox" class="seats" value="F11"></td>
    <td><input type="checkbox" class="seats" value="F12"></td>
</tr>
  
<tr>
    <td>G</td>
    <td><input type="checkbox" class="seats" value="G1"></td>
    <td><input type="checkbox" class="seats" value="G2"></td>
    <td><input type="checkbox" class="seats" value="G3"></td>
    <td><input type="checkbox" class="seats" value="G4"></td>
    <td><input type="checkbox" class="seats" value="G5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="G6"></td>
    <td><input type="checkbox" class="seats" value="G7"></td>
    <td><input type="checkbox" class="seats" value="G8"></td>
    <td><input type="checkbox" class="seats" value="G9"></td>
    <td><input type="checkbox" class="seats" value="G10"></td>
    <td><input type="checkbox" class="seats" value="G11"></td>
    <td><input type="checkbox" class="seats" value="G12"></td>
</tr>
  
<tr>
    <td>H</td>
    <td><input type="checkbox" class="seats" value="H1"></td>
    <td><input type="checkbox" class="seats" value="H2"></td>
    <td><input type="checkbox" class="seats" value="H3"></td>
    <td><input type="checkbox" class="seats" value="H4"></td>
    <td><input type="checkbox" class="seats" value="H5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="H6"></td>
    <td><input type="checkbox" class="seats" value="H7"></td>
    <td><input type="checkbox" class="seats" value="H8"></td>
    <td><input type="checkbox" class="seats" value="H9"></td>
    <td><input type="checkbox" class="seats" value="H10"></td>
    <td><input type="checkbox" class="seats" value="H11"></td>
    <td><input type="checkbox" class="seats" value="H12"></td>
</tr>
  
<tr>
    <td>I</td>
    <td><input type="checkbox" class="seats" value="I1"></td>
    <td><input type="checkbox" class="seats" value="I2"></td>
    <td><input type="checkbox" class="seats" value="I3"></td>
    <td><input type="checkbox" class="seats" value="I4"></td>
    <td><input type="checkbox" class="seats" value="I5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="I6"></td>
    <td><input type="checkbox" class="seats" value="I7"></td>
    <td><input type="checkbox" class="seats" value="I8"></td>
    <td><input type="checkbox" class="seats" value="I9"></td>
    <td><input type="checkbox" class="seats" value="I10"></td>
    <td><input type="checkbox" class="seats" value="I11"></td>
    <td><input type="checkbox" class="seats" value="I12"></td>
</tr>
  
<tr>
    <td>J</td>
    <td><input type="checkbox" class="seats" value="J1"></td>
    <td><input type="checkbox" class="seats" value="J2"></td>
    <td><input type="checkbox" class="seats" value="J3"></td>
    <td><input type="checkbox" class="seats" value="J4"></td>
    <td><input type="checkbox" class="seats" value="J5"></td>
    <td></td>
    <td><input type="checkbox" class="seats" value="J6"></td>
    <td><input type="checkbox" class="seats" value="J7"></td>
    <td><input type="checkbox" class="seats" value="J8"></td>
    <td><input type="checkbox" class="seats" value="J9"></td>
    <td><input type="checkbox" class="seats" value="J10"></td>
    <td><input type="checkbox" class="seats" value="J11"></td>
    <td><input type="checkbox" class="seats" value="J12"></td>
</tr>
  
  
</table>
  
<br/><button onclick="updateTextArea()">Confirm Selection</button>
</center>
</div>
      
<br/><br/>

<div class="displayerBoxes">
<center>
  <table class="Displaytable">
  <tr>
    <th>Name</th>
    <th>Number of Seats</th>
    <th>Seats</th>
  </tr>
  <tr>
    <td><textarea id="nameDisplay"></textarea></td>
    <td><textarea id="NumberDisplay"></textarea></td>
    <td><textarea id="seatsDisplay"></textarea></td>
  </tr>
</table>
</center>
</div>

 
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
    function onLoaderFunc()
{
  $(".seatStructure *").prop("disabled", true);
  $(".displayerBoxes *").prop("disabled", true);
}
function takeData()
{
  if (( $("#Username").val().length == 0 ) || ( $("#Numseats").val().length == 0 ))
  {
  alert("Please Enter your Name and Number of Seats");
  }
  else
  {
    $(".inputForm *").prop("disabled", true);
    $(".seatStructure *").prop("disabled", false);
    document.getElementById("notification").innerHTML = "<b style='margin-bottom:0px;background:yellow;'>Please Select your Seats NOW!</b>";
  }
}

function cancelseat(){
    
   var seats = document.getElementsByClassName("seats");
  
  // Uncheck all selected seats
  for (var i = 0; i < seats.length; i++) {
    seats[i].checked = false;
  }
  
  // Clear the displayed information
  document.getElementById("nameDisplay").value = "";
  document.getElementById("NumberDisplay").value = "";
  document.getElementById("seatsDisplay").value = "";
}
    


function updateTextArea() { 
    
  if ($("input:checked").length == ($("#Numseats").val()))
    {
      $(".seatStructure *").prop("disabled", flase);
      
     var allNameVals = [];
     var allNumberVals = [];
     var allSeatsVals = [];
  
     //Storing in Array
     allNameVals.push($("#Username").val());
     allNumberVals.push($("#Numseats").val());
     $('#seatsBlock :checked').each(function() {
       allSeatsVals.push($(this).val());
     });
    
     //Displaying 
     $('#nameDisplay').val(allNameVals);
     $('#NumberDisplay').val(allNumberVals);
     $('#seatsDisplay').val(allSeatsVals);
    }
  else
    {
      alert("Please select " + ($("#Numseats").val()) + " seats")
    }
  }


function myFunction() {
  alert($("input:checked").length);
}

/*
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
*/


$(":checkbox").click(function() {
  if ($("input:checked").length == ($("#Numseats").val())) {
    $(":checkbox").prop('disabled', true);
    $(':checked').prop('disabled', false);
  }
  else
    {
      $(":checkbox").prop('disabled', false);
    }
});

 </script>
</body>

</html>
