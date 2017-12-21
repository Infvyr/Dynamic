<?php 
session_start(); 
$title = "Clasamente absențe elevi";

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
    #showABS > .dataTables_wrapper div.btn-group {float:left;}
    #showABSN > .dataTables_wrapper div.btn-group {float:left;}
    #showABSM > .dataTables_wrapper div.btn-group {float:left;}
    .pad {margin-bottom: 20px;}
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
            <li class="active"><a href="topabs.php"><i class="fa fa-dashboard"></i><strong>Clasamente absențe</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Clasamente absențe per clase</h3>
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
  function fillTopAbs($db)  
 {  
      $output = '';  
      $sql = "SELECT user_name, COUNT(abs) as total FROM abs GROUP BY user_name ORDER BY total DESC";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                </tr>
           ';  
      }  
      return $output;  
 }   

 function fillTopAbsM($db)  
 {  
      $output = '';  
      // motivat 
      $sql = "SELECT user_name, user_class, COUNT(motivat) AS motivate FROM abs WHERE motivat = 'motivat' GROUP BY user_name";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[2].'</td>
                </tr>
           ';  
      }  
      return $output;  
 }  

 function fillTopAbsN($db)  
 {  
      $output = '';  
      // nemotivat
      $sql = "SELECT user_name, user_class, COUNT(motivat) AS nemotivate FROM abs WHERE motivat = 'nemotivat' GROUP BY user_name";  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[2].'</td>
                </tr>
           ';  
      }  
      return $output;  
 } 
?>
                            
                                <div class="form-group">
                                <label for="class" class="cp">Selectați clasa</label>
                                    <select name="class" id="class" class="form-control cp">  
                                        <option value="">Toate absențele</option>  
                                        <?php echo fillClass($db); ?>
                                    </select>
                                </div>
                            

                            <div class="" id="showABS">  
                            <table class="table table-bordered table-hover table-condensed" id="topabs">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Top absențe din toate clasele</caption>
                            <thead>
                            <tr>                       
                                <th>Elevul</th>  
                                <th>Total</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <?php echo fillTopAbs($db);?>  
                            </tbody>
                            </table>
                            </div>  
<div class="box-header pad bg-green">
                        <h4 class="box-title">Clasament absențe motivate per clase</h4>
                    </div>
<div class="form-group">
                                <label for="class" class="cp">Selectați clasa</label>
                                    <select name="class" id="classM" class="form-control cp">  
                                        <option value="">Toate absențele motivate</option>  
                                        <?php echo fillClass($db); ?>
                                    </select>
                                </div>

                                <div class="" id="showABSM">  
                            <table class="table table-bordered table-hover table-condensed" id="topabsm">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Top absențe</caption>
                            <thead>
                            <tr>                       
                                <th>Elevul</th>  
                                <th>Total motivate</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <?php echo fillTopAbsM($db);?>  
                            </tbody>
                            </table>
                            </div> 
<div class="box-header bg-green pad">
                        <h4 class="box-title">Clasament absențe nemotivate per clase</h4>
                    </div>
                            <div class="form-group">
                                <label for="class" class="cp">Selectați clasa</label>
                                    <select name="class" id="classN" class="form-control cp">  
                                        <option value="">Toate absențele nemotivate</option>  
                                        <?php echo fillClass($db); ?>
                                    </select>
                                </div>

                                <div class="" id="showABSN">  
                            <table class="table table-bordered table-hover table-condensed" id="topabsn">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Top absențe</caption>
                            <thead>
                            <tr>                       
                                <th>Elevul</th>  
                                <th>Total nemotivate</th>  
                            </tr>
                            </thead>
                            <tbody>
                              <?php echo fillTopAbsN($db);?>  
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
                url:"pages/load_topabs.php",  
                method:"POST",  
                data:{user_class:user_class},  
                success:function(data){  
                     $('#showABS').html(data);  
                }  
           });  
      });

      $('#classM').change(function(){  
           var user_class = $(this).val();  
           $.ajax({  
                url:"pages/load_topabsm.php",  
                method:"POST",  
                data:{user_class:user_class},  
                success:function(data){  
                     $('#showABSM').html(data);  
                }  
           });  
      });

      $('#classN').change(function(){  
           var user_class = $(this).val();  
           $.ajax({  
                url:"pages/load_topabsn.php",  
                method:"POST",  
                data:{user_class:user_class},  
                success:function(data){  
                     $('#showABSN').html(data);  
                }  
           });  
      });
      $('#topabs').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      }); 
      $('#topabsn').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      });  
      $('#topabsm').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      });   
 });  
 </script>  