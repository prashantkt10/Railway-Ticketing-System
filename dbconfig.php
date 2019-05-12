<?php 
try {
$db=new PDO('mysql:host=localhost;dbname=railway','root','pk.024680');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOException $e) {
echo $e->getMessage();
}
$con=null;

 ?>
