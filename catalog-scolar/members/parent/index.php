<?php 
session_start(); 
$title = "Pagina principală";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}

require_once 'pages/head.php'; 
require_once 'pages/header.php';
require_once 'pages/sidebar.php';
require_once 'pages/contentWrapper.php'; 
require_once 'pages/footer.php';

?>
