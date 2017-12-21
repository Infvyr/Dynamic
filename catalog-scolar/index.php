<?php 
    $title = "catalog-scolar.xyz - platformă online de management al catalogului școlar";
    require_once 'includes/head.php'; 
    require_once 'auth/auth.php'; 
?>

    <body>
        <nav class="navbar navbar-default navbar-inverse " role="navigation ">
            <div class="container-fluid ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header ">
                    <button type="button " class="navbar-toggle collapsed " data-toggle="collapse " data-target="#mobile-menu " aria-expanded="false ">
                        <span class="sr-only ">Toggle navigation</span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="navbar-brand navbar-left " href="http://catalog-scolar.xyz/ ">catalog-scolar.xyz</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse " id="mobile-menu ">
                    <ul class="nav navbar-nav navbar-right ">
                        <li class="active "><a href="/catalog-scolar/index.php " title="catalog-scolar.xyz - Despre platforma noastră ">Despre</a></li>
                        <li><a href="/catalog-scolar/contact.php " title="catalog-scolar.xyz - Informații de contact ">Contacte</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>

        <div class="container-fluid " style="position:relative; ">
            <div class="jumbotron " style="background-color:#E1DEDE; ">
                <center>
                    <h2><span class="logo-edit ">catalog-scolar.xyz</span></h2>
                </center>
                <div class="container ">
                    <center>
                        <p>Aceasta este o platformă online, realizată cu scop educațional și dedicată în special părinților pentru a fi permanent la curent cu situația școlară a copiilor lor, dar și profesorilor pentru a gestiona eficient catalogul.</p>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#auth">
                            Autentificare
                        </button>
                        <div class="text-danger text-center" id="error">
                            <?php if(isset($message)) { echo $message; } ?>
                        </div>
                    </center>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade-scale" id="auth" tabindex="-1" role="dialog" aria-labelledby="auth">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="auth">Formular de autentificare în sistem</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="" method="post">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label"><strong>Nume</strong></label>
                                    <div class="col-sm-10">
                                        <input name="member_name" type="text" id="name" placeholder="Numele de utilizator" class="form-control"  autofocus="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="passwd" class="col-sm-2 control-label"><strong>Parolă</strong></label>
                                    <div class="col-sm-10">
                                        <input name="member_password" type="password"  class="form-control" id="passwd" placeholder="Parola" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><strong>Statut</strong></label>
                                    <div class="col-sm-10">
                                        <select name="member_status" class="form-control">
                                            <option value="tip de cont">Alege tipul de cont</option>
                                            <option value="elev">Elev</option>
                                            <option value="parinte">Părinte</option>
                                            <option value="profesor">Profesor</option>
                                            <option value="director">Director</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group pnl_3">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="login" class="btn btn-success">Accesați contul</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Anulare</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom: 65px;">
                <div class="col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading" style="height:80px;">
                            <center>
                                <h3 class="panel-title ">Despre catalog-scolar.xyz</h3>
                            </center>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
                            <li role="presentation"><a href="#elevi" aria-controls="parent" role="tab" data-toggle="tab">Elevi</a></li>
                            <li role="presentation"><a href="#parent" aria-controls="parent" role="tab" data-toggle="tab">Părinți</a></li>
                            <li role="presentation"><a href="#profs" aria-controls="profs" role="tab" data-toggle="tab">Profesori</a></li>
                            <li role="presentation"><a href="#manager" aria-controls="manager" role="tab" data-toggle="tab">Directori</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 section-info well">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="general">
                            <div class="text-info">
                                <h3 style="margin-top:10px;">General</h3>
                                <hr style="width:100%;">
                            </div>
                            <p class="text"><span class="logo-edit"><a href="http://www.catalog-scolar.xyz">catalog-scolar.xyz</a></span> este un serviciu online, informatizat si dedicat în special părinților pentru a fi permanent la curent cu situația școlară a copiilor.</p>
                            <p class="text">Principalul obiectiv în cadrul acestui serviciu de catalog electronic îl prezintă creșterea calității actului educațional prin îmbunătățirea parteneriatului familie-școală.</p>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="elevi">
                            <div class="text-info">
                                <h3 style="margin-top:10px;">Elevi</h3>
                                <hr style="width:100%;">
                            </div>

                            <p class="text">În cadrul platformei <span class="logo-edit"><a href="http://www.catalog-scolar.xyz">catalog-scolar.xyz</a></span> aveți acces oricînd și oriunde la:</p>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">note și absențe pe materii</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">situația școlară (note și absențe)</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">comparație cu media dinamică a clasei</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">progresul școlar - date statistice per discipline studiate</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">orarul evaluărilor/tezelor semestriale </span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">orarul clasei</span>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="parent">
                            <div class="text-info">
                                <h3 style="margin-top:10px;">Părinți</h3>
                                <hr style="width:100%;">
                            </div>

                            <p class="text">În cadrul platformei <span class="logo-edit"><a href="http://www.catalog-scolar.xyz">catalog-scolar.xyz</a></span> aveți acces oricînd și oriunde la:</p>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">note și absențe pe materii</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">situația școlară (note și absențe) transmisă săptămînal prin e-mail</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">comparație cu media dinamică a clasei</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">progresul școlar al propriului copil</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">orarul clasei</span>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="profs">
                            <div class="text-info">
                                <h3 style="margin-top:10px;">Profesori, diriginți</h3>
                                <hr style="width:100%;">
                            </div>
                            <p class="text">În cadrul platformei <span class="logo-edit"><a href="http://www.catalog-scolar.xyz">catalog-scolar.xyz</a></span> aveți acces oricînd și oriunde la:</p>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">generarea rapoartelor semetriale</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">generarea de statistici legate de numărul de absențe motivate, nemotivate elev/clasă</span>
                            <br>
                            <!-- <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">comunicarea online(prin e-mail) cu părinții elevilor</span>
                            <br> -->
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">transmiterea de avertismente prin e-mail către părinți</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">calcularea automată a mediilor</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">clasamentul clasei atît din punct de vedere al notelor/absențelor, cît și al mediilor</span>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="manager">
                            <div class="text-info">
                                <h3 style="margin-top:10px;">Directori</h3>
                                <hr style="width:100%;">
                            </div>
                            <p class="text">În cadrul platformei <span class="logo-edit"><a href="http://www.catalog-scolar.xyz">catalog-scolar.xyz</a></span> aveți acces oricînd și oriunde la:</p>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">vizualizarea tuturor cataloagelor unității școlare în format electronic</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">clasamentul general al elevilor</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">clasamentul absenților</span>
                            <br>
                            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                            <span class="text">rapoarte statistice cu privire la note și absențe</span>
                           <!--  <br>
                           <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                           <span class="text">mesagerie online către toți profesorii unității</span> -->
                        </div>
                    </div>
                    <!-- tabs ends -->
                </div>
                <!-- col-md-8 -->
            </div>
            <!-- row -->
        </div>
        <!-- container-fluid, first after nav -->


        <?php require_once 'includes/footer.php'; ?>
