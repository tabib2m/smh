<?php
function userTitle($userID){
	$q=query("select `fullName` from `user` where `id`='$userID'");
	if($r=mysqli_fetch_row($q)) return $r[0]; else return false;
}
?>