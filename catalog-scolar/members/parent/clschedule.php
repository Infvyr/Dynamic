<?php 
session_start(); 
$title = "Orarul tezelor mele";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}

require_once 'pages/head.php'; 
require_once 'pages/header.php';
require_once 'pages/sidebar.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i> Principală</a></li>
            <li class="active"><a href="http://localhost/catalog-scolar/members/learner/clschedule.php"><i class="fa fa-dashboard"></i>Orarul Tezelor</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green" style="margin-bottom:15px;">
            <h3 class="box-title">Orarul Tezelor</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
                                <?php
                                require_once '../../includes/connect';
                                $output = '';
                                $sql = "SELECT  orarTeze.discipline, orarTeze.data, orarTeze.ora, orarTeze.locul, orarTeze.prof, orarTeze.user_clasa, users.user_name, users.user_class FROM orarTeze, users WHERE users.user_name='$Q' AND orarTeze.user_clasa=users.user_class ORDER BY orarTeze.data ASC";
                                $result = mysqli_query($db, $sql);
                                
                                if(mysqli_num_rows($result) > 0) {
                                $output .= '
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="16%">Disciplina</th>
                                            <th width="16%">Data</th>
                                            <th width="16%">Ora începerii</th>
                                            <th width="16%">Locul desfășurării</th>
                                            <th width="16%">Profesor</th>
                                        </tr>';
                                        while($row = mysqli_fetch_array($result)) {
                                        $output .= '
                                        <tr>
                                            <td class="discipline">'.$row["discipline"].'</td>
                                            <td class="data">'.date("d-m-Y", strtotime($row["data"])).'</td>
                                            <td class="ora">'.$row["ora"].'</td>
                                            <td class="locul">'.$row["locul"].'</td>
                                            <td class="prof">'.$row["prof"].'</td>
                                        </tr>
                                        ';
                                        }
                                        }
                                        else {
                                        $output .= '<tr>
                                            <td colspan="4">Ne pare rău! Datele nu au fost găsite!</td>
                                        </tr>';
                                        }
                                    $output .= '</table>
                                </div>';
                                echo $output;
                                mysqli_free_result($result);
                                mysqli_close($db);
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

    <?php require_once 'pages/footer.php'; ?>