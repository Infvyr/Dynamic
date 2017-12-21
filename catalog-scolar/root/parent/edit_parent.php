<?php
require_once '../includes/connectDB';

 if (!empty($_POST['id']) && intval($_POST['id']) > 0) { /* > 0 se poate de scos, p/u ca intval verifica implicit asta */
 	$update = array(); // or $update = []; for php 5>>
	
 	if ( !empty($_POST['name_par']) ) {
 		$update['user_name'] = $_POST['name_par'];
 	}

 	if ( !empty($_POST['password']) ) {
 		$update['user_password'] = $_POST['password'];
 	}
	
 	if ( !empty($_POST['btd_par']) ) {
 		$update['user_btd'] = $_POST['btd_par'];	
 	}

    if ( !empty($_POST['email_par']) ) {
        $update['user_mail'] = $_POST['email_par']; 
    }

    if ( !empty($_POST['mob_par'])) {
        $update['user_mob'] = $_POST['mob_par']; 
    }

    if ( !empty($_POST['child']) ) {
        $update['user_child'] = $_POST['child']; 
    }

    // var_dump($_POST); die;
	
  	if (!empty($update)) {
  		$parameters = array();
  		foreach ($update as $key => $value) {
  			  if ($key === "user_password") {
  			 	$value = md5($value);
  			 }
  			$parameters[] = $key . " = " . '"' . $value . '"'; 
  		}
  	// var_dump($update); die;
	 	$db->query(" UPDATE users SET " . implode(',', $parameters). " WHERE user_id = " . intval($_POST['id']));
	 }
  	header('Location: http://localhost/catalog-scolar/root/parent/');
  	die();
 }else {
    header('Location: http://localhost/catalog-scolar/root/parent/');
    die();
 }