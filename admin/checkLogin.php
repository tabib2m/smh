<?php
if($_GET['session_id']) session_id($_GET['session_id']);

session_start();

require_once($path."connect.php");


//browser fingerprint
if($_COOKIE['browser']){
	$theBrowser=$_COOKIE['browser'];
}else{
	$theBrowser=uniqid();
	setcookie('browser',$theBrowser,time()+1000*24*60*60);
}
////

if($_COOKIE['username']){
	$USER=$_COOKIE['username'];
	$tokenHash=$_COOKIE['token'];
}

if($_SESSION['username']){
	$USER=$_SESSION['username'];
	$tokenHash=$_SESSION['token'];
}

if($_GET['logout']=='logout'){
	$q=query("delete from `logins` where `user`='$USER' and `browser`='$theBrowser'");
}

if($tokenHash){
	$USER=mysql_real_escape_string($USER);
	$tokenHash=mysql_real_escape_string($tokenHash);
	
	
	$q=query("select * from `logins` where `user`='$USER' and `browser`='$theBrowser' and `expire`>NOW()");
	$r=mysqli_fetch_assoc($q);
	
	if(hash_hmac('ripemd160',$r['token'],'secret'.$USER)==$tokenHash){
		$LOGIN=true;
	}
	
	$saveCookie=$r['saveCookie'];
}


if ($_POST['loginSubmit']){
	$USER=$_POST['username'];
	$PASS=$_POST['password'];
	
	$USER=mysql_real_escape_string($USER);
	$PASS=mysql_real_escape_string($PASS);
	
	$query=query("select * from `user` where `email`='$USER'");
	$row=mysqli_fetch_assoc($query);
	
	if(password_verify($PASS,$row['password'])){
		$LOGIN=true;
		$saveCookie=$_POST['save']?1:0;
	}
}

if($LOGIN){
	$token=rand();
	$tokenHash=hash_hmac('ripemd160', $token , 'secret'.$USER);
	
	$_SESSION['username']=$USER;
	$_SESSION['token']=$tokenHash;
	
	if($saveCookie){
		setcookie('username',$USER,time()+$_CONFIG['saveLoginExpireAfter']);
		setcookie('token',$tokenHash,time()+$_CONFIG['saveLoginExpireAfter']);
	}
	
	$expire=$saveCookie?$_CONFIG['saveLoginExpireAfter']:60*60;
	$expire+=time();
	$expire=date("Y-m-d H:i:s",$expire);
	
	
	$q=query("replace into `logins` set `user`='$USER' , `browser`='$theBrowser' , `token`='$token' , `expire`='$expire' , `saveCookie`='$saveCookie'");
	
}else{
	showForm();
}



function showForm(){
	global $USER , $PASS ,$path;;
	?>
	<form method="post">
		<table cellpadding="5" align="left">
			<tr>
				<td valign="bottom">
					نام کاربری:
				</td>
				<td valign="bottom">
					<input type="text" name="username" value="<?=$USER;?>" class="text">
				</td>
				<td rowspan="3">
					<img src="<?=$path;?>admin/images/login.jpg">
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
}
?>