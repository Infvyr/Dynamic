<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="stats.php"><i class="fa fa-dashboard"></i><strong>Statistică</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Statistică absențe/note clase</h3>
        </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body no-padding">
                <form class="form-horizontal" action="" method="post" style="padding: 20px;">
                    <div class="form-group">
                        <label for="class">Clasa</label>
                        <select name="class" id="class" class="form-control">
                            <option value="10 A">10 A</option>
                            <option value="10 B">10 B</option>
                            <option value="10 C">10 C</option>
                            <option value="11 A">11 A</option>
                            <option value="11 B">11 B</option>
                            <option value="11 C">11 C</option>
                            <option value="12 A">12 A</option>
                            <option value="12 B">12 B</option>
                            <option value="12 C">12 C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="option1">Note</label>
                            <select name="option1" id="option1" class="form-control">
                                <option value="note">Note</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="option2">Absențe</label>
                            <select name="option2" id="option2" class="form-control">
                                <option value="absente">Absențe</option>
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="data1">Data de început</label>
                        <input type="date" name="data_start" id="data1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="data2">Data de sfîrșit</label>
                        <input type="date" name="data_end" id="data2" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="stats" class="btn btn-success">Procesare</button>
                    </div>
                </form>  
           </div>  <!-- /.box-body -->

        <div class="table-responsive">
        <?php
        $connect = mysqli_connect("localhost", "root", "", "catalog");
        mysqli_set_charset($connect,"UTF8"); # pentru diacritice

        if (isset($_POST['stats'])) {
            $class = trim(stripslashes(htmlspecialchars($_POST['class'])));
            $optiune1 = trim(stripslashes(htmlspecialchars($_POST['option1'])));
            $optiune2 = trim(stripslashes(htmlspecialchars($_POST['option2'])));
            $stardate = trim(stripslashes(htmlspecialchars($_POST['data_start'])));
            $enddate = trim(stripslashes(htmlspecialchars($_POST['data_end'])));

            if ($Q) {
                $query = " SELECT abs.data, abs.disciplina, abs.abs, abs.motivat, COUNT(abs.user_class), users.disciplina, users.user_name FROM abs, users WHERE abs.data BETWEEN '$stardate' AND '$enddate' AND abs.user_class='$class' AND abs.disciplina = users.disciplina AND users.user_name='$Q' ";

                $query2 = " SELECT note.nota, note.disciplina, COUNT(note.user_class), note.user_class, users.disciplina, users.user_name FROM note, users WHERE note.data BETWEEN '$stardate' AND '$enddate' AND note.user_class='$class' AND note.disciplina = users.disciplina AND users.user_name='$Q' ";
            }
        
            if($result = mysqli_query($connect, $query)){
                if(mysqli_num_rows($result) > 0){
                    echo '<table class="table table-bordered table-striped table-condensed">';
                        echo '<thead>';
                          echo '<tr>';
                            echo '<th>Perioada</th>';
                            echo '<th>Clasa</th>';
                            echo '<th>Disciplina</th>';
                            echo '<th>Total absențe</th>';
                          echo '</tr>';
                        echo '<thead>';
                        echo '<tbody>';

                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>"; 
                            echo "<td>" . $stardate .' - '. $enddate ."</td>";
                            echo "<td>" . $row[6] . "</td>";
                            echo "<td>" . $row[1] . "</td>";
                            echo "<td>" . $row[4] . "</td>";
                        echo "</tr>";
                    }
                      echo '</tbody>';
                    echo '</table>';

                    // Free result set
                    mysqli_free_result($result);
                } else{
                    echo "Nici o înregistrare potrivită n-a fost găsită.";
                }
            } else{
                echo "EROARE:" . mysqli_error($connect);
            }
            /*================================================*/

            if($result2 = mysqli_query($connect, $query2)){
                if(mysqli_num_rows($result2) > 0){
                    echo '<table class="table table-bordered table-striped table-condensed">';
                        echo '<thead>';
                          echo '<tr>';
                            echo '<th>Perioada</th>';
                            echo '<th>Clasa</th>';
                            echo '<th>Disciplina</th>';
                            echo '<th>Total note</th>';
                          echo '</tr>';
                        echo '<thead>';
                        echo '<tbody>';

                    while($row = mysqli_fetch_array($result2)){
                        echo "<tr>"; 
                            echo "<td>" . $stardate .' - '. $enddate ."</td>";
                            echo "<td>" . $row[3] . "</td>";
                            echo "<td>" . $row[4] . "</td>";
                            echo "<td>" . $row[2] . "</td>";
                        echo "</tr>";
                    }
                      echo '</tbody>';
                    echo '</table>';

                    // Free result set
                    mysqli_free_result($result2);
                } else{
                    echo "Nici o înregistrare potrivită n-a fost găsită.";
                }
            } else{
                echo "EROARE:" . mysqli_error($connect);
            }
        }
        mysqli_close($connect);
        ?>
        </div>
            
          </div>  <!-- /.box -->
        </div>
      </div> <!-- /.row -->
    </section>
    </div> <!-- /.content-wrapper -->
