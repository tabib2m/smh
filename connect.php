<?php
require_once($path."config.php");
require_once($path."func.php");
date_default_timezone_set($_CONFIG['defaultTimezone']);


$queryHandle=mysqli_connect($_CONFIG['db_host'],$_CONFIG['db_user'],$_CONFIG['db_pass'],$_CONFIG['db_name']);
mysqli_set_charset($queryHandle,"utf8");

if(!$queryHandle) echo 'Error Connecting To DB!';

function query($query,$showError=true){
	global $queryHandle;
	
	$q=mysqli_query($queryHandle,$query);
	if($showError) echo mysqli_error($queryHandle);
	
	return $q;
}
?>