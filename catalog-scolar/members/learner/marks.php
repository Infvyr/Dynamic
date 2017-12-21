<?php 
session_start(); 
$title = "Notele mele";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo ucwords($_SESSION['member_name']) . '&nbsp;|&nbsp;' . $title;?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="icon" type="image/ico" href="../dist/img/profile.ico">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/skin-green.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?
require_once 'pages/header.php';
require_once 'pages/sidebar.php';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="marks.php"><i class="fa fa-dashboard"></i><strong>Note</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Notele mele</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
                            <?php 
                            require_once '../../includes/connect';

                            $query1 = "SELECT users.user_name, users.user_class, note.user_name, note.user_class, COUNT(note.nota) FROM users, note WHERE users.user_name=note.user_name AND note.user_name='$Q' AND users.user_class=note.user_class";
                            $res = mysqli_query($db,$query1);
                            $row1 = mysqli_fetch_row($res);

                            $sql = "SELECT users.user_name, users.user_class, note.disciplina, note.data, note.user_name, note.nota, note.user_class FROM users, note WHERE users.user_name=note.user_name AND note.user_name='$Q' AND users.user_class=note.user_class ORDER BY note.disciplina ASC";

                            echo '<p class="text-info" style="font-size: 1.2em;">La moment aveți <span class="text-success"><strong>'.$row1[4].'</strong></span> note. Vezi tabelul de absențe <a href="abs.php" title="tabelul de absențe" rel="nofollow" class="text-info"><i class="fa fa-long-arrow-right"></i></a></p>';

                            if($result = mysqli_query($db, $sql)){
                                if(mysqli_num_rows($result) > 0){
                                    echo '
                                    <table class="table table-bordered table-hover table-condensed" id="marksTable">
                                    <caption><span class="text-info bg-green align-left" style="font-size:17px; padding:0 5px;">Tabelul de note</span></caption>
                                    <thead>
                                        <tr>
                                            <th width="33.33%">Disciplina</th>
                                            <th width="33.33%">Data</th>
                                            <th width="33.33%">Nota</th>
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
	                                            <td>'.$row["nota"].'</td>
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
                                echo "EROARE la execuție " . mysqli_error($db);
                            }
                            ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Versiune</b> 0.1</div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://catalog-scolar.xyz" title="catalog-scolar.xyz" target="_blank" rel="nofollow">Catalog-Scolar.xyz</a>.</strong> Toate drepturile sunt rezervate.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $("#marksTable").DataTable(); 
  });
</script>
</body>
</html>

