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
  <link rel="stylesheet" href="../css/carousel.css">
  <link rel="stylesheet" href="../css/navandform.css">
	<?php add_head(); ?>
</head>

<body>

  <!-- Navbar -->

  <nav id="top" class="navbar navbar-expand-lg navbar-light ">

    <a class="navbar-brand" href="../index.php"><img src="../images/site-logo.png" alt="site-logo" width="100" height="100"></a>

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
			} elseif($type=="student") {
				echo $user_data['student_name'];
			}

			?>
		</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button id="logout" class="nav-link btn btn-outline-danger"><a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>


  <!--carousel-->
  <main>
    <div class="carousel carousel-container">
      <div class="carousel slide" id="main-carousel" data-ride="carousel" data-interval="4000">
        <ol class="carousel-indicators">
          <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#main-carousel" data-slide-to="1"></li>
          <li data-target="#main-carousel" data-slide-to="2"></li>
          <li data-target="#main-carousel" data-slide-to="3"></li>
        </ol><!-- /.carousel-indicators -->

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="BMS" src="../images/cycle.png" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h1></h1>
              <p style="font-size:15px"></p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="Hackathon" src="../images/hackathon carousel.jpg" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h3></h3>
              <p style="font-size:20px"> A hackathon is an event of any duration where people come together to solve problems. Hackathon also have a parallel track for workshops..</p>
            </div>
          </div>
          <div class="carousel-item">
            <img class="Dj Night" src="../images/dj night.jpeg" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h3><I></I></h3>
              <p style="color:white" style="font-size:20px">"...Light And Music Are On My Mind..."</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/photoss.webp" alt="">
            <div class="carousel-caption d-none d-md-block">
              <h3><I></I></h3>
              <p style="font-size:20px">“The best thing about a picture is that it never changes, even when the people in it do...”</p>
            </div>
          </div>
        </div><!-- /.carousel-inner -->

        <a href="#main-carousel" class="carousel-control-prev carousel-controller" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
          <span class="sr-only" aria-hidden="true">Prev</span>
        </a>
        <a href="#main-carousel" class="carousel-control-next carousel-controller" data-slide="next">
          <span class="carousel-control-next-icon"></span>
          <span class="sr-only" aria-hidden="true">Next</span>
        </a>
      </div><!-- /.carousel -->
    </div><!-- /.container -->


    <!-- Event Cards-->
    <div class="container">

      <!-- Nav tabs -->
      <ul class="nav nav-pills justify-content-end" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#upcoming">Upcoming</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#past">Previous</a>
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
									$qry1="select * from events where event_upcoming=1";
									$result = $con->query($qry1);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											display_row($row);
											display_modal($row);
										}
										} else {
										echo "Oops!!! We Don't Have Any Upcoming Events";
										}
								}
								?>

              </ul>
            </section>
          </main>
        </div>
        <div id="past" class="container tab-pane fade"><br>
          <h4>Previous events</h4>
          <main class="wrapper">
            <section class="card-deck" id="card-deck">
							<ul>
								<?php
								if ( !empty($user_data) )
								{
									$qry1="select * from events where event_upcoming=0";
									$result = $con->query($qry1);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											display_row($row);
											display_modal($row);
										}
										} else {
										echo "Oops!!! We Don't Have Any Upcoming Events";
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
