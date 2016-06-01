<?php
$art = $_GET['art']; if (!isset($art) || empty($art)) $art ='brak danych';
$model = $_GET['model']; if (!isset($model) || empty($model)) $model ='brak danych';
$sur = $_GET['sur']; if (!isset($sur) || empty($sur)) $sur ='brak danych';
$cena = $_GET['cena']; if (!isset($cena) || empty($cena)) {$cena ='brak danych';} else {$cena=number_format($cena, 2, ',', ' ').' zł';};
$kod = $_GET['kod']; 


?>


<html xmlns="http://www.w3.org/1999/xhtml" lang="pl">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head></head>
<body>
<style>
  @page 
    {
        size: auto; 
        margin: 0mm; 
    }

#linijka{
font-family: arial;
position: absolute;
width: 3cm;
text-align: center;
}

#linijka_dluga{
font-family: arial;
position: absolute;
width:5cm;
text-align: center;
}

#linijka_dluga{
font-family: arial;
position: absolute;
width:5cm;
text-align: center;
}


#linijka_margin_model_dlugi{
font-family: arial;
position: absolute;
width:3cm;
text-align: center;
margin-left: 0.25cm;
}


.artykul_text{
	top:0.3cm;
	font-size: 13px;
}
.artykul_get{
	top:0.7cm;
	font-size: 15px;
}

.model_text{
	top:1.4cm;
	font-size: 13px;
}
.model_get{
	font-weight: 700;
	top:1.8cm;
	font-size: 16.5px;
	width: 3cm;
    text-align: center;
    
}

.surowiec_text{
	top:3.05cm;
	font-size: 13px;
}
.surowiec_get{
	top:3.45cm;
}

.cena_text{
	top:4.1cm;
	font-size: 14px;
}
.cena_get{
	top:4.55cm;
	font-size: 19px;
}

.wyprodukowano{
top:5.3cm;
font-family: cursive;
font-size: 12px;
font-weight: 700;
}

#kod_kreskowy{
    position: absolute;
    -webkit-transform: rotate(270deg);
    top: 77px;
    left: 1.9cm;
    width: 186px;
    height: 64px;
}

#dlugie{
width: 5cm;
}

</style>

<?php
	$num_length = strlen((string)$kod);
	if($num_length<12){
		$kod=0;
	}
	
	if($kod==0){
		$kod=0;
	}
	$pos = substr_count((string)$kod, '590215023');
			
	if($pos<=0){
		$kod=0;
	}

?>


<div id="metka">
	<img  id="all" src="metka_html.png" style="width: 5cm; position: absolute;height: 5.5cm;">
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="artykul_text">Artykuł:</div>
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="artykul_get"><?php echo $art ?></div>	
	

	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="model_text">Model:</div>
	<div class="model_get" id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" ><?php echo $model ?></div>
	
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="surowiec_text">Surowiec:</div>
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="surowiec_get"><?php echo $sur ?></div>
	
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="cena_text">Cena:</div>
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="cena_get"><?php echo $cena ?></div>
	
	<div id="<?php if($kod!=0){echo "linijka";}else{echo "linijka_dluga";} ?>" class="wyprodukowano" style="width: 5cm;">Wyprodukowano w Polsce</div>
	<object id="kod_kreskowy" data='EAN13example.php?code=<?php echo $kod ?>' type='image/svg+xml' ></object>
</div>



</body>
</html>


