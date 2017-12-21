<?php
require_once '../includes/connectDB';
$output = '';  
 $sql = "SELECT * FROM orarClase ORDER BY orar_id ASC";  
 $result = mysqli_query($db, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>                       
                     <th width="10%">Zi</th>  
                     <th width="9%">10 A</th>  
                     <th width="9%">10 B</th>  
                     <th width="9%">10 C</th>  
                     <th width="9%">11 A</th>  
                     <th width="9%">11 B</th>  
                     <th width="9%">11 C</th>  
                     <th width="9%">12 A</th>  
                     <th width="9%">12 B</th>  
                     <th width="9%">12 C</th>  
                     <th width="8%">Șterge</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="zi" data-id1="'.$row["orar_id"].'" contenteditable>'.$row["zi"].'</td>  
                     <td class="10a" data-id2="'.$row["orar_id"].'" contenteditable>'.$row["10a"].'</td>
                     <td class="10b" data-id3="'.$row["orar_id"].'" contenteditable>'.$row["10b"].'</td>
                     <td class="10c" data-id4="'.$row["orar_id"].'" contenteditable>'.$row["10c"].'</td>
                     <td class="11a" data-id5="'.$row["orar_id"].'" contenteditable>'.$row["11a"].'</td>
                     <td class="11b" data-id6="'.$row["orar_id"].'" contenteditable>'.$row["11b"].'</td>
                     <td class="11c" data-id7="'.$row["orar_id"].'" contenteditable>'.$row["11c"].'</td>
                     <td class="12a" data-id8="'.$row["orar_id"].'" contenteditable>'.$row["12a"].'</td>
                     <td class="12b" data-id9="'.$row["orar_id"].'" contenteditable>'.$row["12b"].'</td>
                     <td class="12c" data-id10="'.$row["orar_id"].'" contenteditable>'.$row["12c"].'</td>

                     <td><button type="button" name="delete_btn" data-id11="'.$row["orar_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="zi" contenteditable></td>  
                <td id="10a" contenteditable></td>  
                <td id="10b" contenteditable></td>  
                <td id="10c" contenteditable></td>  
                <td id="11a" contenteditable></td>  
                <td id="11b" contenteditable></td>  
                <td id="11c" contenteditable></td>  
                <td id="12a" contenteditable></td>  
                <td id="12b" contenteditable></td>  
                <td id="12c" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
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