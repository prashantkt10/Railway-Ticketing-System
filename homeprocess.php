<?php
$salt='loveyoufamily';
require_once "dbconfig.php";

if(isset($_POST['register_btn']))
{
	$rid=test_input($_POST['register_id']);
	$rname=test_input($_POST['register_name']);
	$rpass=test_input($_POST['register_pass']);	$rpass=md5($rpass.$salt);
	$rsq=test_input($_POST['register_sq']);
	$rsqa=test_input($_POST['register_sqa']);
	$bd=$_POST['register_date'];
	$mobile=test_input($_POST['register_mobn']);
	$address=$_POST['register_address'];
	$query="SELECT * from users where username='$rid'";
	$result=$db->query($query);
	$found=$result->rowCount();
	if ($found) {
		?>
		<script>alert('Username already registered, choose a new one!');</script>
		<?php
	}
	else {

	$stmt=$db->prepare("INSERT INTO users (username, fullname, password, sq, sa, birthdate, mobile, address) VALUES (:username, :fullname, :password, :sq, :sa, :birthdate, :mobile, :address)");
	$stmt->bindParam(':username', $rid);
	$stmt->bindParam(':fullname', $rname);
	$stmt->bindParam(':password', $rpass);
	$stmt->bindParam(':sq', $rsq);
	$stmt->bindParam(':sa', $rsqa);
	$stmt->bindParam(':birthdate', $bd);
	$stmt->bindParam(':mobile', $mobile);
	$stmt->bindParam(':address', $address);
	$affected=$stmt->execute();
	if ($affected==1) {
		?>
	
	<script>alert("You have been successfully registered!");</script>
	<?php
	}
}
}

elseif (isset($_POST['login_btn'])) {
	$id=$_POST['login_id'];
	$pass=$_POST['login_pass']; $pass=md5($pass.$salt);
	// $stmt=$db->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
	// $stmt->execute(array(':username'=>$id, ':password'=>$pass));
	// $row=$stmt->fetch(PDO::FETCH_NUM);
	$result=$db->query("SELECT * FROM `users` WHERE username='$id' AND password='$pass'");
	$row=$result->rowCount();
	if ($row==1) {
		$_SESSION['userid']=$id;
		header('Location: welcome.php');
	}
	else
	{
		?>
			<script>alert('Wrong id or password');</script>
		<?php
	}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 ?>