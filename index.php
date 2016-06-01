<!DOCTYPE html>
<?php

$user = 'root';
$password = '';
$database = 'generator';
mysql_connect('localhost', $user, $password);
mysql_select_db($database) or die("Nie udało się wybrać bazy danych");



mysql_query("ALTER DATABASE `generator` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci");
mysql_query("ALTER TABLE `produkty` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci");
mysql_query('SET NAMES utf8');

$query="SELECT * FROM produkty";
$result=mysql_query($query);
$num=mysql_numrows($result);

?>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
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
 
 jQuery(document).ready(function ($) {
   $(".deletetest").on("click", function (e) {

    var myUrl = $(this).attr('data-url');
	if (confirm('Czy na pewno chcesz usunąć produkt?')) { 
		window.location.href = myUrl;
	}
		
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
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><span>Franco Morenzo</span></a>

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
						<li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Lista produktów</span></a></li>	
						<li><a href="add.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Dodaj produkt</span></a></li
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
						<a href="#">Home</a> 
						<i class="icon-angle-right"></i>
					</li>
					<li><a href="#">Produkty</a></li>
				</ul>


			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Lista produktów</h2>

					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Model</th>
								  <th>EAN13</th>
								  <th>Poprawność EAN13</th>
								  <th>Artykuł</th>
								  <th>Surowiec</th>
								  <th>Cena</th>
								  <th>Akcje</th>
							  </tr>
						  </thead>   
						  <tbody>
								<?php
								$i=0;
								while ($i < $num) {
									$id=mysql_result($result,$i,"indeks");
									$model=mysql_result($result,$i,"model");
									$kod=mysql_result($result,$i,"kod");
									$surowiec=mysql_result($result,$i,"surowiec");
									$art=mysql_result($result,$i,"art");
									$cena=mysql_result($result,$i,"cena");
									$cena_wyswietl=number_format($cena, 2, ',', ' ');
									$eok="<font color='green'><b>ok</b></font>";
									$num_length = strlen((string)$kod);
									if($num_length<12){
										$eok="<font color='red'><b>za krótki</b></font>";
									}
									
									if($kod==0){
										$eok="<font color='orange'><b>kod=0</b></font>";
									}
									else
									{
										$resultx = mysql_query("SELECT * FROM produkty WHERE kod='$kod'");
										$num_rows = mysql_num_rows($resultx);
										if($num_rows>1){
											$eok="<font color='red'><b>istnieje taki kod</b></font>";
										}
										$pos = substr_count((string)$kod, '590215023');
										if($pos<=0){
										$eok="<font color='red'><b>nie zaw. kodu firmy</b></font>";
										}
									}
									
											



									
									
									
									echo "
										<tr>
											<td>$model</td>
											<td class='center'>$kod</td>
											
											<td class='center'>$eok</td>
											<td class='center'>$art</td>
											<td class='center'>$surowiec</td>
											<td class='center'>$cena_wyswietl zł</td>
											
											<td class='center'>
												<input type='button' value='Druk' class='test' data-url= 'generowanie.php?model=$model&art=$art&sur=$surowiec&cena=$cena&kod=$kod'></input>
												<input type='button' value='Usuń' class='deletetest' data-url= 'delete.php?id=$id'></input>
											</td>
										</tr>";
									$i++;
								}
								?>
						  </tbody>
					  </table>            
  
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
