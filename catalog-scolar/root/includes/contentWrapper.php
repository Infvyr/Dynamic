<?php 
if(!$_SESSION['member_name']) {
  header("location: http://localhost/catalog-scolar/root/"); 
  die(); 
}

require_once 'connectDB';

$result = mysqli_query($db, "SELECT * FROM institution");
if (!$result) {
    echo 'Cerere invalidă!: ' . mysqli_error();
    exit;
}
$row = mysqli_fetch_row($result) or die(mysqli_error());

/* count learners */
$sqle = "SELECT user_name FROM `users` WHERE user_category='elev'";
if ($resulte = mysqli_query($db,$sqle)) {
  $resCount = mysqli_num_rows($resulte);
  mysqli_free_result($resulte);
}

/* count profs */
$sqlp = "SELECT user_name FROM `users` WHERE user_category='profesor'";
if ($resultp = mysqli_query($db,$sqlp)) {
  $profCount = mysqli_num_rows($resultp);
  mysqli_free_result($resultp);
}

/* count parents */
$sqlpar = "SELECT user_name FROM `users` WHERE user_category='parinte'";
if ($resultpar = mysqli_query($db,$sqlpar)) {
  $parCount = mysqli_num_rows($resultpar);
  mysqli_free_result($resultpar);
}

mysqli_close($db);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Informație generală</h1>
      <ol class="breadcrumb">
        <li class="active"><a href="main.php"><i class="fa fa-dashboard"></i>Principală</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box-header with-border bg-green content-title">
      <h3 class="box-title"><?= $row[1] . ', &nbsp;' . $row[2]; ?></h3>
    </div>

      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body table-responsive no-padding">
    <?php
      echo '
          <table class="table table-hover">
            <tr>
              <td class="text-info"><strong>Denumirea oficială</strong></td>
              <td>' . $row[1] .'</td>
            </tr>
            <tr>
              <td class="text-info"><strong>Manager Curent</strong></td>
              <td>' . $row[5] . '</td>
            </tr>
            <tr>
              <td class="text-info"><strong>Poșta electronică</strong></td>
              <td>' . '<a href="mailto:'.$row[3].'">' . $row[3]. '</a>' . '</td>
            </tr>
            <tr>
              <td class="text-info"><strong>Telefon</strong></td>
              <td>' . $row[4] . '</td>
            </tr>
          </table>
    ';
              ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border bg-green">
              <h3 class="box-title">Accesare rapidă</h3>
            </div>
          </div>
          <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><a href="learner/" title="administrare elevi" rel="nofollow">Elevi</a></span>
              <span class="info-box-number"><small><?php echo "Total: " . $resCount;?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="prof/" title="administrare profesori" rel="nofollow">Profesori</a></span>
              <span class="info-box-number"><small><?php echo "Total: " . $profCount;?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-group"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="parent/" title="administrare părinți" rel="nofollow">Părinți</a></span>
              <span class="info-box-number"><small><?php echo "Total: " . $parCount;?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><a href="manager/" title="administrare director" rel="nofollow">Director</a></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->