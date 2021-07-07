<?php
include("connection.php");
function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
    $type=$_SESSION['user_type'];
    if ($type=="student") {
      $query = "select * from eos.student where student_id = '$id' limit 1";
    } elseif ($type=="host") {
      $query = "select * from eos.host where host_id = '$id' limit 1";
    }
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//redirect to login
  else {
    echo '<script>alert("Please login to make complete use of the website")</script>';
    header("Location: signin.php");
  }

	die;

}

function display_modal($row , $cut=0)
{ 	include("connection.php");
?>
	<div class="modal fade" id="<?php echo $row['event_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="<?php echo $row['event_id']; ?>"><b><?php echo $row['event_name']; ?></b></h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-2">
							<img src="<?php echo substr($row['event_img'],$cut); ?>" style="object-fit:cover;" alt="<?php echo $row['event_name']; ?>">
						</div>
						<div class="col-2">
							<p style="font-size: 0.8rem;">
							<?php echo $row['event_desc']; ?>
							</p>
						</div>
					</div>
					<?php
					$eid=$row['event_id'];
						$qry1="select student_name from student where student_id in(select student_id from participants where event_id=$eid) ";
						$rest = mysqli_query($con,$qry1);
						if ($rest->num_rows > 0) {
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
							while ($rowt = $rest->fetch_assoc()) {
								?>
									<tr>
										<td scope="row"><?php echo $count; ?></td>
										<td scope="row"><?php echo $rowt['student_name'] ?></td>
									</tr>
								<?php
								$count+=1;
							 } ?>
								</tbody>
								</table>
							<?php
						}
						else {
									echo "no participants found on database";
						}
					?>
					<div class="row">
						<div class="col-3">
							<b>Time:</b> <br> <?php echo $row['time']; ?>
						</div>
						<div class="col-3">
							<b>Date:</b> <br> <?php echo $row['date']; ?>
						</div>
						<div class="col-3">
							<b>Venue:</b> <br> <?php echo $row['event_venue']; ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<form class="" action="reg.php" method="post" style="display:<?php if($row['event_upcoming']==1) echo 'inline-block';else echo 'none'; ?>">
					  <input type="hidden" name="event_id" value="<?php echo $row['event_id'];?>">
					  <input type="hidden" name="status" value="<?php echo $row['event_upcoming'];?>">
					  <input class="btn btn-secondary " type="submit" onclick="return confirm('Are you sure to register to the event?')" value="Register" id="regbtn" style="background: var(--shade2);opacity: 0.8;color: var(--text);border-radius: 20px;text-align: center;border-style: none;margin-left: 15px;margin-bottom: 20px;height: 40px; float: right;" >
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<?php
function display_row($row)
{
	?>
	<li>
		<figure>
			<img src="<?php echo $row['event_img'];?>" alt="<?php echo $row['event_name']; ?>">
			<figcaption>
				<h3> <?php echo $row['event_name']; ?> </h3>
			</figcaption>
		</figure>
		<p><?php echo $row['event_desc']; ?></p><br>
		<button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" style="position:absolute;right:0.3rem; bottom:0.1rem;"data-target="#<?php echo $row['event_id']; ?>">See more</button>
	</li>

	<?php

}
function display_row_host($row)
{
	?>
	<li>
		<figure>
			<img src="<?php echo $row['event_img'];?>" alt="<?php echo $row['event_name']; ?>">
			<figcaption>
				<h3> <?php echo $row['event_name']; ?> </h3>
			</figcaption>
		</figure>
		<p><?php echo $row['event_desc']; ?></p><br>
		<button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" style="position:absolute;right:0.3rem; bottom:0.1rem;"data-target="#<?php echo $row['event_id']; ?>">See more</button>
		<form class="" action="modify.php" method="post" style="display:<?php if($row['event_upcoming']==1) echo 'inline-block';else echo 'none'; ?>">
			<input type="hidden" name="ueid" value="<?php echo $row['event_id'];?>">
			<input class="btn btn-secondary " type="submit" value="Modify" id="regbtn" style="background: var(--shade2);opacity: 0.8;color: var(--text);border-radius: 20px;text-align: center;border-style: none;margin-left: 15px;margin-bottom: 20px;height: 40px; float: right;" >
		</form>
	</li>

	<?php

}

	?>

 <?php
function add_head()
{
	?>
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
	<!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.10.0/js/all.js"></script>
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<?php
}
  ?>
<?php
function footer($cut=0)
{
	?>
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
	<?php
}
function helper()
{
	?>
	<div class="helper">
		<div class="icon backtotop" title="Back To Top">
			<a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
		</div><br>
		<div class="icon theme " title="Change Theme">
			<button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
		</div>
	</div>
	<?php
} ?>
