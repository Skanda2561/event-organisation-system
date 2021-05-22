<!--Add participant-->
<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
  $eid=$_POST['event_id'];
  $upcoming=$_POST['status'];
    if (isset($user_data['host_id'])) {
      $type="host";
      echo "<script>alert('only students can register to events')</script>";
    }elseif ($upcoming==0) {
      echo "<script>alert('Event is over cannot register now')</script>";
    }elseif (isset($user_data['student_id'])) {
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
      }else {
        echo "<script>alert('registeration to event failed')</script>";
      }
    }
    }
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href="events.php">Go to events page</a><br>
     <a href="<?php
                if (isset($user_data['host_id'])) {
                    $type="host";}
                elseif (isset($user_data['student_id'])) {
                    $type="student";}
                echo $type;
              ?>.php">
       Go to dashboard
     </a><br>
   </body>
 </html>
