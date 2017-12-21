<?php
require_once '../../includes/connect';

$query1 = "SELECT users.user_name, users.user_child, users.user_class, note.user_name, note.user_class, COUNT(note.disciplina) FROM users, note WHERE users.user_name = '$Q' AND users.user_child = note.user_name";
$result1 = mysqli_query($db, $query1);
$output_res =  mysqli_fetch_array($result1);

$query2 = "SELECT users.user_name, users.user_child, users.user_class, abs.user_name, abs.user_class, COUNT(abs.disciplina) FROM users, abs WHERE users.user_name='$Q' AND users.user_child=abs.user_name";
$result2 = mysqli_query($db, $query2);
$output_res2 =  mysqli_fetch_array($result2);


$output = '';  
$sql = "SELECT discipline, data, ora, locul, prof, user_clasa FROM orarTeze ORDER BY data ASC";  
#$result = mysqli_query($db, $sql);  

if($result = mysqli_query($db, $sql)){                                 
    if(mysqli_num_rows($result) > 0) {  
        while($row = mysqli_fetch_array($result))  { 
            $date = date("d-m-Y", strtotime($row["data"]));
            $output .= '  
                <tr>  
                    <td class="discipline">'.$row["discipline"].'</td>  
                    <td class="data">'.$date.'</td>
                    <td class="ora">'.$row["ora"].'</td>
                    <td class="locul">'.$row["locul"].'</td>
                    <td class="prof">'.$row["prof"].'</td>
                    <td class="prof">'.$row["user_clasa"].'</td>
                </tr> ';  
        }   
    } else {  
        $output .= 
            '<tr>  
                <td colspan="4">Ne pare rău! Datele nu au fost găsite!</td>  
            </tr>';  
    }
}
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
                        <span class="info-box-text"><a href="marks.php">Note</a></span>
                        <span class="info-box-number"><small>Total: <?= $output_res[5]; ?> note</small></span>
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
                        <span class="info-box-text"><a href="abs.php">Absențe</a></span>
                        <span class="info-box-number"><small>Total: <?= $output_res2[5]; ?> absențe</small></span>
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
                        <span class="info-box-text"><a href="performance.php">Randament &amp; <br>Statistică</a></span>
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
                                <div class="table-responsive">  
                                    <table class="table table-bordered"> 
                                        <thead>
                                            <tr>                       
                                                <th>Disciplina</th>  
                                                <th>Data</th>  
                                                <th>Ora începerii</th>  
                                                <th>Locul desfășurării</th>  
                                                <th>Profesor</th>  
                                                <th>Clasa</th>  
                                            </tr>
                                        </thead> 
                                        <tbody>
                                            <?php echo $output; mysqli_close($db); ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
