<?php
require_once '../mainDbase/db';
$link = db_connect();

 $query = "DELETE FROM articles WHERE id = ' ". $_POST["id"] ." ' ";

 if(mysqli_query($link, $query)) {
      echo 'Datele au fost șterse!';
 }
 ?>