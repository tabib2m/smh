<?php
$path='../';
require_once($path.'connect.php');
require_once($path.'admin/checkLogin.php');

$pageTitle='فهرست مدیریت';
$subTitle='بخش مدیریت '.$_CONFIG['siteTitle'];

$breadcrumb=array(	$path.'admin/'=>'فهرست مدیریت',
					);

include('header.php');



include('footer.php');
?>