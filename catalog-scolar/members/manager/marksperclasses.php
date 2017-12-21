<?php
session_start();
$title = "Catalog de note și absențe per clase";
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
        <link rel="stylesheet" href="../plugins/datatables/buttons.bootstrap.min.css">
        <link rel="stylesheet" href="../plugins/sweetalert/dist/sweetalert.css">
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
        <style>
        form .cp {cursor: pointer;}
        #showCatalog > .dataTables_wrapper div.btn-group {float:left;}
        #averageTable > .dataTables_wrapper div.btn-group {float:left;}
        </style>
    </head>
    <?
    require_once 'pages/header.php';
    require_once 'pages/sidebar.php';
    require_once '../../includes/connect';
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Contul Meu</h1>
            <ol class="breadcrumb">
                <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
                <li class="active"><a href="marksperclasses.php"><i class="fa fa-dashboard"></i><strong>Statistică per clase</strong></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">Statistică per clase - note</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="box-body">
                                    <?php 
                                        require_once 'pages/getMarks.php'; 
                                    ?>
                               
                                    <div class="form-group">
                                        <label for="class" class="cp">Selectați clasa dorită</label>
                                        <select name="class" id="class" class="form-control cp">
                                            <option value="">Selectați clasa</option>
                                            <?php echo fillClass($db); ?>
                                        </select>
                                    </div>
                                    
                                    <div class="" id="showCatalog">
                                        <table class="table table-bordered table-hover table-condensed" id="example">
                                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per clase - note</caption>
                                            <thead>
                                                <tr>
                                                    <th>Disciplina</th>
                                                    <th>Total Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php echo fillContent($db);?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    

                                    <div class="col-md-12">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class="form-group">
                                                <label for="class">Selectați clasa</label>
                                                <select name="class" id="class" class="form-control">
                                                    <option value="">Selectați opțiunea</option>
                                                    <?= getClass($db); ?>
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                                <label for="discipline">Selectați disciplina</label>
                                                <select name="discipline" id="discipline" class="form-control">
                                                    <option value="">Selectați opțiunea</option>
                                                    <?= getDiscipline($db); ?>
                                                </select> 
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="getResult" class="btn btn-success">Procesare</button>
                                            </div>
                                        </form>
<?php
if (isset($_POST['getResult'])) {
$class = trim(stripslashes(htmlspecialchars($_POST['class'])));
$discipline = trim(stripslashes(htmlspecialchars($_POST['discipline'])));

if ($class == NULL) {
echo "<script>
swal({
title: 'Eroare!',
text: 'Selectați clasa!',
type: 'error',
confirmButtonText: 'Închideți',
allowOutsideClick: true,
allowEscapeKey: true
});
</script>";
} else {
if ($discipline == NULL) {
echo "<script>
swal({
title: 'Eroare!',
text: 'Selectați disciplina!',
type: 'error',
confirmButtonText: 'Închideți',
allowOutsideClick: true,
allowEscapeKey: true
});
</script>";
} else {
$query = "SELECT note.user_name AS 'name', note.user_class AS 'class', AVG(note.nota) AS 'avg',note.disciplina FROM `note` WHERE note.disciplina = '$discipline' AND note.user_class='$class' GROUP BY note.user_name";
if($result = mysqli_query($db, $query)){
if(mysqli_num_rows($result) > 0){
echo "<div id='averageTable'>";
echo '<table class="table table-bordered table-striped table-condensed" id="averages">';
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
                }
            echo '</tbody>';
        echo '</table>';
        echo "</div>";
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
        }
        }
        ?>
                                    </div>
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
                <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
                <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
                <script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
                <script src="../plugins/datatables/jszip.min.js"></script>
                <script src="../plugins/datatables/pdfmake.min.js"></script>
                <script src="../plugins/datatables/vfs_fonts.js"></script>
                <script src="../plugins/datatables/buttons.html5.min.js"></script>
                <script src="../plugins/datatables/buttons.print.min.js"></script>
                <script src="../plugins/sweetalert/dist/sweetalert.min.js"></script>
                <!-- AdminLTE App -->
                <script src="../dist/js/app.min.js"></script>
            </body>
        </html>
        <script>
        $(document).ready(function(){
            $('#class').change(function(){
            var user_class = $(this).val();
                $.ajax({
                    url:"pages/load_mark_per_class.php",
                    method:"POST",
                    data:{user_class:user_class},
                    success:function(data){
                        $('#showCatalog').html(data);
                    }
                });
            });
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy',  'excel', 'pdf', 'print'
                ]
            });

            $('#averages').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy',  'excel', 'pdf', 'print'
                ]
            });
        });
        </script>