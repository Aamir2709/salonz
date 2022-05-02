<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "appointment"; 
$conn = mysqli_connect($servername, $username, $password, $dbname); 
session_start();
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
$sql ="INSERT INTO `invoice` ( `username`, `salon`, `type`, `location`, `date`, `total`) VALUES ( '{$_SESSION["username"]}', '{$_SESSION["salon"]}', '{$_SESSION["type"]}', '{$_SESSION["location"]}', '{$_SESSION["date"]}', '{$_SESSION["total"]}')";  
if ($conn->multi_query($sql) == TRUE) { 
echo "Your data is recorded"; 
} else { 
echo "Error: " . $sql . "<br>" . $conn->error; 
}
 $conn->close(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Invoice</title>
 <style>
h1{text-align: center}
h1{font-family: Andika New Basic; }
h2{font-family: Times New Roman}
h2,footer{text-align: center}
a {text-decoration:none;}
 body{background-image: url("op.jpg");}

</style>
<script>
      function printFunction() { 
        window.print(); 
      }
    </script>
</head>
<body>

<div align="center">

<h1>Your Salon Appointment Slot has been booked Successfully !!!</h1>
<p><h2>
<?php
echo "<center>";
echo "<h2><hr>";

echo("Greetings , ".$_SESSION['username']);
echo "<br><hr>";
echo "<br>";
echo("Your salon : ".$_SESSION["salon"]);
echo "<br><hr>";
echo "<br>";
echo("Service: ".$_SESSION["type"]);
echo "<br><hr>";
echo "<br>";
echo("Location : ".$_SESSION["location"]);
echo "<br><hr>";
echo "<br>";
echo("Date and time : ".$_SESSION["date"]);
echo "<br><hr>";
echo "<br>";
echo("Total amount to be paid: ".$_SESSION["total"]);
echo "<br><hr>";
echo "<br>";
echo "</h2>";


echo "</center>";
?>

<button onclick="printFunction()">Save As PDF</button>​

<footer><h2><b>&reg; Salonz </b></h2>
<hr>
<div align="center"><a href="Home_page.html"><h3 style="color:white;background-color:black;">Back To The Home Page</h3></a></div></footer>

</body>
</html>