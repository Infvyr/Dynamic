<?php

if(isset($_POST['load'])) {
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $conn = mysql_connect($dbhost, $dbuser, $dbpass);

  if(! $conn ){
    die('Could not connect: ' . mysql_error());
  }

  if(!get_magic_quotes_gpc()) {
    $den_articol = htmlspecialchars($_POST['den_articol']);
    $part_messg = htmlspecialchars($_POST['part_messg']);
    $messg = htmlspecialchars($_POST['messg']);
  } else {
    $den_articol = $_POST['den_articol'];
    $part_messg = $_POST['part_messg'];
    $messg = $_POST['messg'];
  }

  $date_field = date('Y-m-d',strtotime($_POST['date']));

  $sql = "INSERT INTO articles ".
       "(title,halfArticle, fullArticle, calendar) ".
       "VALUES ".
       "('$den_articol','$part_messg','$messg', '$date_field')";
  mysql_select_db('mainbibl');

  $retval = mysql_query( $sql, $conn );

  if(!$retval ){
    die('Datele indicate nu pot fi introduse: ' . mysql_error());
    header('Location: add_article.php');
  }
  echo '<script>alert("Datele au fost introduse cu succes");</script>';
  header('Refresh: 3; URL= add_article.php');

  mysql_close($conn);
  } else {

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Admin_Panel Add article</title>
    <link rel="icon" href="../media/img/book.ico" type="image/x-icon">
    <link href="../css/materialize.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>
  <body class="teal">
    <div class="container">
      <center style="margin-bottom:5%;">
        <h4 class="white-text">Adaugare articol</h4>
      </center>
      <aside style="margin-bottom:3%;">
        <a href="index.php" class="white-text btn-flat waves-effect green">Inapoi la principala</a>
      </aside>

      <form class="card-panel" method="post" action="<?php $_PHP_SELF ?>">
        <div class="input-field">
          <i class="material-icons prefix">account_circle</i>
          <input id="den_articol" name="den_articol" type="text" autofocus required>
          <label for="den_articol">Denumire Articol</label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <input type="date" name="date" class="datepicker" id="date">
          <label for="date">Data Publicarii</label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">question_answer</i>
          <textarea id="part_messg" name="part_messg" class="materialize-textarea" length="1024" required></textarea>
          <label for="part_messg">Continutul Partial al Articolului</label>
        </div>

        <div class="input-field">
          <i class="material-icons prefix">question_answer</i>
          <textarea id="messg" name="messg" class="materialize-textarea" length="10000" rows='12' required style="overflow-y: scroll;"></textarea>
          <label for="messg">Continutul Intreg al Articolului</label>
        </div>

        <center>
          <button type="submit" name="load" class="waves-effect btn green" style="width:100%;">Incarcare articol</button>
        </center>
      </form>

    </div>

<?php
}
?>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script>
      $().ready(function(){
        $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 8, // Creates a dropdown of 15 years to control year
        });
        $('input#input_text, part_messg#messg').characterCounter();
      });
    </script>
  </body>
</html>