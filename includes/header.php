<div class="navbar-brand">
    <a href="index.php">
        <h1 class="navbar-heading">ATSE Cinema</h1>
    </a>
</div>
<div class="navbar-container">
    <nav class="navbar">
        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="schedule.php">Schedule</a></li>
            <!-- <li><a href="TxnStatus.php" target="_blank">Status</a></li> -->
            <li><a href="#">Team</a></li>           
            <li><a href="contact-us.php">Contact</a></li>
            <li><?php 
 
                            if(!isset($_SESSION['moviemin_id'])){

                                $login = '<a href=http://localhost/OnlineTicketSystem/login.php>Login</a>';
                            }else{
                                $login = '<a href="#">'. $_SESSION['moviemin_name'].'</a>

                                    
                                    <li><a href="includes/allfunction.php?action=signout"><i class="fa fa-sign-out">Logout</i></a></li>';
                            }
                            echo $login;
                        ?></li>
        </ul>
    </nav>
</div>