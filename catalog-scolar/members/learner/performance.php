<?php 
session_start(); 
$title = "Notele mele";

if (!$_SESSION['member_name']) {
  header ('Location: http://localhost/catalog-scolar/');
}

?>
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
    <link rel="stylesheet" href="../plugins/morris/morris.css">
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
<style>
    .separate {
        border-left: 1px solid #EFEFEF;

    }
</style>
<?
require_once 'pages/header.php';
require_once 'pages/sidebar.php';
require_once '../../includes/connect';

// total marks
$query1 = "SELECT users.user_name, users.user_class, note.user_name, note.user_class, COUNT(note.nota) FROM users, note WHERE users.user_name=note.user_name AND note.user_name='$Q' AND users.user_class=note.user_class";
$res = mysqli_query($db,$query1);
$row1 = mysqli_fetch_row($res);

// total abs
$query2 = "SELECT users.user_name, users.user_class, abs.user_name, abs.user_class, COUNT(abs.disciplina) FROM users, abs WHERE users.user_name=abs.user_name AND abs.user_name='$Q' AND users.user_class=abs.user_class";
$res2 = mysqli_query($db,$query2);
$row2 = mysqli_fetch_row($res2);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="performance.php"><i class="fa fa-dashboard"></i><strong>Randament &amp; statistică</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Informație generală</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
                            <div class="bg-info" style="padding: 5px; font-size: 17px;">
                                <span class="text-danger"><strong>&#33;&#33;&#33;</strong></span>
                                <span class="text-info">Numărul de note minim strict necesare pentru calcularea mediei aritmetice semestriale la disciplinele de studiu este: <strong>6</strong>.</span>
                            </div><br>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Note</th>
                                        <th>Absențe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Total:</td>
                                        <td><?= $row1[4]; ?></td>
                                        <td><?= $row2[4]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <!-- /.box-body 2 -->
                            </div> <!-- row -->
                        </div> <!-- box-body 1 -->
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Randamentul meu</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
<?php
    $avgTable = "";

    function protectData ($data) {
        $data = mysql_escape_string(trim(strip_tags(addslashes($data))));
        $data = stripslashes(htmlspecialchars($data));
        return $data;
    }

    // show average of user disciplines
    if(isset($_POST["show"])) {
        $sel_disc = $_POST['select'];

        $sql = "SELECT 
                      note.disciplina,
                      note.user_name,
                      ROUND(AVG(note.nota),3),
                      COUNT(note.nota),
                      note.user_class
                FROM note
                INNER JOIN users 
                ON users.user_name = note.user_name AND note.user_name = '$Q' AND users.user_class = note.user_class AND note.disciplina='$sel_disc'";
    
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        if ($row[0] === $sel_disc) {
            $avgTable .= '<table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Media/disciplină</th>
                            <th>Numărul de note acumulate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$row[0].'</td>
                            <td>'.$row[2].'</td>
                            <td>'.$row[3].'&nbsp;note</td>
                        </tr>
                    </tbody>
                    </table>';
            #var_dump($row2);
        } else { 
            $avgTable .= '<div style="margin-top:10px;text-align:center;">';
            $avgTable .= '<span class="text-danger" style="font-size:17px;">Nu ați acumulat numărul de note necesare pentru a putea fi calculată media la această disciplină!</span>';
            $avgTable .= '</div>';
        }
    } else {
        $avgTable .= ' ';
    }

    // code for Morris Donut Chart
    $chartQuery = "SELECT
                      note.disciplina,
                      note.user_name,
                      COUNT(*) AS NumberOfMarks,
                      note.user_class
                FROM note INNER JOIN users 
                ON users.user_name = note.user_name AND note.user_name = '$Q' AND users.user_class = note.user_class
                GROUP BY note.disciplina";
    $chartRes = mysqli_query($db, $chartQuery);
    $data = array();
    while ($chartRow = mysqli_fetch_array($chartRes)) {
        $data[] = array(
            'label' => $chartRow["disciplina"],
            'value' => $chartRow["NumberOfMarks"]
        );
    }
    $data = json_encode($data);

    // abs chart
    $absQuery = "SELECT
                      abs.disciplina,
                      abs.user_name,
                      COUNT(*) AS NumberOfAbs,
                      abs.user_class
                FROM abs INNER JOIN users 
                ON users.user_name = abs.user_name AND abs.user_name = '$Q' AND users.user_class = abs.user_class
                GROUP BY abs.disciplina";
    $absRes = mysqli_query($db, $absQuery);
    $data2 = array();
    while ($chartRow = mysqli_fetch_array($absRes)) {
        $data2[] = array(
            'label' => $chartRow["disciplina"],
            'value' => $chartRow["NumberOfAbs"]
        );
    }
    $data2 = json_encode($data2);

?>                          <h4>Media semestrială la disciplinele de studiu:</h4>
                                <div class="bg-info" style="padding: 5px; font-size: 15px; margin-bottom: 10px;">
                                    <span class="text-danger"><strong>&#33;&#33;&#33;</strong></span>
                                    <span class="text-info">Aici sunt afișate doar disciplinele la care dvs. ați fost notat de către profesor. Alegeți disciplina la care doriți să vizualizați media.</span>
                                </div>
                                <form action="" class="form-inline" method="post">
                                    <div class="form-group">
                                        <select name="select" class="form-control">
                                            <option value="none">Selectați disciplina</option>
                                            <option value="biologie">Biologie</option>
                                            <option value="chimie">Chimie</option>
                                            <option value="ed. sănătate">Educație pentru sănătate</option>
                                            <option value="ed.civică">Educație civică</option>
                                            <option value="ed.fizică">Educație fizică</option>
                                            <option value="fizică">Fizică</option>
                                            <option value="geografie">Geografie</option>
                                            <option value="informatică">Informatica</option>
                                            <option value="istorie">Istorie</option>
                                            <option value="l.engleză">Limba engleză</option>
                                            <option value="l.franceză">Limba franceză</option>
                                            <option value="l.lit.română">Limba și literatura română</option>
                                            <option value="matematică">Matematică</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" name="show" value="Vezi media">
                                    </div>
                                </form>
                                <?= $avgTable; ?>
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border bg-green">
                        <h3 class="box-title">Statistica mea</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="box-body">
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                                <p class="text-info" style="font-size: 17px; text-align: center;">Numărul de note în dependență de disciplina de studiu</p>
                                <div id="chartMarks"></div>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 separate">
                                <p class="text-info" style="font-size: 17px; text-align: center;">Numărul de absențe în dependență de disciplina de studiu</p>
                                <div id="chartAbs"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->

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
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Morris.js charts -->
<script src="../plugins/morris/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<script>
    $(function () { 
        "use strict";
        var donut = new Morris.Donut({
          element: 'chartMarks',
          resize: true,
          hideHover: 'auto',
          data: <?php echo $data; ?>
        });

        var donut = new Morris.Donut({
          element: 'chartAbs',
          resize: true,
          hideHover: 'auto',
          data: <?php echo $data2; ?>
        });
    
    });
</script>

</body>
</html>