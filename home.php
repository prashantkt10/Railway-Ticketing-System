<?php
session_start();
if (isset($_SESSION['userid'])) {
   header('Location: welcome.php');
 } 
include 'homeprocess.php';
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
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="js/sweetalert.css">
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
  <li>
</ul>
				</div>
				</div>
				<div class=" container" style="margin-top: 90px">
					<marquee onmouseover="this.stop();" onmouseout="this.start();" scrolldelay="100"><code>Important News: The website is under construction by Indian-Engineers. All the services will be started very soon, thanks for your patience.</code></marquee>
				</div>
				<div class="container">
				<div class="row well" style=" margin-top: 0px; opacity: 0.9">
					<div class="col-md-5 well" style="background-color: white">
					<h4 class="text-info lead" style="margin-left: 190px"><u>Login Here</u> </h4>
						<form class="form-horizontal" method="post" role="form" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label class="control-label col-sm-2 col-sm-offset-1" for="email">Username: </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="email" placeholder="username " style="width: 290px" name="login_id" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2 col-sm-offset-1" for="pwd">Password: </label>
    <div class="col-sm-9"> 
      <input type="password" class="form-control" placeholder="password " style="width: 290px" name="login_pass" required>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-9">
      <div class="checkbox">
        <label><input type="checkbox">Remember Me</label>
      </div>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-2">
      <input type="submit" class="btn btn-success" value="Login" name="login_btn">
    </div>
    <div class=" col-sm-2 ">
      <input type="reset" class="btn btn-warning" value="Clear">
    </div>
    <div class=" col-sm-2">
      <a href="forgotpass.php"><input type="button" class="btn btn-info" value="Recover Password" name="forgot_btn"></a>
    </div>

  </div>
</form>
</div>

<div class="col-md-6 col-md-offset-1 well" style="background-color: white">
	<h4 class="text-info lead" style="margin-left: 190px"><u>Register Here</u> </h4>
	<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label class="control-label col-sm-3" for="email">Username: </label>
    <div class="col-sm-8" id="idindicator">
      <input type="text" class="form-control" id="username" placeholder="ex: john" style="width: 290px" name="register_id" required>
      <span id="user-result"></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="name">Full Name: </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="name" placeholder="Full Name" style="width: 290px" name="register_name" required>
      <span id="name-result"></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="pwd">Password: </label>
    <div class="col-sm-9"> 
      <input type="password" class="form-control" id="pwd" placeholder="abcd******" style="width: 290px" name="register_pass" required>
       <span id="pwd-result"></span>
    </div>
  </div>
 <div class="form-group">
      <label for="sel1" class="control-label col-sm-3">Security Question: </label>
      <div class="col-sm-9">
      <select class="form-control" id="sel1" style="width: 290px" name="register_sq">
        <option value="birth_place">Your BirthPlace</option>
        <option value="first_school">First School</option>
        <option value="mbirth_place">Mother's BirthPlace</option>
        <option value="fbirth_place">Father's BirthPlace</option>
      </select>
      </div>
      </div>
  <div class="form-group">
  	<label class="control-label col-sm-3">Answer: </label>
  	<div class="col-sm-9">
  		<input type="text" class="form-control" id="answer" placeholder="answer here" style="width: 290px" name="register_sqa" required>
      <span id="answer-result"></span>
  	</div>
  </div>
  <div class="form-group">
  	<label class="control-label col-sm-3">Birth Date</label>
  	<div class="col-sm-9">
  		<input type="date" class="form-control" id="date" style="width: 290px" name="register_date" required>
      <span id="date-result"></span>
  	</div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="name">Mobile No.:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="mobile" placeholder="10 digits no." style="width: 290px" maxlength="10" name="register_mobn" required>
      <span id="mobile-result"></span>
    </div>
  </div>
  <div class="form-group">
  <label for="address" class="control-label col-sm-3">Address</label>
  <div class="col-sm-9">
  <textarea class="form-control" rows="5" id="address" style="width: 290px" name="register_address" required></textarea>
  <span id="address-result"></span>
  </div>
</div>
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-2">
      <input type="submit" class="btn btn-success reg" value="Register" id="login-submit" name="register_btn" id="submit_btn">
    </div>
    <div class="col-sm-offset-3 col-sm-3">
      <input type="reset" class="btn btn-warning" value="Clear" id="reset_btn">
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

<script type="text/javascript">
$(document).ready(function() {
    var x_timer;    
    $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        // if (user_name.length>=4) {
        x_timer = setTimeout(function(){
          // if (user_name.length>=4) { 
            check_username_ajax(user_name);     
        }, 200);
    }); 

function check_username_ajax(username){
    $("#user-result").html('<img src="ajax-loading.gif" >');
    if (username.length>=4) {
    $.post('check.php', {'username':username}, function(data) {
      $("#user-result").html(data); 
            
      
    });}
    else {
      
      $("#user-result").html('<font color="red" class="glyphicon glyphicon-hand-right">' +' At least 4 letters</font>');
      
    }
}
});
</script>

<script type=text/javascript>
  $(document).ready(function() {
    $("#name").change(function() {
      var usr=$("#name").val();
      if (usr.length>=2) {
        if ( $(this).val().match('[a-z A-Z]{2,16}$') ) {
        // alert( "Valid name" );
        $("#name-result").html('<font color="green" class="glyphicon glyphicon-thumbs-up">'+' Valid Name</font>');
    } else {
        // alert("That's not a name");
        $("#name-result").html('<font color="red" class="glyphicon glyphicon-thumbs-down">'+' Invalid Name</font>');
    }
      }
      else {
        $("#name-result").html('<font color="red" class="glyphicon glyphicon-hand-right">' + ' At least 2 letters</font>');
      }
    });
  });
</script>


<script type=text/javascript>
  $(document).ready(function() {
    $("#pwd").change(function() {
      var usr=$("#pwd").val();
      if (usr.length>=4) {
        if ( $(this).val().match('^[0-9a-zA-Z]{4,20}$') ) {
        // alert( "Valid name" );
        $("#pwd-result").html('<font color="green" class="glyphicon glyphicon-thumbs-up">'+' Secure Password</font>');
    } else {
        // alert("That's not a name");
        $("#pwd-result").html('<font color="red" class="glyphicon glyphicon-thumbs-down">'+' Unsecure Password</font>');
    }
      }
      else {
        $("#pwd-result").html('<font color="red" class="glyphicon glyphicon-hand-right">' + ' At least 4 l or d.</font>');
      }
    });
  });
</script>

<script type=text/javascript>
  $(document).ready(function() {
    $("#answer").change(function() {
      var usr=$("#answer").val();
      if (usr.length>=3) {
        if ( $(this).val().match('^[a-zA-Z]{3,20}$') ) {
        // alert( "Valid name" );
        $("#answer-result").html('<font color="green" class="glyphicon glyphicon-thumbs-up">'+' Acceptable answer</font>');
    } else {
        // alert("That's not a name");
        $("#answer-result").html('<font color="red" class="glyphicon glyphicon-thumbs-down">'+' Unaccepted answer</font>');
    }
      }
      else {
        $("#answer-result").html('<font color="red" class="glyphicon glyphicon-hand-right">' + ' At least 3 letters</font>');
      }
    });
  });
</script>

<script type=text/javascript>
  $(document).ready(function() {
    $("#date").change(function() {
      if ($('#date[document_type]').val() != ''){
        $("#date-result").html('<font color="green" class="glyphicon glyphicon-thumbs-up">'+' Valid BirthDate</font>');
      }
    });
  });
</script>

<script type=text/javascript>
  $(document).ready(function() {
    $("#mobile").change(function() {
      var usr=$("#mobile").val();
      if (usr.length==10) {
        if ( $(this).val().match('[0-9]{10,11}$') ) {
        // alert( "Valid name" );
        $("#mobile-result").html('<font color="green" class="glyphicon glyphicon-thumbs-up">'+' Valid No.</font>');
    } else {
        // alert("That's not a name");
        $("#mobile-result").html('<font color="red" class="glyphicon glyphicon-thumbs-down">'+' Invalid No.</font>');
    }
      }
      else {
        $("#mobile-result").html('<font color="red" class="glyphicon glyphicon-hand-right">' + ' At least 10 digits</font>');
      }
    });
  });
</script>


			</body>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
		<script src="bootstrap/js/bootstrap.js"></script>

		
	
</html>
