<?php
require_once($path."config.php");

$queryHandle=mysqli_connect($_CONFIG['db_host'],$_CONFIG['db_user'],$_CONFIG['db_pass'],$_CONFIG['db_name']);
mysqli_set_charset($queryHandle,"utf8");

if(!$queryHandle) echo 'Error Connecting To DB!';

function query($query,$showError=true){
	global $queryHandle;
	
	$q=mysqli_query($queryHandle,$query);
	if($showError) echo mysql_error();
	
	return $q;
}
?>