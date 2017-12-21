<?php 
/*if($_SERVER['SERVER_PORT'] != '443') { header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); exit(); }*/

// Use HTTP Strict Transport Security to force client to use secure connections only
/*$use_sts = true;

// iis sets HTTPS to 'off' for non-SSL requests
if ($use_sts && isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
    header('Strict-Transport-Security: max-age=31536000');
} elseif ($use_sts) {
    header('Location: https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], true, 301);
    // we are in cleartext at the moment, prevent further execution and output
    die();
}
*/
    require_once 'table.php'; 
?>
<!doctype html>
<!--[if IE 8 ]><html lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>Cautati cartea dorita</title>
    <link rel="shortcut icon" href="img/base_icon.png" TYPE="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/base-styles.css">
    <link rel="stylesheet" href="fonts/font.css">
    
    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/myscripts.js"></script>
</head>

<body>
    <!-- for navigate to top of page -->
    <div class="top scrollToTop">
        <span><i class="glyphicon glyphicon-circle-arrow-up"></i></span>
    </div>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <table class="table table-bordered table-hover table-condensed" id="tabel">
                <thead>
                    <tr>
                        <th>Nr</th>
                        <th>Denumire Carte</th>
                        <th>Autor</th>
                        <th>Editura</th>
                        <th>Anul</th>
                        <th>Pret</th>
                    </tr>
                </thead>
                    <?php
                        foreach ($tableData as $key => $value) : ?>
                            <tr>
                                <td> <?= $value[0] ?> </td>
                                <td> <?= $value[1] ?> </td>
                                <td> <?= $value[2] ?> </td>
                                <td> <?= $value[3] ?> </td>
                                <td> <?= $value[4] ?> </td>
                                <td> <?= $value[5] ?> </td>
                            </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>

<script>
$(document).ready(function(){
    $('#tabel').dataTable();
});
</script>

</body>
</html>

