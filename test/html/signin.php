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
  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/signin.css">

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>

  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!--FAVICON-->
  <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon//favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon//favicon-16x16.png">

</head>

<body>
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

  <div class="helper">
    <div class="icon theme " title="Change Theme">
      <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>

  </div>

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
      <br>
      <p>credentials <br>
        student : username: stud , password : stud <br>
        host : username: host , password : host
      </p>
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
