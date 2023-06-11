  

<div class="navbar-">
    <nav class="navbar" style="
    background-color: black;">
        <a href="index.php">
    <h1 class="navbar-heading" style="
    color: white;">ATSE Cinema</h1>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <ul class="navbar-menu">

            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="TxnStatus.php" target="_blank">Status</a></li> -->
            <li><a href="contact-us.php">Contact</a></li>
            <li>
            <?php
                global $web;
                if(isset($_SESSION['moviemin_id'])){
                    $login = '<a href="#">'. $_SESSION['moviemin_name'].'</a>
                        <li><a href="booking-list.php">Booking</a></li>
                        <li><a href="includes/allfunction.php?action=signout"><i class="fa fa-sign-out">Logout</i></a></li>';
                }else{
                    $login = '<a href='.$web.'login.php>Login</a>';
                }
                echo $login;
            ?>
            </li>
        </ul>
    </nav>
</div>
 
