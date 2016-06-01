<?php
$art = $_GET['art']; 
$model = strtoupper($_GET['model']);
$surowiec = $_GET['surowiec']; 
$kod = $_GET['kod']; 
$user = 'root';
$password = '';
$database = 'generator';
mysql_connect('localhost', $user, $password);
mysql_select_db($database) or die("Nie udało się wybrać bazy danych");

$cena = str_replace(" PLN","",$_GET['cena']);
$cena = str_replace(" ","",$cena);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>
		<script src="js/modernizr.js"></script>	
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src='js/jquery.dataTables.min.js'></script>
		<script src="js/jquery.chosen.min.js"></script>
		<script src="js/jquery.uniform.min.js"></script>
		<script src="js/jquery.cleditor.min.js"></script>
		<script src="js/jquery.elfinder.min.js"></script>
		<script src="js/jquery.raty.min.js"></script>
		<script src="js/jquery.uploadify-3.1.min.js"></script>
		
		<script type='text/javascript'>
  function openPrintWindow(url, name, specs) {
    var printWindow = window.open(url, name, specs);
    var printAndClose = function () {
      if (printWindow.document.readyState == 'complete') {
        clearInterval(sched);
        printWindow.print();
        printWindow.close();
     }
    }  
      var sched = setInterval(printAndClose, 200);
   };

 jQuery(document).ready(function ($) {
   $(".test").on("click", function (e) {

    var myUrl = $(this).attr('data-url');
    e.preventDefault();
	var widthpx = screen.width;
    var heightpx = screen.height;
    openPrintWindow(myUrl, "to_print", 'left=0,top=0,width='+widthpx +',height='+heightpx +',toolbar=0,scrollbars=0,status =0,location=no');
   });
 });


		</script>
		<script src="js/custom.js"></script>
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">

				</a>
				<a class="brand" href="index.html"><span>Franco Morenzo</span></a>
								
				<!-- start: Header Menu -->

				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet">  Lista produktów</span></a></li>	
						<li><a href="add.php"><i class="icon-edit"></i><span class="hidden-tablet"> Dodaj produkt</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Strona Główna</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Dodaj</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Dodaj produkt</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
					<?php

					$dbhost = 'localhost';
					$dbuser = 'root';
					$dbpass = '';
					$conn = mysql_connect($dbhost, $dbuser, $dbpass);
					mysql_query("SET NAMES 'utf8';");
					mysql_query('SET CHARACTER SET utf8;');
						$resultnu=mysql_query("SELECT * FROM  `produkty` WHERE  `kod` =  '$kod'");
						$numc=mysql_numrows($resultnu);
						if($numc>0){
							if ($kod==0){
								echo "<font color='orange'>Brak kodu! (kod zero)</font><br>";				
							}
							else
							{
								echo "<font color='red'>Nie dodano produktu, taki kod istnieje w bazie danych!</font><br>";
								goto etykieta;
							}
						}
							$sql = "INSERT INTO  `generator`.`produkty` (`model` ,`kod` ,`art` ,`surowiec` ,`cena`) VALUES ('".$model."',  '".$kod."',  '".$art."',  '".$surowiec."',  '".$cena."');";
							mysql_select_db('generator');
							$retval = mysql_query( $sql, $conn );
							mysql_query( "DELETE FROM puste_kody WHERE kod='$kod'", $conn );
							echo"
								<font color='green'>Dodano produkt do bazy!</font><br>
								 Model: <b>".$model."</b><br>
								 Artykuł: <b>".$art."</b><br>
								 Kod: <b>".$kod."</b><br>
								 Surowiec: <b>".$surowiec."</b><br>
								 Cena: <b>".$cena."</b><br>";
					
					etykieta:

					?>
						
					<button class='btn btn-primary' onclick="location.href='index.php'">Powrót do bazy</button> 
					</div>
					
					
				</div><!--/span-->

			</div><!--/row-->



	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2015 <a href="mailto:patryk1oskroba@wp.pl" alt="Projekt i realizacja: Patryk Oskroba">Projekt i realizacja: Patryk Oskroba on © 2013 Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>

</body>
</html>
