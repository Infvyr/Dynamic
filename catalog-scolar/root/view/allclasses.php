<?php
$title = "Vizualizare tuturor claselor";
require_once 'pages/head.php';
require_once 'pages/header.php';
require_once 'pages/sidebar.php'; // Left side column
require_once '../includes/connectDB';

$query = $db->query("SELECT * FROM clase ORDER BY id_class ASC");
$tableData = $query->fetch_all();
//var_dump($tableData);die;
mysqli_close($db);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pagina de administrare a claselor</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Vizualizare clase</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box-header bg-green content-title">
          <h3 class="box-title">Vizualizare clase</h3>
        </div>
        <div class="info-box" style="padding:5px;">
            <div class="table-responsive">
            <table class="table table-responsive table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Clasa</th>
                            <th>Nr. de elevi</th>
                            <th>Diriginte</th>
                            <th>Sala</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[1] ?> </td>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[3] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
      </div> <!-- col -->
    </div> <!-- row --> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'pages/footer.php'; ?>