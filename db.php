
<?php
$link = mysqli_connect('localhost','root','','zabolotskikh');
mysqli_set_charset($link,"utf8");
if(!$link){
	die("Ошибка: ".mysqli_connect_error());
}
else{ 
	//echo "Соединение выполнено";
}
?>