<?
if (isset($_POST['login']))//daca este apasat butonul de logare
    {
      $User = trim(stripslashes(htmlspecialchars($_POST["member_name"])));
      $pass = trim(stripslashes(htmlspecialchars($_POST["member_password"])));
      $pass2 = md5($pass);
      $user_status = trim(strip_tags(($_POST["member_status"])));

      require_once "includes/connect";

      $Q = mysqli_query($db, "SELECT user_category FROM users WHERE user_password='$pass2' and user_name='$User'  and user_category  = '" . $user_status ."' "); // tip user
      
      if($Q === FALSE) die(mysqli_error());
      $q = mysqli_fetch_row($Q);
      session_start(); // pentru transmiterea datelor intre pagini in aceeasi sesiune

      $_SESSION["member_password"] = "$pass2";
      $_SESSION["member_name"] = "$User";

      switch ($q[0]) { // redirectionare user
        case 'elev': header('Location: http://localhost/catalog-scolar/members/learner/index.php');
          break;
        case 'profesor': header('Location: http://localhost/catalog-scolar/members/teacher/index.php');
          break;
        case 'parinte': header('Location: http://localhost/catalog-scolar/members/parent/index.php');
          break;
        case 'director': header('Location: http://localhost/catalog-scolar/members/manager/index.php');
          break;
        default: //header('Location: http://localhost/catalog-scolar/'); 
                  $message = "<div class='error'>Nume/parolă incorect(ă). Verificați datele introduse!</div>";
          break;
      }
  }

?>
