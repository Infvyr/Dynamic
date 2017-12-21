<?php 
session_start(); 
$title = "Orarul lecțiilor";

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
        <?php echo $_SESSION['member_name'] . '&nbsp;|&nbsp;' . $title;?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="icon" type="image/ico" href="../dist/img/profile.ico">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Contul Meu</h1>
		<ol class="breadcrumb">
			<li><a href="."><i class="fa fa-dashboard"></i> Principală</a></li>
			<li class="active"><a href="http://localhost/catalog-scolar/members/learner/schedule.php"><i class="fa fa-dashboard"></i>Orarul lecțiilor</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="box-header with-border bg-green" style="margin-bottom:15px;">
			<h3 class="box-title">Orarul Lecțiilor</h3>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<div class="row">
							<div class="box-body">
								<?php
								require_once '../../includes/connect';
								$output = '';
								$sql = "SELECT * FROM orarClase ORDER BY orar_id ASC";
								$result = mysqli_query($db, $sql);
								
								if(mysqli_num_rows($result) > 0)
								{
								echo '
								<div class="table-responsive">
									<table class="table table-bordered table-hover table-condensed">
										<tr>
											<th width="10%">Ziua</th>
											<th width="10%">Clasa 10-a A</th>
											<th width="10%">Clasa 10-a B</th>
											<th width="10%">Clasa 10-a C</th>
											<th width="10%">Clasa 11-a A</th>
											<th width="10%">Clasa 11-a B</th>
											<th width="10%">Clasa 11-a C</th>
											<th width="10%">Clasa 12-a A</th>
											<th width="10%">Clasa 12-a B</th>
											<th width="10%">Clasa 12-a C</th>
										</tr>';
										while($row = mysqli_fetch_array($result))
										{
										$output .= '
										<tr>
											<td>'.$row[1].'</td>
											<td>'.$row[2].'</td>
											<td>'.$row[3].'</td>
											<td>'.$row[4].'</td>
											<td>'.$row[5].'</td>
											<td>'.$row[6].'</td>
											<td>'.$row[7].'</td>
											<td>'.$row[8].'</td>
											<td>'.$row[9].'</td>
											<td>'.$row[10].'</td>
										</tr>
										';
										}
										}
										else
										{
										$output .= '<tr>
											<td colspan="4">Ne pare rău! Datele nu au fost găsite!</td>
										</tr>';
										}
									$output .= '</table>
								</div>';
								echo $output;
								mysqli_free_result($result);
                                mysqli_close($db); 
								?>
							</div>
							<!-- /.box-body -->
						</div>
					</section>
					<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->

<?php require_once 'pages/footer.php'; ?>
