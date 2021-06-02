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

<body id="student">
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
    </div>
    <div class="icon theme " title="Change Theme">
      <button class="btn-toggle"> <i class="fas fa-adjust fa-2x"> </i></button>
    </div>

  </div>

  <!--user name ,logout-->
  <nav id="user-data" class="navbar navbar-expand-sm sticky-top">
    <a id="nav-username" class="navbar-brand" href=""><i class="fas fa-users fa-2x"></i><?php echo $user_data['student_name']; ?></a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button id="logout" class="nav-link btn btn-outline-danger"><a href="logout.php">Logout</a></button>
      </li>
    </ul>
  </nav>

  <!--bootstrap navs for user details-->

  <div class="container">

    <!-- Nav tabs -->
    <ul class="nav nav-pills justify-content-end" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#upcoming">Upcoming</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#past">Participated</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="upcoming" class="container tab-pane active"><br>
        <h4>Upcoming events</h4>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
							<?php
							if ( !empty($user_data) )
							{
								$id=$user_data['student_id'];
								$qry1="select * from events where event_upcoming=1 and event_id in (select event_id from participants where student_id = '$id' )";
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
									echo "You Don't Have Any Upcoming Events";
									}
							}
							?>

              <li>
                <figure>
                  <img src="../images/HACKATHON.jpg" alt="HACKATHON !!">
                  <figcaption>
                    <h3>HACKATHON !!</h3>
                  </figcaption>
                </figure>
                <p>where programmers get together for a short period of time to collaborate on a project..</p>
                <div class="quick-info hostcard">
                  <ul>
                    <li>Time: 2:05 pm </li>
                    <li>Date: 28/10/20 </li>
                    <li>Venue: Lab-2 </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#HACKATHON">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="HACKATHON" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/HACKATHONbg(1).jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>HACKATHON !!</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/HACKATHON.jpg" alt="HACKATHON">
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
                  <img src="../images/swachh.jfif" alt="Swachh Bharat">
                  <figcaption>
                    <h3>Swachh Bharat</h3>
                  </figcaption>
                </figure>
                <p>Initiated the cleanliness drive at Bull temple. Picking up the broom to clean the dirt, making Swachh Bharat Abhiyan a mass movement across the nation..</p>
                <div class="quick-info hostcard">
                  <ul>
                    <li>Time: 10:00 am </li>
                    <li>Date: 30/11/20 </li>
                    <li>Venue: Rock Garden </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" onclick=" window.open('https://forms.gle/iRKGVmDS5HwXChTm8','_blank')"> Register </button>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#SwachhBharat">See more</button>
              </li>

              <!-- Modal -->
              <div class="modal fade" id="SwachhBharat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/Swachhbg1.jpg');  object-fit:cover; ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Swachh Bharat</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/swachh.jfif" alt="Cycling">
                        </div>
                        <div class="col-2">
                          <p>
                            Initiated the cleanliness drive at Bull temple. Picking up the broom to clean the dirt, making Swachh Bharat Abhiyan a mass movement across the nation..</p>
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
                          <b>Time:</b> <br> 10:00 am
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>30/11/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>Rock Garden
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
        <h4>You participated in these events</h4>
        <main class="wrapper">

          <section class="card-deck" id="card-deck">
            <ul>
							<?php
							if ( !empty($user_data) )
							{
								$id=$user_data['student_id'];
								$qry1="select * from events where event_upcoming=0 and event_id in (select event_id from participants where student_id = '$id' );";
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
									echo "You Don't Have Any Upcoming Events";
									}
							}
							?>
              <li>
                <figure>
                  <img src="../images/blockchain.jfif" alt="Blockchain Technology">
                  <figcaption>
                    <h3>Blockchain Technology</h3>
                  </figcaption>
                </figure>
                <p>Blockchain is a decentralized, distributed ledger technology that records the provenance of a digital asset...</p>
                <div class="quick-info ">
                  <ul>
                    <li>Time: 1:30 pm </li>
                    <li>Date: 12/8/20</li>
                    <li>Venue: Auditorium 2 </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#BlockchainTechnology">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="BlockchainTechnology" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/blockchainbg.jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Blockchain Technology</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/blockchain.jfif" alt="Quiz">
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
                          <b>Time:</b> <br> 1:30 pm
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>12/8/2020
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>Auditorium 2
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
                  <img src="../images/badminton.jfif" alt="Badminton">
                  <figcaption>
                    <h3>Badminton Competition</h3>
                  </figcaption>
                </figure>
                <p>Badminton racquets and sports drinks will be provided on the day of the event..</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 5:00 pm </li>
                    <li>Date: 31/7/20</li>
                    <li>Venue:Indoor stadium</li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#BadmintonCompetition">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="BadmintonCompetition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/badmintonbg(1).jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Badminton Competition</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/badminton.jfif" alt="Quiz">
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
                          <b>Time:</b> <br> 5:00 pm
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>31/7/2020
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
                  <img src="../images/cycle.png" alt="Cycling">
                  <figcaption>
                    <h3>Cycling</h3>
                  </figcaption>
                </figure>
                <p> A bicycle ride around the world begins with a single pedal stroke ...</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 6:00 am </li>
                    <li>Date: 18/12/19 </li>
                    <li>Venue:College main gate </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#Cycling">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="Cycling" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/cyclebg.jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Cycling</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/cycle.png" alt="Cycling">
                        </div>
                        <div class="col-2">
                          <p>
                            A bicycle ride around the world begins with a single pedal stroke ...</p>
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
                          <b>Time:</b> <br> 6:00 am
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br>18/12/2019
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>College main gate
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
                  <img src="../images/blood.jpg" alt="event-image">
                  <figcaption>
                    <h3>Blood donation camp</h3>
                  </figcaption>
                </figure>
                <p> Spare only 15 minutes and save one life...</p>
                <div class="quick-info">
                  <ul>
                    <li>Time: 10:15 am </li>
                    <li>Date: 22/12/19</li>
                    <li>Venue: Indoor Stadium </li>
                  </ul>
                </div>
                <button class="btn btn-small btn-outline-dark " type="button" data-toggle="modal" data-target="#Blooddonationcamp">See more</button>
              </li>
              <!-- Modal -->
              <div class="modal fade" id="Blooddonationcamp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-image:url('../images/blood-donationbg.jpg'); ">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><b>Blood donation camp</b></h5>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-2">
                          <img src="../images/blood.jpg" style="   object-fit:cover;" alt="Blood donation camp">
                        </div>
                        <div class="col-2">
                          <p style="font-size: 0.8rem;">
                            Blood donation service is the best social service to humanity.It is a very noble cause as by donating blood , one gets the opportunity to save someone’s life.All it takes is just 15 minutes to donate blood.By donating
                            blood, one can bring happiness to someone’s life and make a difference in his life...</p>
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
                          <b>Time:</b> <br> 10:15 am
                        </div>
                        <div class="col-3">
                          <b>Date:</b> <br> 22/12/2019
                        </div>
                        <div class="col-3">
                          <b>Venue:</b> <br>Indoor Stadium
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

</body>

</html>