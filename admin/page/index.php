<?php
$path='../../';
require_once($path.'connect.php');
require_once($path.'admin/checkLogin.php');

$pageTitle='فهرست صفحات';
$subTitle='فهرست صفحات سايت '.$_CONFIG['siteTitle'];

$breadcrumb=array(	$path.'admin/'=>'فهرست مدیریت',
				  	$path.'admin/page/'=>'صفحات'
					);

include($path.'admin/header.php');



include($path.'admin/footer.php');
?>