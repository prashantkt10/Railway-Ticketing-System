<?php
// include 'useraction.php';
session_start();
if (!isset($_SESSION['userid'])) {
   header('Location: home.php');
 }
require_once 'dbconfig.php';
$id=$_SESSION['userid'];
$query="SELECT fullname FROM `users` WHERE username='$id'";
foreach ($db->query($query) AS $row) {
  $name=$row['fullname'];
}

if ($_REQUEST['seat']=='ac') {
  $pnr=$_REQUEST['pnr'];
  $train=$_REQUEST['train'];
  $date=$_REQUEST['date'];
  $query="INSERT into `cancelled_pnr_details` (pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type) select pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type from confirmed_pnr_details";
  $action=$db->exec($query);
  $query="DELETE from confirmed_pnr_details where pnr='$pnr'";
  $action=$db->exec($query); 
  if ($action) {
    $query="SELECT available_ac from `ac_seats` where train_no='$train' and date='$date'";
    foreach ($db->query($query) as $row) {
      $available_ac=$row['available_ac'];
    }
    $available_ac=$available_ac+1;
    $query="UPDATE `ac_seats` set available_ac='$available_ac' where train_no='$train' and date='$date'";
    $action=$db->exec($query);
    if ($action) {
      ?>
      <script>alert('Ticket cancelled successfully !');</script>
      <?php
    }
  }
}

elseif ($_REQUEST['seat']=='sl') {
  $pnr=$_REQUEST['pnr'];
  $train=$_REQUEST['train'];
  $date=$_REQUEST['date'];
  $query="INSERT into `cancelled_pnr_details` (pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type) select pnr,name,age,gender,train_no,from_station,to_station,date_of_journey,seat_no,seat_type from confirmed_pnr_details";
  $action=$db->exec($query);
  $query="DELETE from confirmed_pnr_details where pnr='$pnr'";
  $action=$db->exec($query); 
  if ($action) {
    $query="SELECT available_sl from `sl_seats` where train_no='$train' and date='$date'";
    foreach ($db->query($query) as $row) {
      $available_sl=$row['available_sl'];
    }
    $available_sl=$available_sl+1;
    $query="UPDATE `sl_seats` set available_sl='$available_sl' where train_no='$train' and date='$date'";
    $action=$db->exec($query);
    if ($action) {
      ?>
      <script>alert('Ticket cancelled successfully !');</script>
      <?php
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
    <link rel="stylesheet" href="js/sweetalert.css">

		<script src="js/prefixfree.min.js"></script>
    <script src="js/valform.js"></script>
    <script src="js/movetitle.js"></script>
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

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
    <table class="table table-hover">
      <thead>
        <th>PNR</th>
        <th>Name</th>
        <th>Train No</th>
        <th>Seat Type</th>
        <th>Journey Date</th>
      </thead>
      <tbody>
        <?php
        $username=$_SESSION['userid'];
        $query="SELECT pnr from `reservations` where username='$username'";
        foreach ($db->query($query) as $row) {
        $pnr=$row['pnr'];
        $query="SELECT * from `confirmed_pnr_details` where pnr='$pnr'";
        foreach ($db->query($query) as $row) {
          $pnr=$row['pnr'];
          $name=$row['name'];
          $train=$row['train_no'];
          $seat=$row['seat_type'];
          // $status=$row['status'];
          $date=$row['date_of_journey'];
          echo "<tr>";
          echo "<td>$pnr</td>";
          echo "<td>$name</td>";
          echo "<td>$train</td>";
          echo "<td>$seat</td>";
          echo "<td>$date</td>";
          ?>
          <td><a href="cancelticket.php?pnr=<?php echo $pnr ?>&seat=<?php echo $seat ?>&date=<?php echo $date ?>&train=<?php echo $train ?>"><button class="btn btn-danger">Cancel</button></a></td>
          <?php
          echo "</tr>";
          
        }
      }
        ?>
      </tbody>
    </table>
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
