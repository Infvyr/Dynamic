<?php
require_once '../includes/connectDB';

 if (!empty($_POST['id']) && intval($_POST['id']) > 0) {
 	$update = array();
	
 	if ( !empty($_POST['name']) ) {
 		$update['user_name'] = $_POST['name'];
 	}

    if ( strlen($_POST['pwd']) >= 6 ) {
 		$update['user_password'] = $_POST['pwd'];	
 	}

 	if ( !empty($_POST['class']) ) {
 		$update['user_class'] = $_POST['class'];
 	}
	
    if ( !empty($_POST['btd']) ) {
 		$update['user_btd'] = $_POST['btd'];
 	}
    
    if ( !empty($_POST['mail']) ) {
 		$update['user_mail'] = $_POST['mail'];
 	}
 	
    if ( !empty($_POST['mob'])) {
        $update['user_mob'] = $_POST['mob']; 
    }
    
     //	var_dump($_POST); die;
	
  	if (!empty($update)) {
  		$parameters = array();
  		foreach ($update as $key => $value) {
  			 if ($key === "user_password") {
  			 	$value = md5($value);
  			 }
  			$parameters[] = $key . " = " . '"' . $value . '"'; 
  		}
		
		/*echo "<pre>";
		var_dump($parameters); die;
		echo "</pre>";*/
		
		/*echo "<pre>";
		var_dump($update); die;
		echo "</pre>";*/
  		
	 	$db->query(" UPDATE users SET " . implode(',', $parameters). " WHERE user_id = " . intval($_POST['id']));
	 }
  	    header('Location: http://localhost/catalog-scolar/root/edit/edit_learners.php');
  	    die();
 } else {
    header('Location: http://localhost/catalog-scolar/root/edit/edit_learners.php');
    die();
 }