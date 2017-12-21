<?php
require_once '../includes/connectDB';

$sqle = "SELECT user_name FROM `users` WHERE user_category='elev'";
$sqlc = "SELECT DISTINCT class FROM clase";

if ($resulte = mysqli_query($db,$sqle)) {
  $resCount = mysqli_num_rows($resulte);
  mysqli_free_result($resulte);
}
if ($resultc = mysqli_query($db,$sqlc)) {
  $rescountClass = mysqli_num_rows($resultc);
  mysqli_free_result($resultc);
}
mysqli_close($db);
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Pagina de administrare a elevilor</h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/catalog-scolar/root/main.php" title="pagina principală" rel="nofollow"><i class="fa fa-dashboard"></i><span class="text-info">Principală</span></a></li>
        <li class="active"><span class="text-info">Administrare elevi</span></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="box-header bg-green content-title">
          <h3 class="box-title">Adăugare</h3> <!-- inserare php -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/view/classes.php" title="informații despre toate clasele" rel="nofollow">Info Clase</a></span>
            <span class="info-box-number"><small><?php echo "Total: " . $rescountClass;?></small></span>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
         <div class="info-box">
           <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="/catalog-scolar/root/add/add_learners.php" title="adaugați elevi" rel="nofollow">Adăugare elevi</a></span>
           </div>
         </div>
         <div class="info-box">
           <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/edit_class_schedule.php" title="orar lecții" rel="nofollow">Orar lecții</a></span>
           </div>
         </div>
         <div class="info-box">
           <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/thesis_schedule.php" title="orar teze" rel="nofollow">Orar teze</a></span>
             <span class="info-box-number"><small>Teza iarnă/vară</small></span>
           </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="box-header bg-blue content-title">
          <h3 class="box-title">Modificare</h3> <!-- inserare php -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><a href="/catalog-scolar/root/view/view_learners.php" title="vizualizați elevi" rel="nofollow" >Vizualizare elevi</a></span>
            <span class="info-box-number"><small><?php echo "Total: " . $resCount;?></small></span>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
        <div class="info-box">
           <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/edit_learners.php" title="editați elevi" rel="nofollow">Elevi</a></span>
           </div>
         </div>
         <div class="info-box">
           <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/edit_class_schedule.php" title="editați orarul lecțiilor" rel="nofollow">orar lecții</a></span>
           </div>
         </div>
         <div class="info-box">
           <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/thesis_schedule.php" title="editați orarul tezelor" rel="nofollow">Orar teze</a></span>
             <span class="info-box-number"><small>Teza iarnă/vară</small></span>
           </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="box-header bg-red content-title">
          <h3 class="box-title">Ștergere</h3> <!-- inserare php -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><a href="/catalog-scolar/root/view/view_learners.php" title="vizualizați elevi" rel="nofollow">Vizualizare elevi</a></span>
            <span class="info-box-number"><small><?php echo "Total: " . $resCount;?></small></span>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
        <div class="info-box">
           <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
           <div class="info-box-content">
             <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/edit/edit_learners.php" title="ștergeți elevi" rel="nofollow">Elevi</a></span>
           </div>
         </div>
         
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="box-header bg-aqua content-title">
          <h3 class="box-title">Vizualizare</h3> <!-- inserare php -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><a href="/catalog-scolar/root/view/view_learners.php" title="vizualizați elevi" rel="nofollow">Elevi</a></span>
            <span class="info-box-number"><small><?php echo "Total: " . $resCount;?></small></span>
          </div>
            <!-- /.info-box-content -->
        </div>
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><a href="http://localhost/catalog-scolar/root/view/allclasses.php" title="vezi toate clasele" rel="nofollow">Toate Clasele</a></span>
            <span class="info-box-number"><small><?php echo "Total: " . $rescountClass;?></small></span>
          </div>
            <!-- /.info-box-content -->
        </div>
          <!-- /.info-box -->
      </div>
    </div>  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



        <div class="modal bs-example-modal-lg"> <!-- add class fade to animate modal-->
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal Title</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Închideți</button>
                <button type="button" class="btn btn-primary">Salvați</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->