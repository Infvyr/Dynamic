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
           $sql = "SELECT note.*, abs.* FROM note, abs WHERE note.user_name=abs.user_name AND note.user_class=abs.user_class AND note.user_class='".$_POST["user_class"]."'";  
      }  
      else  
      {  
           $sql = "SELECT note.*, abs.* FROM note, abs WHERE note.user_name=abs.user_name AND note.user_class=abs.user_class";  
      }  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[3].'</td>
                <td>'.$row[1].'</td>
                <td>'.date("d-m-Y", strtotime($row[2])).'</td>
                <td>'.$row[4].'</td>
                <td>'.$row[7].'</td>
                <td>'.date("d-m-Y", strtotime($row[8])).'</td>
                <td>'.$row[10].'</td>
                <td>'.$row[11].'</td>
                </tr>
           ';  
      }  
   //   echo $output;  
 }  
?>
                            <div class="" id="showCatalog">  
                            <table class="table table-bordered table-hover table-condensed" id="example">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Catalogul clasei</caption>
                            <thead>
                              <tr>                       
                                <th>Elevul</th>  
                                <th>Disciplina</th>  
                                <th>Data</th>  
                                <th>Nota</th>  
                                <th>Disciplina</th>  
                                <th>Data</th>  
                                <th>Absență</th>  
                                <th>Motivat</th>  
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