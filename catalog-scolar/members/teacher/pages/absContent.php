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

/* codul pentru absenta elevului */

if (isset($_POST['absenta'])) {
  
    $disc = $_POST['disc'];
    $class = $_POST['class'];
    $learner = $_POST['learner'];
    $data = date('Y-m-d',strtotime($_POST['data']));
    $abs = $_POST['abs'];
    $mot = $_POST['mot'];

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
              if ($abs == NULL) {
                echo "<script>
                swal({  
                    title: 'Eroare!',
                    text: 'Absența nu a fost pusă!',  
                    type: 'error',      
                    confirmButtonText: 'Închideți', 
                    allowOutsideClick: true,
                    allowEscapeKey: true
                });
                </script>";
              } else {
                if ($mot == NULL) {
                    echo "<script>
                    swal({  
                        title: 'Eroare!',
                        text: 'Alegeți dacă absența e motivată!',  
                        type: 'error',      
                        confirmButtonText: 'Închideți', 
                        allowOutsideClick: true,
                        allowEscapeKey: true
                    });
                    </script>";
                } else {

                 $sql = "INSERT INTO `abs` (disciplina, user_class, user_name, data, abs, motivat) VALUES ('$disc','$class','$learner','$data','$abs', '$mot')";
                if (mysqli_query($connect, $sql)) {
                  echo "<script>
                    swal({  
                        title: 'Succes!',
                        text: 'Absența a fost adăugată cu succes...',  
                        type: 'success',      
                        confirmButtonText: 'OK', 
                        });
                    </script>";
                } else {
                  echo "<script>
                    swal({  
                        title: 'Eroare!',
                        text: 'Datele introduse sunt absolut incorecte...',  
                        type: 'error',      
                        confirmButtonText: 'Închideți', 
                        allowOutsideClick: true
                        });
                    </script>";
                  echo mysqli_error($connect);
                }       
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
            <li class="active"><a href="abs.php"><i class="fa fa-dashboard"></i><strong>Note</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Adăugare absențe elevi</h3>
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
                            <!-- <option value="">Selectați Disciplina</option> -->
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
                        <input type="date" name="data" id="data" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="abs">Absență</label>
                        <select name="abs" id="abs" class="form-control">
                            <option>Selectați oțiunea</option>
                            <option value="da">DA</option>
                            <option value="nu">NU</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mot">Motivat</label>
                        <select name="mot" id="mot" class="form-control">
                            <option>Selectați oțiunea</option>
                            <option value="motivat">Motivat</option>
                            <option value="nemotivat">Nemotivat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="absenta" class="btn btn-success">Procesare</button>
                    </div>
                </form>
           </div>
            <!-- /.box-body -->

            <?php 
                $db = mysqli_connect("localhost", "root", "", "catalog");
                mysqli_set_charset($db,"UTF8"); # pentru diacritice
                
                // filtrez afisarea notelor pentru profesorul logat
                if ($Q) {
                    $query = $db->query("SELECT abs.disciplina, abs.data, abs.user_name, abs.abs, abs.motivat, abs.user_class, users.user_name, users.disciplina FROM `abs`, `users` WHERE abs.disciplina = users.disciplina AND users.user_name = '$Q' ORDER BY data");
                    
                    $tableData = $query->fetch_all();    
                }
                mysqli_close($db);
            ?>

            <div class="table-responsive">
            <table class="table table-responsive table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Nume Elev</th>
                            <th>Clasa</th>
                            <th>Disciplina</th>
                            <th>Data</th>
                            <th>Absență</th>
                            <th>Motivat</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[5] ?> </td>
                                    <td> <?= $value[0] ?> </td>
                                    <td> <?= $value[1] ?> </td>
                                    <td> <?= $value[3] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                </tr>
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
