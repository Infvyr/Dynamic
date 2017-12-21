<?php
session_start();
$title = "Rapoarte statistice despre notele și absențele claselor";
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
    require_once '../../includes/connect';
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Contul Meu</h1>
            <ol class="breadcrumb">
                <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
                <li class="active"><a href="stats.php"><i class="fa fa-dashboard"></i><strong>General</strong></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">Rapoarte statistice despre situația școlară a claselor</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="box-body">
                                    <div class="col-md-4">
                                        <table class="table table-hover table-bordered table-condensed" id="example">
                                        <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Tabel 1. Numărul total de elevi per clase</caption>
                                            <thead>
                                                <tr>
                                                    <th>Denumire clasă</th>
                                                    <th>Total elevi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                $query1 = "SELECT DISTINCT clase.class, clase.nr_learners FROM clase";
                                                $row1 = mysqli_query($db,$query1);
                                                while($result1 = mysqli_fetch_array($row1, MYSQLI_NUM))
                                                {
                                                echo '
                                                <tr>
                                                    <td>'.$result1[0].'</td>
                                                    <td>'.$result1[1].'</td>
                                                </tr>
                                                ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-hover table-bordered table-condensed" id="example2">
                                        <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Tabel 2. Numărul total de note per clase</caption>
                                            <thead>
                                                <tr>
                                                    <th>Denumire clasă</th>
                                                    <th>Total note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                $query2 = "SELECT user_class, COUNT(user_class) FROM `note` GROUP BY user_class";
                                                $row2 = mysqli_query($db,$query2);
                                                
                                                while($result2 = mysqli_fetch_array($row2, MYSQLI_NUM))
                                                {
                                                echo '
                                                <tr>
                                                    <td>'.$result2[0].'</td>
                                                    <td>'.$result2[1].'</td>
                                                </tr>
                                                ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-hover table-bordered table-condensed" id="example3">
                                        <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Tabel 3. Numărul total de absențe per clase</caption>
                                            <thead>
                                                <tr>
                                                    <th>Denumire clasă</th>
                                                    <th>Total absențe</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?
                                                $query3 = "SELECT user_class, COUNT(user_class) FROM `abs` GROUP BY user_class";
                                                $row3 = mysqli_query($db,$query3);
                                                while($result3 = mysqli_fetch_array($row3, MYSQLI_NUM))
                                                {
                                                echo '
                                                <tr>
                                                    <td>'.$result3[0].'</td>
                                                    <td>'.$result3[1].'</td>
                                                </tr>
                                                ';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <span style="font-size: 18px;"><p class="text-danger bg-info">!!! Clasele care nu sunt afișate în tabele nu au acumulat numărul de note ori absențe.</p></span>
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
            <!-- AdminLTE App -->
            <script src="../dist/js/app.min.js"></script>
        </body>
    </html>
    <script>
    $(document).ready(function(){
    $('#example').DataTable({
    "paging": false,
    "info": false,
    "searching": false,
    dom: 'Bfrtip',
    buttons: [
    'copy',  'excel', 'pdf', 'print'
    ]
    });

    $('#example2').DataTable({
    "paging": false,
    "info": false,
    "searching": false,
    dom: 'Bfrtip',
    buttons: [
    'copy',  'excel', 'pdf', 'print'
    ]
    });

    $('#example3').DataTable({
    "paging": false,
    "info": false,
    "searching": false,
    dom: 'Bfrtip',
    buttons: [
    'copy',  'excel', 'pdf', 'print'
    ]
    });
    });
    </script>