<?php

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_id = $_POST['usermail'];
		$password = $_POST['pword'];
    $user_type = $_POST['usertype'];

		if(!empty($user_id) && !empty($password) && !is_numeric($user_id))
		{
			//read from database
      if ($user_type=="student") {
        $query = "select * from eos.student where student_id = '$user_id' limit 1";
      } elseif ($user_type=="host") {
        $query = "select * from eos.host where host_id = '$user_id' limit 1";
      }
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['password'] === $password)
					{
            if ($user_type=="student") {
              $_SESSION['user_type'] = "student";
              $_SESSION['user_id'] = $user_data['student_id'];
              header("Location: student.php");
            } elseif ($user_type=="host") {
              $_SESSION['user_type'] = "host";
              $_SESSION['user_id'] = $user_data['host_id'];
              header("Location: host.php");
            }
						die;
					}
				}
			}
			echo "wrong username or password!";
		}
    else
		{
			echo "wrong username or password!";
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
  <link rel="stylesheet" href="../css/signin.css">
	<?php add_head(); ?>
</head>

<body >
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg navbar-light ">

    <a class="navbar-brand" href="../index.php"><img src="../images/site-logo.png" id="logo" alt="site-logo"></a>

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


  <!--SIGNIN SECTION-->
  <section class="login">
    <div class="container">
      <div class="user studs">
        <div class="imgbox"><img src="../images/studentsm.png" alt="student" style="left:76px; ;"></div>
        <div class="formbox">
          <form method="post">
            <h2>Student Signin</h2>
            <label for="usermail">E-mail</label><br>
            <input type="email" required name="usermail" id="usermail" value="" placeholder="Username"><br>
            <label for="pword">Password</label><br>
            <input type="password" required name="pword" value="" id="pword" placeholder="Password" minlength="8"><br>
            <input type="submit" name="" value="Login" ><br>
            <input type="hidden" name="usertype" value="student" >
            <p class="host">Are you a host ? <a href="#" onclick="toggleForm();">Host Signin </a> </p>
          </form>
        </div>
      </div>
      <div class="user hosts">
        <div class="formbox">
          <form method="post">
            <h2>Host Signin</h2>
            <label for="usermail">E-mail</label><br>
            <input type="text" required name="usermail" id="usermail" value="" placeholder="Username"><br>
            <label for="pword">Password</label><br>
            <input type="password" required name="pword" id="pword" value="" placeholder="Password" minlength="8"><br>
            <input type="submit" name="" value="Login" ><br>
            <input type="hidden" name="usertype" value="host" >
            <p class="students">Are you a student ? <a href="#" onclick="toggleForm();">Student Signin </a> </p>
          </form>
        </div>
        <div class="imgbox"><img src="../images/hosts.png" alt="" style="bottom:5px; "></div>
      </div>
    </div>
  </section>

  <div class="user-prompt">
    <p class="signup-prompt">Don't have an account ? <a href="signup.php" onclick="userSignup();"> Sign Up </a> </p><br>
  </div>

	<?php helper(); ?>
  <!-- Footer -->
  <footer id="footer">
    <?php footer(); ?>
  </footer>
	
  <!--javascript-->
  <script>
  //transitions of signin and signup
  function toggleForm() {
    var container = document.querySelector('.login .container')
    container.classList.toggle('active')
  }
  </script>
  <script src="../javascript/theme.js"></script>

</body>

</html>
