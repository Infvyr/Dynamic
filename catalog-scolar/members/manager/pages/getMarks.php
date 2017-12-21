<?php
function fillClass($db) {
      $output = '';
      $sql = "SELECT DISTINCT user_class FROM `users` WHERE user_class <> 'nu' AND user_class <> ' ' GROUP BY user_class";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result)) {
            $output .= '<option value="'.$row["user_class"].'">'.'Clasa '.$row["user_class"].'</option>';
      }
      return $output;
}

function fillContent($db) {
      $output = '';
      $math = trim(stripslashes(htmlspecialchars('matematică')));
      $fiz = trim(stripslashes(htmlspecialchars('fizică')));
      $biol = trim(stripslashes(htmlspecialchars('biologie')));
      $chem = trim(stripslashes(htmlspecialchars('chimie')));
      $health = trim(stripslashes(htmlspecialchars('ed. sănătate')));
      $civ = trim(stripslashes(htmlspecialchars('ed.civică')));
      $geog = trim(stripslashes(htmlspecialchars('geografie')));
      $info = trim(stripslashes(htmlspecialchars('informatică')));
      $hist = trim(stripslashes(htmlspecialchars('istorie')));
      $eng = trim(stripslashes(htmlspecialchars('l.engleză')));
      $franc = trim(stripslashes(htmlspecialchars('l.franceză')));
      $roman = trim(stripslashes(htmlspecialchars('l.lit.română')));
      
      $sql = "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$math';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$fiz';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$biol';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$chem';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$health';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$civ';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$geog';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$info';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$hist';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$eng';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$franc';";
      $sql .= "SELECT DISTINCT note.disciplina, COUNT(note.nota), note.user_class FROM note WHERE note.disciplina='$roman'";
                                    
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
      return $output;
      /* close connection */
      mysqli_close($db);
}

function getClass($db) {
      $output = '';
      $sql = "SELECT DISTINCT user_class FROM `note` WHERE user_class <> 'nu' AND user_class <> ' ' GROUP BY user_class";
      $result = mysqli_query($db, $sql);
                                          
      while($row = mysqli_fetch_array($result)) {
            $output .= '<option value="'.$row["user_class"].'">'.'Clasa '.$row["user_class"].'</option>';
      }
      return $output;
      }

      function getDiscipline($db) {
      $output = '';
      $sql = "SELECT DISTINCT disciplina FROM `note` WHERE disciplina <> ' ' GROUP BY disciplina";
      $result = mysqli_query($db, $sql);
                                          
      while($row = mysqli_fetch_array($result)) {
            $output .= '<option value="'.$row["disciplina"].'">'.'Disciplina '.$row["disciplina"].'</option>';
      }
      return $output;
      }
?>