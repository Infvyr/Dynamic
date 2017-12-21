<?
if (isset($_POST['access']))//daca este apasat butonul de logare
    {
    	$User = trim(stripslashes(htmlspecialchars($_POST["member_name"])));
		  $pass = trim(stripslashes(htmlspecialchars($_POST["member_password"])));
		  $pass2 = md5($pass);

      require_once "includes/connectDB"; //conectare DB

      $Q = mysqli_query($db, "SELECT user_category FROM users WHERE user_password='$pass2' and user_name='$User'");//aflat ce tip de om ii acest utilizator
      
      if($Q === FALSE) die(mysqli_error());
		  $q = mysqli_fetch_row($Q);
		  session_start();//pentru transmiterea datelor intre pagini in aceeasi sesiune

      $_SESSION["member_password"] = "$pass2";
      $_SESSION["member_name"] = "$User";

      switch ($q[0]) { // redirectionare user
       	case 'editor': header('Location: http://localhost/catalog-scolar/root/main.php');
       		break;
	     	default: header('Location: http://localhost/catalog-scolar/root/'); 
       		break;
      }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="author" content="Novațchii Vasile">
  <meta name="keywords" content="catalog virtual, catalog de note virtual, e-catalog, catalog scolar online, catalog online, catalog de note online">
  <meta name="description" content="Aplicație online pentru gestionarea eficientă a situației școlare a elevilor, cît și manipularea corectă a datelor elevilor">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Autentificare administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" type="image/ico" href="dist/img/administration.ico">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="login-page">
<style>
  .login-page {
    background-image: url("dist/img/bodybg.jpg");
    background-position: left top;
    background-origin: border-box;
    background-size: cover;
    background-repeat: no-repeat;
    background-color: lightblue;
  }
  .align { margin: 5px 3px 10px; }
</style>

<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><h2 class="page-header">Autentificați-vă în sistem</h2></center>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="member_name" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" placeholder="Nume" autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="member_password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>" placeholder="Parola">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="access">Intrați</button>
        </div>
        <div class="col-xs-8">
          <div class="text-right">
            <p class="align"><a href="http://localhost/catalog-scolar/root/pages/changePwd.php" target="_self" style="cursor:pointer;" title="modificați parola curentă">Resetare parolă</a></p>
          </div>
        </div>
      </div>
      <div class="text-danger text-center" id="error"><?php if(isset($message)) { echo $message; } ?></div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

	<!-- jQuery 2.2.3 -->
	<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>