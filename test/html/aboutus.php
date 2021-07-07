<?php
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
    $user_email = $_POST['mail_id'];

		if(!empty($user_email)&& !is_numeric($user_email))
		{
      $query="insert into eos.mailing_list(mail_id) values ('$user_email')";
      mysqli_query($con, $query);
      header("Location: aboutus.php");
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/carousel.css">
  <link rel="stylesheet" href="../css/aboutus.css">
	<?php add_head(); ?>
</head>

<body>
  <!-- Navbar -->
  <section id="top">
    <nav class="navbar navbar-expand-lg navbar-light ">

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
        </ul>

      </div>
    </nav>
  </section>

  <section class="content">
    <img src="../images/p/1.png" alt="img" data-speed="1" class="layer">
    <img src="../images/p/2.png" alt="img" data-speed="-3" class="layer">
    <img src="../images/p/3.png" alt="img" data-speed="-4" class="layer" style="opacity:0.7;">
    <img src="../images/p/4.png" alt="img" data-speed="-9" class="layer">
    <img src="../images/p/5.png" alt="img" data-speed="2" class="layer" style="opacity:0.5;">
    <img src="../images/p/6.png" alt="img" data-speed="-7" class="layer" style="opacity:0.2;">
    <img src="../images/p/7.png" alt="img" data-speed="4" class="layer" style="opacity:0.2;">
    <img src="../images/p/8.png" alt="img" data-speed="-0.5" class="layer">
    <img src="../images/p/9.png" alt="img" data-speed="-1" class="layer">
    <img src="../images/p/10.png" alt="img" data-speed="8" class="layer" style="opacity:0.2;">
    <img src="../images/p/11.png" alt="img" data-speed="7" class="layer">
    <img src="../images/p/12.png" alt="img" data-speed="9" class="layer" style="opacity:0.4;">
    <div class="text">
      <h1>About Us</h1>
      <p>Our event website works as the online representative for your event. </p>
      <p> Not only is it the official point of contact for you and your attendees, it is also a reflection of what your event is all about and the ideologies guiding it.</p>
      <h2>OUR MISSION</h2><br>
      <ul>
        <li> <i class="fas fa-id-badge fa-2x"></i><strong> Increase Students participation..</strong> <br>
          <p>Our event website is the main source to provide attendees with event info, sessions, speakers, agenda, and more. </p>
        </li>
        <li> <i class="fa fa-hands-helping fa-2x"></i><strong>Introducing new and challenging ideas.</strong> <br>
          <p>Attendees learn everything they need to know about the meeting or event, and in turn, you gather everything needed to carry it out with digital ease. </p>
        </li>
        <li><i class="fas fa-chalkboard-teacher fa-2x"></i> <strong>Education, training and volunteering programmes.</strong> <br>
          <p>Attendees need to receive a lot of data that will be important for making the most of the event. The registration specifics, fees, schedule, venue map, dates, types of activities, biographies of speakers, etc. will all matter. </p>
        </li>
        <li><i class="fas fa-unlock-alt fa-2x"></i> <strong>Smooth conduction of events</strong> <br>
          <p>We also organise events with IEEE,NSS,NCC,HIKING(MOUNTAIN) and many more clubs....</p>
          <p>No keeping track of 1,000 email responses or manually tallying up information. The time and money saved on data entry administrative tasks can be used to better the event, contact more sponsors, prepare more activities, or reply faster
            to participants.</p>
        </li>
      </ul>
      <p>Having to send this information individually or print it out could potentially result in chaos.so to deal with this type of situation we hae made a well organised website <b><i>"EVENTS ORGAINSATION SYSTEM"...</b></i></p><br>

    </div>
  </section>

  <div class="newsletter ">
    <form class="" onsubmit="thanks();"  method="post">
      <h2 style="color:#000;">Events at your fingertips!!!</h2><br>
      <p style="color:#000;">Sign up to our monthly newsletter and never miss out from an event. Also get the event passes and goodies at a discounted rate !!</p>
      <br>
      <label for="mail" style="color:#000;">E-mail</label><br>
      <input required type="email" name="mail_id" id="mail" ><br>
      <input type="submit" name="submit" value="signup" style="color:#000;"><br>
    </form>
  </div>

	<?php helper(); ?>
  <!-- Footer -->
  <footer id="footer">
    <?php footer(); ?>
  </footer>
  <script src="../javascript/theme.js"></script>
  <script type="text/javascript">
    function thanks() {
      var mail = document.getElementById("mail").value
      if (mail != "") {
        alert("Thank you for signing up for the newsletter.")
      } else {
        alert("Please enter your e-mail.")
      }
    }
  </script>
  <script type="text/javascript">
    document.body.addEventListener('mousemove', e => {
      document.querySelectorAll(".layer").forEach(layer => {
        let speed = layer.getAttribute("data-speed");

        let x = (window.innerWidth - e.pageX * speed) / 100;
        let y = (window.innerHeight - e.pageY * speed) / 100;

        layer.style.transform = 'translateX(' + x + 'px) translateY(' + y + 'px)';
      });
    });
  </script>
</body>

</html>


<!--
<i class="fas fa-key"></i>
<i class="fas fa-id-badge"></i>
<i class="fas fa-user-graduate"></i>
<i class="fas fa-chalkboard-teacher"></i>
<i class="fas fa-unlock-alt"></i>
<i class="fas fa-at"></i>
-->
