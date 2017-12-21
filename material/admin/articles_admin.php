<?php require_once "../mainDbase/db"; $link = db_connect(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Admin_Panel Area</title>
    <link rel="icon" href="../media/img/book.ico" type="image/x-icon">
    <link href="../css/materialize.min.css" rel="stylesheet"/>
    <link href="../css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script>
    function closeWindow() {
        window.open('','_parent','');
        window.close();
    }
</script> 
  </head>
  <body class="teal">
    <div class="container">
      <center style="margin-bottom:5%;">
      <h4 class="white-text">Panou de administrare</h4>
      </center>
      <aside style="margin-bottom:3%; clear: both;">
        <a href="add_article.php" class="white-text btn-flat waves-effect green">Adaugare articol</a>
        <a href="logout.php" class="white-text btn-flat waves-effect green" style="float: right;">Ieșire</a>
      </aside>

      <table class="bordered centered" style="margin-bottom:50px;">
        <thead class="yellow-text green">
          <tr>
            <th data-field="id">Data publicarii</th>
            <th data-field="name">Denumire articol</th>
            <th colspan="2">Functii</th>
          </tr>
        </thead>

        <?php
        $query = " SELECT calendar, title, id FROM `articles` ORDER BY calendar DESC";

        $res = mysqli_query($link, $query);
        if (!$res) { exit(mysqli_error()); }

        $row = array();
        for ($i=0; $i < mysqli_num_rows($res); $i++) {

            $row = mysqli_fetch_array($res, MYSQL_ASSOC);
            $date = date_create($row['calendar']);
            printf("
                <tbody class='white'>
                <tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td><a class='waves-effect btn-flat green-text' href='index.php?action=edit&id=%s'><i class='material-icons right'>mode_edit</i>Redactare</a></td>
                    <td><a href='index.php?del={$row["id"]}' data-id3='".$row['id']."' class='waves-effect btn-flat green-text' id='delete'><i class='material-icons right'>delete_forever</i>Stergere</a></td>
                </tr>
                </tbody>
                ", date_format($date, 'd-M-Y'), $row['title'], $row['id'], $row['id']
                );
        } /*?del={$row["id"]}*/
        ?>
      </table>
    </div>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/admin_del.js"></script>
  </body>
</html>