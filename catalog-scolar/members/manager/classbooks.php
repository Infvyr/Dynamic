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
            <li class="active"><a href="classbooks.php"><i class="fa fa-dashboard"></i><strong>Cataloage</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Cataloage clase</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
<?php 
 function fillClass($db)  
 {  
      $output = '';  
      $sql = "SELECT DISTINCT user_class FROM `users` WHERE user_class <> 'nu' AND user_class <> ' ' GROUP BY user_class";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["user_class"].'">'.'Clasa '.$row["user_class"].'</option>';  
      }  
      return $output;  
 } 
  function fillContent($db)  
 {  
      $output = '';  
      $sql = "SELECT note.*, abs.* FROM note, abs WHERE note.user_name=abs.user_name AND note.user_class=abs.user_class";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[3].'</td>
                <td>'.$row[1].'</td>
                <td>'.date("d-m-Y", strtotime($row[2])).'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[7].'</td>
                <td>'.date("d-m-Y", strtotime($row[8])).'</td>
                <td>'.$row[10].'</td>
                <td>'.$row[11].'</td>
                </tr>
           ';  
      }  
      return $output;  
 }  
?>
                            
                                <div class="form-group">
                                <label for="class" class="cp">Selectați catalogul clasei</label>
                                    <select name="class" id="class" class="form-control cp">  
                                        <option value="">Selectați catalogul dorit</option>  
                                        <?php echo fillClass($db); ?>
                                    </select>
                                </div>
                            

                            <div class="" id="showCatalog">  
                            <table class="table table-bordered table-hover table-condensed" id="example">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Catalogul clasei</caption>
                            <thead>
                            <tr>                       
                                <th>Elevul</th>  
                                <th>Disciplina</th>  
                                <th>Data</th>  
                                <th>Nota</th>  
                                <th>Disciplina</th>  
                                <th>Data</th>  
                                <th>Absență</th>  
                                <th>Motivat</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <?php echo fillContent($db);?>  
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
                url:"pages/load_data.php",  
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
 });  
 </script>  