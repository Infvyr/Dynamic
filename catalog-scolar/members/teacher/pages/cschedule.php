<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Orarul Claselor</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i> Principală</a></li>
            <li class="active"><a href="clschedule.php"><i class="fa fa-dashboard"></i><strong>Orar clase</strong></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Orarul Claselor</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">

                                <?php
                                require_once '../../includes/connect';
                                $output = '';  
                                 $sql = "SELECT * FROM orarClase";  
                                 $result = mysqli_query($db, $sql);  
                                 
                                 if(mysqli_num_rows($result) > 0)  
                                 {  
                                     $output .= '  
                                      <div class="table-responsive">  
                                           <table class="table table-bordered table-hover"> 
                                                <thead> 
                                                <tr>                       
                                                     <th>Zi</th>  
                                                     <th>10 A</th>  
                                                     <th>10 B</th>  
                                                     <th>10 C</th>  
                                                     <th>11 A</th>  
                                                     <th>11 B</th>  
                                                     <th>11 C</th>  
                                                     <th>12 A</th>  
                                                     <th>12 B</th>  
                                                     <th>12 C</th>  
                                                </tr>
                                                </thead>';  
                                      while($row = mysqli_fetch_array($result))  
                                      {  
                                           $output .= ' 
                                                <tbody> 
                                                <tr>  
                                                     <td>'.$row["zi"].'</td>  
                                                     <td>'.$row["10a"].'</td>
                                                     <td>'.$row["10b"].'</td>
                                                     <td>'.$row["10c"].'</td>
                                                     <td>'.$row["11a"].'</td>
                                                     <td>'.$row["11b"].'</td>
                                                     <td>'.$row["11c"].'</td>
                                                     <td>'.$row["12a"].'</td>
                                                     <td>'.$row["12b"].'</td>
                                                     <td>'.$row["12c"].'</td>
                                                </tr>
                                                </tbody>
                                           ';  
                                      }  
                                 }  
                                 else  
                                 {  
                                      $output .= '<tr>  
                                                          <td colspan="4">Ne pare rău! Datele nu au fost găsite!</td>  
                                                     </tr>';  
                                 }  
                                 $output .= '</table>  
                                      </div>';  
                                 echo $output; 
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
