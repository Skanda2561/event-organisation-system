<?php
session_start();

	include("html/connection.php");
	include("html/functions.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Event-plazA</title>
    <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/event-card.css">
  <link rel="stylesheet" href="css/index.css">
  <?php add_head(); ?>
</head>

<body>
  <!-- Navbar -->
  <nav id="top" class="navbar navbar-expand-lg navbar-light ">

    <a class="navbar-brand" href=""> <img src="images/site-logo.png" id="logo" alt="site-logo"> </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Toggler" style="border-style:none;">
      <p class="navbar-toggler-icon fas fa-ellipsis-v" style="color:#e74646;"></p>
    </button>

    <div class="collapse navbar-collapse" id="Toggler">
      <p></p>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="html/signin.php">Sign In</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#footer">About Us</a>
        </li>
      </ul>

    </div>

  </nav>
  <!--landing animation-->
  <div class="cover" style="color:#fff;">
    <div class="swipe">
      <h1>Event-plazA</h1>
    </div>
    <div class="swipe swipe--delay">
      <h3>event organisation website for colleges</h3>
    </div>
    <div class="text-typing">
      <p>.CREATE & INNOVATE , INSPIRE </p>
    </div>
  </div>

  <!--content-->
  <div class="heading">

  </div>
  <div class="text">

  </div>

  <div class="body-wrapper">
    <br><br>
    <div class="who-we-are boxsm">
      <div class="heading">
        <h2>Who<br> We Are</h2>
      </div>
      <div class="text">
        <span>We love the creative solution. We live for unexpected design, unique experiences, and seamless production.</span>
      </div>
    </div>

    <div class="services boxsm">
      <div class="heading">
        <h2>Our <br> services</h2>
      </div>
      <div class="text">
        <span>We specialize in experiential events that elevate brands into popular culture and shareworthy immersive moments. Bringing a boutique approach to innovative global brands and startups alike, we create experiences that work.</span>
        <span>From concept creation to execution, we combine seasoned knowledge with inspiration. Where no detail goes unconsidered . These unite in harmony,
          creating a spirit of enthusiasm and celebration. </span>
      </div>
    </div><br>

    <div class="partners boxsm">
      <div class="heading">
        <h2>Who We<br>Work With</h2>
      </div>
      <div class="text">
        <span>We have been entrusted by some of the most recognized and successful clubs, as well as up-and-coming organisations </span>
      </div>
    </div><br>
    <ul style="display:inline; list-style-type: none; margin:0 10%;">

      <img src="./images/ncclogo.png" class="brand-logo">
      <img src="./images/protocolbmsce.jpg" class="brand-logo" style="border-radius:100%;">
      <img src="./images/Phase_Shift(1).png" id="PhaseShift" class="brand-logo" style="border-radius:100%;">
      <img src="./images/nss.jpeg" id="nss" class="brand-logo" style="border-radius:100%;">
      <img src="./images/IEEELOGO.png" id="IEEE" class="brand-logo">
      <img src="./images/rotaract.png" id="rotaract" class="brand-logo" style="border-radius:100%;">
    </ul>
  </div>

  <!-- Main events cards-->
  <main class="wrapper ">

    <section class="card-deck main-event-wrapper" id="card-deck">
      <h2 style="padding-bottom:30px;display:block;" >Trending & Main Upcoming Events</h2><br>
      <ul>
        <?php
          $qry1="SELECt * FROM events WHERE event_id IN (SELECT event_id FROM participants GROUP BY event_id ORDER BY COUNT(*) ) AND event_upcoming=1 LIMIT 3;";
          $result = $con->query($qry1);
          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              ?>
              <li>
                <figure>
                  <img src="<?php echo substr($row['event_img'],3);?>" alt="<?php echo $row['event_name']; ?>">
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
							display_modal($row,3);
            }
            } else {
              ?><br><?php
            echo "Oops!!! We Don't Have Any Trending Events";
            }
        ?>

      </ul>

    </section>
  </main>
  <br>
  <div class="">
    <h2 style="text-align:center">Our Goals </h2>
  </div>

  <section class="our-goal">
    <div class="grid-container">
      <div class="grid-item">
        <div class="grid-logo">
          <i class="fas fa-user-friends fa-3x"></i>
        </div>
        <div class="grid-desc">
          <h3>Increased participation</h3>
          <h5>Increase Students participation in the events.</h5>
        </div>
      </div>
      <div class="grid-item">
        <div class="grid-logo">
          <i class="fas fa-bullseye fa-3x"></i>
        </div>
        <div class="grid-desc">
          <h3>Higher targets</h3>
          <h5>Introducing new and challenging ideas.</h5>
        </div>
      </div>
      <div class="grid-item">
        <div class="grid-logo">
          <i class="fa fa-hands-helping fa-3x"></i>
        </div>
        <div class="grid-desc">
          <h3>Be helping hand</h3>
          <h5>Education, training, skill devlopment and volunteering programmes.</h5>
        </div>
      </div>
      <div class="grid-item">
        <div class="grid-logo">
          <i class="far fa-calendar-alt fa-3x"></i>
        </div>
        <div class="grid-desc">
          <h3>Time mgmt.</h3>
          <h5>Be completely ready within the event schedule.</h5>
        </div>
      </div>

    </div>
  </section>
	<?php helper(); ?>
  <!-- Footer -->
  <footer id="footer">
    <?php footer(); ?>
  </footer>

  <script src="javascript/theme.js"></script>

</body>

</html>
