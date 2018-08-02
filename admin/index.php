<?php
$path='../';
require_once($path.'connect.php');
require_once($path.'admin/checkLogin.php');

$pageTitle='فهرست مدیریت';
$breadcrumb=array(	$path.'admin/'=>'فهرست مدیریت',
				  	$path.'admin/test'=>'بخش تستی',
					
					);

include('header.php');



include('footer.php');
?>