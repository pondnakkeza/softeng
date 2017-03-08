<?php
session_start();
define("_baseUrl","http://www.immeasy.com");

$serverName = "localhost";
$userName = "beernova001";
$userPassword = "immBeern0v@";
$dbName = "imm2";

$mysqli = mysqli_connect($serverName,$userName,$userPassword,$dbName);
mysqli_set_charset($mysqli,"utf8");

if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function baseUrl(){
	return _baseUrl;
}
function isAdmin(){
	return isset($_SESSION['username']);
}
$value 	= $mysqli->query("SELECT `sitename`,`video`,`id_setting` FROM `setting`")->fetch_assoc();
$setting = array("id"=>$value['id_setting'],"sitename"=>$value['sitename'],"video"=>$value['video']);
?>