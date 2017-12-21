<?php 
session_start(); 
$title = "Notarea tezei elevului";

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
    <script src="../plugins/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../plugins/sweetalert/dist/sweetalert.css">
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
?>

<?php
$connect = mysqli_connect("localhost", "root", "", "catalog");
mysqli_set_charset($connect,"UTF8"); # pentru diacritice

/* codul pentru select clasa si elev */
$class = '';  
$discipline = '';  

$query = "SELECT DISTINCT user_class FROM `users` WHERE user_class <> 'nu' AND user_class <> ' ' GROUP BY user_class";
$query_disc = "SELECT DISTINCT disciplina FROM `users` WHERE disciplina <> ' ' AND user_name = '$Q' ";

$result = mysqli_query($connect, $query);
$result_d = mysqli_query($connect, $query_disc);

while($row = mysqli_fetch_array($result))
{
    $class .= '<option value="'.$row["user_class"].'">'.$row["user_class"].'</option>';
}

while($row = mysqli_fetch_array($result_d))
{   
    $discipline .= '<option value="'.$row["disciplina"].'">'.$row["disciplina"].'</option>';
}
/* ============================== */

/* codul pentru notarea elevului */

if (isset($_POST['mark'])) {
  
    $disc = $_POST['disc'];
    $class = $_POST['class'];
    $learner = $_POST['learner'];
    $data = date('Y-m-d',strtotime($_POST['data']));
    $nota = $_POST['nota'];

  if ($disc == NULL) {
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
    if ($class == NULL) {
       echo "<script>
            swal({  
                title: 'Eroare!',
                text: 'Selectați clasa. Dacă lista e goală selectați adresa în bara de adresă a browserului și tastați ENTER!',  
                type: 'error',      
                confirmButtonText: 'Închideți', 
                allowOutsideClick: true,
                allowEscapeKey: true
            });
            </script>";
    } else {
      if ($learner == NULL) {
        echo "<script>
            swal({  
                title: 'Eroare!',
                text: 'Selectați elevul. Dacă lista e goală selectați adresa în bara de adresă a browserului și tastați ENTER!',  
                type: 'error',      
                confirmButtonText: 'Închideți', 
                allowOutsideClick: true,
                allowEscapeKey: true
            });
            </script>";
      } else {
        if ($data == NULL) {
            echo "<script>
            swal({  
                title: 'Eroare!',
                text: 'Inserați data!',  
                type: 'error',      
                confirmButtonText: 'Închideți', 
                allowOutsideClick: true,
                allowEscapeKey: true
            });
            </script>";
        } else {
              if ($nota == NULL) {
                echo "<script>
                swal({  
                    title: 'Eroare!',
                    text: 'Nu ați ales nota pentru elev!',  
                    type: 'error',      
                    confirmButtonText: 'Închideți', 
                    allowOutsideClick: true,
                    allowEscapeKey: true
                });
                </script>";
              } else {

                 $sql = "INSERT INTO `noteTeza` (disciplinaTeza, clasaElev, elev, dataTeza, notaTeza) VALUES ('$disc','$class','$learner','$data','$nota')";
                if (mysqli_query($connect, $sql)) {
                  echo "<script>
                  swal({  
                    title: 'Succes!',
                    text: 'Nota tezei a fost adăugată!',  
                    type: 'success',      
                    confirmButtonText: 'OK', 
                    });
                    </script>";
                } else {
                  echo mysqli_error($connect);
                }            
          }
        }
      }
    }
  }
}
mysqli_close($connect);
?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="http://localhost/catalog-scolar/members/teacher/"><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="marksThesis.php"><i class="fa fa-dashboard"></i><strong>Note Teză</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Adăugare note teză elevi</h3>
        </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body no-padding">
                <form class="form-horizontal" action="" method="post" style="padding: 20px;">
                <div class="">
                    <div class="form-group">
                        <label for="disc">Disciplina</label>
                        <select name="disc" id="disc" class="form-control">
                            <?php echo $discipline; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class">Clasa</label>
                        <select name="class" id="class" class="form-control action">
                            <option value="">Selectați Clasa</option>
                            <?php echo $class; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="learner">Elevul</label>
                        <select name="learner" id="learner" class="form-control action">
                            <option value="">Selectați Elevul</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" name="data" id="data" class="form-control" placeholder="anul-luna-ziua {2005-12-24}">
                    </div>
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <select name="nota" id="nota" class="form-control">
                            <option value="10">10</option>
                            <option value="9">9</option>
                            <option value="8">8</option>
                            <option value="7">7</option>
                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                            <option value="2">2</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="mark" class="btn btn-success">Notare elev</button>
                    </div>
                </form>
           </div>
            <!-- /.box-body -->

            <?php 
                $db = mysqli_connect("localhost", "root", "", "catalog");
                mysqli_set_charset($db,"UTF8"); # pentru diacritice
                
                // filtrez afisarea notelor pentru profesorul logat
                if ($Q) {
                    $query = $db->query("SELECT noteTeza.disciplinaTeza, noteTeza.dataTeza, noteTeza.elev, noteTeza.notaTeza, noteTeza.clasaElev, users.user_name, users.disciplina FROM `noteTeza`, `users` WHERE noteTeza.disciplinaTeza = users.disciplina AND users.user_name = '$Q' ORDER BY noteTeza.dataTeza");
                    
                    $tableData = $query->fetch_all();    
                }
                
                mysqli_close($db);
            ?>

            <div class="table-responsive" style="padding: 5px;">
            <table class="table table-responsive table-bordered table-hover table-condensed" id="mark">
                    <thead>
                        <tr>
                            <th>Nume Elev</th>
                            <th>Clasa</th>
                            <th>Disciplina</th>
                            <th>Data</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tbody>
                                <tr>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                    <td> <?= $value[0] ?> </td>
                                    <?= '<td> '.date("d-m-Y", strtotime($value[1])).' </td> '; ?>
                                    <td> <?= $value[3] ?> </td>
                                </tr>
                                </tbody>
                        <?php endforeach; ?>
                </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
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

</body>
</html>

<script>
    $(document).ready(function(){
        $('.action').change(function() {
                if ($(this).val() != '') {
                    var action = $(this).attr("id");
                    var query = $(this).val();
                    var result = '';
                    if (action == "class") {
                        result = 'learner';
                    }
                    $.ajax({
                        url: "pages/fetchmark.php",
                        method: "POST",
                        data: {
                            action: action,
                            query: query
                        },
                        success: function(data) {
                            $('#' + result).html(data);
                        }
                    })
                }
            });
        $("#mark").DataTable(); 
    });
</script>