<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

header("Location: signin.php");
die;

?>
<form class="" action="index.html" method="post">
	<input type="submit" name="" value="SUBMIT">
</form>
