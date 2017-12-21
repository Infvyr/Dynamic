<?php
require_once '../includes/connectDB';
$sql = "INSERT INTO orarTeze(discipline,data,ora,locul,prof,user_clasa) VALUES('".$_POST["discipline"]."', '".$_POST["data"]."', '".$_POST["ora"]."', '".$_POST["locul"]."', '".$_POST["prof"]."', '".$_POST["userClasa"]."')";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Date inserate cu succes!';  
 }  
?>