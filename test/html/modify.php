<?php
session_start();

	include("connection.php");
	include("functions.php");
	$ueid=$_POST['ueid'];
		$user_data = check_login($con);
		if($_SERVER['REQUEST_METHOD'] == "POST"&&isset($_POST['submitforu']))
		{
			//something was posted
				$name = $_POST['event-name'];
				$desc = $_POST['event-desc'];
				$venue = $_POST['venue'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				$host = $user_data['host_id'];

			//image
			if (isset($_POST['submitforu']) && isset($_FILES['poster'])) {
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
					$query = "update eos.events set event_name='$name',event_desc='$desc',event_venue='$venue',date='$date',time='$time',event_img='$img_upload_path' where event_id='$ueid'";
					mysqli_query($con, $query);
					echo "<a onClick=\"javascript: return confirm('Please confirm to update data');\" href='host.php'>Click here to confirm</a>";
					die;
			}
			else {
				echo "enter valid data";
			}
		}
		if($_SERVER['REQUEST_METHOD'] == "POST"&&isset($_POST['delete']))
		{
			$query="delete from eos.events where event_id=$ueid";
			mysqli_query($con, $query);
			echo "<a onClick=\"javascript: return confirm('Please confirm deletion');\" href='host.php'>Click here to confirm</a>";
			die;
		}
?>
<style >
 .btns{
   display: flex;
   height: 20vh;
   justify-content: center;
   align-items: center;

 }
 .btns>button, .container>button{
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
    <div class="btns">
      <h3>Cancel the event</h3>
      <form class="" action="modify.php" method="post" >
				<input type="hidden" name="ueid" value="<?php echo $ueid;?>">
        <input type="hidden" name="delete" value="yes">
        <input type="submit" value="Cancel event" id="regbtn" style="background: var(--shade2);opacity: 0.8;color: var(--text);border-radius: 20px;text-align: center;border-style: none;margin-left: 15px;margin-bottom: 20px;height: 40px; float: right;" >
      </form>
    </div>

<div class="container">
  <h2 style="text-align:center;">Modify the event</h2>
  <p style="text-align:center;">Click the button to modify the event.</p>
  <button style="text-align:center;"type="button" class="btn" data-toggle="collapse" data-target="#demo">Modify</button>
  <div id="demo" class="collapse">
		<div class="" id="create">
			<form class="" method="post" enctype="multipart/form-data">
				<h4>Enter The Updated Event Details</h4><br>
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
				<input type="hidden" name="ueid" value="<?php echo $ueid;?>">
				<input type="submit" name="submitforu" value="Update" ><br>

			</form>
		</div>
  </div>
</div>
    <div class="btns">
      <button type="button"  name="button">
       <a href="events.php">Go to events page</a><br>
      </button>
      <button type="button"  name="button">
        <a href="host.php">Go to dashboard</a>
      </button>
    </div>
  <?php helper(); ?>
	<!-- Footer -->
	<footer id="footer">
		<?php footer(); ?>
	</footer>
  <script src="../javascript/theme.js"></script>

</body>

</html>
