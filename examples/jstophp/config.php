<?php
///////////////config//////////////////
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','my_bd');

define("COUNT_PER_PAGE",5);

$site_name = 'Тестовый сайт';
$button = "Button";
///////////////config//////////////////

//
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);

if(!$db) {
	exit('No connection with database');
}

if(!mysqli_select_db($db,DB_NAME)) {
	exit('Wrong database');
}
mysqli_query($db,"SET NAMES UTF8");
?>