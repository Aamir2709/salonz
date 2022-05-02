<?php
$cp = false;
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true) {
    header("Location:log_final.php");
    exit;
}
?>
<?php
if(isset($_POST['coupon'])){
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "appointment";
  $con = mysqli_connect($server, $username, $password,$dbname);
  
  
  if(!$con){
      die("Could not connect to the database".mysqli_connect_error());
  }
  else{
    
  $coupon = $_POST["coupon"];
  $sql = "SELECT * FROM coupon WHERE coupon='$coupon'";
  $result = mysqli_query($con,$sql);
  $num = mysqli_num_rows($result);
  if($num==1){
  $cp=true;
  
  }
  
  
  
  }
}
?>

<?php
$mail=false;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    
    
    <title>Cart</title>
</head>
<body>
  
  <?php
if(isset($_POST['offline'])){
$username = $_SESSION['username'];
$type = $_SESSION['type'];
$salon = $_SESSION['salon'];
$location = $_SESSION['location'] ;
 $date = $_SESSION['date'];
  $to_email = $_COOKIE['member_mail'];
$subject = 'Regarding Appointment';
$body = "Hello $username Your appointment of $type has been successfully booked on $date at $salon $location
 Thank you for choosing us :)" ;
$headers = "From: salonz2710@gmail.com\r\n";

if(mail($to_email, $subject, $body, $headers)){
  $mail=true;
}
  echo '
<div class="popup-overlay">
                    <div class="popup-box-container">
                      <div class="check-container">
                        <i class="fa-solid fa-check"></i>
                      </div>
                      <div class="popup-message-container">
                        <h1>THANK YOU!!</h1>
                        <p>Your appointment has been booked you will get your appointment status on your email and mobile.</p>
                        <button class="ok-btn" type="button" onclick="closePopUp()">
                          <span>OK</span>
                        </button>
                      </div>
                    </div>
                  </div>';



                  
}


                  ?>
<?php require 'partials/_nav.php'?>
<?php
         if($mail){
            echo '   
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Congratulations!</strong> Your appointment status is mailed to you.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
         }
        
         ?>

    <div class="px-4 px-lg-0">
        <!-- For demo purpose -->
        <div class="container text-white py-5 text-center">
          <h1 class="display-4">Salonz cart</h1>
          <p class="lead mb-0"><?php echo  $_SESSION['username']?> your appointment in your salon is just a few clicks away. </p>
          
        </div>
        <!-- End -->
      
        <div class="pb-5">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
      
                <!-- Shopping cart table -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col" class="border-0 bg-light">
                          <div class="p-2 px-3 text-uppercase">Service</div>
                        </th>
                        
                        <th scope="col" class="border-0 bg-light">
                          <div class="py-2 text-uppercase">Price</div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row" class="border-0">
                          <div class="p-2">
                            
                            <div class="ml-3 d-inline-block align-middle">
                              <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo  $_SESSION['type']?></a></h5><span class="text-muted font-weight-normal font-italic d-block">Salon: <?php echo  $_SESSION['salon']?></span>
                              <span class="text-muted font-weight-normal font-italic d-block">Location: <?php echo  $_SESSION['location']?></span>
                              <span class="text-muted font-weight-normal font-italic d-block">Date: <?php echo  $_SESSION['date']?></span>
                              
                            </div>
                          </div>
                        </th>
                        <td class="border-0 align-middle"><strong>&#x20B9; <?php echo $_COOKIE["member_cost"] ?> </strong></td>
                        
                      
                    </tbody>
                  </table>
                </div>
                <!-- End -->
              </div>
            </div>
            
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
              <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Coupon code</div>
                <div class="p-4">
                  <p class="font-italic mb-4">If you have a coupon code, please enter it in the box below</p>
                  <form action="" method="POST">
                  <div class="input-group mb-4 border rounded-pill p-2">
                    <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3" class="form-control border-1" name="coupon">
                    <div class="input-group-append border-0">
                      <button id="button-addon3" type="submit" class="btn btn-dark px-4 rounded-pill"><i class="fa fa-gift mr-2"></i>Apply coupon</button>
                    </div>
                  </div>
                  </form>
                  
                </div>
                
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instructions for your selected Salon</div>
                <div class="p-4">
                  <p class="font-italic mb-4">If you have some information for the salon you can leave them in the box below</p>
                  <textarea name="" cols="30" rows="2" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                  <p class="font-italic mb-4">GST and additional taxes are calculated based on values you have entered.</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>&#x20B9;<?php echo $_COOKIE["member_cost"] ?></strong></li>
                    
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Discount</strong><strong>&#x20B9;<?php
                    if($cp){
                      echo $_COOKIE["member_cost"]/10;
                    }
                    else{
                      echo 0;
                    }
                    ?>
                    </strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                      <h5 class="font-weight-bold">&#x20B9;
                        <?php
                        if($cp){
                          echo $_COOKIE["member_cost"]-($_COOKIE["member_cost"]/10);
                        }
                        else{
                          echo $_COOKIE["member_cost"];
                        }
                        ?>
                      </h5>
                    </li>
                  </ul>
                  <form action="" method="POST">
                  <input class="pay-btn" type="submit" value="Pay online" name="online" id="rzp-button1"> 
                  </form>
                  <form action="" method="POST">
                 <input class="pay-btn" type="submit" value="Pay at The Salon" name="offline"> 
                 </form>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </div>
      </form>
      <script src="https://kit.fontawesome.com/8516d77cbd.js" crossorigin="anonymous"></script>
      <script src="cart.js"></script>
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        var options = {
            "key": "rzp_test_buwq2Rog4l5rqo", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo  $_COOKIE["member_cost"]*100?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Salonz",
    "description": "Test Transaction",
    "image": "images/checkout.png",
    "order_id": "", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        jQuery.ajax({
            type:"POST",
            url:"payment.php",
            data:"pay_id="+response.razorpay_payment_id+"&amount",
            success:function(result){
                window.location.href="paymentscript.php"
            }
        })
    },
    "prefill": {
        "name": "$_SESSION['username']",
        "email": "",
        "contact": "$_COOKIE['member_mobile']"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "maroon"
    }
};

var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
        </script>
</body>
</html>