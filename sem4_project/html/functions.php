<?php

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
