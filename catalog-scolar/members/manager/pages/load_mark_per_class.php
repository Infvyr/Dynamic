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
          /* $sql = "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='ed. sănătate'";*/
           $sql = "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='matematică' AND note.user_class='".$_POST["user_class"]."';";
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='fizică' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='biologie' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='chimie' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='ed. sănătate' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='ed.civică' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='geografie' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='informatică' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='istorie' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.engleză';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.franceză' AND note.user_class='".$_POST["user_class"]."';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.lit.română' AND note.user_class='".$_POST["user_class"]."'";  
      }  
      else  
      {  
           /*$sql = "SELECT note.*, abs.* FROM note, abs WHERE note.user_name=abs.user_name AND note.user_class=abs.user_class";*/  
          $sql = "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='matematică';";
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='fizică';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='biologie';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='chimie';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='ed. sănătate';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='ed.civică';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='geografie';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='informatică';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='istorie';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.engleză';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.franceză';";  
          $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='l.lit.română'";
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
                            <table class="table table-bordered table-hover table-condensed" id="example">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per clase - note</caption>
                            <thead>
                              <tr>                       
                                <th>Disciplina</th>  
                                <th>Total Note</th>   
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
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      });  
 });  
 </script>  