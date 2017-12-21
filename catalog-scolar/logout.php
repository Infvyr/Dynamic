<?php  
/*	 session_start();  
	 session_unset();
	 session_destroy();  
	 header("location: index.php");  
	 exit;
 */

	session_start();
	unset($_SESSION);
	session_destroy();
	session_write_close();
	header('Location: index.php');
	die();

 ?> 