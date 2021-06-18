<?php
session_start();

	include("html/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Event-plazA</title>
  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.10.0/js/all.js"></script>

  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/event-card.css">
  <link rel="stylesheet" href="css/index.css">

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"> </script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!--FAVICON-->
  <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="images/favicon//favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="images/favicon//favicon-16x16.png">

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
  <div class="helper">
    <div class="icon backtotop" title="Back To Top">
      <a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
    </div><br>
    <div class="icon theme " title="Change Theme">
      <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>

  </div>
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
                  <img src="<?php echo $row['event_img'];?>" alt="<?php echo $row['event_name']; ?>">
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
                <form class="" action="event-info.php" method="post">
                  <input type="hidden" name="event_id" value="<?php echo $row['event_id']; ?>">
                  <input type="submit" name="submit" value="See more">
                </form>
              </li>
              <?php
            }
            } else {
              ?><br><?php
            echo "Oops!!! We Don't Have Any Trending Events";
            }
        ?>

      </ul>
      <ul>

        <li>
          <figure>
            <img src="./images/HACKATHON.jpg" alt="HACKATHON !!">
            <figcaption>
              <h3>HACKATHON !!</h3>
            </figcaption>
          </figure>
          <p>where programmers get together for a short period of time to collaborate on a project..</p>
          <div class="quick-info">
            <ul class="times">
              <li>Time: 2:05 pm </li>
              <li>Date: 28/10/20 </li>
              <li>Venue: Lab-2 </li>
            </ul>
          </div>
          <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
          <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#HACKATHON">See more</button>
        </li>
        <!-- Modal -->
        <div class="modal fade" id="HACKATHON" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('./images/HACKATHONbg(1).jpg'); ">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>HACKATHON !!</b></h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-2">
                    <img src="./images/HACKATHON.jpg" alt="HACKATHON">
                  </div>
                  <div class="col-2">
                    <p>
                      Blockchain is a decentralized, distributed ledger technology that records the provenance of a digital asset..</p>
                  </div>
                </div>
                <table>
                  <tr>
                    <td colspan="2" style="text-align: center;"> <B>Registered Students</B></td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>USN</th>
                  </tr>
                  <tr>
                    <td>Dharma Kapoor </td>
                    <td> 1BM19IS290 </td>
                  <tr>
                    <td>Riya Vala </td>
                    <td> 1BM19IS344</td>
                  </tr>
                  <tr>
                    <td> Dipti Pirzada Balan </td>
                    <td> 1BM19ME338</td>
                  </tr>
                  <tr>
                    <td>Padama Jawahar Mandal </td>
                    <td>1BM19CS434 </td>
                  </tr>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-3">
                    <b>Time:</b> <br> 2:05 pm
                  </div>
                  <div class="col-3">
                    <b>Date:</b> <br>28/10/2020
                  </div>
                  <div class="col-3">
                    <b>Venue:</b> <br>Lab-2
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>


        <li>
          <figure>
            <img src="./images/zoom_call_2_2x_4x.png" alt="E-waste mgmt">
            <figcaption>
              <h3>E-waste management </h3>
            </figcaption>
          </figure>
          <p>Webinar on e-waste collection and seggregation drive at the college.Followed by challenges of e-waste management and public role. Also we have a Q&A session</p>
          <div class="quick-info">
            <ul>
              <li>Time: 10:00 am </li>
              <li>Date: 28/12/20 </li>
              <li>Venue: Auditorium 1 & 2 </li>
            </ul>
          </div>
          <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
          <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#Ewastemanagement">See more</button>
        </li>
        <!-- Modal -->
        <div class="modal fade" id="Ewastemanagement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('./images/ewastebg.jpg');background-repeat:norepeat; background-size :100%">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>E-waste Management</b></h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-2">
                    <img src="./images/zoom_call_2_2x_4x.png" alt="E-waste">
                  </div>
                  <div class="col-2">
                    <p>Webinar on e-waste collection and seggregation drive at the college.Followed by challenges of e-waste management and public role. Also we have a Q&A session..</p>
                  </div>
                </div>
                <table>
                  <tr>
                    <td colspan="2" style="text-align: center;"> <B>Registered Students</B></td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>USN</th>
                  </tr>
                  <tr>
                    <td>Deep Prasad Jani</td>
                    <td> 1BM19CS280 </td>
                  <tr>
                    <td>Jyoti Bhat </td>
                    <td> 1BM19CS354</td>
                  </tr>
                  <tr>
                    <td> Naina Monin Pathak </td>
                    <td> 1BM19CS328</td>
                  </tr>
                  <tr>
                    <td>Shekhar Rege </td>
                    <td>1BM19CS434 </td>
                  </tr>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-3">
                    <b>Time:</b> <br> 11:30 am
                  </div>
                  <div class="col-3">
                    <b>Date:</b> <br>05/12/2020
                  </div>
                  <div class="col-3">
                    <b>Venue:</b> <br>Indoor Stadium
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>

        <li>
          <figure>
            <img src="./images/dance.jpg" alt="Dance Competition">
            <figcaption>
              <h3>Dance Competition</h3>
            </figcaption>
          </figure>
          <p>Dance, the movement of the body in a rhythmic way usually to music and within a given space, for the purpose of expressing an idea..</p>
          <div class="quick-info">
            <ul>
              <li>Time: 11:30 am </li>
              <li>Date: 05/12/20 </li>
              <li>Venue: Indoor Stadium </li>
            </ul>
          </div>
          <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
          <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#DanceCompetition">See more</button>
        </li>
        <!-- Modal -->
        <div class="modal fade" id="DanceCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('./images/dancebg(1).jpg');background-repeat:norepeat; background-size :100%">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Dance Competition</b></h5>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-2">
                    <img src="./images/dance.jpg" alt="DanceCompetition">
                  </div>
                  <div class="col-2">
                    <p>Dance, the movement of the body in a rhythmic way usually to music and within a given space, for the purpose of expressing an idea..</p>
                  </div>
                </div>
                <table>
                  <tr>
                    <td colspan="2" style="text-align: center;"> <B>Registered Students</B></td>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>USN</th>
                  </tr>
                  <tr>
                    <td>Deep Prasad Jani</td>
                    <td> 1BM19CS280 </td>
                  <tr>
                    <td>Jyoti Bhat </td>
                    <td> 1BM19CS354</td>
                  </tr>
                  <tr>
                    <td> Naina Monin Pathak </td>
                    <td> 1BM19CS328</td>
                  </tr>
                  <tr>
                    <td>Shekhar Rege </td>
                    <td>1BM19CS434 </td>
                  </tr>
                  </tr>
                </table>
                <div class="row">
                  <div class="col-3">
                    <b>Time:</b> <br> 11:30 am
                  </div>
                  <div class="col-3">
                    <b>Date:</b> <br>05/12/2020
                  </div>
                  <div class="col-3">
                    <b>Venue:</b> <br>Indoor Stadium
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

              </div>
            </div>
          </div>
        </div>

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
    </div>
    <div class="container-fluid abtus">
      <i class="fab fa-facebook-f fa-lg" style="color: #00acee ;"></i>
      <i class="fab fa-twitter fa-lg" style="color: #0764b9 ;"></i>
      <i class="fab fa-instagram fa-lg" style="color:#833AB4 ;"></i>
      <i class="fas fa-envelope fa-lg " style="color:#e74646 ;"></i>
      <br>
      <button type="button" class="btn btn-outline-secondary  footbtn">
        <a class="know-more" href="html/aboutus.php">Know more <i class="fa fa-chevron-right"></i></a>
      </button>
    </div>
  </footer>

  <script src="javascript/theme.js"></script>

</body>

</html>
