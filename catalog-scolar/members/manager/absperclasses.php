<?php
session_start();
$title = "Catalog de abs și absențe per clase";
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
        <style>
        .cp {cursor: pointer;}
        #showCatalog > .dataTables_wrapper div.btn-group {float:left;}
        #showD1 > .dataTables_wrapper div.btn-group {float:left;}
        #showD2 > .dataTables_wrapper div.btn-group {float:left;}
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
                <li class="active"><a href="absperclasses.php"><i class="fa fa-dashboard"></i><strong>Statistică absențe</strong></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border bg-green">
                            <h3 class="box-title">Statistică per clase/discipline - absențe</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="box-body">
                                    <?php
                                        require_once 'pages/getAbs.php';
                                    ?>
                                    
                                    <div class="form-group">
                                        <label for="class" class="cp">Selectați clasa dorită</label>
                                        <select name="class" id="class" class="form-control cp">
                                            <option value="">Selectați clasa</option>
                                            <?php echo fillClass($db); ?>
                                        </select>
                                    </div>
                                    
                                    <div class="" id="showCatalog">
                                        <table class="table table-bordered table-hover table-condensed" id="example2">
                                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per clase - absențe</caption>
                                            <thead>
                                                <tr>
                                                    <th>Disciplina</th>
                                                    <th>Total Absențe</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php echo fillContent($db);?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                        
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discipline" class="cp">Selectați disciplina dorită</label>
                                            <select name="discipline" id="discipline" class="form-control">
                                                <option value="">Selectați disciplina</option>
                                                <?php echo fillDiscipline($db); ?>
                                            </select>
                                        </div>
                                        <div class="" id="showD1">
                                            <table class="table table-bordered table-hover table-condensed" id="abs_mot">
                                                <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per discipline - absențe motivate</caption>
                                                <thead>
                                                    <tr>
                                                        <th>Disciplina</th>
                                                        <th>Total Absențe Motivate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo fillContentDisciplineM($db);?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="discipline2" class="cp">Selectați disciplina dorită</label>
                                            <select name="discipline2" id="discipline2" class="form-control">
                                                <option value="">Selectați disciplina</option>
                                                <?php echo fillDiscipline($db); ?>
                                            </select>
                                        </div>
                                        <div class="" id="showD2">
                                            <table class="table table-bordered table-hover table-condensed" id="abs_nemot">
                                                <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per discipline - absențe nemotivate</caption>
                                                <thead>
                                                    <tr>
                                                        <th>Disciplina</th>
                                                        <th>Total Absențe Nemotivate</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo fillContentDisciplineN($db);?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> <!-- col-md-6 -->


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
                <!-- AdminLTE App -->
                <script src="../dist/js/app.min.js"></script>
            </body>
        </html>
        <script>
        $(document).ready(function(){
            $('#class').change(function(){
            var user_class = $(this).val();
                $.ajax({
                    url:"pages/load_abs_per_class.php",
                    method:"POST",
                    data:{user_class:user_class},
                    success:function(data){
                        $('#showCatalog').html(data);
                    }
                });
            });

            $('#example2').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy',  'excel', 'pdf', 'print'
                ]
            });

            $('#discipline').change(function(){
                var disciplina = $(this).val();
                    $.ajax({
                        url:"pages/load_abs_mot.php",
                        method:"POST",
                        data:{disciplina:disciplina},
                        success:function(data){
                            $('#showD1').html(data);
                        }
                    });
            });

            $('#abs_mot').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy',  'excel', 'pdf', 'print'
                ]
            });

            $('#discipline2').change(function(){
                var disciplina = $(this).val();
                    $.ajax({
                        url:"pages/load_abs_nemot.php",
                        method:"POST",
                        data:{disciplina:disciplina},
                        success:function(data){
                            $('#showD2').html(data);
                        }
                    });
            });

            $('#abs_nemot').DataTable({
                dom: 'Bfrtip',
                buttons: [
                'copy',  'excel', 'pdf', 'print'
                ]
            });
        });
        </script>