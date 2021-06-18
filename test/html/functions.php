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

function display_modal($row)
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
							<img src="<?php echo $row['event_img']; ?>" style="object-fit:cover;" alt="<?php echo $row['event_name']; ?>">
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
					  <input type="hidden" name="event_id" value="<?php echo $eid;?>">
					  <input type="hidden" name="status" value="<?php echo $row['event_upcoming'];?>">
					  <input class="btn btn-secondary " type="submit" value="Register" id="regbtn"style="background: rgba(125, 234, 245, 0.5);color: var(--text);border-radius: 20px;text-align: center;border-style: none;margin-left: 15px;margin-bottom: 20px;height: 40px; float: right;" >
					</form>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
