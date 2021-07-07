<?php
session_start();

	include("connection.php");
	include("functions.php");
  $user_data = check_login($con);

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event-plazA</title>
  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/event-card.css">
  <link rel="stylesheet" href="../css/navandform.css">
	<?php add_head(); ?>
</head>

<body style="background-image:url(../images/cbg.png);background-repeat:no-repeat;background-attachment:fixed;background-size:cover;">
  <!-- Navbar -->

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



  <!--user name ,logout-->
  <nav id="user-data" class="navbar navbar-expand-sm sticky-top">
    <a id="nav-username" class="navbar-brand" href=""><i class="fas fa-users fa-2x"></i><?php echo $user_data['student_name']; ?></a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button id="logout" class="nav-link btn btn-outline-danger"><a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>

  <!--bootstrap navs for user details-->

  <div class="container">

    <!-- Nav tabs -->
    <ul class="nav nav-pills justify-content-end" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upcoming">Upcoming</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#past">Participated</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="upcoming" class="container tab-pane active"><br>
        <h4>Upcoming events</h4>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
							<?php
							if ( !empty($user_data) )
							{
								$id=$user_data['student_id'];
								$qry1="select * from events where event_upcoming=1 and event_id in (select event_id from participants where student_id = '$id' )";
								$result = $con->query($qry1);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										display_row($row);
										display_modal($row);
									}
									} else {
									echo "C'mon, go and register to an event , don't stay empty.....  ";
									}
							}
							?>
            </ul>
          </section>
        </main>

      </div>
      <div id="past" class="container tab-pane fade"><br>
        <h4>You participated in these events</h4>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>

								<?php
								if ( !empty($user_data) )
								{
									$id=$user_data['student_id'];
									$qry1="select * from events where event_upcoming=0 and event_id in (select event_id from participants where student_id = '$id' )";
									$result = $con->query($qry1);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											display_row($row);
											display_modal($row);
										}
										} else {
										echo "You have not participated in events";
										}
								}
								?>
            </ul>
          </section>
        </main>

      </div>
    </div>
  </div>


	<?php helper(); ?>
  <!-- Footer -->
  <footer id="footer">
    <?php footer(); ?>
  </footer>
	 <script src="../javascript/theme.js"></script>

</body>

</html>
