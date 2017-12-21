<?php 
  //require_once "../categories/full_article.php"; 
  require_once "../mainDbase/db"; 
  $link = db_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Biblioteca Publică s.Gribova</title>

  <!-- CSS  -->
  <link rel="icon" href="../media/img/book.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../css/jquery-ui.min.css" media="screen,projection">
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../css/clock.css" media="screen,projection"/>
  <link rel="stylesheet" href="../css/calendar.css" media="screen,projection"/>
  <link rel="stylesheet" href="../css/media_screens.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
</head>

<body>
  <!-- Inceput meniu -->
  <div class="navbar-fixed">
    <nav class="indigo darken-3 z-depth-2">
      <div class="nav-wrapper">
        <a href="../index.php" class="brand-logo hide-on-small-only" style="padding:1px; margin-left: 20px;">
          <img src="../media/img/logo.png" alt="Biblioteca Publică s.Gribova" title="Biblioteca Publică s.Gribova">
        </a>

        <ul class="right hide-on-med-and-down">
          <li class="active"><a href="/material">Principală</a></li>
          <li><a href="#!">Activități</a></li>
          <li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
          <li>
              <a class="dropdown-button" href="#" data-activates="dropdown1" data-beloworigin="true">Galerie
                <i class="material-icons right">arrow_drop_down</i>
              </a>
          </li>
          <li><a href="../categories/despre.php">Despre</a></li>
          <li><a href="../categories/contacte.php" title="contactați-ne">Contacte</a></li>
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

          <li id="pad"><a href="../index.php" class="waves-effect waves-purple">Principală</a></li>
          <li><a href="#" class="waves-effect waves-purple">Activități</a></li>
          <li><a href="/material/catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
          <li>
            <a href="#" class="collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect waves-purple">Foto</a></li>
                  <li><a href="#" class="waves-effect waves-purple">Galerie</a></li>
                </ul>
              </div>
          </li>
          <li><a href="../categories/despre.php" class="waves-effect waves-purple">Despre</a></li>
          <li><a href="../categories/contacte.php" class="waves-effect waves-purple">Contacte</a></li>
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
  <div class="row">
    <div class="col s3 m3 l3" style="margin-left:-6px;">
      <nav class="search hide-on-med-and-down">
        <div class="nav-wrapper indigo darken-2">
          <form method="post" action="../search_article.php" id="search_form">
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

  <!-- Inceput Continut Principal -->
  <div class="card-panel" >
    <div class="row">
      <div class="col l3 m3 hide-on-small-only" id="left_sec">

      <!-- Inceput sectiune pentru ceas -->
      <div class=" indigo darken-4 valign-wrapper" style="border-top-left-radius:8px;border-top-right-radius:8px;">
        <section class="clock">
          <div id="Date"></div>
            <ul class="clock-content">
              <li id="hours"> </li>
              <li id="point">:</li>
              <li id="min"> </li>
              <li id="point">:</li>
              <li id="sec"> </li>
            </ul>
        </section>
      </div>
      <!-- Sfirsit sectiune pentru ceas -->
        <!-- Orar de lucru -->
        <div class="rg-content z-depth-1">
          <table class="rg-table">
            <thead>
              <th>Orar de lucru</th>
            </thead>
            <tbody>
              <tr>
                  <td data-title="Orar de lucru">Zile lucrătoare</td>
                  <td data-title="">Marți - Duminică</td>
              </tr>
              <tr>
                  <td data-title="Orar de lucru"></td>
                  <td data-title="">de la 9<sup>00</sup> pînă la 17<sup>00</sup></td>
              </tr>
              <tr>
                  <td data-title="Orar de lucru">Pauză de masă</td>
                  <td data-title="">13<sup>00</sup> - 14<sup>00</sup></td>
              </tr>
              <tr>
                  <td data-title="Orar de lucru">Zi de odihnă</td>
                  <td data-title="">Luni</td>
              </tr>
              <tr class="hide-mobile" hidden="hidden">
                  <td class="text" data-title="Orar de lucru"></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Calendar -->
        <div id="calendar" class="hide-on-med-and-down"></div>
        <div class="divider" style="margin-top:30px;"></div>

        <!-- Articole recent adaugate -->
        <?php require 'top_articles.php'; ?>
        </ul>
      </div> <!-- left section -->

      <?php
      echo '<div class="col l6 m6 s12" id="main_sec">';

      if(!$_GET['id_text']) {
        echo "No data to view";
      } else {
        $id_text = (int)$_GET['id_text'];

          if(!$id_text) {
            echo "No data to view!";
          } else {
            $query = " SELECT id, title, fullArticle, calendar FROM articles WHERE id = '$id_text' ";
            $res = mysqli_query($link, $query);

            if (!$res) {
                exit(mysqli_error());
            }
            $row = mysqli_fetch_array($res, MYSQL_ASSOC);
            $date = date_create($row['calendar']);
            //print_r($row);
            printf("
                <div class='row' style='margin-top:15px; margin-bottom:15px'>
                  <div class='l12 m12 s12'>
                      <h4 id='single_article'>%s</h4>
                      <p class='left-align blue-grey-text text-darken-4' id='half_article'>%s</p>
                  </div>
                </div>
                <div class='row'>
                <div class='col l12 m12 s12' id='pub_date' style='margin-bottom:5px'>
                    <i class='fa fa-calendar'>&nbsp;</i>%s
                    <a href='/material' id='more_txt' title='înapoi la articole' class='waves-effect indigo-text' style='float:right'>înapoi</a>
                </div>
                </div>
                <div class='divider'></div>
                ", $row['title'], $row['fullArticle'], date_format($date, 'd-M-Y')
                );
          }
      }
      ?>
      </div> <!-- main_sec -->

      <div class="col l3 m3 hide-on-small-only">
        <!-- dreapta -->

        <!-- START: Meteo2.md Widget -->
        <div class="m2meteo2_informer">
          <div class="m2meteo_title"><a target="_blank" title="Meteo în  Gribova" href="http://meteo2.md/ro/Prognoza_Meteo/Drochia/Gribova/">Meteo în  s.Gribova</a>
          </div>
          <script language="JavaScript" type="text/javascript" src="http://meteo2.md/configurator/html_informer.php?show_js=1&lang=ro&region=71&location=618235&color=%231a237e&title_on=1&color_1=%23ffffff&size=280&cfg_1=1&cfg_3=1&cfg_4=1&cfg_5=1"></script>
          </div>
          </div>
        </div>
        <!-- END: Meteo2.md Widget -->

        <div class="ads">
          <img src="http://bestanimations.com/Books/finger-moving-words-in-book-cool-animated-gif.gif" alt="book2-gif" class="responsive-img" style="border-radius:5px;">

          <img src="http://bestanimations.com/Books/book-reading-words-flying-by-animated-gif.gif" alt="book-reading-words" class="responsive-img" style="border-radius:5px;">

          <img src="http://bestanimations.com/Books/winnie-thepooch-book-animated-gif.gif" alt="winnie-thepooch" class="responsive-img" style="border-radius:5px;">

          <img src="http://bestanimations.com/Books/guy-puts-leaf-in-book-placeholder-animated-gif.gif" alt="guy-puts-leaf-in-book" class="responsive-img" style="border-radius:5px;">

        </div>

      </div>
    </div>
  </div>
  </div>
  <!-- Sfirsit Continut Principal -->

  <?php require_once "../categories/footer.php"; ?>


  <!-- Butonul navigare rapida sus -->
  <a href="#" class="center-align" id="toTop"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></a>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="../js/init.js"></script>
  <script src="../js/clock.js"></script>
  <script src="../js/jquery-ui.min.js"></script>

  </body>
</html>
