<?
require_once '../../includes/connect';

$query = mysqli_query($db,"SELECT * FROM users WHERE user_name='$Q' LIMIT 0,1");
$row = mysqli_fetch_assoc($query);
$date = date("d-m-Y", strtotime($row["user_btd"]));

function protectData ($data) {
    $data = mysql_escape_string(trim(strip_tags(addslashes($data))));
    $data = stripslashes(htmlspecialchars($data));
    return $data;
}

if (isset($_POST['update'])) {
  $id = intval(protectData($_POST["id"]));
  $name = protectData($_POST['name']);
  $btd = protectData($_POST['btd']);
  $mail = protectData($_POST['mail']);
  $mob = protectData($_POST['mob']);

  $res = mysqli_query($db, "UPDATE users SET
                    user_btd='$btd', user_mail='$mail', user_mob='$mob'
                    WHERE user_id='$id'");
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
            swal({  
                    title: 'Succes!',
                    text: 'Setările profilului au fost modificate',  
                    type: 'success',      
                    showConfirmButton: false, 
                });
            setTimeout(function() { window.location.href = 'http://localhost/catalog-scolar/members/learner/profile.php';}, 2000);
      </script>";
  }
  mysqli_close($db);
} 
echo '
    <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Profil '.$Q.'
      </h1>
      <ol class="breadcrumb">
        <li><a href="." title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
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
              <img class="profile-user-img img-responsive img-circle" src="../dist/img/avatar2.png" alt="User profile picture">
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
              <p class="text-muted">'.$date.'</p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
              <p class="text-muted">'.$row["user_mail"].'</p>
              <hr>
              <strong><i class="fa fa-mobile-phone margin-r-5"></i> Telefon de contact</strong>
              <p class="text-muted">(+373) 0'.$row["user_mob"].'</p>
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
                  <td class="text-info"><strong>Părinte</strong></td>
                  <td>'.$row["user_parent"].'</td>
                </tr>
                <tr>
                  <td class="text-info"><strong>Clasa</strong></td>
                  <td>'.$row["user_class"].'</td>
                </tr>
                <tr>
                  <td class="text-info"><strong>Date nașterii</strong></td>
                  <td>'.$date.'</td>
                </tr>
                <tr>
                  <td class="text-info"><strong>Poșta electronică</strong></td>
                  <td>'.$row["user_mail"].'</td>
                </tr>
                <tr>
                  <td class="text-info"><strong>Telefon de contact</strong></td>
                  <td>(+373) 0'.$row["user_mob"].'</td>
                </tr>
              </table>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">

                <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="id" value="'.$row["user_id"].'">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nume</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" value="'.$row['user_name'].'" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputBtd" class="col-sm-2 control-label">Data nașterii</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="btd" name="btd" value="'.$row["user_btd"].'" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="mail" class="col-sm-2 control-label">Poșta electronică</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="mail" name="mail" value="'.$row["user_mail"].'" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="mob" class="col-sm-2 control-label">Mobil</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="mob" name="mob" value="'.$row["user_mob"].'" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="update" class="btn btn-danger">Procesare</button>
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