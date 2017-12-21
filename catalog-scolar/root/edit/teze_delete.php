<?php  
require_once '../includes/connectDB';
 $sql = "DELETE FROM orarTeze WHERE orar_id = '".$_POST["orar_id"]."'";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Date Șterse!';  
 }  
 ?>