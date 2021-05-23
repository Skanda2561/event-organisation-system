<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "eos";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	$query="update events set event_upcoming= where events.date< SYSDATE()";
	mysqli_query($con, $query);
	die("failed to connect!");
}

$query="update events set event_upcoming =0 where events.date<= SYSDATE()";
mysqli_query($con, $query);
$query="update events set event_upcoming =1 where events.date> SYSDATE()";
mysqli_query($con, $query);
