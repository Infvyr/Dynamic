<?php 
session_start(); 
$title = "Statistică - media aritmetică";

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
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-green.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<?php
require_once 'pages/header.php';
require_once 'pages/sidebar.php';
require_once '../../includes/connect';
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?php 

$dateProf = mysqli_query($db,"SELECT disciplina FROM users WHERE user_name='$Q' LIMIT 0,1");
$rowProf = mysqli_fetch_assoc($dateProf);

mysqli_close($db);
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="average.php"><i class="fa fa-dashboard"></i><strong>Media elevi</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Media aritmetică a notelor elevilor la disciplina <?= "\"". "<strong>" .$rowProf["disciplina"]. "</strong>". "\""?></h3>
        </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body no-padding">
                <div class="table-responsive" style="margin-top:10px; padding: 5px;">
                <?php
                    $sel = "SELECT note.user_name as 'name', note.user_class as 'class', AVG(note.nota) as 'avg', note.disciplina, users.disciplina, users.user_name FROM `note` ,`users` WHERE note.disciplina=users.disciplina AND users.user_name='$Q' GROUP BY note.user_name";
                    $result = mysqli_query($db, $sel);
                    $chart_data = '';
                    while($data = mysqli_fetch_array($result))
                    {
                     $chart_data .= "{ label:'".$data["name"]."' , value:".$data["avg"]."}, ";
                     #var_dump($chart_data);
                    }
                    $chart_data = substr($chart_data, 0, -2);

                    if ($Q) {                  
                    $query = "SELECT note.user_name, note.user_class, AVG(note.nota), note.disciplina, users.disciplina, users.user_name FROM `note` ,`users` WHERE note.disciplina=users.disciplina AND users.user_name='$Q' GROUP BY note.user_name";
                
                    if($result = mysqli_query($db, $query)){
                    if(mysqli_num_rows($result) > 0){
                        echo '<table class="table table-bordered table-striped table-condensed" id="avg">';
                            echo '<thead>';
                              echo '<tr>';
                                echo '<th>Elevul</th>';
                                echo '<th>Clasa</th>';
                                echo '<th>Disciplina</th>';
                                echo '<th>Media notelor</th>';
                              echo '</tr>';
                            echo '<thead>';
                            echo '<tbody>';

                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>"; 
                                echo "<td>" . $row[0] ."</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[3] . "</td>";
                                echo "<td>" . $row[2] . "</td>";
                            echo "</tr>";
                            /*echo "<pre>";
                            print_r($row);
                            echo "</pre>";*/

                        }
                          echo '</tbody>';
                        echo '</table>';

                        // Free result set
                        mysqli_free_result($result);
                    } else{
                        echo "Nici o înregistrare potrivită n-a fost găsită.";
                    }
                } else{
                    echo "EROARE:" . mysqli_error($db);
                }
                mysqli_close($db);
                }  
            ?>
                </div>

           </div>  <!-- /.box-body -->
          </div>  <!-- /.box -->
        </div>
      </div> <!-- /.row -->
      <div class="container">
          <div class="row">
              <div class="box">
                <div style="margin-right: 40px;">
                    <div id="chart"></div>
                </div>
              </div>
          </div>
      </div>
    </section>
    </div> <!-- /.content-wrapper -->


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
<!-- Morris.js charts -->
<script src="../plugins/morris/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script>
    $(function () { 
        "use strict";
        
        $("#avg").DataTable(); 

        var bar = new Morris.Bar({
            element: 'chart',
            resize: true,
            data: [
            <?php echo $chart_data; ?> 
            ],
            barColors: ['#00a65a', '#f56954'],
            xkey: 'label',
            ykeys: ['value'],
            labels: ['Media'],
            hideHover: 'auto'
        });
    });
</script>

</body>
</html>

