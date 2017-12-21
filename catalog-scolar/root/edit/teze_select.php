<?php
require_once '../includes/connectDB';
$output = '';  
 $sql = "SELECT * FROM orarTeze ORDER BY data ASC";  
 $result = mysqli_query($db, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>                       
                     <th width="16%">Disciplina</th>  
                     <th width="16%">Data</th>  
                     <th width="16%">Ora</th>  
                     <th width="16%">Locul</th>  
                     <th width="16%">Profesor</th>  
                     <th width="10%">Clasa</th>  
                     <th width="10%">Șterge</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td class="discipline" data-id1="'.$row["orar_id"].'" contenteditable>'.$row["discipline"].'</td>  
                     <td class="data" data-id2="'.$row["orar_id"].'" contenteditable>'.$row["data"].'</td>
                     <td class="ora" data-id3="'.$row["orar_id"].'" contenteditable>'.$row["ora"].'</td>
                     <td class="locul" data-id4="'.$row["orar_id"].'" contenteditable>'.$row["locul"].'</td>
                     <td class="prof" data-id5="'.$row["orar_id"].'" contenteditable>'.$row["prof"].'</td>
                     <td class="userClasa" data-id6="'.$row["orar_id"].'" contenteditable>'.$row["user_clasa"].'</td>

                     <td><button type="button" name="delete_btn" data-id7="'.$row["orar_id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td id="discipline" contenteditable></td>  
                <td id="data" contenteditable></td>  
                <td id="ora" contenteditable></td>  
                <td id="locul" contenteditable></td>  
                <td id="prof" contenteditable></td>  
                <td id="userClasa" contenteditable></td>  
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