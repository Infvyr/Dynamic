<?php
require_once 'dbase/db';

 if (!empty($_POST['id']) && intval($_POST['id']) > 0) { /* > 0 se poate de scos, p/u ca intval verifica implicit asta */
 	$update = array(); // or $update = []; for php 5>>
	
 	// denumirea cartii
 	if ( strlen($_POST['name']) >= 3 ) {
 		$update['name'] = $_POST['name'];
 	}

 	// numele autorului
 	if ( !empty($_POST['surname']) ) {
 		$update['surname'] = $_POST['surname'];
 	}
	
 	//editura
 	if ( strlen($_POST['password']) >= 4 ) {
 		$update['password'] = $_POST['password'];	
 	}

  //anul editiei
  if ( strlen($_POST['aned']) == 4 ) {
    $update['aned'] = $_POST['aned']; 
  }

  //pretul
  if ( !empty($_POST['pret'])) {
    $update['pret'] = $_POST['pret']; 
  }
// 	var_dump($_POST); die;
	
  	if (!empty($update)) {
  		$parameters = array();
  		foreach ($update as $key => $value) {
  			 /*if ($key == 'password') {
  			 	$value = md5($value);
  			 }*/
  			$parameters[] = $key . " = " . '"' . $value . '"'; 
  		}
  		//var_dump($update); die;
	 	$db->query(" UPDATE users SET " . implode(',', $parameters). " WHERE id = " . intval($_POST['id']));
	 }
  	header('Location: .');
  	die();
 }else {
    header('Location: .');
    die();
 }
