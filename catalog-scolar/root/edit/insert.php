<?php
require_once '../includes/connectDB';
$sql = "INSERT INTO orarClase(zi, 10a,10b,10c,11a,11b,11c,12a,12b,12c) VALUES('".$_POST["zi"]."', '".$_POST["c10a"]."', '".$_POST["c10b"]."', '".$_POST["c10c"]."', '".$_POST["c11a"]."', '".$_POST["c11b"]."', '".$_POST["c11c"]."', '".$_POST["c12a"]."', '".$_POST["c12b"]."', '".$_POST["c12c"]."')";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Date inserate cu succes!';  
 }  
?>