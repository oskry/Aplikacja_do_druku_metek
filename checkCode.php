<?php
$user = 'root';
$password = '';
$database = 'generator';
mysql_connect('localhost', $user, $password);
mysql_select_db($database) or die("Nie udało się wybrać bazy danych");

$kod = $_POST['kod'];
if (isset($kod))
{
	$resultnu=mysql_query("SELECT * FROM  `produkty` WHERE  `kod` =  '$kod'");
	$numc=mysql_numrows($resultnu);
	if($numc>0){
		if($kod==0)
		{
			echo 0;
		}
		else
		{
			echo 1;
		}
	} 
	else 
	{
		echo 0;
	}
}
else
{
	echo -1;
}	
exit;


?>


