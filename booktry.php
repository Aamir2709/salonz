<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] ==!true) {
    header("Location:log_final.php");
    exit;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Welcome - <?php $_SESSION['username']?></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="booking.css">
    </head>
    <body> 
    <?php require 'partials/_nav.php'?>
    Welcome- <?php  echo $_SESSION['email']?>
         &nbsp;&nbsp;&nbsp;&nbsp;
        <center> 
        <div class="container">
            
                <div class="form ">
                    <div class="appoinment-wrap mt-5 mt-lg-0">
                        <h1 class="mb-2 title-color">Book appoinment</h1>
                        <p class="mb-4">
                            Now you can get an online appointment, We will get back to you and book an appointment in your favourite Salon.
                        </p>

                        <form id="#" class="appoinment-form" method="post" action="#">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="department" name="department">
                                            <option value="">---Appointment Type---</option>
                                            <option value="Hair spa">Hair spa</option>
                                            <option value="Hair Cut">Hair Cut</option>
                                            <option value="Menicure/Pedicure">Menicure/Pedicure</option>
                                            <option value="Beard Styling">Beard Styling</option>
                                            <option value="Hair Treatment">Hair Treatment</option>
                                            <option value="Faical">Faical</option>Hair spa</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <select class="form-control" id="department" name="department">
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
                                        <select class="form-control" id="department" name="department">
                                            <option value="">---Select your Location---</option>
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
                                        <input name="date" id="date" type="datetime-local" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                </div>
                                

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="Number" class="form-control" placeholder="Phone Number">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-2 mb-4">
                                <textarea name="message" id="message" class="form-control" rows="3" placeholder="Any Specific Instructions"></textarea>
                            </div>
                            
                            <input type="submit" name="submit" class="btn btn-main btn-round-full" value="Book Appoinment">
                        
                        </form>
                    </div>
                </div>
            </div>
        
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    </script>