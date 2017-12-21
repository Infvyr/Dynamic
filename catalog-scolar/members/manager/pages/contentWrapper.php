<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li class="active"><a href="."><i class="fa fa-dashboard"></i> Principală</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green" style="margin-bottom:15px;">
            <h3 class="box-title">Accesare rapidă </h3>
        </div>

        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-folder-open"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="classbooks.php">Cataloage</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-pie-chart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="stats.php">Rapoarte statistice</a></span>
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
                    <span class="info-box-icon bg-yellow"><i class="fa fa-line-chart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="performance.php">Clasamente</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-calendar-check-o"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="schedule.php">Orarul lecțiilor</a></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Orarul Tezelor</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
<?php                                 
    require_once '../../includes/connect';
    $output = '';  
    $sql = "SELECT DISTINCT
      orarTeze.discipline,
      orarTeze.data,
      orarTeze.ora,
      orarTeze.locul,
      orarTeze.prof,
      orarTeze.user_clasa
    FROM
      orarTeze
    INNER JOIN users ON
    orarTeze.user_clasa = users.user_class
    ORDER BY
      orarTeze.user_clasa ASC";  
    $result = mysqli_query($db, $sql); 
    $tableData = $result->fetch_all();
    mysqli_close($db); 
?>
    <div class="table-responsive">  
        <table class="table table-bordered table-hover table-condensed">  
        <tr>                       
            <th width="20%">Disciplina</th>  
            <th width="20%">Data</th>  
            <th width="20%">Ora începerii</th>  
            <th width="20%">Locul desfășurării</th>  
            <th width="20%">Profesor</th>  
            <th width="20%">Clasa</th>  
        </tr>
        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[0] ?> </td>
                                    <td> <?= $date = date("d-m-Y", strtotime($value[1])); ?> </td>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[3] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                    <td> <?= $value[5] ?> </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
            </div>


                            </div>
                            <!-- /.box-body -->
                        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
