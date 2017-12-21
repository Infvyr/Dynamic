<?php

require_once '../includes/connectDB';

if (intval($_POST['id']) > 0 ) {
	$db->query( " DELETE FROM clase WHERE id_class = " . intval($_POST['id']));
	echo 1;
}else {
	echo 0;
} 