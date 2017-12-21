<?php require_once "mainDbase/db"; $link = db_connect(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Biblioteca Publică s.Gribova</title>

  <!-- CSS  -->
  <link rel="icon" href="media/img/book.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/jquery-ui.min.css" media="screen,projection">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="css/clock.css" media="screen,projection"/>
  <link rel="stylesheet" href="css/calendar.css" media="screen,projection"/>
  <link rel="stylesheet" href="css/media_screens.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body>
  <!-- Inceput meniu -->
  <div class="navbar-fixed">
    <nav class="indigo darken-3 z-depth-2">
      <div class="nav-wrapper">
        <a href="/material" class="brand-logo hide-on-small-only" style="padding:1px; margin-left: 20px;">
          <img src="media/img/logo.png" alt="Biblioteca Publică s.Gribova" title="Biblioteca Publică s.Gribova">
        </a>

        <ul class="right hide-on-med-and-down">
          <li class="active"><a href="." title="deschideți pagina principală">Principală</a></li>
          <li><a href="#">Activități</a></li>
          <li><a href="catalogBibl/" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
          <li>
              <a class="dropdown-button" href="#!" data-activates="dropdown1" data-beloworigin="true">Galerie
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

          <li id="pad"><a href="/material" class="waves-effect waves-purple" title="deschideți pagina principală">Principală</a></li>
          <li><a href="#" class="waves-effect waves-purple">Activități</a></li>
          <li><a href="/material/catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
          <li>
            <a href="#!" class="collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                  <li><a href="material/categories/pmedia.php" class="waves-effect waves-purple">Foto</a></li>
                  <li><a href="material/categories/vmedia.php" class="waves-effect waves-purple">Galerie</a></li>
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
      <li><a href="/material/categories/pmedia.php" class="white-text"><i class="material-icons left">photo</i>Foto</a></li>
      <li><a href="/material/categories/vmedia.php" class="white-text"><i class="material-icons left">movie</i>Video</a></li>
    </ul>
  </div>
  <!-- Sfirsit meniu -->

  <!-- Inceput bara de cautare -->
  <div class="row ">
    <div class="col s12 m12 l3">  <!-- style="margin-left:-6px; -->
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
  <!-- Sfirsit bara de cautare -->

  <!-- Inceput bara pentru motto -->
    <div class="col s12 m12 l9">
      <div class="card-panel valign-wrapper" id="motto">
      <?php
        $sql = "SELECT content_quote, auth_quote FROM quotes ORDER BY RAND() LIMIT 1";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "Motto:" . '&nbsp; ' . "<p class='indigo-text'>" . $row['content_quote'] . "</p>" . '&nbsp;' . "<span class='green-text text-darken-3'>" . $row['auth_quote']. "</span>";
                }
                // Close result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
      ?>
      </div>
    </div>
  <!-- Sfirsit bara pentru motto -->
  </div>

  <!-- Inceput Slider -->
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="media/slider/Slide1.jpg"> <!-- random image -->
        <div class="caption center-align" id="first_caption">
          <h3>biblioteca publică <span style="text-transform:none;">s.</span>Gribova</h3>
          <h5 class="light grey-text text-lighten-5">Vă așteptăm cu mult drag!!!</h5>
        </div>
      </li>
      <li>
        <img src="media/slider/Slide2.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>biblioteca publică <span style="text-transform:none;">s.</span>Gribova</h3>
          <h5 class="light grey-text text-lighten-5">Este deschisă de marți pînă duminică!</h5>
        </div>
      </li>
      <li>
        <img src="media/slider/Slide4.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>biblioteca publică <span style="text-transform:none;">s.</span>Gribova</h3>
          <h5 class="light grey-text text-lighten-5">Aici poți găsi cartea pe care ți-o dorești!</h5>
        </div>
      </li>
      <li>
        <img src="media/slider/Slide3.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>Savurează din plăcerea de a citi</h3>
          <h5 class="light grey-text text-lighten-5">O bibliotecă cu peste 7000 de cărți pentru copii, adolescenți, adulți și chiar persoane în etate!</h5>
        </div>
      </li>
    </ul>
  </div>
  <!-- Sfirsit Slider -->
