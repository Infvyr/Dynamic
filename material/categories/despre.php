<?php require_once '../mainDbase/db';
$link = db_connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Informații utile privind Biblioteca Publică s.Gribova</title>

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
          <li><a href="../catalogBibl" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
          <li>
              <a class="dropdown-button" href="#" data-activates="dropdown1" data-beloworigin="true">Galerie
                <i class="material-icons right">arrow_drop_down</i>
              </a>
          </li>
          <li class="active"><a href="despre.php" title="vizualizați informația despre bibiliotecă">Despre</a></li>
          <li><a href="contacte.php" title="contactați-ne">Contacte</a></li>
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

          <li id="pad"><a href="/material" class="waves-effect waves-purple">Principală</a></li>
          <li><a href="#" class="waves-effect waves-purple">Activități</a></li>
          <li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
          <li>
            <a href="#" class="collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
            <div class="collapsible-body">
                <ul>
                  <li><a href="/material/categories/pmedia.php" class="waves-effect waves-purple">Foto</a></li>
                  <li><a href="/material/categories/vmedia.php" class="waves-effect waves-purple">Video</a></li>
                </ul>
              </div>
          </li>
          <li><a href="despre.php" class="waves-effect waves-purple">Despre</a></li>
          <li><a href="contacte.php" class="waves-effect waves-purple">Contacte</a></li>
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
  <div class="row" >
    <div class="col s12 m12 l3">
      <nav class="search ">
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
  <div class="container z-depth-2" id="about">
    <div class="col card-panel" style="border-radius:5px;">
        <h5>Informații despre bibliotecă</h5>
        <div class="divider"></div>
        <ul class="collapsible" data-collapsible="accordion">
          <li>
            <div class="collapsible-header active red white-text"><i class="material-icons">info_outline</i>Prezentare generală</div>
            <div class="collapsible-body">


              <?php /* Code for select data from table despre for despre.php page */
              $sql = "SELECT * FROM despre WHERE id=1";
              if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                  echo "<p style='text-indent:20px;'>";
                    echo $row['aboutInfo'];
                  echo "</p>";
                }
                mysqli_free_result($result);
              } else{
                    echo "No records matching your query were found.";
                }
              } else{
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
              }
              ?>

            </div>
          </li>
          <li>
            <div class="collapsible-header green white-text"><i class="material-icons">trending_up</i>Istoria bibliotecii</div>
            <div class="collapsible-body">

               <?php /* Code for select data from table despre for despre.php page */
                $sql = "SELECT * FROM despre WHERE id=2";
                if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo "<p style='text-indent:20px;'>";
                      echo $row['aboutInfo'];
                    echo "</p>";
                  }
                  mysqli_free_result($result);
                } else{
                      echo "A survenit o eroare pe server!";
                  }
                } else{
                    echo "EROARE: Nu este permis de executat $sql. " . mysqli_error($link);
              }
              ?>
            </div>
          </li>
          <li>
            <div class="collapsible-header blue white-text"><i class="material-icons">contact_phone</i>Contacta-ți bibliotecarul</div>
            <div class="collapsible-body">
              <div class="row" style=" margin: 0% 1%;">
                <div class="col l6 m6 s12">
                  <strong>Mobil:</strong> (+373) 069-16-30-31
                </div>
                <div class="col l6 m6 s12">
                  <strong>Email:</strong> ngalina1964@gmail.com
                </div>
              </div>
            </div>
          </li>
        </ul>
    </div>
  </div>

  <!-- Sfirsit Continut Principal -->

  <?php require_once "footer.php"; ?>

  <!--  Scripts-->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.min.js"></script>
  <!-- <script src="../js/init.js"></script> -->

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

    $('.collapsible').collapsible({
      accordion : true
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
