<?
/* function to fill select with classes */
function fillClass($db) {
      $output = '';
      $sql = "SELECT DISTINCT user_class FROM `users` WHERE user_class <> 'nu' AND user_class <> ' ' GROUP BY user_class";
      $result = mysqli_query($db, $sql);
      
      while($row = mysqli_fetch_array($result)) {
            $output .= '<option value="'.$row["user_class"].'">'.'Clasa '.$row["user_class"].'</option>';
      }
      return $output;
}

/* function to load content by choice of class */
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

      $sql = "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$math';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$fiz';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$biol';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$chem';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$health';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$civ';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$geog';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$info';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$hist';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$eng';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$franc';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.abs), abs.user_class FROM abs WHERE abs.disciplina='$roman'";

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
} // end function fillContent

/* function to fill select with disciplines */
function fillDiscipline($db) {
      $output = '';
      $sql = "SELECT DISTINCT disciplina FROM `users` WHERE disciplina <> 'nu' AND disciplina <> ' ' GROUP BY disciplina";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result)) {
            $output .= '<option value="'.$row["disciplina"].'">'.'Disciplina '.$row["disciplina"].'</option>';
      }
      return $output;
}

/* function to load unmotivated abs by choice of class */
function fillContentDisciplineM($db) {
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
      $unmotivated = trim(stripslashes(htmlspecialchars('motivat')));

      $sql1 = "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$math' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$fiz' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$biol' AND abs.motivat='$unmotivated'";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$chem' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$health' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$civ' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$geog' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$info' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$hist' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$eng' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$franc' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$roman' AND abs.motivat='$unmotivated'";
                                    
      /* execute multi query */
      if (mysqli_multi_query($db, $sql1)) {
            do {
            /* store first result set */
                  if ($result1 = mysqli_store_result($db)) {
                        while ($row1 = mysqli_fetch_row($result1)) {
                              $output .= '
                                    <tr>
                                          <td>'.$row1[0].'</td>
                                          <td>'.$row1[1].'</td>
                                    </tr>
                              ';
                        }
                        mysqli_free_result($result1);
                  }
            } while (mysqli_next_result($db));
      }
      return $output;
      /* close connection */
      mysqli_close($db);
}

/* function to load ununmotivated abs by choice of class */
function fillContentDisciplineN($db) {
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
      $unmotivated = trim(stripslashes(htmlspecialchars('nemotivat')));

      $sql1 = "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$math' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$fiz' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$biol' AND abs.motivat='$unmotivated'";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$chem' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$health' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$civ' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$geog' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$info' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$hist' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$eng' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$franc' AND abs.motivat='$unmotivated';";
      $sql1 .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$roman' AND abs.motivat='$unmotivated'";
                                    
      /* execute multi query */
      if (mysqli_multi_query($db, $sql1)) {
            do {
            /* store first result set */
                  if ($result1 = mysqli_store_result($db)) {
                        while ($row1 = mysqli_fetch_row($result1)) {
                              $output .= '
                                    <tr>
                                          <td>'.$row1[0].'</td>
                                          <td>'.$row1[1].'</td>
                                    </tr>
                              ';
                        }
                        mysqli_free_result($result1);
                  }
            } while (mysqli_next_result($db));
      }
      return $output;
      /* close connection */
      mysqli_close($db);
}

?>