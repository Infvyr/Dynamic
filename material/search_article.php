<?php
mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
mysql_select_db("mainbibl") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Rezultatele Căutării...</title>

  <!-- CSS  -->
  <link rel="icon" href="media/img/book.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/media_screens.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body>
  <!-- Inceput meniu -->
  <div class="navbar-fixed">
    <nav class="indigo darken-3 z-depth-2">
      <div class="nav-wrapper">
        <a href="." class="brand-logo hide-on-small-only" style="padding:1px; margin-left: 20px;">
          <img src="media/img/logo.png" alt="Biblioteca Publică s.Gribova" title="Biblioteca Publică s.Gribova">
        </a>

        <ul class="right hide-on-med-and-down">
          <li><a href="." title="deschideți pagina principală">Principală</a></li>
          <li><a href="#">Activități</a></li>
          <li><a href="catalogBibl/" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
          <li>
              <a class="dropdown-button" href="#" data-activates="dropdown1" data-beloworigin="true">Galerie
                <i class="material-icons right">arrow_drop_down</i>
              </a>
          </li>
          <li><a href="categories/despre.php" title="vizualizați informația despre bibiliotecă">Despre</a></li>
          <li><a href="categories/contacte.php" title="contactați-ne">Contacte</a></li>
        </ul>


        <!-- Structure for mobile menu -->
        <ul id="nav-mobile" class="side-nav collapsible collapsible-accordion">
          <li>
            <div class="nav-wrapper indigo darken-2">
              <form method="post" action="" style="min-width:238px; ">
                <div class="input-field">
                  <input id="search" type="search" placeholder="căutați termenii doriți..." required>
                  <label for="search" ><i class="material-icons">search</i></label>
                </div>
              </form>
            </div>
          </li>

          <li id="pad"><a href="." class="waves-effect waves-purple" title="deschideți pagina principală">Principală</a></li>
          <li><a href="#" class="waves-effect waves-purple">Activități</a></li>
          <li><a href="catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
          <li>
            <a href="#" class="collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect waves-purple">Foto</a></li>
                  <li><a href="#" class="waves-effect waves-purple">Galerie</a></li>
                </ul>
              </div>
          </li>
          <li><a href="categories/despre.php" class="waves-effect waves-purple" title="vizualizați informația despre bibiliotecă">Despre</a></li>
          <li><a href="categories/contacte.php" class="waves-effect waves-purple" title="contactați-ne">Contacte</a></li>
        </ul>
        <a href="#" data-activates="nav-mobile" class="button-collapse btn-flat green"><i class="material-icons white-text">menu</i></a>

      </div> <!-- nav-wrapper -->
    </nav>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content indigo">
      <li><a href="#" class="white-text"><i class="material-icons left">photo</i>Foto</a></li>
      <li><a href="#" class="white-text"><i class="material-icons left">movie</i>Video</a></li>
    </ul>
  </div>
  <!-- Sfirsit meniu -->

  <!-- Inceput bara de cautare -->
  <div class="container">
    <div class="col s12 m12 l12">  <!-- style="margin-left:-6px; -->
      <nav class="search">
        <div class="nav-wrapper indigo darken-2">
          <form method="post" action="search_article.php" id="search_form">
            <div class="input-field">
              <input id="search" name="sQuery" type="search" placeholder="căutați termenii doriți..." required>
              <label for="search" ><i class="material-icons">search</i></label>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
  <!-- Sfirsit bara de cautare -->

<?php
  $query = $_POST['sQuery'];
    // gets value sent over search form

    $min_length = 5;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

        $row_results = mysql_query("SELECT * FROM articles
            WHERE (`title` LIKE '%".$query."%') OR (`halfArticle` LIKE '%".$query."%') OR (`fullArticle` LIKE '%".$query."%')") or die(mysql_error());

        if(mysql_num_rows($row_results) > 0){ // if one or more rows are returned do following

            echo "<center>";
            echo "<p class='indigo-text chip center-align' style='margin-top:30px'>" . "Cuvîntul căutat a fost: " . "<span class='green-text'>" . $query . "</span>" . "</p>";
            echo "</center>";
            echo "<div class='container card-panel' style='margin:30px auto;'>";
            while($results = mysql_fetch_array($row_results)){

                $date = date_create($results['calendar']);
            printf("
                <div class='row'>
                <div class='col l8 m8 s12'>
                <h5 id='title_article'><a href='page/article.php?id_text=%s' class='indigo-text'>%s</a></h5>
                </div>
                <div class='col l4 m4 s12'>
                <p>Adăugat: %s</p>
                </div>
                </div>

                <div class='col l12 m12 s12'>
                <p class='highlight blue-grey-text text-darken-4' id='half_article'>%s <a href='page/article.php?id_text=%s' class='indigo-text'>[mai mult...]</a></p>
                </div>
                <div class='divider'></div>
                ", $results['id'], $results['title'], date_format($date, 'd-M-Y'), $results['halfArticle'], $results['id']
                );

            }

        }
        else{ // if there is no matching rows do following
            echo "<center>" . "<h4 class='red-text'>" . "Nu sunt rezultate!". "</h4>" . "</center>";
        }

    }
    else{ // if query length is less than minimum
        echo "<center>" . "<h4 class='red-text'>" . "Cuvîntul căutat trebuie să conțină minim " . $min_length . " caractere!" . "</h4>" . "</center>";
    }
    echo "</div>";

?>


<?php require_once ('categories/footer.php'); ?>

  <!-- Butonul navigare rapida sus -->
  <a href="#" class="center-align" id="toTop"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></a>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.min.js"></script>
  <script>
  (function($){
    $(function(){
      $('.button-collapse').sideNav();
      $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
      }
    );

      /* to Top Button */
      //Check to see if the window is top if not then display button
      $(window).scroll(function(){
        if ($(this).scrollTop() > 400) {
          $('#toTop').fadeIn();
        } else {
          $('#toTop').fadeOut();
        }
      });

      //Click event to scroll to top
      $('#toTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
      });

    }); // end of document ready
  })(jQuery); // end of jQuery name space


  </script>