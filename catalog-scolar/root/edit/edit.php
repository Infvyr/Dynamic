<?php
require_once '../includes/connectDB';
function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

 $id = $_POST["orar_id"];  
 $text = protect($_POST["text"]);  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE orarClase SET ".$column_name."='".$text."' WHERE orar_id='".$id."'";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Date actualizate cu succes!';  
 }  
?>