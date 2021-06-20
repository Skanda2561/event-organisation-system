<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['uname'];
    $user_email = $_POST['mail'];
    $user_type = $_POST['usertype'];
		$password = $_POST['crpword'];

		if(!empty($user_name) && !empty($user_type) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			if ($user_type=="Host") {
        $query = "insert into eos.host (host_id,host_name,password) values ('$user_email','$user_name','$password')";
      } elseif ($user_type=="Student") {
        $query = "insert into eos.student (student_id,student_name,password) values ('$user_email','$user_name','$password')";
      }
			mysqli_query($con, $query);

			header("Location: signin.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
  <link rel="stylesheet" href="../css/signup.css">
	<?php add_head(); ?>
</head>

<body>
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

  <!--SIGNUP SECTION-->
  <section class="signup">
    <div class="container">
      <div class="imgbox"><img src="../images/signup.jpg" alt="img"></div>
      <div class="formbox">
        <form id="myform" method="post" >
          <h2>Sign Up</h2>
          <label for="uname">Username</label><br>
          <input type="text" required name="uname" id="uname" placeholder="Username"><br>
          <label for="usertype">Type of user</label><br>
          <select name="usertype" id="usertype" style="color:#5c5c5c;">
            <option>Select User Type</option>
            <option>Student</option>
            <option>Host</option>
          </select>
          <br>
          <label for="mail">E-mail</label><br>
          <input type="email" required name="mail" id="mail" placeholder="User e-mail"><br>
          <label for="crpword">Create Password</label> <br>
          <input type="password" required name="crpword" id="crpword" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
          <label for="copword">Confirm Password</label><br>
          <input type="password" required name="copword" id="copword" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"><br>
          <input class="submit" id="submit" type="submit" value="Submit" ><br>
        </form>
      </div>
    </div>
  </section>
  <div class="user-prompt">
    <p class="signin-prompt">Already have an account ? <a href="signin.php"> Sign in </a> </p><br>
  </div>

	<?php helper(); ?>
  <!-- Footer -->
  <footer id="footer">
    <?php footer(); ?>
  </footer>

  <!--javascrip-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../javascript/signin.js"></script>
  <script src="../javascript/theme.js"></script>
</body>

</html>
