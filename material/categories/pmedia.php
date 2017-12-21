<?php require_once "../mainDbase/db"; $link = db_connect(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
		<title>Galerie Foto</title>
		<!-- CSS  -->
		<link rel="icon" href="../media/img/book.ico" type="image/x-icon">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link href="../css/main.css" type="text/css" rel="stylesheet" media="screen,projection"/>
		<link rel="stylesheet" href="../css/media_screens.css">
		<link rel="stylesheet" href="jquery.fancybox.css" media="screen,project">

		<!-- FANCYBOX -->		
		<link rel="stylesheet" type="text/css" href="../css/jquery.fancybox.css?v=2.1.5" media="screen" />

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
	</head>
	<body>
		<!-- Inceput meniu -->
		<div class="navbar-fixed">
			<nav class="indigo darken-3 z-depth-2">
				<div class="nav-wrapper">
					<a href="/material" class="brand-logo hide-on-small-only" style="padding:1px; margin-left: 20px;">
						<img src="../media/img/logo.png" alt="Biblioteca Publică s.Gribova" title="Biblioteca Publică s.Gribova">
					</a>
					<ul class="right hide-on-med-and-down">
						<li><a href="/material" title="deschideți pagina principală">Principală</a></li>
						<li><a href="#">Activități</a></li>
						<li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank">Catalog</a></li>
						<li>
							<a class="dropdown-button" href="#" data-activates="dropdown1" data-beloworigin="true">Galerie
								<i class="material-icons right">arrow_drop_down</i>
							</a>
						</li>
						<li><a href="despre.php" title="vizualizați informația despre bibiliotecă">Despre</a></li>
						<li><a href="contacte.php" title="contactați-ne">Contacte</a></li>
					</ul>
					<!-- Structure for mobile menu -->
					<ul id="nav-mobile" class="side-nav collapsible collapsible-accordion">
						<li>
							<div class="nav-wrapper indigo darken-2">
								<form method="post" action="" style="min-width:238px; ">
									<div class="input-field">
										<input id="search" name="qSearch" type="search" placeholder="căutați termenii doriți..." required>
										<label for="search" ><i class="material-icons">search</i></label>
									</div>
								</form>
							</div>
						</li>
						<li id="pad"><a href="/material" class="waves-effect waves-purple" title="deschideți pagina principală">Principală</a></li>
						<li><a href="#" class="waves-effect waves-purple">Activități</a></li>
						<li><a href="../catalogBibl/" title="căutați cartea în baza de date" target="_blank" class="waves-effect waves-purple">Catalog</a></li>
						<li>
							<a href="#" class="active collapsible-header waves-effect waves-purple">Galerie<i class="material-icons right">arrow_drop_down</i></a>
							<div class="collapsible-body">
								<ul>
									<li><a href="/material/categories/pmedia.php" class="waves-effect waves-purple">Foto</a></li>
									<li><a href="/material/categories/vmedia.php" class="waves-effect waves-purple">Video</a></li>
							</ul>
							</div>
						</li>
						<li><a href="despre.php" class="waves-effect waves-purple" title="vizualizați informația despre bibiliotecă">Despre</a></li>
						<li><a href="contacte.php" class="waves-effect waves-purple" title="contactați-ne">Contacte</a></li>
					</ul>
					<a href="#" data-activates="nav-mobile" class="button-collapse btn-flat green"><i class="material-icons white-text">menu</i></a>
					</div> <!-- nav-wrapper -->
				</nav>
				<!-- Dropdown Structure -->
				<ul id="dropdown1" class="dropdown-content indigo">
					<li><a href="/material/categories/pmedia.php" class="white-text"><i class="material-icons left">photo</i>Foto</a></li>
					<li><a href="/material/categories/vmedia.php" class="white-text"><i class="material-icons left">movie</i>Video</a></li>
				</ul>
			</div>
			<!-- Sfirsit meniu -->
			<!-- Inceput bara de cautare -->
			<div class="row ">
				<div class="col s12 m12 l3">  <!-- style="margin-left:-6px; -->
				<nav class="search">
					<div class="nav-wrapper indigo darken-2">
						<form method="post" action="/material/search_article.php" id="search_form">
							<div class="input-field">
								<input id="search" name="sQuery" type="search" placeholder="căutați termenii doriți..." required>
								<label for="search" ><i class="material-icons">search</i></label>
							</div>
						</form>
					</div>
				</nav>
			</div>
			<!-- Sfirsit bara de cautare -->
			<!-- Inceput bara pentru motto -->
			<div class="col s12 m12 l9">
				<div class="card-panel valign-wrapper" id="motto">
					<?php
					$sql = "SELECT content_quote, auth_quote FROM quotes ORDER BY RAND() LIMIT 1";
					if($result = mysqli_query($link, $sql)){
					if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
					echo "Motto:" . '&nbsp; ' . "<p class='indigo-text'>" . $row['content_quote'] . "</p>" . '&nbsp;' . "<span class='green-text text-darken-3'>" . $row['auth_quote']. "</span>";
					}
					// Close result set
					mysqli_free_result($result);
					} else{
					echo "No records matching your query were found.";
					}
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}
					?>
				</div>
			</div>
			<!-- Sfirsit bara pentru motto -->
		</div>
		<!-- Inceput Continut Principal -->
		<div class="card-panel" >
			<div class="row">
				<div class="col s12 l12 m12">
					<aside class="indigo row" style="padding:2px 5px; margin-top: 15px;">
						<h4 class="white-text" style="padding-left:10px;">Galerie Foto</h4>
					</aside>
					<!-- Inceput Slider -->
					<div class="slider">
						<ul class="slides">
							<li>
								<img src="/material/media/slider/Slide2.jpg"> <!-- random image -->
							</li>
							<li>
								<img src="/material/media/slider/Slide1.jpg"> <!-- random image -->
							</li>
							<li>
								<img src="/material/media/slider/Slide4.jpg"> <!-- random image -->
							</li>
							<li>
								<img src="/material/media/slider/Slide3.jpg"> <!-- random image -->
							</li>
						</ul>
					</div>
					<!-- Sfirsit Slider -->

					<div class="center-align" style="margin-bottom:30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit consectetur nam, deleniti expedita rem? Molestiae, ab quo earum deleniti rem quis ipsam fuga. Quae, eligendi.
					</div>
					<div class="divider"></div><br>
				</div>
			</div> <!-- row -->
			
			<div class="row" id="images">
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
		      <div class="col s12 l3 m6">
		      	<a class="fancybox" href="/material/media/img/s1.jpeg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="/material/media/img/s1.jpeg" alt="" /></a>
		      </div>
    		</div>
		</div>

		<!-- Sfirsit Continut Principal -->
		<?php require_once "footer.php"; ?>
		<!-- Butonul navigare rapida sus -->
		<a href="#" class="center-align" id="toTop"><i class="fa fa-chevron-circle-up fa-3x" aria-hidden="true"></i></a>
		
		<!--  Scripts-->
		<script src="../js/jquery-1.9.0.min.js"></script>
		<script src="../js/materialize.min.js"></script>
		<script>
		(function($){
		$(function(){
		$('.button-collapse').sideNav();
		$('.modal-trigger').leanModal({
		dismissible: true, // Modal can be dismissed by clicking outside of the modal
		opacity: .5, // Opacity of modal background
		in_duration: 300, // Transition in duration
		out_duration: 200, // Transition out duration
		});
		$('.slider').slider({full_width: true});	
		
		/* to Top Button */
		//Check to see if the window is top if not then display button
		$(window).scroll(function(){
		if ($(this).scrollTop() > 400) {
		$('#toTop').fadeIn();
		} else {
		$('#toTop').fadeOut();
		}
		});
		//Click event to scroll to top
		$('#toTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
		});
		/* Activate link menu */
		$('.right li').click(function(){
			$('.right li').removeClass("active");
			$(this).addClass("active");
		});
		$('.fancybox').fancybox();
		}); // end of document ready
		})(jQuery); // end of jQuery name space
		</script>

		<script type="text/javascript" src="../js/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="../js/jquery.fancybox.js?v=2.1.5"></script>
	</body>
</html>