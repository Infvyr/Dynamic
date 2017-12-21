<?php
require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addschedule'])) {
  $zi = protect($_POST['sel_zi']);
  $pereche = protect($_POST['sel_pereche']);
  $disciplina1 = protect($_POST['sel_disciplina1']);
  $disciplina2 = protect($_POST['sel_disciplina2']);
  $disciplina3 = protect($_POST['sel_disciplina3']);
  $disciplina4 = protect($_POST['sel_disciplina4']);
  $disciplina5 = protect($_POST['sel_disciplina5']);
  $disciplina6 = protect($_POST['sel_disciplina6']);
  $disciplina7 = protect($_POST['sel_disciplina7']);
  $disciplina8 = protect($_POST['sel_disciplina8']);
  $disciplina9 = protect($_POST['sel_disciplina9']);

  // inserez datele selectate in baza de date
  $sql = "INSERT INTO orarClase (zi,pereche,10a,10b,10c,11a,11b,11c,12a,12b,12c) VALUES ('$zi','$pereche','$disciplina1','$disciplina2','$disciplina3','$disciplina4','$disciplina5','$disciplina6','$disciplina7','$disciplina8','$disciplina9')";
  
  if (mysqli_query($db, $sql)) {
    echo '<script>alert("Discipline adăugate cu succes în orarul claselor!");</script>';
  } else {
    echo '<script>alert("Eroare la adăugare! '.mysqli_error($db).' ");</script>';
    }
}
mysqli_close($db);
?>

<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Adăugare Orarul claselor
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Adăugare orar clase</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Forma de adăugare a orarului claselor</h3>
          </div>

          <form class="form-horizontal" action="" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="zi">Selectați ziua</label>
                <select class="form-control" id="zi" name="sel_zi">
                  <option value="luni">Luni</option>
                  <option value="marti">Marți</option>
                  <option value="miercuri">Miercuri</option>
                  <option value="joi">Joi</option>
                  <option value="vineri">Vineri</option>
                </select>
              </div>

            <div class="form-group">
              <label for="pereche">Selectați perechea</label>
                <select class="form-control" id="pereche" name="sel_pereche">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                </select>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d1">Selectați disciplina p/u 10 A</label>
                      <select class="form-control" id="d1" name="sel_disciplina1">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d2">Selectați disciplina p/u 10 B</label>
                      <select class="form-control" id="d2" name="sel_disciplina2">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d3">Selectați disciplina p/u 10 C</label>
                      <select class="form-control" id="d3" name="sel_disciplina3">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d4">Selectați disciplina p/u 11 A</label>
                      <select class="form-control" id="d4" name="sel_disciplina4">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d5">Selectați disciplina p/u 11 B</label>
                      <select class="form-control" id="d5" name="sel_disciplina5">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d6">Selectați disciplina p/u 11 C</label>
                      <select class="form-control" id="d6" name="sel_disciplina6">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d7">Selectați disciplina p/u 12 A</label>
                      <select class="form-control" id="d7" name="sel_disciplina7">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d8">Selectați disciplina p/u 12 B</label>
                      <select class="form-control" id="d8" name="sel_disciplina8">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label for="d9">Selectați disciplina p/u 12 C</label>
                      <select class="form-control" id="d9" name="sel_disciplina9">
                        <option>Selectați o disciplină</option>
                        <option value="Biologie">Biologie</option>
                        <option value="Chimia">Chimia</option>
                        <option value="Dirigenția">Dirigenția</option>
                        <option value="Ed.civică">Ed.civică</option>
                        <option value="Ed.fizică">Ed.fizică</option>
                        <option value="Ed.sănătate">Ed.sănătate</option>
                        <option value="Fizica">Fizica</option>
                        <option value="Geografie">Geografie</option>
                        <option value="Informatica">Informatica</option>
                        <option value="Istorie">Istorie</option>
                        <option value="L.franceză">L.franceză</option>
                        <option value="L.engleză">L.engleză</option>
                        <option value="L.lit.română">L.lit.română</option>
                        <option value="L.universală">L.universală</option>
                        <option value="Matematica">Matematica</option>
                        <option value="-">-</option>
                      </select>
                  </div>
                </div>
              </div> <!-- row -->
   
              <div class="form-group">
                <button type="submit" name="addschedule" class="btn btn-success">Adăugare</button>
                <button type="reset" class="btn btn-danger">Curățire</button>
              </div>
            </div>
          </form>
      
        </div> <!-- col-md-12 -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>