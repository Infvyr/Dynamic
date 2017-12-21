<?php

// Connexion à la base de données
require_once '../../../includes/bdd';
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($_POST['prof'])){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$prof = $_POST['prof'];

	$sql = "INSERT INTO calendar(title, start, end, color, profname) values ('$title', '$start', '$end', '$color', '$prof')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	//echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Eroare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Eroare executare');
	}
}
header('Location: '.$_SERVER['HTTP_REFERER']);	
?>
