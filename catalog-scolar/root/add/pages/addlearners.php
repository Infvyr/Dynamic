<?
require_once '../includes/connectDB';

function protect($string) {
  $string = mysql_escape_string(trim(strip_tags(addslashes($string))));
  return $string;
}

if (isset($_POST['addlearner'])) {
  
  $nameLearner = protect($_POST['namelearner']);
  $password = protect($_POST['password']);
  $selectClass = protect($_POST['sel_class']);
  $btdLearner = protect(date('Y-m-d',strtotime($_POST['btd_learner'])));
  $emaiLearner = protect($_POST['email_learner']);
  $mobLearner = protect($_POST['mob_learner']);
  $category = protect($_POST['category']);

  if ($nameLearner == NULL) {
    echo '<script>alert("Adăugați numele și prenumele elevului!");</script>';
  } else {
    if ($mobLearner == NULL) {
      echo '<script>alert("Adăugați numărul mobil al elevului!");</script>';
    } else {
      if ($selectClass == NULL) {
        echo '<script>alert("Selectați clasa!");</script>';
      } else {
        if ($category == NULL) {
          echo '<script>alert("Categoria este deja selectată!");</script>';
        } else {
          if ($btdLearner == NULL) {
            echo '<script>alert("Selectați/scrieți data nașterii!");</script>';
          } else {
            if ($emaiLearner == NULL || !filter_var($emaiLearner, FILTER_VALIDATE_EMAIL)) {
              echo '<script>alert("Adăugați poșta electronică a elevului!");</script>';
            } else {
              if ($password == NULL) {
                echo '<script>alert("Inserați o parola pentru elev!");</script>';
              } else {
                //  hash password
                  $password = md5($password);
                //  $password = hashword($password, $salt);
                // pentru ca parola sa nu fie hasuita comentez linia de mai sus

                 $sql = "INSERT INTO users (user_name, user_password, user_class, user_btd, user_mail, user_mob, user_category) VALUES ('$nameLearner','$password','$selectClass','$btdLearner','$emaiLearner','$mobLearner', '$category')";
                if (mysqli_query($db, $sql)) {
                  echo '<script>alert("Elevul a fost adăugat cu succes în baza de date!");</script>';
                } else {
                  echo '<script>alert("Eroare la adăugare!");</script>';
                  echo mysqli_error($db);
                }
              }
            }
          }
        }
      }
    }
  }
}
mysqli_close($db);
?>
	<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Adăugare Elevi
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/learner/" title="pagina de administrare a elevilor" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Adăugare elevi</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Forma de adăugare a elevilor</h3>
          </div>

          <form class="form-horizontal" action="" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="namelearner">Nume elev</label>
                  <input type="text" class="form-control" id="namelearner" name="namelearner" placeholder="Introduceți numele elevului" autofocus required>
              </div>
                    
              <div class="form-group">
                <label for="password">Parolă elev</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Introduceți parola elevului" required>
                  <span class="input-group-addon" id="passwd"><i class="fa fa-eye"></i></span>
                </div>
              </div>

              <div class="form-group">
                <label for="class">Selectați clasa</label>
                  <select class="form-control" id="class" name="sel_class">
                    <option>Selectați o clasă</option>
                    <option value="10 A">Clasa 10 A</option>
                    <option value="10 B">Clasa 10 B</option>
                    <option value="10 C">Clasa 10 C</option>
                    <option value="11 A">Clasa 11 A</option>
                    <option value="11 B">Clasa 11 B</option>
                    <option value="11 C">Clasa 11 C</option>
                    <option value="12 A">Clasa 12 A</option>
                    <option value="12 B">Clasa 12 B</option>
                    <option value="12 C">Clasa 12 C</option>
                  </select>
              </div>

              <div class="form-group">
                <label for="btd_learner">Data nașterii</label>
                  <input type="date" class="form-control" id="btd_learner" name="btd_learner" placeholder="Luna/Ziua/Anul">
              </div>

              <div class="form-group">
                <label for="email_learner">Email elev</label>
                  <input type="email" class="form-control" id="email_learner" name="email_learner" placeholder="Introduceți adresa poștei electronice a elevului" required>
              </div>

              <div class="form-group">
                <label for="mob_learner">Mobil elev</label>
                  <input type="number" class="form-control" id="mob_learner" name="mob_learner" placeholder="Introduceți nr. de mobil al elevului" required>
              </div>

              <div class="form-group">
                <label for="category">Categoria</label>
                  <select class="form-control" id="category" name="category">
                    <option value="elev">Elev</option>
                  </select>
              </div>

              <div class="form-group">
                <button type="submit" name="addlearner" class="btn btn-success">Adăugare elev</button>
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