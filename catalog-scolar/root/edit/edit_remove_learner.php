
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
               
                if(confirm("Ești sigur(ă) că dorești să ștergi acest elev?")) {
                    $.ajax({
                        type: "POST",
                        url: 'deletelearner.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Elevul a fost șters din baza de date!');
                            if(data == 1) {
                                thisElement.closest('tr').remove();
                            }
                        }
                    });
                }
            });
        });
    </script> 
<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Editare-Ștergere Elevi
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Editare-ștergere elevi</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Tabelul de editare/ștergere a elevilor</h3>
          </div>
          
          <div class="panel">
      <?
        require_once '../includes/connectDB';

        // Attempt select query execution
        $sql = "SELECT user_id, user_name, user_password, user_class, user_btd, user_mail, user_mob FROM users WHERE user_category = 'elev' ";

        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table id="edit_removeTable" class="table table-bordered table-striped table-condensed">';
                    echo '<thead>';
                      echo '<tr>';
                        echo '<th>Nume elev</th>';
                        echo '<th>Parola elev</th>';
                        echo '<th>Clasa</th>';
                        echo '<th>Data nașterii</th>';
                        echo '<th>Email</th>';
                        echo '<th>Mobil</th>';
                        echo '<th>Funcții</th>';
                      echo '</tr>';
                    echo '<thead>';
                    echo '<tbody>';

                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                      echo "<td>" . $row['user_name'] . "</td>";
                      echo "<td>" . $row['user_password'] . "</td>";
                      echo "<td>" . $row['user_class'] . "</td>";
                      echo "<td>" . $row['user_btd'] . "</td>";
                      echo "<td>" . $row['user_mail'] . "</td>";
                      echo "<td>" ."0" . $row['user_mob'] . "</td>";
                      echo '<td> 
                        <a data-id="'.$row["user_id"].'" class="edit" href="#" data-toggle="modal" data-target="#editlearner"><i class="glyphicon glyphicon-pencil" title="Editare elev">&nbsp;</i></a>
                        <a data-id="'.$row["user_id"].'" class="delete" href="#"><i class="glyphicon glyphicon-trash" title="Șterge elev">&nbsp;</i></a> 
                      </td>';
                    echo "</tr>";
                }
                  echo '</tbody>';
                    echo '<tfoot>';
                        echo '<tr>';
                          echo '<th>Nume elev</th>';
                          echo '<th>Parola elev</th>';
                          echo '<th>Clasa</th>';
                          echo '<th>Data nașterii</th>';
                          echo '<th>Email</th>';
                          echo '<th>Mobil</th>';
                          echo '<th>Funcții</th>';
                      echo '</tr>';
                    echo '</tfoot>';
                echo '</table>';

                // Free result set
                mysqli_free_result($result);
            } else{
                echo "Nici o înregistrare potrivită n-a fost găsită.";
            }
        } else{
            echo "EROARE: $sql. " . mysqli_error($db);
        }
        // Close connection
        mysqli_close($db);
      ?>
        </div> <!-- col-md-12 -->
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>

<!-- Modal edit user -->
<div class="modal" id="editlearner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
        <form method="POST" action="editlearner.php">
            <input id="id" type="hidden" class="form-control" name="id" value="" /> 
            <div class="modal-header bg-green">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Carte</h4>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Nume Elev</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Introduceti numele elevului (nume,prenume)" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Parolă elev</label>
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="parola noua a elevului">
                            </div>

                            <div class="form-group">
                                <label for="class">Clasa</label>
                                <input type="text" class="form-control" id="class" name="class" placeholder="clasa elevului">
                            </div>
                            
                            <div class="form-group">
                                <label for="btd">Data nașterii</label>
                                <input type="date" class="form-control" id="btd" name="btd" placeholder="anul,luna,data nașterii elevului">
                            </div>

                            <div class="form-group">
                                <label for="mail">Email elev</label>
                                <input type="email" class="form-control" id="mail" name="mail" placeholder="introduceți poșta electronică a elevului">
                            </div>

                            <div class="form-group">
                                <label for="mob">Mobil elev</label>
                                <input type="number" class="form-control" id="mob" name="mob" placeholder="introduceți numărul mobil al elevului">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Închideți</button>
                    <input type="submit" class="btn btn-primary"value="Salvați modificările"/>
                </div>
        </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div>

<!-- dataTables js -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $("#edit_removeTable").DataTable();
    	responsive: true
  });
</script>