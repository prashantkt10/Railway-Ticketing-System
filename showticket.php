<?php
session_start();
if (!isset($_SESSION['userid']) && !isset($_SESSION['train_no'])) {
 header('Location: searchtrain.php');
}

require_once 'dbconfig.php';
$id=$_SESSION['userid'];
$query="SELECT fullname FROM `users` WHERE username='$id'";
foreach ($db->query($query) AS $row) {
  $name=$row['fullname'];
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
  <script src="js/sweet-alert.min.js"></script>
  <link rel="stylesheet" href="js/sweet-alert.css">


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
    <?php 
    // print_r($_SESSION);
    // require_once 'dbconfig.php';
    $pnr=$_SESSION['pnr']; 
    $seat_no=$_SESSION['seat_no'];
    $class=$_SESSION['seat'];
    $train_no=$_SESSION['newtrainno'];
    $query="SELECT * from `confirmed_pnr_details` where pnr='$pnr' and seat_no='$seat_no'";
    foreach ($db->query($query) AS $row) {
    	$newname=$row['name'];
    	$doj=$row['date_of_journey'];
    	$fs=$row['from_station'];
    	$ts=$row['to_station'];
    	$train=$row['train_no'];
    	$seatno=$row['seat_no'];
    	$status=$row['status'];
    }
    // print_r($row);
    $query="SELECT * from `trains` where train_no='$train_no'";
    foreach ($db->query($query) as $row) {
    	$sa=$row['Scheduled_Arrival'];
    	$sd=$row['Scheduled_Departure'];
    }
    ?>
<div class="alert alert-success fade in" style="margin-left: 300px">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Success!</strong> Ticket has been booked successfully.
	</div>
  <div class="col-md-9" id="ticket" onclick="printContent('ticket')">
    <div class="well" style="background-color: white">
    
      <!-- <h3 class="lead" style="margin-left:370px"><u>Ticket Details</u></h3> -->
    <!-- <form class="form-horizontal" action="" method="post" style="margin-left:130px"> -->
    <table class="table table-bordered" width="400px">
    	<tbody>
    	<tr>
    		<td width="200px"><code>PNR:</code></td>
    		<td width="200px"><?php echo $pnr ?></td>
    	</tr>
     	<tr>
    		<td><code>Name:</code></td>
    		<td><?php echo $newname ?></td>
    	</tr>
    	<tr>
    		<td><code>Date of Journey:</code></td>
    		<td><?php echo $doj ?></td>
    	</tr>
    	<tr>
    		<td><code>From:</code></td>
    		<td><?php echo $fs ?></td>
    	</tr>
    	<tr>
    		<td><code>To:</code></td>
    		<td><?php echo $ts ?></td>
    	</tr>
    	<tr>
    		<td><code>Train No:</code></td>
    		<td><?php echo $train ?></td>
    	</tr>
    	<tr>
    		<td><code>Class:</code></td>
    		<td><?php if ($class=='sl') {
    			echo "Sleeper";
    		} elseif ($class=='ac') {
    			echo "AC";
    		} ?></td>
    	</tr>
    	<tr>
    		<td><code>Seat No:</code></td>
    		<td><?php echo $seatno ?></td>
    	</tr>
    	<tr>
    		<td><code>Scheduled Arrival:</code></td>
    		<td><?php echo $sa ?></td>
    	</tr>
    	<tr>
    		<td><code>Scheduled Departure:</code></td>
    		<td><?php echo $sd ?></td>
    	</tr>

    	</tbody>
    	<button style="align-self: center;" class="btn btn-primary">Print e-ticket</button>
    </table>
    <!-- </form> -->
    </div>
  </div>
</div>
</div>

<div class="row navbar navbar-fixed-bottom" style="background-color: rgb(19,136,8)">
  <p align="center" style="color: white">
   &copy; All rights reserved @ Prashant Tripathi
 </p>
</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</body>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
<script src="bootstrap/js/bootstrap.js"></script>
</html>
