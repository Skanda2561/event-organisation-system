<?php
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

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
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/event-card.css">
  <link rel="stylesheet" href="../css/navandform.css">

  <!-- Bootstrap Scripts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!--FAVICON-->
  <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon//favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon//favicon-16x16.png">

</head>

<body id="host">
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


  <div class="helper">
    <div class="icon backtotop" title="Back To Top">
      <a href="#top"><i class="fas fa-arrow-circle-up fa-2x"></i></a>
    </div><br>
    <div class="icon theme " title="Change Theme">
      <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>

  </div>
  <!--user name ,logout-->
  <nav id="user-data" class="navbar navbar-expand-sm sticky-top">
    <i class="fas fa-users fa-2x"></i><span><?php echo $user_data['host_name']; ?></span>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button id="logout" class="nav-link btn btn-outline-danger "><a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>
  <!--bootstrap navs for user details-->
  <div class="container">
    <!-- Nav tabs -->
    <ul class="nav nav-pills justify-content-end" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upcoming">Upcoming </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#past">Previous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#create">Create</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="upcoming" class="container tab-pane active"><br>
        <h3>Your Upcoming Events</h3>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
              <li>
                <figure>
                  <img src="../images/dance.jpg" alt="Dance Competition">
                  <figcaption>
                    <h3>Dance Competition</h3>
                  </figcaption>
                </figure>
                <p>Dance, the movement of the body in a rhythmic way usually to music and within a given space, for the purpose of expressing an idea..</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 11:30 am </li>
                    <li>Date: 05/12/2020 </li>
                    <li>Venue: Indoor Stadium </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#DanceCompetition">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="DanceCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/dancebg(1).jpg');background-repeat:norepeat; background-size :100%">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Dance Competition</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/dance.jpg" alt="DanceCompetition">
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

              <li>
                <figure>
                  <img src="../images/quiz.png" alt="Quiz Time">
                  <figcaption>
                    <h3>Quiz Time</h3>
                  </figcaption>
                </figure>
                <p>Test your smarts with these fun quizzes about frogs, space, holidays, and more</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 2:00 pm </li>
                    <li>Date: 10/11/2020 </li>
                    <li>Venue: Auditorium-1 </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#QuizTime">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="QuizTime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/mindset-743166_1280.jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Quiz Time</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/quiz.png" alt="Quiz">
                        </div>
                        <div class="col-2">
                          <p>
                            We've got all the quizzes you love to binge! Come on in and hunker down for the long haul</p>
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
                          <b>Time:</b> <br> 2:00 pm
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>10/11/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>Auditorium-1
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

      </div>
      <div id="past" class="container tab-pane fade"><br>
        <h3>Completed Events</h3>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>

              <li>
                <figure>
                  <img src="../images/fashion.jpg" alt="Fashion Show">
                  <figcaption>
                    <h3>Fashion Show</h3>
                  </figcaption>
                </figure>
                <p>Fashion Technology showcased their wondrous creativity on the dress materials as they presented their creations...</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 3:15 pm </li>
                    <li>Date: 15/5/2020 </li>
                    <li>Venue:Indoor stadium </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#FashionShow">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="FashionShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/fashionbg.jpg');">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Fashion Show</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/fashion.jpg" alt="FashionShow">
                        </div>
                        <div class="col-2">
                          <p>
                            We've got all the quizzes you love to binge! Come on in and hunker down for the long haul</p>
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
                          <td> 1BM19CS290 </td>
                        <tr>
                          <td>Parth Oza </td>
                          <td> 1BM19EE344</td>
                        </tr>
                        <tr>
                          <td> Swarna Ramaswamy </td>
                          <td> 1BM19EC338</td>
                        </tr>
                        <tr>
                          <td>Shekhar Rege </td>
                          <td>1BM19ME434 </td>
                        </tr>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-3">
                          <b>Time:</b> <br> 3:15 pm
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>15/5/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>Indoor stadium
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>
              <li>
                <figure>
                  <img src="../images/Photo-contestbg.jpg" alt="">
                  <figcaption>
                    <h3>Photography Competition</h3>
                  </figcaption>
                </figure>
                <p>Show your creatives and models that results in a predetermined visual objective being obtained...</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 10:00 am </li>
                    <li>Date: 20/3/2020 </li>
                    <li>Venue: Rock Garden </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#PhotographyCompetition">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="PhotographyCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/photo.jpg');">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Photography Competition</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/Photo-contestbg.jpg" alt="Photography Competition">
                        </div>
                        <div class="col-2">
                          <p>
                            Show your creatives and models that results in a predetermined visual objective being obtained...</p>
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
                          <td>Devina Ghosh </td>
                          <td> 1BM19CS290 </td>
                        <tr>
                          <td>Parth Oza </td>
                          <td> 1BM19EE344</td>
                        </tr>
                        <tr>
                          <td> Nirmal Gill </td>
                          <td> 1BM19EC338</td>
                        </tr>
                        <tr>
                          <td>Shivani Jaggi </td>
                          <td>1BM19ME434 </td>
                        </tr>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-3">
                          <b>Time:</b> <br> 10:00 am
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>20/3/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br> Rock Garden
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>
              <li>
                <figure>
                  <img src="../images/music.jpg" alt="Music Competition">
                  <figcaption>
                    <h3>Music Competition</h3>
                  </figcaption>
                </figure>
                <p>Music competitions are a regular part of life for many students who plan to go to music school and seek a career in music..</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 1:15 pm </li>
                    <li>Date: 25/2/2020 </li>
                    <li>Venue: Auditorium </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#MusicCompetition">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="MusicCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/Musicbg1.jpg');">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Music Competition</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/music.jpg" alt="Music Competition">
                        </div>
                        <div class="col-2">
                          <p>
                            Music competitions are a regular part of life for many students who plan to go to music school and seek a career in music..</p>
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
                          <td>Parth Sami </td>
                          <td> 1BM19CS290 </td>
                        <tr>
                          <td>Parth Oza </td>
                          <td> 1BM19EE344</td>
                        </tr>
                        <tr>
                          <td> Apurva Deshpande</td>
                          <td> 1BM19EC338</td>
                        </tr>
                        <tr>
                          <td>Amitabh Ahluwalia </td>
                          <td>1BM19ME434 </td>
                        </tr>
                        </tr>
                      </table>
                      <div class="row">
                        <div class="col-3">
                          <b>Time:</b> <br> 1:15 pm
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br> 25/2/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br> Auditorium
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                  </div>
                </div>
              </div>

            </ul>
          </section>
        </main>

      </div>
      <div id="create" class="container tab-pane fade"><br>
        <form class="" method="post">
          <h2>Create a New Event</h2><br>
          <label for="event-name">Event name</label><br>
          <input type="text" required name="event-name" id="event-name"><br>
          <label for="event-desc">Event description</label><br>
          <input type="text" required name="event-desc" id="event-desc" maxlength="70"><br>
          <label for="date-time">Date and time</label><br>
          <input type="datetime-local" required name="date-time" id="date-time"> <br>
          <label for="venue">Event venue</label><br>
          <input type="text" required name="venue" id="venue" maxlength="50"><br>
          <label for="mailid">Host e-mail (optional) </label><br>
          <input type="email" name="mailid"><br>
          <label for="website">Host/registration website </label><br>
          <input type="url" name="website"><br>
          <label for="poster">Event poster (or) invitation</label><br>
          <input type="file" name="poster"><br>
          <input type="submit" value="Create" onclick="message()"><br>
        </form>

      </div>
    </div>
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
  <script src="../javascript/theme.js"></script>
  <script >
  function message() {
    var x = 0;
    var name = document.getElementById('event-name').value;
    var desc = document.getElementById('event-desc').value;
    var datetime = document.getElementById('date-time').value;
    var venue = document.getElementById('venue').value;
    if (name == "" || desc == "" || datetime == "" || venue == "") {
      alert("Fill all required data!!");
      x = -1;
    }

    if (x == 0) {
      alert("Thank you for trusting us. Your responses are recorded, we will contact you for confirmation and reflect the changes.")
    }

  }
  </script>


</body>

</html>