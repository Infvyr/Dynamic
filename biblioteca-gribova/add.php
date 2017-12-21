<?php 
require_once 'dbase/db';

 if ( isset($_POST['name']) && 
 	 !empty($_POST['name']) && 
 	 isset($_POST['surname']) && 
 	 strlen($_POST['surname']) >= 3 && 
 	 isset($_POST['password']) && 
 	 strlen($_POST['password']) >= 6 &&
 	 strlen($_POST['aned']) == 4  && 
 	 !empty($_POST['pret']) ) {
 	foreach ($_POST as $key => $value) {

  		$parameters[] = $key . " = " . '"' . $value . '"'; 
  	}
	$db->query(" INSERT INTO users SET " . implode(',', $parameters));

	header('Location: .');
	die();
	} else {
 	if (empty($_POST['name'])) {
 		echo "<script> alert('Cîmpul <Denumire carte> trebuie să fie completat!'); </script>";
 	}
 	if (strlen($_POST['password']) < 4) {
 		echo "<script> alert('Denumirea Editurii trebuie să conțină cel puțin 5 caractere!'); </script>";
 	}

 	if ( strlen($_POST['surname']) < 4) {
 		echo "<script> alert('Cîmpul <Autor> trebuie să conțină 3 caractere!'); </script>";
 	}
 	
 	if ( strlen($_POST['aned']) != 4) {
 		echo "<script> alert('Cîmpul <An> trebuie să conțină 4 cifre!'); </script>";
 	}

 	if ( empty($_POST['pret'])) {
 		echo "<script> alert('Cîmpul <Pret> trebuie să fie completat!'); </script>";
 	}
 	?>
 	<script type="text/javascript">
 		setTimeout(function(){
 			window.location = location.protocol + '//' + location.host + '/' + 'userTable';
 		}, 1500);
 	</script>
 	<?php
 }
