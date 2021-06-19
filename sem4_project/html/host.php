<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//something was posted
			$name = $_POST['event-name'];
			$desc = $_POST['event-desc'];
			$venue = $_POST['venue'];
			$date = $_POST['date'];
			$time = $_POST['time'];
			$host = $user_data['host_id'];

			//image
			if (isset($_POST['submit']) && isset($_FILES['poster'])) {
				$img_name = $_FILES['poster']['name'];
				$img_size = $_FILES['poster']['size'];
				$tmp_name = $_FILES['poster']['tmp_name'];
				$error = $_FILES['poster']['error'];
				if ($error === 0) {
					if ($img_size > 2500000) {
						$em = "Sorry, your file is too large.";
						echo "<script>alert('$em')</script>";
				}else {
					$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
					$img_ex_lc = strtolower($img_ex);
					$allowed_exs = array("jpg", "jpeg", "png");
					if (in_array($img_ex_lc, $allowed_exs)) {
						$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
						$img_upload_path = '../images/uploads/'.$new_img_name;
						move_uploaded_file($tmp_name, $img_upload_path);
					}else {
						$em = "You cannot upload files of this type";
								echo "<script>alert('You cannot upload files of this type')</script>";
						}
					}
				}
			}
			if(!empty($name) && !empty($desc) && !empty($venue) && !empty($date) && !empty($time) && !empty($host) && !empty($img_upload_path))
			{
				  $query = "insert into eos.events ( event_name, event_desc, event_venue, date,time,hosted_by,event_img) values ('$name','$desc','$venue','$date','$time','$host','$img_upload_path')";
					mysqli_query($con, $query);
					header("Location: host.php");
					die;
			}
			else {
				echo "enter valid data";
			}
		}


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
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/event-card.css">
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

<body id="host">
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


  <div class="helper">
    <div class="icon backtotop" title="Back To Top">
      <a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
    </div><br>
    <div class="icon theme " title="Change Theme">
      <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>

  </div>
  <!--user name ,logout-->
  <nav id="user-data" class="navbar navbar-expand-sm sticky-top">
		<a href="host.php">
			<i class="fas fa-users fa-2x"></i><span><?php echo $user_data['host_name']; ?></span>
		</a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button id="logout" class="nav-link btn btn-outline-danger "><a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>
  <!--bootstrap navs for user details-->
  <div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-pills justify-content-end" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upcoming">Upcoming </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#past">Previous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#create">Create</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="upcoming" class="container tab-pane active"><br>
        <h3>Your Upcoming Events</h3>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
							<?php
							if ( !empty($user_data) )
							{
								$id=$user_data['host_id'];
								$qry1="select * from events where hosted_by='$id' and event_upcoming=1";
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
									echo "Oops!!! You Don't Have Any Upcoming Events";
									}
							}
							?>
            </ul>
          </section>
        </main>

      </div>
      <div id="past" class="container tab-pane fade"><br>
        <h3>Completed Events</h3>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
							<?php
							if ( !empty($user_data) )
							{
								$id=$user_data['host_id'];
								$qry1="select * from events where hosted_by='$id' and event_upcoming=0";
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
      <div id="create" class="container tab-pane fade"><br>
        <form class="" method="post" enctype="multipart/form-data">
          <h2>Create a New Event</h2><br>
          <label for="event-name">Event name</label><br>
          <input type="text" required name="event-name" id="event-name"><br>
          <label for="event-desc">Event description</label><br>
          <input type="text" required name="event-desc" id="event-desc" maxlength="70"><br>
          <label for="date">Date</label><br>
          <input type="date" required name="date" id="date"> <br>
          <label for="time">Time</label><br>
					<input type="time" required name="time" id="time"> <br>
          <label for="venue">Event venue</label><br>
          <input type="text" required name="venue" id="venue" maxlength="50"><br>
          <label for="poster">Event poster (or) invitation</label><br>
          <input type="file"required name="poster"><br>
          <input type="submit" name="submit" value="Create" ><br>
        </form>

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
