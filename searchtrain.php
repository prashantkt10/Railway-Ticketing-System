<?php
// include 'useraction.php';
session_start();
if (!isset($_SESSION['userid'])) {
   header('Location: home.php');
 }
require_once 'dbconfig.php';
$id=$_SESSION['userid'];
$query="SELECT fullname FROM `users` WHERE username='$id'";
foreach ($db->query($query) AS $row) {
  $name=$row['fullname'];
}

if (isset($_POST['searchbyno'])) {
  $current_date=date("Y-m-d");
  $selected_date=$_POST['date'];
  $no=$_POST['train_no'];
  if ($selected_date>$current_date) {
    $query="SELECT train_no FROM `trains` WHERE train_no='$no'";
    $found=$db->query($query);
    $rows=$found->rowCount();
    if ($rows==1) {
    $query="SELECT * FROM `trains_schedule` WHERE train_no='$no'";
    foreach ($db->query($query) AS $row) {
       $su=$row['sunday'];
       $mo=$row['monday'];
       $tu=$row['tuesday'];
       $we=$row['wednesday'];
       $th=$row['thursday'];
       $fr=$row['friday'];
       $sa=$row['sataurday'];
     }

     $dt=strtotime($selected_date);
     $day=date("D", $dt);
     if ($day=="Sun") {
        if ($su=="Y") {
         $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
        }
      }

      elseif ($day=="Mon") {
         if ($mo=="Y") {
          $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
          }
          else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
         }
       }

       elseif ($day=="Tue") {
          if ($tu=="Y") {
            $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
          }
        }

        elseif ($day=="Wed") {
           if ($we=="Y") {
            $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
           }
         }

         elseif ($day=="Thu") {
            if ($th=="Y") {
              $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
            }
          }

          elseif ($day=="Fri") {
             if ($fr=="Y") {
              $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
             }
           }

           elseif ($day=="Sat") {
              if ($sat=="Y") {
                $_SESSION['train_no']=$no;
         header('Location: showtrain.php');
        }
        else {
          ?>
          <script>alert("Train doesn't run on selected day !");</script>
          <?php
              }
            }
    }
    elseif ($rows==0) {
      ?>
      <script>alert("Train no. invalid !")</script>
      <?php
    }
  }
  elseif ($selected_date<$current_date) {
    ?>
    <script>alert("Wrong date");</script>
    <?php
  }
}

if (isset($_POST['searchbystation'])) {
  $current_date=date("Y-m-d");
  $selected_date=$_POST['date'];
  $source=$_POST['source'];
  $destination=$_POST['destination'];
  if ($selected_date>$current_date) {
    $query="select a.train_no FROM trains_route a, trains_route b where a.stations='$source' AND b.stations='$destination' AND a.stop_no<b.stop_no and a.train_no=b.train_no";

      foreach ($db->query($query) as $row) {
        $trains[]=$row['train_no'];
      }
      $counter=count($trains);

      for ($i=0; $i <$counter ; $i++) {
        $query="SELECT train_no FROM `trains` WHERE train_no='$trains[$i]'";
        $found=$db->query($query);
        $rows=$found->rowCount();
        if ($rows==1) {
        $query="SELECT * FROM `trains_schedule` WHERE train_no='$trains[$i]'";
        foreach ($db->query($query) AS $row) {
           $su=$row['sunday'];
           $mo=$row['monday'];
           $tu=$row['tuesday'];
           $we=$row['wednesday'];
           $th=$row['thursday'];
           $fr=$row['friday'];
           $sa=$row['sataurday'];
         }

         $dt=strtotime($selected_date);
         $day=date("D", $dt);
         if ($day=="Sun") {
            if ($su=="Y") {
             $newtrains[]=$trains[$i];
            }
          }

          elseif ($day=="Mon") {
             if ($mo=="Y") {
              $newtrains[]=$trains[$i];
              }
           }

           elseif ($day=="Tue") {
              if ($tu=="Y") {
              $newtrains[]=$trains[$i];
            }
          }

            elseif ($day=="Wed") {
               if ($we=="Y") {
               $newtrains[]=$trains[$i];
            }
          }

             elseif ($day=="Thu") {
                if ($th=="Y") {
                $newtrains[]=$trains[$i];
            }
          }

              elseif ($day=="Fri") {
                 if ($fr=="Y") {
                 $newtrains[]=$trains[$i];
            }
          }

               elseif ($day=="Sat") {
                  if ($sat=="Y") {
                  $newtrains[]=$trains[$i];
            }
          }
        }
        elseif ($rows==0) {
          ?>
          <script>alert("No trains found on this day !")</script>
          <?php
        }
      }
      // $_SESSION['train_no']=$trains;
      $newcounter=count($newtrains);
      if ($newcounter>0) {
        $_SESSION['date']=$selected_date;
        $_SESSION['train_no']=$newtrains;
        $_SESSION['from']=$source;
        $_SESSION['to']=$destination;
        header('Location:showtrain.php');
      }
      else {
        ?>
        <script>
        alert('No train found on selected date !');
        </script>
        <?php
      }

  }
  elseif ($selected_date<$current_date) {
    ?>
    <script>alert("Wrong date");</script>
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
    <link rel="stylesheet" href="js/sweetalert.css">

		<script src="js/prefixfree.min.js"></script>
    <script src="js/valform.js"></script>
    <script src="js/movetitle.js"></script>
    <script src="js/jquery-1.12.1.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

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
		<div class="col-md-4">
        	<div class="well" align="center">
        	<h3 align="center" class="lead"><u><b>Search Train</b></u></h3>
        		<form action="" method="post">
        		<div class="form-group">
        			<label for="train"><code>Train no:</code></label>
        			<input type="text" name="train_no" class="form-control" style="width: 200px" required value="<?php echo "$no" ?>">
        		</div>
            <div class="form-group">
              <input type="date" required name="date">
            </div>
        			<input type="submit" class="btn btn-success" value="Search" name="searchbyno">
        		</form>
        	</div>
        </div>
        <div class="col-md-5">
          <div class="well" align="center">
          <h3 align="center" class="lead"><u><b>Search and Book</b></u></h3>
            <form action="" method="post">
            <div class="form-group">
              <label for="email"><code>Select source station:</code></label>
              <select class="form-control" style="width: 200px" name="source">
              <?php
              require_once 'dbconfig.php';
              $query="SELECT DISTINCT stations FROM `trains_route`";
              foreach($db->query($query) AS $row) {
                ?>
                <option value="<?php echo $row['stations'] ?>"><?php echo $row['stations'] ?></option>';
                <?php
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="email"><code>Select destination station:</code></label>
              <select class="form-control" style="width: 200px" name="destination">
              <?php
              require_once 'dbconfig.php';
              $query="SELECT DISTINCT stations FROM `trains_route`";
              foreach($db->query($query) AS $row) {
                ?>
                <option value="<?php echo $row['stations'] ?>"><?php echo $row['stations'] ?></option>';
                <?php
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <input type="date" required name="date">
            </div>
              <input type="submit" class="btn btn-success" value="Search" name="searchbystation">
            </form>
          </div>
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
