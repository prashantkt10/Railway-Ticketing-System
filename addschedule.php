<?php
session_start();
if (!isset($_SESSION['adminid'])) {
 header('Location: adminlogin.php');
}
require_once 'dbconfig.php';
if (isset($_POST['addstops'])) {
	$trainno=$_SESSION['trainno'];
	if ($_POST['sunday']=='sunday') {
		$sun='Y';
	}
	else {
		$sun='N';
	}
	if ($_POST['monday']=='monday') {
		$mon='Y';
	}
	else {
		$mon='N';
	}
	if ($_POST['tuesday']=='tuesday') {
		$tue='Y';
	}
	else {
		$tue='N';
	}
	if ($_POST['wednesday']=='wednesday') {
		$wed='Y';
	}
	else {
		$wed='N';
	}
	if ($_POST['thursday']=='thursday') {
		$thu='Y';
	}
	else {
		$thu='N';
	}
	if ($_POST['friday']=='friday') {
		$fri='Y';
	}
	else {
		$fri='N';
	}
	if ($_POST['sataurday']=='sataurday') {
		$sat='Y';
	}
	else {
		$sat='N';
	}

	$query="INSERT into `trains_schedule` values ('$trainno','$sun','$mon','$tue','$wed','$thu','$fri','$sat')";
	$result=$db->exec($query);
	if ($result) {
		header('Refresh:1; url=admin.php');
	}
	else {
		?>
		<script>alert('Could not ad);</script>
		<?php
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
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><span class="glyphicon glyphicon-gift"></span> Tools</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><a href="searchtrain.php">Add Train</a></div>
        <div class="panel-body"><a href="cancelticket.php">Add Seats</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-eye-open"></span> Reports</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><a href="pnrstatus.php">View Users</a></div>
        <div class="panel-body"><a href="pnrstatus.php">Reservations</a></div>
        <div class="panel-body"><a href="pnrstatus.php">Trains</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-eye-open"></span> Settings</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><a href="pnrstatus.php">Logout</a></div>
      </div>
    </div>

    </div>
  </div>

  <div class="col-md-9">
  <?php
  $trainno=$_SESSION['trainno'];
  ?>
    <h4 align="center">Add Schedule for Train No <?php echo $trainno ?></h4>
  <div class="well" align="center">
    <form action="" method="post">
    <div class="form-group">
    	<div class="checkbox">
  <label><input type="checkbox" name="sunday" value="sunday">Sunday</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="monday" value="monday">Monday</label>
</div>
<div class="checkbox disabled">
  <label><input type="checkbox" name="tuesday" value="tuesday">Tuesday</label>
</div>
<div class="checkbox disabled">
  <label><input type="checkbox" name="wednesday" value="wednesday">Wednesday</label>
</div>
<div class="checkbox disabled">
  <label><input type="checkbox" name="thursday" value="thursday">Thursday</label>
</div>
<div class="checkbox disabled">
  <label><input type="checkbox" name="friday" value="friday">Friday</label>
</div>
<div class="checkbox disabled">
  <label><input type="checkbox" name="sataurday" value="sataurday">Sataurday</label>
</div>

    </div>
    <div class="form-group">
      <input type="submit" value="Add Schedule" name="addstops" class="btn btn-success">
    </div>
    </form>
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
