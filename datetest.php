<?php
session_start();
if (isset($_POST['submit'])) {
  include_once 'dbconfig.php';
  $date=$_POST['date'];
  $query="insert into `timetest` values('$date')";
  $result=$db->exec($query);
  echo "$date rows affected<br>";
  $query="select time from `timetest` where time='$date'";
  foreach ($db->query($query) as $row) {
    $time=$row['time'];
    echo "$time";
  }
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>DateTest</title>
   </head>
   <body>
     <form class="" action="" method="post">
       <input type="time" name="date"><br>
       <input type="submit" name="submit" value="submit">
     </form>
   </body>
 </html>
