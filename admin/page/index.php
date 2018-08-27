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


$what=$_GET['what'];
$shart='1';
$fieldsForSearch=array('title','desc','tags');
$tableName='page';
$fieldsToShow=array('title'=>array('title'=>'عنوان','link'=>true),
					'desc'=>array('title'=>'توضیحات'),
					'user'=>array('title'=>'کاربر','user'=>true),
					'date'=>array('title'=>'تاریخ ایجاد','date'=>true),
				   );

include($path.'admin/list.php');

include($path.'admin/footer.php');
?>