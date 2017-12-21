<?php require_once "../mainDbase/db"; $link = db_connect(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Contactați-ne</title>

  <!-- CSS  -->
  <link rel="icon" href="../media/img/book.ico" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../css/media_screens.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

</head>

<body>
  <!-- Inceput meniu -->
  <div class="navbar-fixed">
    <nav class="indigo darken-3 z-depth-2">
      <div class="nav-wrapper">
        <a href="/material" class="brand-logo hide-on-small-only" style="padding:1px; margin-left: 20px;">
          <img src="../media/img/logo.png" alt="Biblioteca Publică s.Gribova" title="Biblioteca Publică s.Gribova">
        </a>

        <ul class="right hide-on-med-and-down">
          <li><a href="/material" title="deschideți pagina principală">Principală</a></li>
          <li><a href="#">Activități</a></li>
          <li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
          <li>
              <a class="dropdown-button" href="#" data-activates="dropdown1" data-beloworigin="true">Galerie
                <i class="material-icons right">arrow_drop_down</i>
              </a>
          </li>
          <li><a href="despre.php" title="vizualizați informația despre bibiliotecă">Despre</a></li>
          <li class="active"><a href="contacte.php" title="contactați-ne">Contacte</a></li>
        </ul>


        <!-- Structure for mobile menu -->
        <ul id="nav-mobile" class="side-nav collapsible collapsible-accordion">
          <li>
            <div class="nav-wrapper indigo darken-2">
              <form method="post" action="" style="min-width:238px; ">
                <div class="input-field">
                  <input id="search" name="qSearch" type="search" placeholder="căutați termenii doriți..." required>
                  <label for="search" ><i class="material-icons">search</i></label>
                </div>
              </form>
            </div>
          </li>

          <li id="pad"><a href="/material" class="waves-effect waves-purple" title="deschideți pagina principală">Principală</a></li>
          <li><a href="#" class="waves-effect waves-purple">Activități</a></li>
          <li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
          <li>
            <a href="#" class="collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                  <li><a href="#" class="waves-effect waves-purple">Foto</a></li>
                  <li><a href="#" class="waves-effect waves-purple">Galerie</a></li>
                </ul>
              </div>
          </li>
          <li><a href="despre.php" class="waves-effect waves-purple" title="vizualizați informația despre bibiliotecă">Despre</a></li>
          <li><a href="contacte.php" class="waves-effect waves-purple" title="contactați-ne">Contacte</a></li>
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


  <!-- Inceput Continut Principal -->
  <div class="card-panel" >
    <div class="row">
      <div class="col l3 m3 hide-on-small-only" id="left_sec">

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
        <div class="divider" style="margin-top:30px;"></div>

        <!-- Linkuri Utile -->
        <ul class="collection z-depth-1">
          <li class="collection-item center-align indigo darken-4 white-text" id="recent_add">linkuri utile</li>
          <li class="collection-item darken-1" style="width:100%;"><a href="#!" class=" indigo-text">Link 1</a></li>
          <li class="collection-item darken-1" style="width:100%;"><a href="#!" class=" indigo-text">Link 2</a></li>
          <li class="collection-item darken-1" style="width:100%;"><a href="#!" class=" indigo-text">Link 3</a></li>
          <li class="collection-item darken-1" style="width:100%;"><a href="#!" class=" indigo-text">Link 4</a></li>
        </ul>
      </div> <!-- left section -->


      <!-- Center section -->
      <div class="col l6 m6 s12" id="main_sec">
      <aside class="indigo row" style="padding:2px 5px; margin-top: 15px;">
        <h4 class="white-text">Contacte</h4>
      </aside>
      <section style="margin: 7px 0;">
        <p><span class="indigo-text">Adresa:</span>&nbsp;s.Gribova, în fața sediului primăriei</p>
        <p><span class="indigo-text">Telefon:</span>&nbsp;(+373) 0 680-511-42</p>
        <p><span class="indigo-text">Email:</span>&nbsp;<a href="mailto:bibliteca-gr@mail.com">bibliteca-gr@mail.com</a></p>
        <p><span class="indigo-text">WebSite:</span>&nbsp;<a href="http://www.bp-gribova.org" title="accesați website-ul bibliotecii">www.bp-gribova.org</a></p>
      </section>

      </div>

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
          <img src="http://bestanimations.com/Books/book-are-my-life-animated-gif.gif" alt="book1-gif" class="responsive-img" style="border-radius:5px;">

          <img src="http://bestanimations.com/Books/finger-moving-words-in-book-cool-animated-gif.gif" alt="book2-gif" class="responsive-img" style="border-radius:5px;">
        </div>

      </div>
    </div>
  </div>
  </div>
  <!-- Sfirsit Continut Principal -->

  <?php require_once "footer.php"; ?>


  <!-- Butonul navigare rapida sus -->
  <a href="#" class="center-align" id="toTop"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></a>

  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <script>
    (function($){
    $(function(){
      $('.button-collapse').sideNav();
      $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
      });
      
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

    $('.right li').click(function(){
      $('.right li').removeClass("active");
      $(this).addClass("active");
    });

    }); // end of document ready
  })(jQuery); // end of jQuery name space
  </script>

  </body>
</html>
