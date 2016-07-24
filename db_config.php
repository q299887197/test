<?php	
session_start();
error_reporting(E_ERROR | E_PARSE);

ob_start();

$hostname_DB = "localhost";
$database_DB = "RentalCar";
$username_DB = "root";
$password_DB = "";


$DB = mysql_pconnect($hostname_DB, $username_DB, $password_DB) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database_DB,$DB);
mysql_query("SET NAMES UTF8;");
mysql_query("SET CHARACTER_SET_CLIENT=UTF8;");
mysql_query("SET CHARACTER_SET_RESULTS=UTF8;");
?>