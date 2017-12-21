<?php
$connect = mysqli_connect("localhost", "root", "", "catalog");
mysqli_set_charset($connect,"UTF8"); 

if (isset($_POST['chestionar'])) {
    $name = trim(stripslashes(htmlspecialchars($_POST['name'])));
    $grad = trim(stripslashes(htmlspecialchars($_POST['grad'])));
    $tel = trim(stripslashes(htmlspecialchars($_POST['tel'])));
    $mail = trim(stripslashes(htmlspecialchars($_POST['mail'])));
    $practivitate = trim(stripslashes(htmlspecialchars($_POST['practivitate'])));
    $actdidactic = trim(stripslashes(htmlspecialchars($_POST['actdidactic'])));
    $eval_rez = trim(stripslashes(htmlspecialchars($_POST['eval_rez'])));
    $promo = trim(stripslashes(htmlspecialchars($_POST['promo'])));
    $np_elev = trim(stripslashes(htmlspecialchars($_POST['np_elev'])));
    $clasa = trim(stripslashes(htmlspecialchars($_POST['clasa'])));
    $activitate = trim(stripslashes(htmlspecialchars($_POST['activitate'])));
    $locdesf = trim(stripslashes(htmlspecialchars($_POST['locdesf'])));
    $data = trim(stripslashes(htmlspecialchars($_POST['data'])));
    $premiu = trim(stripslashes(htmlspecialchars($_POST['premiu'])));
    $perioada = trim(stripslashes(htmlspecialchars($_POST['perioada'])));
    $curs = trim(stripslashes(htmlspecialchars($_POST['curs'])));
    $furnizor = trim(stripslashes(htmlspecialchars($_POST['furnizor'])));
    $loc_curs = trim(stripslashes(htmlspecialchars($_POST['loc_curs'])));
    $perioada2 = trim(stripslashes(htmlspecialchars($_POST['perioada2'])));
    $activ2 = trim(stripslashes(htmlspecialchars($_POST['activ2'])));
    $loc2 = trim(stripslashes(htmlspecialchars($_POST['loc2'])));
    $tema2 = trim(stripslashes(htmlspecialchars($_POST['tema2'])));
    $propuneri = trim(stripslashes(htmlspecialchars($_POST['propuneri'])));
    $data_intocmirii = trim(stripslashes(htmlspecialchars($_POST['data_intocmirii'])));

    if ($name == NULL && $grad == NULL && $tel == NULL && $mail == NULL && $practivitate == NULL && $actdidactic == NULL && $eval_rez == NULL && $promo == NULL && $np_elev == NULL &&$clasa == NULL && $activitate == NULL &&$locdesf == NULL && $data == NULL && $premiu == NULL && $perioada == NULL && $curs == NULL && $furnizor == NULL && $loc_curs == NULL && $perioada2 == NULL && $activ2 == NULL && $loc2 == NULL && $tema2 == NULL && $propuneri == NULL && $data_intocmirii == NULL) {
            echo "<script>
            swal({  
                title: 'Eroare!',
                text: 'Toate cîmpurile sunt obligatoriu pentru completare!!!',  
                type: 'error',      
                confirmButtonText: 'Închideți', 
                allowOutsideClick: true,
                allowEscapeKey: true
            });
            </script>";
        } else {
            $sql = "INSERT INTO report (nume, grad_didactic, telefon, mail, practivitate, act_didactic, eval_rez, promo, np_elev, clasa, activitate, locdesf, data, premiu, perioada, curs, furnizor, loc_desf, perioada2, activ2, loc2, tema2, propuneri, data_intocmirii) VALUES ('$name','$grad','$tel','$mail','$practivitate','$actdidactic','$eval_rez','$promo','$np_elev','$clasa','$activitate','$locdesf','$data','$premiu','$perioada','$curs','$furnizor','$loc_curs','$perioada2','$activ2','$loc2','$tema2','$propuneri','$data_intocmirii')";
        
        if (mysqli_query($connect, $sql)) {
        echo "<script>
            swal({  
                title: 'Succes!',
                text: 'Datele au fost adăugate cu succes...',  
                type: 'success',      
                confirmButtonText: 'OK', 
                });
                window.location = 'http://localhost/catalog-scolar/members/teacher/raports.php';
            </script>";
        } else {
            echo "<script>
                swal({  
                    title: 'Eroare!',
                    text: 'Datele introduse sunt absolut incorecte...',  
                    type: 'error',      
                    confirmButtonText: 'Închideți', 
                    allowOutsideClick: true
                    });
                </script>";
            die("Cerere invalidă");
        }
    }
    mysqli_close($connect);
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li><a href="."><i class="fa fa-dashboard"></i>Principală</a></li>
            <li class="active"><a href="raports.php"><i class="fa fa-dashboard"></i><strong>Întocmire raport</strong></a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green content-title">
            <h3 class="box-title">Generarea raportului</h3>
        </div>

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body no-padding">
                <form class="form-horizontal" action="" method="post" style="padding: 20px;">
                    <div class="form-group">
                        <label for="name">Nume</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="grad">Grad didactic</label>
                        <input type="text" class="form-control" name="grad" id="grad">
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefon</label>
                        <input type="number" class="form-control" name="tel" id="tel">
                    </div>
                    <div class="form-group">
                        <label for="mail">Adresă e-mail</label>
                        <input type="email" class="form-control" name="mail" id="mail">
                    </div>
                    <div class="form-group">
                        <label for="practivitate">Proiectarea activității</label>
                        <textarea class="form-control" name="practivitate" id="practivitate" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="actdidactic">Realizarea activităților didactice</label>
                        <textarea class="form-control" name="actdidactic" id="actdidactic" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="eval_rez">Evaluarea rezultatelor învățării</label>
                        <textarea class="form-control" name="eval_rez" id="eval_rez" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="promo">Contribuția la dezvoltarea instituțională și promovarea imaginii unității școlare</label>
                        <textarea class="form-control" name="promo" id="promo" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px;">Elevi pregătiți pentru concursuri și olimpiade</label><br>
                        <label for="np_elev">Numele și prenumele</label>
                        <input type="text" name="np_elev" id="np_elev" class="form-control">
                        <br>
                        <label for="clasa">Clasa</label>
                        <input type="text" name="clasa" id="clasa" class="form-control">
                        <br>
                        <label for="activitate">Concurs/olimpiadă</label>
                        <input type="text" name="activitate" id="activitate" class="form-control">
                        <br>
                        <label for="locdesf">Locul desfășurării</label>
                        <input type="text" name="locdesf" id="locdesf" class="form-control">
                        <br>
                        <label for="data">Data</label>
                        <input type="date" name="data" id="data" class="form-control">
                        <br>
                        <label for="premiu">Premiu obținut</label>
                        <input type="text" name="premiu" id="premiu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px;">Participarea la cursuri de formare</label><br>
                        <label for="perioada">Perioada</label>
                        <input type="text" name="perioada" id="perioada" class="form-control">
                        <br>
                        <label for="curs">Denumirea cursului</label>
                        <input type="text" name="curs" id="curs" class="form-control">
                        <br>
                        <label for="furnizor">Furnizor</label>
                        <input type="text" name="furnizor" id="furnizor" class="form-control">
                        <br>
                        <label for="loc_curs">Locul desfășurării</label>
                        <input type="text" name="loc_curs" id="loc_curs" class="form-control">
                    </div>
                    <div class="form-group">
                        <label style="font-size: 16px;">Implicarea în proiecte educative, activități extracurriculare</label><br>
                        <label for="perioada2">Perioada</label>
                        <input type="text" name="perioada2" id="perioada2" class="form-control">
                        <br>
                        <label for="activ2">Activitatea</label>
                        <input type="text" name="activ2" id="activ2" class="form-control">
                        <br>
                        <label for="loc2">Locul desfășurării</label>
                        <input type="text" name="loc2" id="loc2" class="form-control">
                        <br>
                        <label for="tema2">Tema</label>
                        <input type="text" name="tema2" id="tema2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="propuneri">Opționale propuse</label>
                        <input type="text" class="form-control" name="propuneri" id="propuneri">
                    </div>
                    <div class="form-group">
                        <label for="data_intocmirii">Data întocmirii</label>
                        <input type="date" class="form-control" name="data_intocmirii" id="data_intocmirii">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="chestionar" class="btn btn-success">Salvare</button>
                        <a href="viewreport.php" class="btn btn-info" title="vizualizați raportul dvs." rel="nofollow">Vezi raportul</a>
                    </div>
                </form>
           </div>  <!-- /.box-body -->
          </div>  <!-- /.box -->
        </div>
      </div> <!-- /.row -->
    </section>
    </div> <!-- /.content-wrapper -->
