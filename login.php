<?php 

include("connection.php");

if(isset($_SESSION['moviemin_id']))
{
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Login</title>
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="_.js "></script>
</head>

<body>
    <?php
    include "connection.php";
    ?>
    <header></header>
    <div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>LOGIN</h1>
            
            <form action="" id="loginForm" role="form" method="POST">
                <input placeholder="E-mail" name="eMail" id="eMail" required><br>
                <input placeholder="Password" name="password" id="password" required><br><br>
                <a href="forgot_password.php" class="fpwd" >Forgot Password</a><br><br>

                            <input type="checkbox" id="keepLoged" value="Value" class="styled" name="logged" /> Keep me logged in<br><br>
                        
                <button type="submit" value="submit" class="btn submit_btn"  id="loginBtn">Login</button>
               
            </form>

        </div>
    </div>  
    <footer></footer>
   

    <script type="text/javascript" >
       $("#loginForm").submit(function(e){
         e.preventDefault();
        
        $.ajax({
            url: "includes/allfunction.php?action=signin",
            type: "post",
            data: $("#loginForm").serialize() ,
            success: function (response) {
                console.log(response);
                if(response==1){
                    toastr.success('Hie!', 'Online Theatre Ticket System!');
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                    window.location = "index.php";
                }   
                else{
                    toastr.error('Opps! I Doub\'t The Credentials ! or SIGN UP', 'Online Theatre Ticket System!');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });

    
    </script>
     <script src="scripts/jquery-3.3.1.min.js "></script>
    <script src="scripts/owl.carousel.min.js "></script>
    <script src="scripts/script.js "></script>
    <script src="scripts/toastr.js"></script>
</body>

</html>
