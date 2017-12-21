<?php

require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addprof'])) {
  
    $nameMan = protect($_POST['name_man']);
    $password = protect($_POST['password']);
    $btdMan = protect(date('Y-m-d',strtotime($_POST['btd_man'])));
    $emailMan = protect($_POST['email_man']);
    $mobMan = protect($_POST['mob_man']);
    $category = protect($_POST['category']);

    if ($nameMan == NULL && empty($nameMan)) {
      echo '<script>alert("Nu ați scris numele și prenumele directorului!");</script>';
    } else {
      if ($btdMan == NULL) {
        echo '<script>alert("Nu ați indicat data nașterii directorului!");</script>';
      } else {
        if ($emailMan == NULL && !filter_var($emailMan, FILTER_VALIDATE_EMAIL)) {
          echo '<script>alert("Nu ați indicat corect adresa poștei electronice a directorului!");</script>';
        } else {
          if ($mobMan == NULL && empty($mobMan)) {
            echo '<script>alert("Nu ați scris numărul mobil al directorului!");</script>';
          } else {
            if ($category == NULL) {
              echo '<script>alert("Nu ați ales categoria!");</script>';
            } else {
              if ($password == NULL && strlen($password) < 6) {
                echo '<script>alert("Parola trebuie să conțină minim 6 caratere mari și mici!!");</script>';
              } else {
                $password = md5($password);

                $sql = "INSERT INTO users (user_name, user_password, user_btd, user_mail, user_mob, user_category) VALUES ('$nameMan','$password','$btdMan','$emailMan', '$mobMan', '$category')";

                if (mysqli_query($db, $sql)){
                  echo '<script>alert("Datele directorului au fost adăugate cu succes!");</script>';
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

/* ================================================================================================ */
$query = $db->query("SELECT user_id, user_name, user_password, user_category, user_btd, user_mail, user_mob FROM users WHERE user_category='director'");
$tableData = $query->fetch_all();
//var_dump($tableData);die;
mysqli_close($db);
?>

<script type="text/javascript">
        $(function(){
            $('.edit').click(function() {
                var id = $(this).data('id'); 
                $('#id').val(id);
            });
        /* ================================= */
            $(".delete").click(function(){
                var thisElement = $(this);
                var id = thisElement.data('id');
               
                if(confirm("Ești sigur(ă) că dorești să ștergi directorul din baza de date?")) {
                    $.ajax({
                        type: "POST",
                        url: 'delete_manager.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Directorul a fost șters din baza de date!');
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
      <h1>Pagina de administrare a directorului</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Administrare director</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box-header bg-orange content-title">
          <h3 class="box-title">Operații adăugare-modificare-ștergere-vizualizare director</h3>
        </div>
        <div class="info-box" style="padding:5px;">
        
        <form class="form-horizontal" action="" method="post" style="padding:5px;">
            <div class="box-body">
              <div class="form-group">
                <label for="nameman">Nume director</label>
                  <input type="text" class="form-control" id="nameman" name="name_man" placeholder="Introduceți numele directorului" autofocus required>
              </div>
                    
              <div class="form-group">
                <label for="password">Parolă părinte</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru director" required>
                  <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="btd_man">Data nașterii</label>
                  <input type="date" class="form-control" id="btd_man" name="btd_man" placeholder="Luna/Ziua/Anul {01/08/1970}">
              </div>

              <div class="form-group">
                <label for="email_man">Email director</label>
                  <input type="email" class="form-control" id="email_man" name="email_man" placeholder="Introduceți adresa poștei electronice a directorului" required>
              </div>

              <div class="form-group">
                <label for="mob_man">Mobil director</label>
                  <input type="number" class="form-control" id="mob_man" name="mob_man" placeholder="Introduceți nr. de mobil al directorului" required>
              </div>

              <div class="form-group">
                <label for="category">Categoria</label>
                  <select class="form-control" id="category" name="category">
                    <option value="director">Director</option>
                  </select>
              </div>

              <div class="form-group">
                <button type="submit" name="addprof" class="btn btn-success">Adăugare director</button>
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
                                    <td>&nbsp;
                                    <a data-id="<?= $value[0] ?>" class="edit" href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" title="Modifică datele directorului">&nbsp;</i></a>
                                        <a data-id="<?= $value[0] ?>" class="delete" href="#"><i class="glyphicon glyphicon-trash" title="Șterge director">&nbsp;</i></a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                </table>
        </div>
          

        <!-- Modal edit parent -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" >
            <div class="modal-content">
                <form method="POST" action="edit_manager.php">
                    <input id="id" type="hidden" class="form-control" name="id" value="" /> 
                    <div class="modal-header bg-orange">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                        <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Director</h4>
                    </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                      <label for="namepar">Nume director</label>
                                        <input type="text" class="form-control" id="namepar" name="name_man" placeholder="Introduceți numele directorului" autofocus>
                                    </div>
                                          
                                    <div class="form-group">
                                      <label for="password">Parolă director</label>
                                      <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți o parolă pentru director">
                                        <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="btd_man">Data nașterii</label>
                                        <input type="date" class="form-control" id="btd_man" name="btd_man" placeholder="Luna/Ziua/Anul {01/08/1970}">
                                    </div>

                                    <div class="form-group">
                                      <label for="email_man">Email director</label>
                                        <input type="email" class="form-control" id="email_man" name="email_man" placeholder="Introduceți adresa poștei electronice a directorului">
                                    </div>

                                    <div class="form-group">
                                      <label for="mob_man">Mobil director</label>
                                        <input type="number" class="form-control" id="mob_man" name="mob_man" placeholder="Introduceți nr. de mobil al directorului">
                                    </div>

                                    <div class="form-group">
                                      <label for="category">Categoria</label>
                                        <select class="form-control" id="category" name="category">
                                          <option value="director">Director</option>
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