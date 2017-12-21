<?
require_once "connectDB";//ne conectam la DB
session_start();//pentru folosirea datelor intre fisiere asemanator ca cookie

$pass=$_SESSION["pass"];
$User=$_SESSION["username"];
$Q = mysqli_query($db, "SELECT user_id,user_name FROM users WHERE user_password='$pass'");//luam datele dupa parola
$Q = mysqli_fetch_row($Q);

$g=$Q[0];
$Q = $Q[1];//g=id     Q=username

$qadmin = mysqli_query($db, "SELECT * FROM users WHERE user_id='$g'");//aflam grupa
$nume_admin = mysqli_fetch_row($qadmin);

$_SESSION['user_id']=$g;
?>