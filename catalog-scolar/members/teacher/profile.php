<?php 
session_start(); 
$title = "Profilul meu";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}

require_once 'pages/head.php'; 
require_once 'pages/header.php';
require_once 'pages/sidebar.php';

require_once '../../includes/connect';

$query = mysqli_query($db,"SELECT * FROM users WHERE user_name='$Q' LIMIT 0,1");
$row = mysqli_fetch_assoc($query);

mysqli_close($db);

echo '
	<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profil ' . $Q .'
      </h1>
      <ol class="breadcrumb">
        <li><a href="." title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i>Principală</a></li>
        <li class="active"><a href="profile.php"><i class="fa fa-dashboard"></i><strong> Profilul meu</strong></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar5.png" alt="User profile picture">
              <h3 class="profile-username text-center">' . $Q  . ",&nbsp; profesor de &nbsp;" . $row["disciplina"] . "&nbsp;-&nbsp;" .$row["grad_prof"]. '</h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informații rapide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Nume</strong>
              <p class="text-muted">'. $Q . '</p>
              <hr>
              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Data nașterii</strong>
              <p class="text-muted">'. $nume_admin[7] .'</p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">'. $nume_admin[8] .'</p>
              <hr>
              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Telefon de contact</strong>
              <p class="text-muted">(+373) 0'. $nume_admin[9] .'</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
';

require_once 'pages/footer.php';
?>