<?php
session_start();
if (!isset($_SESSION['adminid'])) {
 header('Location: adminlogin.php');
}
require_once 'dbconfig.php';
if (isset($_POST['addstops'])) {
  $trainno=$_POST['trainno'];
  $seats=$_POST['seats'];
  $date=$_POST['date'];
  if ($_POST['seat_type']=='sl') {
    	$query="SELECT * from `sl_seats` where train_no='$trainno'";
    	$action=$db->query($query);
    	$result=$action->rowCount();
    	if ($result==1) {
    		?>
    		<script>alert('Seats are already added !');</script>
    		<?php
    	}
    	else {
    		$query="INSERT into `sl_seats` values ('$trainno','$seats','$seats','$date')";
    		$result=$db->exec($query);
    		if ($result==1) {
    			?>
    			<script>alert("Seats added");</script>
    			<?php
    		}
    	}
    }
    elseif ($_POST['seat_type']=='ac') {
    	$query="SELECT * from `ac_seats` where train_no='$trainno'";
    	$action=$db->query($query);
    	$result=$action->rowCount();
    	if ($result==1) {
    		?>
    		<script>alert('Seats are already added !');</script>
    		<?php
    	}
    	else {
    		$query="INSERT into `ac_seats` values ('$trainno','$seats','$seats','$date')";
    		$result=$db->exec($query);
    		if ($result==1) {
    			?>
    			<script>alert("Seats added");</script>
    			<?php
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
        <div class="panel-body"><a href="addtrain.php">Add Train</a></div>
        <div class="panel-body"><a href="addseats.php">Add Seats</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><span class="glyphicon glyphicon-eye-open"></span> Reports</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><a href="viewusers.php">View Users</a></div>
        <div class="panel-body"><a href="viewreservations.php">Reservations</a></div>
        <div class="panel-body"><a href="viewtrains.php">Trains</a></div>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><span class="glyphicon glyphicon-eye-open"></span> Settings</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"><a href="adminlogout.php">Logout</a></div>
      </div>
    </div>

    </div>
  </div>

  <div class="col-md-9">
    <h4 align="center">Add Seats</h4>
  <div class="well" align="center">
    <form action="" method="post">
    <div class="form-group">
  <label for="sel1">Select Train:</label>
  <select class="form-control" name="trainno" id="sel1" style="width: 400px">
    <?php
       $query="SELECT train_no FROM `trains`";
       foreach($db->query($query) AS $row) {
     ?>
        <option value="<?php echo $row['train_no'] ?>"><?php echo $row['train_no'] ?></option>';
      <?php
        }
      ?>
  </select>
    </div>
    <div class="form-group">
  <label for="sel1">Seat Type:</label>
  <select class="form-control" id="sel1" name="seat_type" style="width: 400px">
    <option value="ac">AC</option>
    <option value="sl">Sleeper</option>
  </select>
    </div>
    <div class="form-group">
    	<label for="seat" class="control-label">Enter Seats</label>
    	<input type="number" name="seats" class="form-control" style="width: 400px">
    </div>
    <div class="form-group">
    	<label for="date" class="control-label">Select Date</label>
    	<input type="date" name="date" class="form-control" style="width: 400px">
    </div>
    <div class="form-group">
      <input type="submit" value="Add Seats" name="addstops" class="btn btn-success">
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
