<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	header('Location: .');
  	die();
}

require_once 'dbase/db';

if (intval($_POST['id']) > 0 ) {
	$db->query( " DELETE FROM users WHERE id = " . intval($_POST['id']));
	echo 1;
}else {
	echo 0;
} 
