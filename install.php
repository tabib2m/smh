<?php
include("connect.php");

$passHash=password_hash('smhadmin',PASSWORD_DEFAULT);

$q=query("insert into `user` set `fullName`='مدیریت سمح' , `email`='smhadmin@localhost' , `password`='$passHash' , `admin`='1'");
?>