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
										display_row_host($row);
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

	<?php helper(); ?>
	<!-- Footer -->
	<footer id="footer">
		<?php footer(); ?>
	</footer>
  <script src="../javascript/theme.js"></script>

</body>

</html>
