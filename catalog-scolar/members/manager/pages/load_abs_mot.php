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

  if(isset($_POST["disciplina"])) {
    if($_POST["disciplina"] != '') {
      $motivated = trim(stripslashes(htmlspecialchars('motivat')));
      $discipline = trim(stripslashes(htmlspecialchars($_POST['disciplina'])));
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

      $sql = "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat, abs.user_class FROM abs WHERE abs.motivat='$motivated' AND abs.disciplina='$discipline'";
    } else {
      $sql = "SELECT DISTINCT abs.disciplina,COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$math' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$biol' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$chem' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$health' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$civ' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$geog' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$info' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$hist' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$eng' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$franc' AND abs.motivat='$motivated';";
      $sql .= "SELECT DISTINCT abs.disciplina, COUNT(abs.motivat), abs.motivat FROM abs WHERE abs.disciplina='$roman' AND abs.motivat='$motivated'";
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
<div class="" id="showD1">
  <table class="table table-bordered table-hover table-condensed" id="abs_mot">
    <caption class="bg-info text-primary" style="padding:6px; font-size: 1.1em;">Date statistice per discipline - absențe motivate</caption>
    <thead>
      <tr>
        <th>Disciplina</th>
        <th>Total Absențe Motivate</th>
      </tr>
    </thead>
    <tbody>
      <?php echo $output;?>
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
  $('#abs_mot').DataTable({
    dom: 'Bfrtip',
    buttons: [
    'copy',  'excel', 'pdf', 'print'
    ]
  });
});
</script>