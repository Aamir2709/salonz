<?php
$login = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){

include 'partials/_dbconnect.php';
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM register_details WHERE username='$username' AND password='$password'";
$sql2 = "SELECT email,mobile FROM register_details WHERE username='$username'";
$uemail = "";
$umobile = "";

$result2 = mysqli_query($con,$sql2);
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    $uemail = $row['email'];
    $umobile = $row['mobile'];
    
  }
}
$result = mysqli_query($con,$sql);
$num = mysqli_num_rows($result);
if($num==1){
  $login = true;
  session_start();
  setcookie ("member_mail",$uemail,time()+ 6000);
        setcookie ("member_mobile",$umobile,time()+ 6000);
  $rem = $_POST["remember"];
  if(!empty($_POST["remember"])) {
				setcookie ("member_user",$_POST["username"],time()+  6000);
        setcookie ("member_pass",$_POST["password"],time()+  6000);
        
			}
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
   
    header('Location: booking.php');

}
else{
  $showerror = "Invalid Credentials";
}
}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="log_final.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Login</title>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body>
    

      <?php require 'partials/_nav.php'?>
      <?php
    if($login) {
      echo '   
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have successfully logged in.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    if($showerror) {
      echo '   
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Invalid Credentials.</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
    }
    
    
    
    ?>
<div class="background">

<form name="Loginform"action="log_final.php" method ="POST" onsubmit= "return validateform()" >
<h3 id ="demo" onmouseover="mouseOver()" onmouseout="mouseOut()">Login </h3>

<div class="box">
<i class="fa fa-envelope"></i>

<input type="text" name="username" id="username"placeholder="Enter your username" value="<?php if(isset($_COOKIE["member_user"])) { echo $_COOKIE["member_user"]; } ?>" >


<i class="fa fa-key"></i>

<input type="password" name="password" id="password"placeholder="Enter your password" value="<?php if(isset($_COOKIE["member_pass"])) { echo $_COOKIE["member_pass"]; } ?>">
</div>

<div class="remember">
 
  <input type="checkbox" name="remember">
  <label style="margin:0;">Remember me</label>
  &nbsp;&nbsp;

  <span style="padding-left: 35px;">
    Not a user?<a href="reg_final.php">Register</a>
  </span>
</div>
  <button>Log in</button>
<div class="social">
<div class="go"><ion-icon name="logo-google"></ion-icon>Google</div>
<div class="fb"><ion-icon name="logo-facebook"></ion-icon>Facebook</div>
</div>
</form>
</div>
<script src="https://kit.fontawesome.com/cf18a79c83.js" crossorigin="anonymous"></script>
    <script>  
        function validateform()  
        {  
        var email=document.Loginform.email.value;  
        var atposition=email.indexOf("@");  
        var dotposition=email.lastIndexOf("."); 
        var password=document.Loginform.password.value;   
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length){  
          alert("Please enter a valid e-mail address ");  
          return false;  
          }
          else if(password.length<6){  
          alert("Password must be at least 6 characters long.");  
          return false;  
        }  
         
        }  
  
        function mouseOver() { document.getElementById("demo").style.color  =  "Grey"; }
        
        function mouseOut() { document.getElementById("demo").style.color  =  "black"; }
        
        </script>
        
</body>
</html>
