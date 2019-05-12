<?php
session_start();
if (!isset($_SESSION['userid']) && !isset($_SESSION['train_no'])) {
 header('Location: searchtrain.php');
}
include 'homeprocess.php';
require_once 'dbconfig.php';
$id=$_SESSION['userid'];
$query="SELECT fullname FROM `users` WHERE username='$id'";
foreach ($db->query($query) AS $row) {
  $name=$row['fullname'];
}

if (isset($_POST['submit'])) {
  if ($_SESSION['seat']=='ac') {
    $train_no=$_SESSION['newtrainno'];
    $date=$_SESSION['date'];
    $userid=$_SESSION['userid'];
    $from=$_SESSION['from'];
    $to=$_SESSION['to'];
    $name=$_SESSION['name'];
    $age=$_SESSION['age'];
    $gender=$_SESSION['gender'];
    $query="SELECT available_ac from `ac_seats` where train_no='$train_no' and date='$date'";
    foreach ($db->query($query) as $row) {
      $available_ac=$row['available_ac']; $x=1; $available_ac=$available_ac-$x;
      $query="UPDATE `ac_seats` set available_ac='$available_ac' where train_no='$train_no' and date='$date'";
      $result=$db->exec($query);
      if ($result==1) {
        $available_ac=$available_ac+$x;
        $pnrname=$_SESSION['name'];
        $pnr="$pnrname"."$train_no"."$available_ac";
        $query="INSERT into `reservations` (username,pnr) values ('$userid','$pnr')";
        $result=$db->exec($query);
        if ($result==1) {
          $status=1;
          $seat=$_SESSION['seat'];
          $query="INSERT into `confirmed_pnr_details` (pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type) values('$pnr','$name','$age','$gender','$train_no','$from','$to','$date','$available_ac','$seat')";
          $result=$db->exec($query);
          if ($result==1) {
            $cardnumber=$_POST['cardno'];
            $expirydate=$_POST['cardnumber'];
            $pin=$_POST['password'];
            $query="INSERT into `card_details` (pnr,card_number,expirydate,pin) values ('$pnr','$cardnumber','$expirydate','$pin')";
            $result=$db->exec($query);
            if ($result==1) {
              $_SESSION['pnr']=$pnr;
              $_SESSION['seat_no']=$available_ac;
              header('Location: showticket.php');
            }
          }
        }
      }
    }
  }
  elseif ($_SESSION['seat']=='sl') {
    $train_no=$_SESSION['newtrainno'];
    $date=$_SESSION['date'];
    $userid=$_SESSION['userid'];
    $from=$_SESSION['from'];
    $to=$_SESSION['to'];
    $name=$_SESSION['name'];
    $age=$_SESSION['age'];
    $gender=$_SESSION['gender'];
    $query="SELECT available_sl from `sl_seats` where train_no='$train_no' and date='$date'";
    foreach ($db->query($query) as $row) {
      $available_sl=$row['available_sl']; $x=1; $available_sl=$available_sl-$x;
      $query="UPDATE `sl_seats` set available_sl='$available_sl' where train_no='$train_no' and date='$date'";
      $result=$db->exec($query);
      if ($result==1) {
        $available_sl=$available_sl+$x;
        $pnrname=$_SESSION['name'];
        $pnr="$pnrname"."$train_no"."$available_sl";
        $query="INSERT into `reservations` (username,pnr) values ('$userid','$pnr')";
        $result=$db->exec($query);
        if ($result==1) {
          $status=1;
          $seat=$_SESSION['seat'];
          $query="INSERT into `confirmed_pnr_details` (pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type) values('$pnr','$name','$age','$gender','$train_no','$from','$to','$date','$available_sl','$seat')";
          $result=$db->exec($query);
          if ($result==1) {
            $cardnumber=$_POST['cardno'];
            $expirydate=$_POST['cardnumber'];
            $pin=$_POST['password'];
            $query="INSERT into `card_details` (pnr,card_number,expirydate,pin) values ('$pnr','$cardnumber','$expirydate','$pin')";
            $result=$db->exec($query);
            if ($result==1) {
              $_SESSION['pnr']=$pnr;
              $_SESSION['seat_no']=$available_sl;
              header('Location: showticket.php');
            }
          }
        }
      }
    }
    
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>home</title>
  <meta name="description" content="reservation, online-ticketing, trains, pnr status, indian-railway">
  <meta name="author" content="CyberDevil">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">

  <script src="js/prefixfree.min.js"></script>
  <script src="js/valform.js"></script>
  <script src="js/movetitle.js"></script>
  <script src="js/jquery-1.12.1.min.js"></script>
  <script src="js/sweetalert.min.js"></script>
  <link rel="stylesheet" href="js/sweetalert.css">


  <style>
    @import url(http://weloveiconfonts.com/api/?family=brandico);

  </style>



</head>
<body >
 <div class="row navbar navbar-fixed-top" style="background-color: rgb(255, 153, 51)">
  <div class="col-md-2 col-md-offset-1" style="margin-left: ">
    <img src="images/alln.png" height="80px" width="90px" />
  </div>
  <div class="col-md-6">
    <h1 align="center" style="font-family: telegrafico; color: white">INDIAN RAILWAY REGISTRATION</h1>
  </div>
  <div class="col-md-3">
   <ul class="social-buttons" id="demo2">
    <li>
      <a href="https://twitter.com/Gr8IndianRail" class="brandico-twitter-bird" target="_blank"></a>
    </li>
    <li>
      <a href="https://www.facebook.com/pages/Indian-Railways/107720089250462?fref=ts" class="brandico-facebook" target="_blank"></a>
    </li>
    <li>
      <a href="https://www.instagram.com/thegreatindianrailways/" class="brandico-instagram" target="_blank"></a>
    </li>
  </ul>
</div>
</div>
<div style="margin-top: 90px; margin-right: 15px; margin-left: 15px">
 <marquee onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="10"><code>Welcome, <b><?php echo $name ?></b>. Now you are a member of Indian Railway, you can only reserve seats between <b>Bahraich and Lucknow</b> as site is <b>under-developed.</b> You can search, reserve and cancel tickets in Services menu. You can check PNR status and find train schedule in Enquiries tab. Find all your transactions in My Transaction. Update your profile in Settings area. And if you need any help, open Contact and help.</code></marquee>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
     <div class="panel-group" id="accordion">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="welcome.php"><span class="glyphicon glyphicon-home"></span> Home</a>
          </h4>
        </div>
      </div>
      <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-gift"></span> Services</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><a href="searchtrain.php">Ticket Booking</a></div>
        <div class="panel-body"><a href="cancelticket.php">Cancel Ticket</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-eye-open"></span> Enquiries</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><a href="pnrstatus.php">Check PNR Status</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-usd"></span> My Transaction</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><a href="bookedticket.php">Booked Ticket History</a></div>
        <div class="panel-body"><a href="cancelledticket.php">Ticket Cancellation History</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><a href="updateprofile.php">Update Profile</a></div>
        <div class="panel-body"><a href="changepassword.php">Change Password</a></div>
        <div class="panel-body"><a href="logout.php">Logout</a></div>
      </div>
    </div>

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span class="glyphicon glyphicon-earphone"></span> Contact and Help</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body"><a href="writeus.php">Write to us</a></div>
        <div class="panel-body"><a href="phoneus.php">Phone us</a></div>
        <div class="panel-body"><a href="otherhelp.php">Other help</a></div>
      </div>
    </div>

    </div>
  </div>

  <div class="col-md-9">
    <div class="well" style="background-color: white">
      <h3 class="lead" style="margin-left:370px"><u>Enter Card details:</u></h3>
    <!-- <?php print_r($_SESSION) ?> -->
    <form class="form-horizontal" action="" method="post" style="margin-left:130px">
      <div class="form-group">
        <div class="control-label col-sm-3">Card number: </div>
        <div class="col-sm-8">
          <input type="text" name="cardno" class="form-control" placeholder="10 digit card number" maxlength="10" style="width:290px" required>
        </div>
      </div>
      <div class="form-group">
        <div class="control-label col-sm-3">Expiry Date: </div>
        <div class="col-sm-8">
          <input type="date" name="expirydate" class="form-control" style="width:290px" required>
        </div>
      </div>
      <div class="form-group">
        <div class="control-label col-sm-3">Pin: </div>
        <div class="col-sm-8">
          <input type="Password" name="password" class="form-control" placeholder="4 digit pin" maxlength="4" style="width:290px" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-3">
          <input type="submit" name="submit" class="btn btn-success" value="Book">
          <input type="reset" class="btn btn-warning" value="Clear" style="margin-left:50px">
          <a href="booking.php"><button type="button" name="button" class="btn btn-danger" style="margin-left:50px">Cancel</button></a>
        </div>
      </div>
    </form>
    </div>
  </div>
</div>
</div>

<div class="row navbar navbar-fixed-bottom" style="background-color: rgb(19,136,8)">
  <p align="center" style="color: white">
   &copy; All rights reserved @ Prashant Tripathi
 </p>
</div>

</body>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
</html>
