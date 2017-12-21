
	<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Vizualizare Elevi
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Vizualizare elevi</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Tabelul de vizualizare a elevilor</h3>
          </div>
          
          <div class="panel">
      <?
        require_once '../includes/connectDB';

        // Attempt select query execution
        $sql = "SELECT user_name, user_class, user_btd, user_mail, user_mob FROM users WHERE user_category = 'elev' ";

        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table id="viewTable" class="table table-bordered table-striped table-condensed">';
                    echo '<thead>';
                      echo '<tr>';
                        echo '<th>Nume elev</th>';
                        echo '<th>Clasa</th>';
                        echo '<th>Data nașterii</th>';
                        echo '<th>Email</th>';
                        echo '<th>Mobil</th>';
                      echo '</tr>';
                    echo '<thead>';
                    echo '<tbody>';

                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                      echo "<td>" . $row['user_name'] . "</td>";
                      echo "<td>" . $row['user_class'] . "</td>";
                      echo "<td>" . $row['user_btd'] . "</td>";
                      echo "<td>" . $row['user_mail'] . "</td>";
                      echo "<td>". "0" . $row['user_mob'] . "</td>";
                    echo "</tr>";
                }
                  echo '</tbody>';
                    echo '<tfoot>';
                        echo '<tr>';
                          echo '<th>Nume elev</th>';
                          echo '<th>Clasa</th>';
                          echo '<th>Data nașterii</th>';
                          echo '<th>Email</th>';
                          echo '<th>Mobil</th>';
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