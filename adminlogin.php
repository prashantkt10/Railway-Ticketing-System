<?php
session_start();
if (isset($_SESSION['adminid'])) {
	header('Location: admin.php');
}
require_once 'dbconfig.php';
if (isset($_POST['forgot_btn'])) {
	$id=$_POST['id'];
	$pass=$_POST['pass'];
	$query="SELECT * from `admin` where id='$id' and password='$pass'";
	$action=$db->query($query);
	$rows=$action->rowCount();
	if ($rows==1) {
		$_SESSION['adminid']=$id;
		header('Location: admin.php');
	}
	else {
		?>
		<script>alert('Wrong id or password');</script>
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

 <body>
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
  <li>
</ul>
</div>
</div>

<div class=" container" style="margin-top: 90px">
	<marquee onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="100"><code>Important News: The website is under construction by Indian-Engineers. All the services will be started very soon, thanks for your patience.</code></marquee>
</div>

<div class="container">
	<div class="row well" align="center">
		<h4 class="text-info lead" align="center"><u>Admin Login</u> </h4>
			<form class="form-horizontal" method="post" role="form" action="">
  			<div class="form-group">
    		<label class="control-label">id: </label>
      		<input type="text" class="form-control" id="email" placeholder="username " style="width: 290px" name="id" required>
      	</div>
  	<div class="form-group">
  		<label class="control-label">Password: </label>
  		<input type="password" class="form-control" id="answer" placeholder="answer here" style="width: 290px" name="pass" required>
	</div>
	<div class="form-group">
	<input type="submit" class="btn btn-success" value="Recover" name="forgot_btn">
	</div>
	</form>
	</div>
</div>

<div class="row navbar navbar-fixed-bottom" style="background-color: rgb(19,136,8)">
	<p align="center" style="color: white">
		&copy; All rights reserved @ Prashant Tripathi
	</p>
</div>

 </body>
 </html>
