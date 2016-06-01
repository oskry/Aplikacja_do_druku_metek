<?php

$user = 'root';
$password = '';
$database = 'generator';
mysql_connect('localhost', $user, $password);
mysql_select_db($database) or die("Nie udało się wybrać bazy danych");


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
		<script src="js/autoNumeric.js" type=text/javascript> </script>
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
   $(".prop_kod").on("click", function (e) {
        $.ajax({url: "wylosuj_kod.php", success: function(result){
			alert('Przydzielony kod to: '+result+' Sprawdź poprawność kodu!');
            $(".inputkod").val(result);
        }});
   });
 });
 
  jQuery(function($) {
      $('.someID_HTML5').autoNumeric('init');    
  });
    
	


	function validate()
	{
		var inputs = document.getElementsByClassName('valid'); 
		for(var i=0; i < inputs.length; i++) {
			if(inputs[i].value === '')
			{
				return false;
			}

						

		}
		return true;
	}
	
	
$(function(){
    $('.formularz_dodawnia').on('submit',function(event){
	
	
	if (validate()!=true){
       event.preventDefault() ;
       event.stopPropagation();
       alert("Wypełnij wszystkie pola.");
	}
	else
	{
	   event.preventDefault() ;
       event.stopPropagation();
		var username = $('.inputkod').val();
		$.ajax({
			type: "POST",
			url: "checkCode.php",
			data: {kod: username},
			cache: false,
			datatype: 'html',
			success: function(data){
			if (data == '1') {
				event.preventDefault() ;
				event.stopPropagation();
				alert("Taki kod istnieje w bazie danych.");
			} else if(data == '0') {
				dodajprod.submit();
			}
			}
		});
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
								echo "	<form onkeypress='return event.keyCode != 13;' class='form-horizontal formularz_dodawnia' method='get' action='add_przejscie.php' name='dodajprod'>
									  <fieldset>
										<div class='control-group'>
										  <label class='control-label' for='typeahead'>Model:</label>
										  <div class='controls'>
											<input style='width: 231px;' type='text' class='span6 typeahead valid' id='typeahead' name='model'>
										  </div>
										</div>
										
										<div class='control-group'>
										  <label class='control-label' for='typeahead'>Kod:</label>
										  <div class='controls'>
											<input style='width: 122px;'  onfocus='this.select()'  type='text' class='span6 typeahead valid inputkod' id='typeahead' name='kod'>   <div class='btn btn-primary prop_kod'>Zaproponuj kod</div>
										  </div> 
										</div>

										<div class='control-group'>
										  <label class='control-label' for='typeahead'>Surowiec:</label>
										  <div class='controls'>
											<select clas='valid' name='surowiec'>
												<option value='skóra naturalna'>skóra naturalna</option>
											
											</select>
										 </div>
										</div>	

										<div class='control-group'>
										  <label class='control-label' for='typeahead'>Artykuł:</label>
										  <div class='controls'>
											<select clas='valid'name='art'>";
												$query="SELECT * FROM kategorie";
												$result=mysql_query($query);
												$num=mysql_numrows($result);
												while ($i < $num) {
													$nazwa=mysql_result($result,$i,"nazwa");
													echo "<option value='$nazwa'>$nazwa</option>";
													$i++;
												};
												
											
									echo	"</select>
											

										  </div>
										</div>										

										<div class='control-group'>
										  <label class='control-label' for='typeahead'>Cena:</label>
										  <div class='controls'>
											<input style='width: 128px;' type='text' class='someID_HTML5 span6 typeahead valid' id='typeahead' name='cena' data-a-sep=' ' data-a-sign=' PLN' data-p-sign='s'>
										  </div>
										</div>
										
										<div class='form-actions'>
										
										  <button type='submit' name='Submit'  class='btn btn-primary btend'>Dodaj produkt</button>
										  <button type='reset' class='btn'>Wyczyść</button>
										</div>
									  </fieldset>
									</form>";
					?>   

						
				

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
