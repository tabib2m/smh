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

$shart='1';

$pageNum=$_GET['page'];
if(!$pageNum) $pageNum=1;

$t_line=20;
$from=($pageNum-1)*$t_line;


$query=query("select SQL_CALC_FOUND_ROWS * from `page` where $shart limit $from,$t_line");
$q=query("select FOUND_ROWS()");
$r=mysqli_fetch_row($q);
$tedad=$r[0];

pagination($pageNum,$tedad,$t_line);

include($path.'admin/footer.php');
?>