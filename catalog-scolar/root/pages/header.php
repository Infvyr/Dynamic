<?
  require_once "../includes/connectDB";//ne conectam la DB

  $pass=$_SESSION["member_password"];
  $User=$_SESSION["member_name"];
  $Q = mysqli_query($db,"SELECT user_id,user_name FROM users WHERE user_password='$pass'");//luam datele dupa parola
  $Q = mysqli_fetch_row($Q);

  $g=$Q[0];
  $Q = $Q[1];//g=id     Q=username

  $qadmin = mysqli_query($db,"SELECT * FROM users WHERE user_id='$g'");//aflam grupa
  $nume_admin = mysqli_fetch_row($qadmin);

  $_SESSION['user_id']=$g;

  echo '
    <body class="hold-transition skin-green sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
      <!-- Logo -->
      <a href="http://localhost/catalog-scolar/root/main.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>CS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Catalog-Scolar.</b>xyz</span>
      </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="http://localhost/catalog-scolar/root/pages/profile.php" title="vezi profilul"" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs">'. $Q .' </span>
            </a>
            <ul class="dropdown-menu">  
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/catalog-scolar/root/pages/profile.php" title="vezi profilul" class="btn btn-default btn-flat">Vezi Profilul</a>
                </div>
                <div class="pull-right">
                  <a href="../includes/logout_user.php" class="btn btn-default btn-flat">Deconectare</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  ';

?>