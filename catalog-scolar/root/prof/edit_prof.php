<?php
require_once '../includes/connectDB';

 if (!empty($_POST['id']) && intval($_POST['id']) > 0) { /* > 0 se poate de scos, p/u ca intval verifica implicit asta */
 	$update = array(); // or $update = []; for php 5>>
	
 	if ( !empty($_POST['name_prof']) ) {
 		$update['user_name'] = $_POST['name_prof'];
 	}

 	if ( !empty($_POST['password']) ) {
 		$update['user_password'] = $_POST['password'];
 	}
	
 	if ( !empty($_POST['btd_prof']) ) {
 		$update['user_btd'] = $_POST['btd_prof'];	
 	}

    if ( !empty($_POST['email_prof']) ) {
        $update['user_mail'] = $_POST['email_prof']; 
    }

    if ( !empty($_POST['mob_prof'])) {
        $update['user_mob'] = $_POST['mob_prof']; 
    }

    if ( !empty($_POST['sel_class']) ) {
        $update['user_class'] = $_POST['sel_class']; 
    }

    if ( !empty($_POST['grad']) ) {
        $update['grad_prof'] = $_POST['grad']; 
    }

	if ( !empty($_POST['sel_discpl']) ) {
        $update['disciplina'] = $_POST['sel_discpl']; 
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
  	header('Location: http://localhost/catalog-scolar/root/prof/');
  	die();
 }else {
    header('Location: http://localhost/catalog-scolar/root/prof/');
    die();
 }