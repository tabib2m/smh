<?php
function userTitle($userID){
	$q=query("select `fullName` from `user` where `id`='$userID'");
	return mysqli_fetch_row($q)?$r[0]:false;
}
?>