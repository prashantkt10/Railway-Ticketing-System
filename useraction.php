<?php
$error="sss";
require_once 'dbconfig.php';
if (isset($_POST['btn_no'])) {
	$current_date=date("Y-m-d");
	$selected_date=$_POST['date'];
	if ($selected_date>=$current_date) {

	}
	elseif ($selected_date<$current_date) {
		$error="Wrong date selection";
		header("Location: searchtrain.php");
	}
}
?>
