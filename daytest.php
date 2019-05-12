<?php
$sd=$_POST['date'];
// echo "$sd"; 
$dt = strtotime($sd);
$day = date("D", $dt);
echo "$day";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>daytest</title>
</head>
<body>
	<form action="" method="post">
		<input type="date" name="date">
		<input type="submit">
	</form>
</body>
</html>