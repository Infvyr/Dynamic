<?php
  require_once "categories/header.php";
?>

    <!-- Inceput Continut Principal -->
    <div class="card-panel">
        <div class="row" style="margin: 0 20px;">
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
                <?php require 'page/top_articles.php'; ?>
                    </ul>
            </div>
            <!-- left section -->

            <!-- Center section -->
            <?php
 $query = " SELECT * FROM `articles` ORDER BY calendar DESC";
        $res = mysqli_query($link, $query);
        if (!$res) {
            exit(mysqli_error());
        }

        echo '<div class="col l6 m6 s12" id="main_sec">';

        $row = array();
        for ($i=0; $i < mysqli_num_rows($res); $i++) {

            $row = mysqli_fetch_array($res, MYSQL_ASSOC);
            $date = date_create($row['calendar']);
            printf("
                <div class='row' style='margin-top:15px; margin-bottom:15px'>
                <div class='l12 m12 s12'>
                    <h4 id='title_article'><a href='page/article.php?id_text=%s' class='indigo-text'>%s</a></h4>
                    <p class='left-align blue-grey-text text-darken-4' id='half_article'>%s</p>
                </div>
                <div class='row' style='margin-bottom:5px'>
                    <div class='col l7 m7 s7 left-align'>
                    <a href='page/article.php?id_text=%s' class='waves-effect left-align indigo-text' id='more_txt'>continuare &nbsp;<i class='fa fa-long-arrow-right'></i></a>
                    </div>
                <div class='col l5 m5 s5 right-align indigo-text' id='pub_date'>
                    <i class='fa fa-calendar'>&nbsp;</i>%s
                </div>
                </div>
                </div>
                <div class='divider'></div>
                ", $row['id'], $row['title'],$row['halfArticle'], $row['id'], date_format($date, 'd-M-Y')
                );
        }
?>
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

    <?php require_once "categories/footer.php"; ?>


        <!-- Butonul navigare rapida sus -->
        <a href="#" class="center-align" id="toTop"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></a>

        <!--  Scripts-->
        <script src="js//jquery-2.1.1.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/init.js"></script>
        <script src="js/clock.js"></script>
        <script src="js/jquery-ui.min.js"></script>

        </body>

        </html>
