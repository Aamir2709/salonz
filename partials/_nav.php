<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true) {
        $loggedin =true;
}
else{
        $loggedin =false;
}

echo '
<nav>

        
        
        <a href="Home_page.html">Home</a>';
        if($loggedin){
                echo'
                <a href="logout.php">Logout</a>';
        }
        if(!$loggedin){
        echo '
        <a href="reg_final.php">Register</a>
        <a href="log_final.php">Login</a>';
        }
        
        echo'
        <a href="booking.php">Book an Appointment</a>
        <a href="Contact_us.php">Contact Us</a>
     </nav>';



     ?>