<?php 
  //load_data.php  
$db = mysqli_connect("localhost", "root", "", "catalog");
mysqli_set_charset($db,"UTF8"); # pentru diacritice

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$output = '';  
 if(isset($_POST["user_class"]))  
 {  
      if($_POST["user_class"] != '')  
      {  
          $class = trim(stripslashes(htmlspecialchars($_POST["user_class"])));
          
          $sql = "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='matematică' AND abs.user_class='$class';";
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='fizică' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='biologie' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='chimie' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='ed. sănătate' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='ed.civică' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='geografie' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='informatică' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='istorie' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.engleză';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.franceză' AND abs.user_class='$class';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.lit.română' AND abs.user_class='$class'";  
      }  
      else  
      {   
          $sql = "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='matematică';";
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='fizică';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='biologie';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='chimie';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='ed. sănătate';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='ed.civică';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='geografie';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='informatică';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='istorie';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.engleză';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.franceză';";  
          $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='l.lit.română'";
      }  
      /* execute multi query */
if (mysqli_multi_query($db, $sql)) {
    do {
        /* store first result set */
        if ($result = mysqli_store_result($db)) {
            while ($row = mysqli_fetch_row($result)) {
                $output .= '
                <tr>
                    <td>'.$row[0].'</td>
                    <td>'.$row[1].'</td>
                </tr>
                ';
            }
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($db));
}
   //   echo $output;  
 }  
?>
                            <div class="" id="showCatalog">  
                            <table class="table table-bordered table-hover table-condensed" id="example2">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per clase - absențe</caption>
                            <thead>
                              <tr>                       
                                <th>Disciplina</th>  
                                <th>Total Absențe</th>   
                              </tr>
                            </thead>
                            <tbody>
                              <?= $output; ?>
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
</div>
<!-- ./wrapper -->

<script>  
 $(document).ready(function(){  
      $('#example2').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      });  
 });  
 </script>  