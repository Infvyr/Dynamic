<?php
require_once '../../includes/connect';

$query1 = "SELECT COUNT(note.disciplina), note.data, note.user_name, note.nota, note.user_class, users.user_name, users.user_class FROM note, users WHERE users.user_name=note.user_name AND users.user_name='$Q' AND users.user_class=note.user_class";
$result1 = mysqli_query($db, $query1);
$output_res =  mysqli_fetch_array($result1);

$query2 = "SELECT COUNT(abs.disciplina), abs.user_name, abs.user_class, users.user_name, users.user_class FROM abs, users WHERE users.user_name=abs.user_name AND users.user_name='$Q' AND users.user_class=abs.user_class";
$result2 = mysqli_query($db, $query2);
$output_res2 =  mysqli_fetch_array($result2);


$output = '';  
$sql = "SELECT orarTeze.discipline, orarTeze.data, orarTeze.ora, orarTeze.locul, orarTeze.prof, orarTeze.user_clasa, users.user_name, users.user_class FROM orarTeze, users WHERE users.user_name='$Q' AND orarTeze.user_clasa=users.user_class ORDER BY orarTeze.data ASC";  
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
while($row = mysqli_fetch_array($result))  { 
$date = date("d-m-Y", strtotime($row["data"]));
$output .= '  
        <tr>  
            <td class="discipline">'.$row["discipline"].'</td>  
            <td class="data">'.$date.'</td>
            <td class="ora">'.$row["ora"].'</td>
            <td class="locul">'.$row["locul"].'</td>
            <td class="prof">'.$row["prof"].'</td>
        </tr>  
';  
}
}  
else 
{  
$output .= 
        '<tr>  
            <td colspan="4">Ne pare rău! Datele nu au fost găsite!</td>  
        </tr>';  
}  
$output .= 
        '</table>  
    </div>'; 

?>
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
                    <span class="info-box-icon bg-aqua"><i class="fa fa-star-o"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><a href="marks.php">Notele mele</a></span>
                        <span class="info-box-number"><small>Total: <?= $output_res[0]; ?> note</small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="abs.php">Absențele mele</a></span>
                        <span class="info-box-number"><small>Total: <?= $output_res2[0]; ?> absențe</small></span>
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
                    <span class="info-box-icon bg-yellow"><i class="fa fa-mortar-board"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"><a href="performance.php">Randamentul &amp; Statistică</a></span>
                        <span class="info-box-number"><small>Date statistice</small></span>
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
                        <span class="info-box-number"><small>Azi: 6 lectii</small></span>
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
                                <?php echo $output; mysqli_close($db); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
