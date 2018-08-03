<?php
$path='../';
$noRedirectToLoginPage=true;
require_once($path.'connect.php');
require_once($path.'admin/checkLogin.php');

if($LOGIN){
	header("Location: index.php");
}

$pageTitle='ورود';
$subTitle='بخش مدیریت '.$_CONFIG['siteTitle'];

$breadcrumb=array(	$path.'admin/'=>'فهرست مدیریت',
				  	$path.'admin/login.php'=>'ورود'
				  	);
include('header.php');
?>
<form method="post">
	<table cellpadding="5" align="center">
		<tr>
			<td valign="bottom">
				نام کاربری:
			</td>
			<td valign="bottom">
				<input type="text" name="username" value="<?=$USER;?>" class="text">
			</td>
		</tr>
		<tr>
			<td valign="top">
				رمز عبور:
			</td>
			<td valign="top">
				<input type="password" name="password" value="<?=$PASS;?>" class="text"><br>
				<label for="save"><input type="checkbox" name="save" value="1" id="save" <?php if($_POST['save']) echo 'checked="checked"';?>>مرا به خاطر داشته باش</label><br>
				<div align="left">
					<input type="submit" value="ورود" name="loginSubmit" style="width: 80px;">
				</div>
			</td>
		</tr>
	</table>
</form>
<?php
include('footer.php');
?>