<?php 
session_start(); 
$title = "Vizualizare raport semestrial";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo ucwords($_SESSION['member_name']) . '&nbsp;|&nbsp;' . $title;?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="icon" type="image/ico" href="../dist/img/profile.ico">
 	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/skin-green.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<?php
require_once 'pages/header.php';
require_once 'pages/sidebar.php';
?>
<style>
    .txt { text-transform: uppercase; font-weight: bold; }
    .txt_underline { text-decoration: underline; }
</style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Contul Meu</h1>
            <ol class="breadcrumb">
                <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
                <li class="active"><a href="viewreport.php"><i class="fa fa-dashboard"></i><strong>Raport</strong></a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box-header with-border bg-green content-title">
                <h3 class="box-title">Vizualizare raport semestrial</h3>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body no-padding">
                        <div style="padding: 5px;">
                            <a href="raports.php" class="btn btn-info" rel="nofollow" title="reîntoarceți-vă la pagina de generare a raportului">Generare raport</a>
                        </div>
                            <div class="table-responsive" style="padding: 5px 30px;">
                            <?php
                            $connect = mysqli_connect("localhost", "root", "", "catalog");
                            mysqli_set_charset($connect,"UTF8"); # pentru diacritice

                            $query = "SELECT * FROM `report` WHERE nume='$Q'";
                            $result = mysqli_query($connect, $query);
                            $row = mysqli_fetch_array($result,MYSQL_ASSOC); //echo $row["nume"];
                            

                            mysqli_close($connect);
                            ?>
                            <center>
                                <h3 class="text-info txt" style="font-family:'Arial, sans-serif';">Raport semestrial de autoevaluare a activității <br>pentru anul școlar <?php echo date('Y')-1 .'-'. date('Y'); ?>
                                </h3>
                            </center><br>
                            <article style="font-size: 16px; font-family: Arial, sans-serif;">
                                <p>Nume: <span style="text-decoration: underline;"><?= $row["nume"]; ?></span></p>
                                <p>Grad didactic: <span class="txt_underline"><?= $row["grad_didactic"]; ?></span></p>
                                <p>Telefon: <span class="txt_underline"><?= '0'.$row["telefon"]; ?></span></p>
                                <p>Adresă e-mail: <span class="txt_underline"><?= $row["mail"]; ?></span></p>
                                <p class="text-info ">NOTĂ: Vă rugăm să detaliați activitățile dumneavoastră în funcție de indicatorii de performanță existenți în fișa de evaluare.</p>
                                <p class="txt">1. Proiectarea activității</p>
                                <p><?= $row["practivitate"]; ?></p>
                                <p class="txt">2. Realizarea activităților didactice</p>
                                <p><?= $row["act_didactic"]; ?></p>
                                <p class="txt">3. Evaluarea rezultatelor învățării</p>
                                <p><?= $row["eval_rez"]; ?></p>
                                <p class="txt">4. Contribuția la dezvoltarea instituțională și promovarea imaginii unității școlare</p>
                                <p><?= $row["promo"]; ?></p>
                                <p class="txt">5. Elevi pregătiți pentru concursuri și olimpiade de specialitate:</p>
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Numele și prenumele</th>
                                            <th>Clasa</th>
                                            <th>Concursul/olimpiada</th>
                                            <th>Locul desfășurării</th>
                                            <th>Data</th>
                                            <th>Premiul obținut</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    echo "<tbody>";
                                    $connect = mysqli_connect("localhost", "root", "", "catalog");
                                    mysqli_set_charset($connect,"UTF8"); # pentru diacritice
                                    $query = "SELECT * FROM `report` WHERE nume='$Q'";
                                    $result = mysqli_query($connect, $query);

                                    while ($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
                                    echo "<tr>"; 
                                        echo "<td>" . $row["np_elev"] ."</td>";
                                        echo "<td>" . $row["clasa"] . "</td>";
                                        echo "<td>" . $row["activitate"] . "</td>";
                                        echo "<td>" . $row["locdesf"] . "</td>";
                                        echo "<td>" . $row["data"] . "</td>";
                                        echo "<td>" . $row["premiu"] . "</td>";
                                    echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    mysqli_free_result($result);
                                    mysqli_close($connect);
                                    ?>
                                </table>
                                <p class="txt">6. Participarea la cursuri de formare:</p>
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Perioada</th>
                                            <th>Denumirea cursului</th>
                                            <th>Furnizor</th>
                                            <th>Locul desfășurării</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    echo "<tbody>";
                                    $connect = mysqli_connect("localhost", "root", "", "catalog");
                                    mysqli_set_charset($connect,"UTF8"); # pentru diacritice
                                    $query = "SELECT * FROM `report` WHERE nume='$Q'";
                                    $result = mysqli_query($connect, $query);
                                    
                                    while ($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
                                    echo "<tr>"; 
                                        echo "<td>" . $row["perioada"] ."</td>";
                                        echo "<td>" . $row["curs"] . "</td>";
                                        echo "<td>" . $row["furnizor"] . "</td>";
                                        echo "<td>" . $row["loc_desf"] . "</td>";
                                    echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    mysqli_free_result($result);
                                    mysqli_close($connect);
                                    ?>
                                </table>
                                <p class="txt">7. Implicarea în proiecte educative, activități extracurriculare:</p>
                                <table class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Perioada</th>
                                            <th>Activitatea</th>
                                            <th>Locul desfășurării</th>
                                            <th>Tema</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    echo "<tbody>";
                                    $connect = mysqli_connect("localhost", "root", "", "catalog");
                                    mysqli_set_charset($connect,"UTF8"); # pentru diacritice
                                    $query = "SELECT * FROM `report` WHERE nume='$Q'";
                                    $result = mysqli_query($connect, $query);
                                    
                                    while ($row = mysqli_fetch_array($result,MYSQL_ASSOC)) {
                                    echo "<tr>"; 
                                        echo "<td>" . $row["perioada2"] ."</td>";
                                        echo "<td>" . $row["activ2"] . "</td>";
                                        echo "<td>" . $row["loc2"] . "</td>";
                                        echo "<td>" . $row["tema2"] . "</td>";
                                    echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    mysqli_free_result($result);
                                    mysqli_close($connect);
                                    ?>
                                </table>
                                <?php 
                                $connect = mysqli_connect("localhost", "root", "", "catalog");
                                mysqli_set_charset($connect,"UTF8"); # pentru diacritice

                                $query = "SELECT * FROM `report` WHERE nume='$Q'";
                                $result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_array($result,MYSQL_ASSOC); //echo $row["nume"];
                                
                                echo '
                                <p class="txt">8. opționale propuse</p>
                                <p>'.$row["propuneri"].'</p>
                                ';
                                
                                echo'
                                <section class="row" style="padding:10px 15px;">
                                    <div class="col-md-6 col-xs-6 col-lg-6">
                                        <p><strong>Data:</strong></p>
                                        <p>'.$row["data_intocmirii"].'</p>
                                    </div>
                                    <div class="col-md-6 col-xs-6 col-lg-6 text-right">
                                        <p><strong>Întocmit,:</strong></p>
                                        <p>'. "Profesor ".ucwords($row["nume"]).'</p>
                                    </div>
                                </section>';
                                mysqli_close($connect);
                                ?>
                            </article>
                            </div>

                            <div style="padding: 5px;">
                                <a href="javascript:void(0);" class="btn btn-info" id="print">Imprimă</a>
                            </div>

                        </div>  <!-- /.box-body -->
                    </div>  <!-- /.box -->
                </div>
            </div> <!-- /.row -->
        </section>
    </div> <!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Versiune</b> 0.1</div>
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="http://catalog-scolar.xyz" title="catalog-scolar.xyz" target="_blank" rel="nofollow">Catalog-Scolar.xyz</a>.</strong> Toate drepturile sunt rezervate.
</footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/jQuery/jquery.PrintArea.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>

</body>
</html>
<script>
    $(document).ready(function(){
        $("#print").click(function(){
            var mode = 'iframe'; // popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.table-responsive").printArea( options );
        });
    });

  </script>
