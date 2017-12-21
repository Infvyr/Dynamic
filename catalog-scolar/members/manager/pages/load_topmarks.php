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
           $sql = "SELECT user_name, COUNT(nota) as total, user_class FROM note WHERE user_class='".$_POST["user_class"]."' GROUP BY user_name ORDER BY total DESC";  
      }
      else  
      {  
           $sql = "SELECT user_name, COUNT(nota) as total FROM note GROUP BY user_name ORDER BY total DESC";  
      }  
      $result = mysqli_query($db, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '
                <tr>
                <td>'.$row[0].'</td>
                <td>'.$row[1].'</td>
                </tr>
           ';  
      }  
    mysqli_close($db);
 }  
?>
                            <div class="" id="showMarks">  
                            <table class="table table-bordered table-hover table-condensed" id="topabs">
                            <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Clasament număr maxim de note pentru clasa <?= $_POST["user_class"]; ?></caption>
                            <thead>
                              <tr>                       
                                <th>Elevul</th>  
                                <th>Total</th>  
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
      $('#topmarks').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy',  'excel', 'pdf', 'print'
        ]
      });  
 });  
 </script>  