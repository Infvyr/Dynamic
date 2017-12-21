<?php

require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addclass'])) {
  
    $class = protect($_POST['class']);
    $nr_learners = protect($_POST['nr_learners']);
    $class_master = protect($_POST['class_master']);
    $classroom = protect($_POST['classroom']);

    if ($class == NULL && empty($class)) {
        echo '<script>alert("Nu ați scris clasa!");</script>';
    } else {
        if ($nr_learners == NULL) {
            echo '<script>alert("Nu introdus numărul de elevi!");</script>';
        } else {
            if ($class_master == NULL) {
                echo '<script>alert("Nu ați scris numele dirigintelui!");</script>';
            } else {
                if ($classroom == NULL && empty($classroom)) {
                    echo '<script>alert("Nu ați scris sala clasei!");</script>';
                } else {
                    $sql = "INSERT INTO clase (class, nr_learners, class_master, classroom) VALUES ('$class','$nr_learners','$class_master','$classroom')";

                    if (mysqli_query($db, $sql)){
                        echo '<script>alert("Clasa a fost adăugată!");</script>';
                    } else {
                        echo '<script>alert("Eroare la adăugare!" . mysqli_error($db)");</script>';
                    }
                }
            } 
        }
    }
}

/* ================================================================================================ */
$query = $db->query("SELECT * FROM clase ORDER BY id_class ASC");
$tableData = $query->fetch_all();
//var_dump($tableData);die;
mysqli_close($db);
?>

<script type="text/javascript">
        $(function(){
            $('.edit').click(function() {
                var id = $(this).data('id'); 
                $('#id').val(id);
                //$("#id").val($(this).attr('data-id')); 
            });
        /* ================================= */
            $(".delete").click(function(){
                var thisElement = $(this);
                var id = thisElement.data('id');
               
                if(confirm("Ești sigur(ă) că dorești să ștergi această clasă?")) {
                    $.ajax({
                        type: "POST",
                        url: 'delete_class.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Clasa a fost șters din baza de date!');
                            if(data == 1) {
                                thisElement.closest('tr').remove();
                            }
                        }
                    });
                }
            });
        });
    </script> 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pagina de administrare a claselor</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Administrare clase</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box-header bg-green content-title">
          <h3 class="box-title">Operații adăugare-modificare-ștergere-vizualizare clase</h3>
        </div>
        <div class="info-box" style="padding:5px;">
        
        <form class="form-horizontal" action="" method="post" style="padding:5px;">
            <div class="box-body">
              <div class="form-group">
                <label for="class">Clasa</label>
                  <input type="text" class="form-control" id="class" name="class" placeholder="Introduceți clasa {10 A, 10 B etc.}" autofocus required>
              </div>

              <div class="form-group">
                <label for="nr_learners">Numărul de elevi</label>
                  <input type="number" class="form-control" id="nr_learners" name="nr_learners" placeholder="Cîți elevi sunt în clasă">
              </div>

              <div class="form-group">
                <label for="class_master">Diriginte</label>
                  <input type="text" class="form-control" id="class_master" name="class_master" placeholder="Introduceți numele dirigintelui" required>
              </div>

              <div class="form-group">
                <label for="classroom">Sala clasei</label>
                  <input type="text" class="form-control" id="classroom" name="classroom" placeholder="Introduceți sala clasei" required>
              </div>

              <div class="form-group">
                <button type="submit" name="addclass" class="btn btn-success">Adăugare clasă</button>
                <button type="reset" class="btn btn-danger">Curățire</button>
              </div>
            </div>
          </form>


            <div class="table-responsive">
            <table class="table table-responsive table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Clasa</th>
                            <th>Nr. de elevi</th>
                            <th>Diriginte</th>
                            <th>Sala</th>
                            <th>Funcții</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[1] ?> </td>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[3] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                    <td>&nbsp;
                                    <a data-id="<?= $value[0] ?>" class="edit" href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" title="Modifică datele clasei">&nbsp;</i></a>
                                        <a data-id="<?= $value[0] ?>" class="delete" href="#"><i class="glyphicon glyphicon-trash" title="Șterge clasa">&nbsp;</i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
          

        <!-- Modal edit class -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form method="POST" action="edit_class.php">
                    <input id="id" type="hidden" class="form-control" name="id" value="" /> 
                    <div class="modal-header bg-green">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                        <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Clasă</h4>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="class">Clasa</label>
                                        <input type="text" class="form-control" id="class" name="class" placeholder="Introduceți clasa {10 A, 10 B etc.}">
                                    </div>

                                    <div class="form-group">
                                        <label for="nr_learners">Numărul de elevi</label>
                                        <input type="number" class="form-control" id="nr_learners" name="nr_learners" placeholder="Cîți elevi sunt în clasă">
                                    </div>

                                    <div class="form-group">
                                        <label for="class_master">Diriginte</label>
                                        <input type="text" class="form-control" id="class_master" name="class_master" placeholder="Introduceți numele dirigintelui">
                                    </div>

                                    <div class="form-group">
                                        <label for="classroom">Sala clasei</label>
                                        <input type="text" class="form-control" id="classroom" name="classroom" placeholder="Introduceți sala clasei">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Închideți</button>
                            <input type="submit" class="btn btn-primary"value="Salvați"/>
                        </div>
                </form>
            </div> <!-- modal-content -->
        </div> <!-- modal-dialog -->
        </div>
      </div> <!-- col -->
    </div> <!-- row --> 
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->