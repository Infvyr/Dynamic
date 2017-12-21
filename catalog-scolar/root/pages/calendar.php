<?php
session_start();
$title = 'Agenda mea';

require_once 'head.php';
require_once 'header.php';
require_once 'sidebar.php';

require_once '../../includes/bdd';

$sql = "SELECT id, title, start, end, color FROM calendar WHERE profname = '$Q' ";

$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Contul Meu</h1>
        <ol class="breadcrumb">
            <li class="active"><a href="."><i class="fa fa-dashboard"></i> Principală</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box-header with-border bg-green" style="margin-bottom:15px;">
            <h3 class="box-title">Agenda zilei</h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                   
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <div id="calendar"></div>
                    </div>                     
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


        <!-- Modal ADD -->
        <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="addEvent.php">
            <input type="hidden" name="admin"  value="<?= $Q; ?>" />
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Adăugare Eveniment</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Titlu</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Culoare</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Alegeți culoarea</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Albastru închis</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turcoaz</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Galben</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Oranj</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Roșu</option>
                          <option style="color:#000;" value="#000">&#9724; Negru</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Începe</label>
                    <div class="col-sm-10">
                      <input type="datetime" name="start" class="form-control" id="start">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">Finisează</label>
                    <div class="col-sm-10">
                      <input type="datetime" name="end" class="form-control" id="end">
                    </div>
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Închideți</button>
                <button type="submit" class="btn btn-primary">Salvați modificările</button>
              </div>
            </form>
            </div>
          </div>
        </div>

        <!-- Modal EDIT -->
        <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form class="form-horizontal" method="POST" action="editEventTitle.php">
            <input type="hidden" name="admin"  value="<?= $Q; ?>" />
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editați Eveniment</h4>
              </div>
              <div class="modal-body">
                
                  <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Titlu</label>
                    <div class="col-sm-10">
                      <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="color" class="col-sm-2 control-label">Culoare</label>
                    <div class="col-sm-10">
                      <select name="color" class="form-control" id="color">
                          <option value="">Alegeți culoarea</option>
                          <option style="color:#0071c5;" value="#0071c5">&#9724; Albastru închis</option>
                          <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turcoaz</option>
                          <option style="color:#008000;" value="#008000">&#9724; Verde</option>
                          <option style="color:#FFD700;" value="#FFD700">&#9724; Galben</option>
                          <option style="color:#FF8C00;" value="#FF8C00">&#9724; Oranj</option>
                          <option style="color:#FF0000;" value="#FF0000">&#9724; Roșu</option>
                          <option style="color:#000;" value="#000">&#9724; Negru</option>
                        </select>
                    </div>
                  </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label class="text-danger"><input type="checkbox"  name="delete">Ștergeți eveniment</label>
                          </div>
                        </div>
                    </div>       
                  <input type="hidden" name="id" class="form-control" id="id">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Închideți</button>
                <button type="submit" class="btn btn-primary">Salvați modificările</button>
              </div>
            </form>
            </div>
          </div>
        </div>
        <?php require_once 'footer.php'; ?>