<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
?>
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
    <!--user name ,logout-->
  	<?php
  	if (isset($user_data['host_id'])) {
  		$type="host";
  	}
  	elseif (isset($user_data['student_id'])) {
  		$type="student";
  	}
  	 ?>
    <nav id="user-data" class="navbar navbar-expand-sm sticky-top">
      <a id="nav-username" class="navbar-brand" href="<?php echo $type; ?>.php">
  			<?php
  			if ($type=="host") {
  				echo $user_data['host_name'];
          $uid=$user_data['host_name'];
  			} elseif($type=="student") {
  				echo $user_data['student_name'];
          $uid=$user_data['student_name'];
          $sid=$user_data['student_id'];
  			}

  			?>
  		</a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <button id="logout" class="nav-link btn btn-outline-danger"><a href="logout.php">Logout</a></button>
        </li>
      </ul>
    </nav>

    <?php
    /*event information*/
    $eid=$_POST['event_id'];
    if (!empty($eid) )
    {
      $qry1="select * from events where event_id=$eid";
      $result = $con->query($qry1);
      if ($result -> num_rows > 0) {
        $row = $result->fetch_assoc();
    ?>

      <figure>
        <img src="<?php echo $row['event_img'];?>" alt="<?php echo $row['event_name']; ?>">
        <figcaption>
          <h3> <?php echo $row['event_name']; ?> </h3>
        </figcaption>
      </figure>
      <p><?php echo $row['event_desc']; ?></p>
      <div class="quick-info">
        <ul>
          <li>Time: <?php echo $row['time']; ?> </li>
          <li>Date: <?php echo $row['date']; ?> </li>
          <li>Venue: <?php echo $row['event_venue']; ?> </li>
        </ul>
      </div>
    <?php
        }
          else {
            echo "no such event found on database";
          }
    }
    ?>
<!--event participants -->
<?php
$eid=$_POST['event_id'];
if (!empty($eid) )
{
  $qry1="select student_name from student where student_id in(select student_id from participants where event_id=$eid) ";
  $result = $con->query($qry1);
  if ($result->num_rows > 0) {
    ?>
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th scope="col">Sl. No.</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
    <?php
    $count =1;
    while ($row = $result->fetch_assoc()) {
      ?>

        <tr>
          <th scope="row"><?php echo $count; ?></th>
          <th scope="row"><?php echo $row['student_name'] ?></th>
        </tr>
      <?php
      $count+=1;
    ?>
      </tbody>
      </table>
    <?php
    }
  }
      else {
        echo "no participants found on database";
      }
}
?>
<p>register to the event  : </p>
<form class="" action="reg.php" method="post">
  <input type="hidden" name="event_id" value="<?php echo $eid;?>">
  <input type="hidden" name="status" value="<?php echo $row['event_upcoming'];?>">
  <input class="btn btn-small btn-outline-dark " type="submit" value="Register" >
</form>

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
