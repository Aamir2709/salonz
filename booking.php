<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true) {
    header("Location:log_final.php");
    exit;
    
}
?>
<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";
$con = mysqli_connect($server, $username, $password,$dbname);

if(!$con){
    die("Could not connect to the database".mysqli_connect_error());
}
else{
    

        
      
    


$showalert = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$type = $_POST["type"];
$salon = $_POST["salon"];
$location = $_POST["location"];
$date = $_POST["date"];
$instructions = $_POST["instructions"];

$sql3 = "SELECT cost FROM charge WHERE type='$type'";
    $ucost = "";
    
    
    $result3 = mysqli_query($con,$sql3);
    if ($result3->num_rows > 0) {
      // output data of each row
      while($row = $result3->fetch_assoc()) {
        $ucost = $row['cost'];
      }
    }
setcookie ("member_cost",$ucost,time()+ 6000);
$_SESSION['type'] = $type;
    $_SESSION['salon'] = $salon;
    $_SESSION['location'] = $location;
    $_SESSION['date'] = $date;
    $_SESSION['email'] = $email;
    $sql = "INSERT INTO `appointment` ( `name`, `email`, `mobile`, `type`, `salon`, `location`, `date`, `instructions`) VALUES ( '$name', '$email', '$mobile', '$type', '$salon', '$location', '$date', '$instructions' );";
    $result = mysqli_query($con,$sql);

    



    if($result){
        $showalert = true;
        header("Location:cart.php");

        
    }
    

}
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Book An Appointment-Welcome <?php echo $_SESSION['username']?></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/duotone.css" integrity="sha384-R3QzTxyukP03CMqKFe0ssp5wUvBPEyy9ZspCB+Y01fEjhMwcXixTyeot+S40+AjZ" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="booking.css">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

    </head>
    <body> 
    <?php require 'partials/_nav.php'?>
        <div class="container">
        <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    You have successfully logged in <?php echo  $_SESSION['username']?>. You can logout anytime. <a href="logout.php">Logout</a>
  </div>
        </div>
         <?php
         if($showalert){
            echo '   
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Congratulations!</strong> Your appointment has been booked.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
         }
         ?>
         &nbsp;&nbsp;&nbsp;&nbsp;
        <center> 
        <div class="container">
            
                <div class="form ">
                    <div class="appoinment-wrap mt-6=5 mt-lg-0">
                        <h1 style="font-family: 'Christian Sunday, serif;';">Book appoinment</h1>
                        <p class="mb-4">
                            Now you can get an online appointment, We will get back to you and book an appointment in your favourite Salon.
                        </p>

                        <form  class="appoinment-form" method="POST" action="booking.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Full Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Email Address" value="<?php echo  $_COOKIE["member_mail"]?>" required>
                                    </div>
                                </div>
                                

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="mobile" id="mobile" type="text" class="form-control" placeholder="Phone Number" maxlength="10" value="<?php echo  $_COOKIE["member_mobile"]?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="type" name="type" required>
                                            <option value="">---Appointment Type---</option>
                                            <option value="Hair spa">Hair spa</option>
                                            <option value="Hair Cut">Hair Cut</option>
                                            <option value="Menicure/Pedicure">Menicure/Pedicure</option>
                                            <option value="Beard Styling">Beard Styling</option>
                                            <option value="Hair Treatment">Hair Treatment</option>
                                            <option value="Faical">Facial</option>Hair spa</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="form-group">
                                        <select class="form-control" id="salon" name="salon" required>
                                            <option value="">---Select your Salon---</option>
                                            <option value="Enrich">Enrich</option>
                                            <option value="Lakme">Lakme</option>
                                            <option value="Jawed Habib">Jawed Habib</option>
                                            <option value="L'oreal">L'oreal</option>
                                            <option value="VLCC">VLCC</option>
                                            <option value="Panache">Panache</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="location" name="location">
                                            <option value="" required>---Select your Location---</option>
                                            <option value="Andheri(w)">Andheri(w)</option>Hair spa</option>
                                            <option value="Goregaon">Goregaon</option>
                                            <option value="Bandra">Bandra</option>
                                            <option value="Ghatkopar">Ghatkopar</option>
                                            <option value="Mumbai Central">Mumbai Central</option>
                                            <option value="Thane">Thane</option>
                                            
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="date" id="date" type="datetime-local" class="form-control" required>
                                    </div>
                                </div>

                                
                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="instructions"  class="form-control" rows="3" placeholder="Any Specific Instructions"></textarea>
                            </div>
                            
                            <input type="submit" name="submit" class="btn" value="Proceed to Checkout" style="background:blanchedalmond;">
                        
                        </form>
                    </div>
                </div>
            </div>
        
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    </script>