<?php
	session_start();
	if ($_SESSION['validCredentials']) {
		// echo $_SESSION['name'];
	 //    echo 'Session was destroyed';	
	    session_destroy();
		header('Location: ../LoginPage.php');    
	}
?>