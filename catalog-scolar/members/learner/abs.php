<?php 
session_start(); 
$title = "Absențele mele";

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
            <li><a href="http://localhost/catalog-scolar/members/learner/"><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="abs.php"><i class="fa fa-dashboard"></i><strong>Absențe</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Absențele mele</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
                            <?php 
                            require_once '../../includes/connect';

                            $query1 = "SELECT users.user_name, users.user_class, abs.user_name, abs.user_class, COUNT(abs.disciplina) FROM users, abs WHERE users.user_name=abs.user_name AND abs.user_name='$Q' AND users.user_class=abs.user_class";
                            $res = mysqli_query($db,$query1);
                            $row1 = mysqli_fetch_row($res);

                            $sql = "SELECT users.user_name, users.user_class, abs.disciplina, abs.data, abs.user_name, abs.motivat, abs.user_class FROM users, abs WHERE users.user_name=abs.user_name AND abs.user_name='$Q' AND users.user_class=abs.user_class ORDER BY abs.data DESC";

                            echo '<p class="text-info" style="font-size: 1.2em;">La moment aveți <span class="text-success"><strong>'.$row1[4].'</strong></span> absențe. Vezi tabelul de note <a href="marks.php" title="tabelul de note" rel="nofollow" class="text-info"><i class="fa fa-long-arrow-right"></i></a></p>';

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo '
                                    <table class="table table-bordered table-hover table-condensed" id="absTable">
                                    <caption><span class="text-info bg-green align-left" style="font-size:17px; padding:0 5px;">Tabelul de absențe</span></caption>
                                    <thead>
                                        <tr>
                                            <th width="33.33%">Disciplina</th>
                                            <th width="33.33%">Data</th>
                                            <th width="33.33%">Motivat</th>
                                        </tr>
                                    </thead>
                                    ';
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                    	$date = $row["data"];
                                        echo '
                                        <tbody>
	                                        <tr>
	                                            <td>'.$row["disciplina"].'</td>
	                                            <td>'.date("d-m-Y", strtotime($date)).'</td>
	                                            <td>'.$row["motivat"].'</td>
	                                        </tr>
                                    	</tbody>
                                        ';
                                    }
                                    echo "</table>";
                                    // Free result set
                                    mysqli_free_result($result);
                                } else{
                                    echo "Date eronate!.";
                                }
                            } else{
                                echo "EROARE la exexuție " . mysqli_error($db);
                            }

                            
                            ?>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
<?php require_once 'pages/footer.php'; ?>
