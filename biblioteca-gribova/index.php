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
    <title>Forma de vizualizare,editare,stergere a cartii din biblioteca</title>
    <link rel="stylesheet" type="text/css" href="css/base-styles.css">
    <link rel="stylesheet" href="fonts/font.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/dataTables.min.css"> -->
    <link rel="shortcut icon" href="img/base_icon.png" TYPE="image/x-icon">

    <script src="js/jquery.min.js"></script> 
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/myscripts.js"></script>
    
    <script type="text/javascript">
        $(function(){
            $('#create').click(function() {
                $('#myModal').find('.modal-title').text('Adaugare carte');
                var modifyBtn = $('#myModal').find('.modal-content').find('form');
                modifyBtn.attr('action', 'add.php');
            });


            $('.edit').click(function() {
                var id = $(this).data('id'); 
                $('#id').val(id);
                //$("#id").val($(this).attr('data-id')); 
            });
        /* ================================= */
            $(".delete").click(function(){
                var thisElement = $(this);
                var id = thisElement.data('id');
               
                if(confirm("Ești sigură că dorești să ștergi cartea din baza de date?")) {
                    $.ajax({
                        type: "POST",
                        url: 'delete.php',
                        data: {id: id},
                        success: function(data) {
                            alert('Cartea a fost ștearsă din baza de date!');
                            if(data == 1) {
                                thisElement.closest('tr').remove();
                            }
                        }
                    });
                }
            });
        });
    </script> 
</head>

<body>
                    <script>
                        $().ready(function(){
                               /* animate scroll to top link */
                            $('.scrollToTop').click(function(){
                               $('html, body').animate({scrollTop : 0},500);
                               return false;
                            });
                        });
                    </script>
    <!-- for navigate to top of page -->
    <div class="top scrollToTop">
        <span><i class="glyphicon glyphicon-circle-arrow-up"></i></span>
    </div> 

    <div class="container" style="margin-top: 30px;">
        <div class="row" id="panel">
            <button class="btn btn-primary btn-md" id="create" data-toggle="modal" data-target="#myModal">Adăugați carte</button>
        </div> <hr>

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
                        <th>Functii</th>
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
                                <td>
                                    <a data-id="<?= $value[0] ?>" class="edit" href="#" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-pencil" id="editCell" title="Modifică cartea">&nbsp;</i></a>
                                    <a data-id="<?= $value[0] ?>" class="delete" href="#"><i class="glyphicon glyphicon-trash" id="editCell" title="Șterge carte">&nbsp;</i></a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
            </table>
        </div>
    </div>

<!-- Modal edit user -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" >
    <div class="modal-content">
        <form method="POST" action="edit.php">
            <input id="id" type="hidden" class="form-control" name="id" value="" /> 
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">X</span></button>
                <h4 class="modal-title" id="myModal" style="text-align: center;">Editare Carte</h4>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Denumire Carte</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Introduceti denumirea cartii">
                            </div>

                            <div class="form-group">
                                <label for="surname">Autor</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Numele Autorului trebuie sa contina 3 sau mai multe caractere">
                            </div>

                            <div class="form-group">
                                <label for="password">Editura</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Editura trebuie sa contina 4 sau mai multe caractere">
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Anul ediției</label>
                                <input type="text" class="form-control" id="aned" name="aned" placeholder="Anul ediției trebuie să conțina un număr din 4 cifre">
                            </div>

                            <div class="form-group">
                                <label for="password">Prețul</label>
                                <input type="text" class="form-control" id="pret" name="pret" placeholder="Prețul trebuie să fie completat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Închideți</button>
                    <input type="submit" class="btn btn-primary"value="Salvați modificările"/>
                </div>
        </form>
    </div> <!-- modal-content -->
  </div> <!-- modal-dialog -->
</div>

<script>
$(document).ready(function(){
    $('#tabel').dataTable();
});
</script>

</body>
</html>

