<?php
	include("connection.php");
	include("functions.php");
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event-plazA</title>
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/navandform.css">
    <?php add_head(); ?>
  </head>
  <body>
    <nav id="top" class="navbar navbar-expand-lg navbar-light ">

      <a class="navbar-brand" href="../index.php"><img src="../images/site-logo.png" id="logo" alt="site-logo"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Toggler">
        <p class="navbar-toggler-icon fas fa-ellipsis-v" style="color:#e74646;"></p>
      </button>

      <div class="collapse navbar-collapse" id="Toggler">
        <p></p>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#footer">About Us</a>
          </li>
        </ul>

      </div>
    </nav>
<!--Add participant-->
<?php
session_start();
	$user_data = check_login($con);
  $eid=$_POST['event_id'];
  $upcoming=$_POST['status'];
    if (isset($user_data['host_id'])) {
      $type="host";
      echo "<script>alert('only students can register to events')</script>";
    }elseif ($upcoming==1) {
      if (isset($user_data['student_id'])) {

	      $type="student";
	      $sid=$user_data['student_id'];
	      $qry2="select * from participants where event_id = '$eid' and student_id= '$sid' ";
	      $qry3="insert into participants(event_id, student_id) values ('$eid','$sid')";
	      $res1 = $con->query($qry2);
	      if ($res1->num_rows > 0) {
	        echo "<script>alert('already registered to event')</script>";
	      }else {
	      	mysqli_query($con, $qry3);
	      	$res2 = $con->query($qry2);
	      	if ($res2->num_rows > 0) {
	        	echo "<script>alert('registered to event successfully')</script>";
	      	}
				}

			}
		}elseif ($upcoming==0) {
	      echo "<script>alert('Event is over cannot register now')</script>";
	    }else {
        echo "<script>alert('registeration to event failed')</script>";
      }
 ?>
 <style >
 	.btns{
 		display: flex;
		height: 60vh;
		justify-content: center;
		align-items: center;

 	}
	button{
		background: var(--shade2);
		opacity: 0.8;
		padding: 15px;
		margin: 15px;
		color: var(--text);
		border-radius: 25px;
		text-align: center;
		border-style: none;margin-left: 15px;margin-bottom: 20px;
		height: 50px;
	}
	button:hover{
		background: var(--shade4);
	}
 </style>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
		 <div class="btns">
			 <button type="button"  name="button">
       	<a href="events.php">Go to events page</a><br>
       </button>
  		 <button type="button"  name="button">
  			 <a href="<?php
            if (isset($user_data['host_id'])) {
                $type="host";}
            elseif (isset($user_data['student_id'])) {
                $type="student";}
            echo $type;
          ?>.php">
           Go to dashboard
         </a>
  		 </button>
		 </div>
     <br>
     <?php helper(); ?>
      <!-- Footer -->
      <footer id="footer">
        <?php footer(); ?>
      </footer>
	 	 <script src="../javascript/theme.js"></script>
   </body>
 </html>
