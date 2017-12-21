<?php
require_once 'dbase/db';

 $id = $_POST["id"];
 $text = $_POST["text"];
 $column_name = $_POST["column_name"];
 $sql = "UPDATE carti SET ".$column_name."='".$text."' WHERE id='".$id."'";

 if(mysqli_query($db, $sql)) {
      echo 'Datele au fost actualizate!';
 }
 ?>