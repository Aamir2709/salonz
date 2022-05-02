<?php
session_start();
if(isset($_FILES['image'])){
    
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    

   
    
    
        if(move_uploaded_file($file_tmp,"images/".$file_name)) {
        echo "Thank you for your feedback";
        }
        
    
    else{
        echo "Sorry try again";
    }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="Contact_final.css">
    <script src="https://kit.fontawesome.com/cf18a79c83.js" crossorigin="anonymous"></script>
    <title>Contact Us</title>
  </head>
  <body>
  <?php require 'partials/_nav.php'?>
     <div class="hero">
         <form action="">
             <h2>Contact Us</h2>
             <div class="row">
             <div class="inputgrp">
             <input type="text" id="name" required>
             <label for="name"><i class="fas fa-user"></i>Your Name</label>
            </div>
            <div class="inputgrp">
                <input type="text" id="number" required>
                <label for="name"><i class="fas fa-phone-square-alt"></i>Mobile Number</label>
               </div>
            </div>
            <div class="row">
               <div class="inputgrp">
                <input type="text" id="email" required>
                <label for="name"><i class="fas fa-envelope"></i>Email Address</label>
               </div>
               <div class="inputgrp">
                <label for="form_need"></label> <select id="need" class="form-control" required><option value="" selected disabled>--Select Your Issue--</option>
                    <option>Request Invoice for order</option>
                    <option>Request order status</option>
                    <option>Haven't received cashback yet</option>
                    <option>Other</option>
                </select>
               </div>
            </div>
               <div class="inputgrp">
                <textarea  id="messege"  rows="8" required></textarea>
                <label for="messege"><i class="fas fa-comments"></i>Enter the messege</label>
               </div>
               <input type="file" value="Upload file" style="padding:10px 0;
    font-weight: bold;
    font-size: 20px;
    color: black;
    outline: none;
    background:transparent;
    border:3px solid black;
    width:100%;
    cursor: pointer;">
               <button type="submit">Submit<i class="fas fa-paper-plane"></i></button>
         </form>
     </div>
     </body>
    

   