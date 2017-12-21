<?php
require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addprof'])) {
  
    $nameProf = protect($_POST['name_prof']);
    $password = protect($_POST['password']);
    $btdProf = protect(date('Y-m-d',strtotime($_POST['btd_prof'])));
    $emailProf = protect($_POST['email_prof']);
    $class_master = protect($_POST['sel_class']);
    $mobProf = protect($_POST['mob_prof']);
    $grad = protect($_POST['grad']);
    $discpl = protect($_POST['sel_discpl']);
    $category = protect($_POST['category']);

    if($nameProf == NULL){
        echo '<script>alert("Adăugați numele și prenumele profesorului!");</script>';
    } else {
        if ($btdProf == NULL) {
            echo '<script>alert("Adăugați numele și prenumele elevului!");</script>';
        } else {
            if ($emailProf == NULL || !filter_var($emailProf, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Adăugați poșta electronică a profesorului!");</script>';
            } else {
                if ($class_master == NULL) {
                    echo '<script>alert("Selectați un răspuns dacă profesorul este diriginte!");</script>';
                } else {
                    if ($mobProf == NULL) {
                        echo '<script>alert("Adăugați numărul de mobil al profesorului!");</script>';
                    } else {
                        if ($grad == NULL) {
                            echo '<script>alert("Selectați gradul didactic al profesorului!");</script>';
                        } else {
                            if ($category == NULL) {
                                echo '<script>alert("Categoria nu este selectată!");</script>';
                            } else {
                                if ($discpl == NULL) {
                                    echo '<script>alert("Selectați o disciplină!");</script>';
                                } else {
                                    if ($password == NULL || empty($password) || strlen($password) < 6) {
                                        echo '<script>alert("Parola trebuie să conțină minim 6 caratere mari și mici!");</script>';
                                    } else {
                                        $password = md5($password);

                                        $sql = "INSERT INTO users (user_name, user_password, user_class, user_btd, user_mail, user_mob, grad_prof, user_category, disciplina) VALUES ('$nameProf','$password','$class_master','$btdProf','$emailProf','$mobProf', '$grad', '$category', '$discpl')";

                                        if (mysqli_query($db, $sql)) {
                                            echo '<script>alert("Profesor adăugat cu succes!");</script>';
                                        } else {
                                            echo '<script>alert("Eroare la adăugare!");</script>';
                                            echo mysqli_error($db);
                                        }
                                    }
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
$query = $db->query("SELECT user_id, user_name, user_password, user_category, user_class, user_btd, user_mail, user_mob, grad_prof, disciplina FROM users WHERE user_category='profesor'");
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
               
                if(confirm("Ești sigur(ă) că dorești să ștergi acest profesor?")) {
                    $.ajax({
                        type: "POST",
                        url: 'delete_prof.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Profesorul a fost șters din baza de date!');
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
      <h1>Pagina de administrare a profesorilor</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Administrare profesori</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box-header bg-red content-title">
          <h3 class="box-title">Operații adăugare-modificare-ștergere-vizualizare profesori</h3>
        </div>
        <div class="info-box" style="padding:5px;">
        
        <form class="form-horizontal" action="" method="post" style="padding:5px;">
            <div class="box-body">
              <div class="form-group">
                <label for="nameprof">Nume profesor</label>
                  <input type="text" class="form-control" id="nameprof" name="name_prof" placeholder="Introduceți numele profesorului" autofocus>
              </div>
                    
              <div class="form-group">
                <label for="password">Parolă profesor</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru profesor">
                  <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="btd_prof">Data nașterii</label>
                  <input type="date" class="form-control" id="btd_prof" name="btd_prof" placeholder="Luna/Ziua/Anul {01/08/1970}">
              </div>

              <div class="form-group">
                <label for="email_prof">Email profesor</label>
                  <input type="email" class="form-control" id="email_prof" name="email_prof" placeholder="Introduceți adresa poștei electronice a profesorului" required>
              </div>

              <div class="form-group">
                <label for="mob_prof">Mobil profesor</label>
                  <input type="number" class="form-control" id="mob_prof" name="mob_prof" placeholder="Introduceți nr. de mobil al profesorului" required>
              </div>

              <div class="form-group">
                <label for="grad">Grad didactic</label>
                  <select class="form-control" id="grad" name="grad">
                    <option>Selectați gradul didactic</option>
                    <option value="gradul doi">Gradul doi</option>
                    <option value="gradul întîi">Gradul întîi</option>
                    <option value="gradul superior">Gradul superior</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="class">Diriginte</label>
                  <select class="form-control" id="class" name="sel_class">
                    <option>Selectați o clasă</option>
                    <option value="nu">Nu este diriginte</option>
                    <option value="10 A">Clasa 10 A</option>
                    <option value="10 B">Clasa 10 B</option>
                    <option value="10 C">Clasa 10 C</option>
                    <option value="11 A">Clasa 11 A</option>
                    <option value="11 B">Clasa 11 B</option>
                    <option value="11 C">Clasa 11 C</option>
                    <option value="12 A">Clasa 12 A</option>
                    <option value="12 B">Clasa 12 B</option>
                    <option value="12 C">Clasa 12 C</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="discipline">Disciplina de profil</label>
                  <select class="form-control" id="discipline" name="sel_discpl">
                    <option>Selectați disciplina profesorului</option>
                    <option value="biologie">Biologie</option>
                    <option value="chimie">Chimie</option>
                    <option value="ed.fizică">Ed.fizică</option>
                    <option value="ed.civică">Ed.civică</option>
                    <option value="ed.sănătate">Ed.sănătate</option>
                    <option value="fizică">Fizică</option>
                    <option value="geografie">Geografie</option>
                    <option value="informatică">Informatică</option>
                    <option value="istorie">Istorie</option>
                    <option value="l.engleză">L.engleză</option>
                    <option value="l.franceză">L.franceză</option>
                    <option value="l.lit.română">L.lit.română</option>
                    <option value="matematică">Matematică</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="category">Categoria</label>
                  <select class="form-control" id="category" name="category">
                    <option value="profesor">Profesor</option>
                  </select>
              </div>

              <div class="form-group">
                <button type="submit" name="addprof" class="btn btn-success">Adăugare profesor</button>
                <button type="reset" class="btn btn-danger">Curățire</button>
              </div>
            </div>
          </form>


            <div class="table-responsive">
            <table class="table table-responsive table-bordered table-hover table-condensed" id="tabelProf">
                    <thead>
                        <tr>
                            <th>Nume</th>
                            <th>Parola</th>
                            <th>Data nașterii</th>
                            <th>Poșta</th>
                            <th>Mobil</th>
                            <th>Diriginte</th>
                            <th>Grad didactic</th>
                            <th>Discplina</th>
                            <th style="width:50px;">Funcții</th>
                        </tr>
                    </thead>
                        <?php 
                            foreach ($tableData as $key => $value) : ?>
                                <tr>
                                    <td> <?= $value[1] ?> </td>
                                    <td> <?= $value[2] ?> </td>
                                    <td> <?= $value[5] ?> </td>
                                    <td> <?= $value[6] ?> </td>
                                    <td> <?='0'. $value[7] ?> </td>
                                    <td> <?= $value[4] ?> </td>
                                    <td> <?= $value[8] ?> </td>
                                    <td> <?= $value[9] ?> </td>
                                    <td>&nbsp;
                                    <a data-id="<?= $value[0] ?>" class="edit" href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" title="Modifică datele profesorului">&nbsp;</i></a>
                                        <a data-id="<?= $value[0] ?>" class="delete" href="#"><i class="glyphicon glyphicon-trash" title="Șterge profesorul">&nbsp;</i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
            </div>
        </div>
          

        <!-- Modal edit user -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form method="POST" action="edit_prof.php">
                    <input id="id" type="hidden" class="form-control" name="id" value="" /> 
                    <div class="modal-header bg-green">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                        <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Profesor</h4>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="nameprof">Nume profesor</label>
                                        <input type="text" class="form-control" id="nameprof" name="name_prof" placeholder="Introduceți numele profesorului" autofocus>
                                    </div>
                                            
                                    <div class="form-group">
                                        <label for="password">Parolă profesor</label>
                                        <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru profesor">
                                        <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="btd_prof">Data nașterii</label>
                                        <input type="date" class="form-control" id="btd_prof" name="btd_prof" placeholder="Luna/Ziua/Anul {01/08/1970}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email_prof">Email profesor</label>
                                        <input type="email" class="form-control" id="email_prof" name="email_prof" placeholder="Introduceți adresa poștei electronice a profesorului">
                                    </div>

                                    <div class="form-group">
                                        <label for="mob_prof">Mobil profesor</label>
                                        <input type="number" class="form-control" id="mob_prof" name="mob_prof" placeholder="Introduceți nr. de mobil al profesorului">
                                    </div>

                                    <div class="form-group">
                                        <label for="grad">Grad didactic</label>
                                        <select class="form-control" id="grad" name="grad">
                                            <option>Selectați gradul didactic</option>
                                            <option value="gradul doi">Gradul doi</option>
                                            <option value="gradul întîi">Gradul întîi</option>
                                            <option value="gradul superior">Gradul superior</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="class">Diriginte</label>
                                        <select class="form-control" id="class" name="sel_class">
                                            <option>Selectați o clasă</option>
                                            <option value="nu">Nu este diriginte</option>
                                            <option value="10 A">Clasa 10 A</option>
                                            <option value="10 B">Clasa 10 B</option>
                                            <option value="10 C">Clasa 10 C</option>
                                            <option value="11 A">Clasa 11 A</option>
                                            <option value="11 B">Clasa 11 B</option>
                                            <option value="11 C">Clasa 11 C</option>
                                            <option value="12 A">Clasa 12 A</option>
                                            <option value="12 B">Clasa 12 B</option>
                                            <option value="12 C">Clasa 12 C</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="discipline">Disciplina de profil</label>
                                        <select class="form-control" id="discipline" name="sel_discpl">
                                            <option>Selectați disciplina profesorului</option>
                                            <option value="biologie">Biologie</option>
                                            <option value="chimie">Chimie</option>
                                            <option value="ed.fizică">Ed.fizică</option>
                                            <option value="ed.civică">Ed.civică</option>
                                            <option value="ed.sănătate">Ed.sănătate</option>
                                            <option value="fizică">Fizică</option>
                                            <option value="geografie">Geografie</option>
                                            <option value="informatică">Informatică</option>
                                            <option value="istorie">Istorie</option>
                                            <option value="l.engleză">L.engleză</option>
                                            <option value="l.franceză">L.franceză</option>
                                            <option value="l.lit.română">L.lit.română</option>
                                            <option value="matematică">Matematică</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Categoria</label>
                                        <select class="form-control" id="category" name="category">
                                            <option value="profesor">Profesor</option>
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