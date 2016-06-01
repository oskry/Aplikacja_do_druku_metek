<?php
$user = 'root';
$password = '';
$database = 'generator';
mysql_connect('localhost', $user, $password);
mysql_select_db($database) or die("Nie udało się wybrać bazy danych");


$query="SELECT * FROM puste_kody WHERE kod =  ( SELECT MIN(kod) FROM puste_kody );";
$result=mysql_query($query);
$num=mysql_numrows($result);
$kod=mysql_result($result,$i,"kod");

echo $kod;

?>


