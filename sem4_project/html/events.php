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
  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/event-card.css">
  <link rel="stylesheet" href="../css/carousel.css">
  <link rel="stylesheet" href="../css/navandform.css">


  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
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

  <div class="helper">
    <div class="icon backtotop" title="Back To Top">
      <a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
    </div>
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
											?>
											<li>
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
												<button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#<?php echo $row['event_id']; ?>">See more</button>
											</li>

											<?php
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
											?>
											<li>
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
												<button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#<?php echo $row['event_id']; ?>">See more</button>
											</li>
											<?php
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
