<?php
require_once '../includes/connectDB';

 if (!empty($_POST['id']) && intval($_POST['id']) > 0) { /* > 0 se poate de scos, p/u ca intval verifica implicit asta */
 	$update = array(); // or $update = []; for php 5>>
	
 	if ( !empty($_POST['class']) ) {
 		$update['class'] = $_POST['class'];
 	}

 	if ( !empty($_POST['nr_learners']) ) {
 		$update['nr_learners'] = $_POST['nr_learners'];
 	}
	
 	if ( !empty($_POST['class_master']) ) {
 		$update['class_master'] = $_POST['class_master'];	
 	}

    if ( !empty($_POST['classroom']) ) {
        $update['classroom'] = $_POST['classroom']; 
    }
    // var_dump($_POST); die;
	
  	if (!empty($update)) {
  		$parameters = array();
  		foreach ($update as $key => $value) {
  			$parameters[] = $key . " = " . '"' . $value . '"'; 
  		}
  	// var_dump($update); die;
	 	$db->query(" UPDATE clase SET " . implode(',', $parameters). " WHERE id_class = " . intval($_POST['id']));
	 }
  	header('Location: http://localhost/catalog-scolar/root/view/classes.php');
  	die();
 }else {
    header('Location: http://localhost/catalog-scolar/root/view/classes.php');
    die();
 }