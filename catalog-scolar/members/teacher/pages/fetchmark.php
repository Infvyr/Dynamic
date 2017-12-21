<?php

if(isset($_POST["action"])) {
	$connect = mysqli_connect("localhost", "root", "", "catalog");
	mysqli_set_charset($connect,"UTF8"); # pentru diacritice

	$output = '';
 	
 	if($_POST["action"] == "class") {
  		$query = "SELECT user_name FROM `users` WHERE user_class = '".$_POST["query"]."' AND user_category='elev' GROUP BY user_name";
		$result = mysqli_query($connect, $query);
		$output .= '<option value="">Selectați Elevul</option>';
  
	  	while($row = mysqli_fetch_array($result)) {
	   		$output .= '<option value="'.$row["user_name"].'">'.$row["user_name"].'</option>';
	  	}
 	}
 	echo $output;
}
?>
