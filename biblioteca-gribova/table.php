<?php
require_once 'dbase/db';

$query = $db->query("SELECT * FROM users");
$tableData = $query->fetch_all();
//var_dump($tableData);die;