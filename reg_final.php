<?php
$showalert = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partials/_dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];
$repassword = $_POST["repassword"];
$gender = $_POST["gender"];
$mobile = $_POST["mobile"];
$email = $_POST["email"];
$address = $_POST["address"];


$existsql = "SELECT * FROM `register_details` WHERE username = '$username'";

$result = mysqli_query($con,$existsql);
$numExistrows = mysqli_num_rows($result);
if($numExistrows>0){
  $showerror = "Username or email already exists";
}
else{
if(($password==$repassword)){
    $sql = "INSERT INTO `register_details` ( `username`, `password`, `gender`, `mobile`, `email`, `address`, `date`) VALUES ( '$username', '$password', '$password', '$mobile', '$email', '$address', current_timestamp())";
    $result = mysqli_query($con,$sql);
    if($result){
      session_start();
        $showalert = true;
        $_SESSION['email'] = $email;
        $_SESSION['mobile'] = $mobile;
    }
}
else{
    $showerror = "Passwords do not match";
}
}
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link rel="stylesheet" href="reg_final.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showalert){
     echo '   
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created Please <a href="log_final.php">login</a> to continue.</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    if($showerror){
        echo '   
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> '.$showerror.'.</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>';
       }
    ?>
    
  
      
   
     
     
    <div class="background">

<form name="Registerform"action="reg_final.php" method="POST" onsubmit=  "validateform()" >
<h3 id ="demo" onmouseover="mouseOver()" onmouseout="mouseOut()">Register Here</h3>

<input type="text" name="username" id="username"placeholder="Enter your Username" id="username">
<input type="password" name="password" id="password"placeholder="Enter your password">
<input type="password" name="repassword" id="repassword"placeholder="Re-enter your password">
<select class="gender" name="gender"required>
  <option value="disabled">Gender</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Other">Other</option>
  
</select>
<input type="text" name="mobile" id="mobile" placeholder="Enter your Mobile Number" maxlength="10" required>
<input type="text" name="email" id="email" placeholder="Enter your email address" required>
<input type="text" name="address" id="address" placeholder="Enter your Address" required>
     Already a user?<a href="log_final.php">Login</a>
  
    <button>Register</button>
<div class="social">
<div class="go"><ion-icon name="logo-google"></ion-icon>Google</div>
<div class="fb"><ion-icon name="logo-facebook"></ion-icon>Facebook</div>
</div>
</form>
</div>
</body>
</html>

<script src="https://kit.fontawesome.com/cf18a79c83.js" crossorigin="anonymous"></script>
    <script>  
        function validateform()  
        {  
        var email=document.Registerform.email.value;  
        var atposition=email.indexOf("@");  
        var dotposition=email.lastIndexOf("."); 
        var password=document.Registerform.password.value;    
        
       
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
          alert("Please enter a valid e-mail address ");  
          return false;  
          }
          if(password.length<6){  
          alert("Password must be at least 6 characters long.");  
          return false;  
        }  
         
        
        }  
  
        function mouseOver() { document.getElementById("demo").style.color  =  "blanchedalmond"; }
        
        function mouseOut() { document.getElementById("demo").style.color  =  "black"; }
        
        </script>
</body>
</html>


<!--INSERT INTO `register_details` (`snoo`, `email`, `password`, `repassword`, `gender`, `mobile`, `address`, `date`) VALUES ('1', 'this@this.com', 'aamir123', 'aamir123', 'male', '9920397276', 'aaabbb', current_timestamp());-->