<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Event-plazA</title>
    <!-- Font Awesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/navandform.css">

    <!-- Bootstrap Scripts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--FAVICON-->
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon//favicon-16x16.png">
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
            <a class="nav-link" href="events.php">All Events</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#footer">About Us</a>
          </li>
        </ul>

      </div>
    </nav>


    <div class="helper">
      <div class="icon backtotop" title="Back To Top">
        <a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
      </div><br>
      <div class="icon theme " title="Change Theme">
        <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>
    </div>
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
     <button type="button" class="btn btn-outline-secondary" name="button">
     	<a href="events.php">Go to events page</a><br>
     </button>
		 <button type="button" class="btn btn-outline-secondary" name="button">
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
     <br>

	 	      <!-- Footer -->

	 	      <footer id="footer">
	 	        <div class="copy-rights">
	 	          <div class="foot names">
	 	            This website was created by<br>
	 	            S K Balaji : 1BM19CS134 S Skanda : 1BM19CS137<br>
	 	            Sai Praveen : 1BM19CS138 Saquib : 1BM19CS144 <br>
	 	            for the project work of third semester.
	 	          </div>
	 	          <div class="foot desc">
	 	            The aim of the website is to help colleges,<br>
	 	            student clubs, NGO ... to put up their events <br>
	 	            or activites online. Also, to help students <br>
	 	            participate in these.
	 	          </div>
	 	        </div>
	 	        <div class="container-fluid abtus">
	 	          <i class="fab fa-facebook-f fa-lg" style="color: #00acee ;"></i>
	 	          <i class="fab fa-twitter fa-lg" style="color: #0764b9 ;"></i>
	 	          <i class="fab fa-instagram fa-lg" style="color:#833AB4 ;"></i>
	 	          <i class="fas fa-envelope fa-lg " style="color:#e74646 ;"></i>
	 	          <br>
	 	          <button type="button" class="btn btn-outline-secondary  footbtn">
	 	            <a class="know-more" href="aboutus.php">Know more <i class="fa fa-chevron-right"></i></a>
	 	          </button>
	 	        </div>
	 	      </footer>
	 	      <script src="../javascript/theme.js"></script>
   </body>
 </html>
