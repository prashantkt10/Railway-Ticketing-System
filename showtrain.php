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

if ($_REQUEST['id']=='sl') {
  if ($_REQUEST['seats']<1) {
    ?>
    <script>
      alert('0 seats are available, reservation can not be done!');
    </script>
    <?php
  }
  elseif ($_REQUEST['seats']>0) {
    $_SESSION['newtrainno']=$_REQUEST['train'];
    $_SESSION['seat']=$_REQUEST['id'];
    header('Location:booking.php');
  }
}
elseif ($_REQUEST['id']=='ac') {
  if ($_REQUEST['seats']<1) {
    ?>
    <script>
      alert('0 seats are available, reservation can not be done!');
    </script>
    <?php
  }
  elseif ($_REQUEST['seats']>0) {
    $_SESSION['newtrainno']=$_REQUEST['train'];
    $_SESSION['seat']=$_REQUEST['id'];
    header('Location:booking.php');
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
    <h3 align="center" class="lead"><u><b>Found Trains</b></u></h3>
    <?php
    if (!is_array($_SESSION['train_no'])) {
      $train=$_SESSION['train_no'];
      $query="SELECT * FROM `trains` WHERE train_no='$train'";
      foreach ($db->query($query) as $row) {
        $train_no=$row['train_no'];
        $train_name=$row['train_name'];
        $source=$row['source'];
        $destination=$row['destination'];
        $sa=$row['Scheduled_Arrival'];
        $sd=$row['Scheduled_Departure'];
        ?>
        <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Train_No</th>
            <th>Train_Name</th>
            <th>Source</th>
            <th>Destination</th>
            <th>Arrival</th>
            <th>Departure</th>

        </thead>
        <tbody>
          <tr>
            <td><?php echo $train_no ?></td>
            <td><?php echo $train_name ?></td>
            <td><?php echo $source ?></td>
            <td><?php echo $destination ?></td>
            <td><?php echo $sa ?></td>
            <td><?php echo $sd ?></td>
          </tr>
        </tbody>
        </table>
        <?php
      }
    }
    elseif (is_array($_SESSION['train_no'])) {
      ?>
      <table class="table table-hover">
      <thead>
        <tr>
          <th>Train_No</th>
          <th>Train_Name</th>
          <th>Source</th>
          <th>Destination</th>
          <th>Date</th>
          <th>Arrival</th>
          <th>Departure</th>
          <th>AC Seats</th>
          <th>SL Seats</th>
      </thead>
      <tbody>
      <?php
      $train=$_SESSION['train_no'];
      // print_r ($train);
      // echo $_SESSION['date'];
      // print_r($_SESSION);
      $counter=count($train);
      for ($i=0; $i <$counter ; $i++) {
      $tn=$train[$i];
      $query="SELECT * FROM `trains` WHERE train_no='$tn'";
      foreach ($db->query($query) as $row) {
        $train_no=$row['train_no'];
        $train_name=$row['train_name'];
        $source=$row['source'];
        $destination=$row['destination'];
        $sa=$row['Scheduled_Arrival'];
        $sd=$row['Scheduled_Departure'];
        $date=$_SESSION['date'];
        $ac_seats=$sl_seats=0;
        $query="SELECT available_ac FROM `ac_seats` WHERE train_no='$tn' AND date='$date'";
        foreach ($db->query($query) as $row) {
          $ac_seats=$row['available_ac'];
        }
        $query="SELECT available_sl FROM `sl_seats` WHERE train_no='$tn' AND date='$date'";
        foreach ($db->query($query) as $row) {
          $sl_seats=$row['available_sl'];
        }
        ?>
          <tr>
            <td><?php echo $train_no ?></td>
            <td><?php echo $train_name ?></td>
            <td><?php echo $source ?></td>
            <td><?php echo $destination ?></td>
            <td><?php echo $_SESSION['date'] ?></td>
            <td><?php echo $sa ?></td>
            <td><?php echo $sd ?></td>
            <td><a href="showtrain.php?id=ac&train=<?php echo $train_no ?>&seats=<?php echo $ac_seats ?>"><button type="button" class="btn btn-success" name="ac" style="">Book  <span class="badge"><?php if ($ac_seats>0) {
              echo "$ac_seats";
            } else {
              echo "0";
            } ?></span></button></a></td>
            <td><a href="showtrain.php?id=sl&train=<?php echo $train_no ?>&seats=<?php echo $sl_seats ?>"><button type="button" class="btn btn-success" name="sl" style="">Book  <span class="badge"><?php if ($sl_seats>0) {
              echo "$sl_seats";
            } else {
              echo "0";
            } ?></span></button></a></td>
            <td></td>
          </tr>

        <?php
    }
    }
    ?>
    </tbody>
    </table>
    <?php
    }
      ?>
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
