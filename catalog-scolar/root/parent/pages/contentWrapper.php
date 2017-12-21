<?php
require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addprof'])) {
  
    $namePar = protect($_POST['name_par']);
    $password = protect($_POST['password']);
    $btdPar = protect(date('Y-m-d',strtotime($_POST['btd_par'])));
    $emailPar = protect($_POST['email_par']);
    $mobPar = protect($_POST['mob_par']);
    $child = protect($_POST['child']);
    $category = protect($_POST['category']);

    if ($namePar == NULL && empty($namePar)) {
      echo '<script>alert("Nu ați scris numele și prenumele părintelui!");</script>';
    } else {
      if ($child == NULL && empty($child)) {
        echo '<script>alert("Nu ați scris numele copilului!");</script>';
      } else {
        if ($btdPar == NULL) {
          echo '<script>alert("Nu ați indicat data nașterii părintelui!");</script>';
        } else {
          if ($emailPar == NULL && !filter_var($emailProf, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Nu ați indicat corect adresa poștei electronice a părintelui!");</script>';
          } else {
            if ($mobPar == NULL && empty($mobPar)) {
              echo '<script>alert("Nu ați scris numărul mobil al părintelui!");</script>';
            } else {
              if ($category == NULL) {
                echo '<script>alert("Nu ați ales categoria!");</script>';
              } else {
                if ($password == NULL && strlen($password) < 6) {
                  echo '<script>alert("Parola trebuie să conțină minim 6 caratere mari și mici!!");</script>';
                } else {
                  $password = md5($password);

                  $sql = "INSERT INTO users (user_name, user_password, user_btd, user_mail, user_mob, user_child, user_category) VALUES ('$namePar','$password','$btdPar','$emailPar', '$mobPar', '$child', '$category')";
                  
                  if (mysqli_query($db, $sql)){
                    echo '<script>alert("Părinte adăugat cu succes!");</script>';
                  } else {
                    echo '<script>alert("Eroare la adăugare!" . mysqli_error($db)");</script>';       
                  }
                }
              }
            }
          } 
        } 
      } 
    }
}

/* ================================================================================================ */
$query = $db->query("SELECT user_id, user_name, user_password, user_category, user_btd, user_mail, user_mob, user_child FROM users WHERE user_category='parinte'");
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
               
                if(confirm("Ești sigur(ă) că dorești să ștergi acest părinte?")) {
                    $.ajax({
                        type: "POST",
                        url: 'delete_parent.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Părintele a fost șters din baza de date!');
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
      <h1>Pagina de administrare a părinților</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Administrare părinți</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box-header bg-yellow content-title">
          <h3 class="box-title">Operații adăugare-modificare-ștergere-vizualizare părinți</h3>
        </div>
        <div class="info-box" style="padding:5px;">
        
        <form class="form-horizontal" action="" method="post" style="padding:5px;">
            <div class="box-body">
              <div class="form-group">
                <label for="namepar">Nume părinte</label>
                  <input type="text" class="form-control" id="namepar" name="name_par" placeholder="Introduceți numele părintelui" autofocus required>
              </div>
                    
              <div class="form-group">
                <label for="password">Parolă părinte</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru părinte" required>
                  <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="btd_par">Data nașterii</label>
                  <input type="date" class="form-control" id="btd_par" name="btd_par" placeholder="Luna/Ziua/Anul {01/08/1970}">
              </div>

              <div class="form-group">
                <label for="email_par">Email părinte</label>
                  <input type="email" class="form-control" id="email_par" name="email_par" placeholder="Introduceți adresa poștei electronice a profesorului" required>
              </div>

              <div class="form-group">
                <label for="mob_par">Mobil părinte</label>
                  <input type="number" class="form-control" id="mob_par" name="mob_par" placeholder="Introduceți nr. de mobil al părintelui" required>
              </div>

              <div class="form-group">
                <label for="child">Copilul părintelui</label>
                  <input type="text" class="form-control" id="child" name="child" placeholder="Introduceți numele copilului acestui părinte" required>
              </div>

              <div class="form-group">
                <label for="category">Categoria</label>
                  <select class="form-control" id="category" name="category">
                    <option value="parinte">Părinte</option>
                  </select>
              </div>

              <div class="form-group">
                <button type="submit" name="addprof" class="btn btn-success">Adăugare părinte</button>
                <button type="reset" class="btn btn-danger">Curățire</button>
              </div>
            </div>
          </form>


            <table class="table table-responsive table-bordered table-hover table-condensed" id="tabelPar">
                    <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Parola</th>
                            <th>Data nașterii</th>
                            <th>Poșta</th>
                            <th>Mobil</th>
                            <th>Copil</th>
                            <th>Funcții</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[1] ?> </td>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                    <td> <?= $value[5] ?> </td>
                                    <td> <?='0'. $value[6] ?> </td>
                                    <td> <?= $value[7] ?> </td>
                                    <td>&nbsp;
                                    <a data-id="<?= $value[0] ?>" class="edit" href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" title="Modifică datele părintelui">&nbsp;</i></a>
                                        <a data-id="<?= $value[0] ?>" class="delete" href="#"><i class="glyphicon glyphicon-trash" title="Șterge părinte">&nbsp;</i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        </div>
          

        <!-- Modal edit parent -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form method="POST" action="edit_parent.php">
                    <input id="id" type="hidden" class="form-control" name="id" value="" /> 
                    <div class="modal-header bg-green">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                        <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Părinte</h4>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="namepar">Nume părinte</label>
                                        <input type="text" class="form-control" id="namepar" name="name_par" placeholder="Introduceți numele părintelui" autofocus>
                                    </div>
                                          
                                    <div class="form-group">
                                      <label for="password">Parolă părinte</label>
                                      <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru părinte">
                                        <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="btd_par">Data nașterii</label>
                                        <input type="date" class="form-control" id="btd_par" name="btd_par" placeholder="Luna/Ziua/Anul {01/08/1970}">
                                    </div>

                                    <div class="form-group">
                                      <label for="email_par">Email părinte</label>
                                        <input type="email" class="form-control" id="email_par" name="email_par" placeholder="Introduceți adresa poștei electronice a profesorului">
                                    </div>

                                    <div class="form-group">
                                      <label for="mob_par">Mobil părinte</label>
                                        <input type="number" class="form-control" id="mob_par" name="mob_par" placeholder="Introduceți nr. de mobil al părintelui">
                                    </div>

                                    <div class="form-group">
                                      <label for="child">Copilul părintelui</label>
                                        <input type="text" class="form-control" id="child" name="child" placeholder="Introduceți numele copilului acestui părinte">
                                    </div>

                                    <div class="form-group">
                                      <label for="category">Categoria</label>
                                        <select class="form-control" id="category" name="category">
                                          <option value="parinte">Părinte</option>
                                        </select>
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