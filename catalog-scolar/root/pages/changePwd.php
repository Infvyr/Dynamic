<?
$title = "Schimbare parolă curentă";
require_once '../includes/connectDB';

if (isset($_POST['changepwd'])) {
$old_pwd = md5($_POST['pwd']);
$new_pwd = md5($_POST['newpwd']);
$repeat_pwd = md5($_POST['newpwd2']);

$chg_pwd = mysqli_query($db,"SELECT user_password FROM users WHERE user_id ='1'");
$res_row = mysqli_fetch_array($chg_pwd,MYSQL_ASSOC);
$data_pwd = $res_row['user_password'];

if ($data_pwd == $old_pwd) {
  if ($new_pwd == $repeat_pwd) {
    $updata_pwd = mysqli_query($db, "UPDATE users SET user_password = '$new_pwd' WHERE user_id = '1'");
    echo "
      <script>
        alert('Parola dvs. a fost modificată cu success!');
        window.location = 'http://localhost/catalog-scolar/root/';
      </script>";
  } else {
    echo "
      <script>
        alert('Datele introduse în cîmpurile Parolă nouă și Repetați parola nouă nu se potrivesc!'); 
       // window.location='http://localhost/catalog-scolar/root/pages/changePwd.php';
      </script>";
  }
} else {
  echo "
    <script>
      alert('Parola curentă este introdusă incorect!');
      //window.location = 'http://localhost/catalog-scolar/root/pages/changePwd.php';
    </script>";
}
mysqli_close($db);
}


require_once 'head.php';
echo '
<div class="container content">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="box-header with-border bg-green content-title">
        <h3 class="box-title">Modificare parolă curentă</h3>
      </div>

      <div class="col-md-12">
        <form class="form-horizontal" action="" method="post">
          <div class="form-group">
            <label for="pwd">Parola curentă</label>
            <div class="input-group">
            <input type="password" class="form-control" id="pwd" name="pwd" required> 
            <span id="password_show_button" class="input-group-addon"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="newpwd">Parola nouă</label>
            <div class="input-group">
            <input type="password" class="form-control" id="newpwd" name="newpwd" required> 
            <span id="password_show_button2" class="input-group-addon"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label for="newpwd2">Repetați parola nouă</label>
            <div class="input-group">
            <input type="password" class="form-control" id="newpwd2" name="newpwd2" required> 
            <span id="password_show_button3" class="input-group-addon"><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="changepwd" class="btn btn-danger">Modificare</button>
            <a href="http://localhost/catalog-scolar/root/" title="înapoi la principală" rel="nofollow" class="btn btn-primary">Înapoi</a>
          </div>
        </form>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
';
?>