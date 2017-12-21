<?
$id = (int)'1';
require_once '../includes/connectDB';

$query = mysqli_query($db,"SELECT * FROM users WHERE user_id='$id' LIMIT 0,1");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['process'])) {
  $id = trim(stripslashes(htmlspecialchars($_POST['id'])));
  $name = trim(stripslashes(htmlspecialchars($_POST['name'])));
  $btd = trim(stripslashes(htmlspecialchars($_POST['btd'])));
  $mail = trim(stripslashes(htmlspecialchars($_POST['mail'])));
  $mob = trim(stripslashes(htmlspecialchars($_POST['mob'])));

  $res = mysqli_query($db, "UPDATE users SET
                    user_name='$name', user_btd='$btd', user_mail='$mail', user_mob='$mob'
                    WHERE user_id='$id' ");
 if (!$res) {
    die('Date eronate' . mysqli_error());
  } else {
/*    echo "<script>
            setTimeout(function(){     
              if (!window.location.hash) {
                 window.location = window.location + '#update';
                window.location.reload();
            } 
          }, 1599);
          </script>";*/
      echo "<script>
          window.location.href = 'http://localhost/catalog-scolar/root/pages/profile.php';
      </script>";
  }
  mysqli_close($db);
} 

echo '
	<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profil Administrator
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Profilul meu</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar5.png" alt="User profile picture">
              <h3 class="profile-username text-center">' . $Q . '</h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informații rapide</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Nume</strong>
              <p class="text-muted">'. $Q . '</p>
              <hr>
              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Data nașterii</strong>
              <p class="text-muted">'. $nume_admin[7] .'</p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">'. $nume_admin[8] .'</p>
              <hr>
              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Telefon de contact</strong>
              <p class="text-muted">(+373) 0'. $nume_admin[9] .'</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Date personale</a></li>
              <li><a href="#settings" data-toggle="tab">Setări</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <table class="table table-hover">
                <tr>
                  <td class="text-info"><strong>Poșta electronică</strong></td>
                  <td>'. $nume_admin[8] .'</td>
                </tr>
                <tr>
                  <td class="text-info"><strong>Telefon de contact</strong></td>
                  <td>(+373) 0'. $nume_admin[9] .'</td>
                </tr>
              </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">

                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label for="id" class="col-sm-2 control-label">Identificator</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="id" name="id" 
                      value = "'.$row['user_id'].'" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Nume</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value="'.$row['user_name'].'" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputBtd" class="col-sm-2 control-label">Data nașterii</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="btd" name="btd" value="'.$row['user_btd'].'" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="mail" name="mail" value="'.$row['user_mail'].'" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mob" class="col-sm-2 control-label">Telefon</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="mob" name="mob" value="'.$row['user_mob'].'" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="process" class="btn btn-danger">Procesare</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
';

?>