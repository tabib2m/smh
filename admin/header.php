<!doctype html>
<html lang="fa" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?=$path;?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?=$path;?>css/main.css">
<title><?=$_CONFIG['siteTitle'];?> - مدیریت - <?=$pageTitle;?></title>
</head>
<body>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?=$path;?>js/jquery-3.3.1.min.js"></script>
	<script src="<?=$path;?>js/popper.min.js"></script>
	<script src="<?=$path;?>js/bootstrap.min.js"></script>
	
	<!--NavBar-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<a class="navbar-brand" href="#"><?=$_CONFIG['siteTitle'];?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?=$path;?>admin/">فهرست مدیریت</a>
				</li>
				<?php
				if($LOGIN){
				?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						محتوا
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?=$path;?>admin/page/">صفحات</a>
						<a class="dropdown-item" href="#">انتشارها</a>
						<a class="dropdown-item" href="#">عکس‌ها</a>
						<a class="dropdown-item" href="#">فایل‌ها</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item disabled" href="#">بانک‌ها</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						ابزارها
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">جعبه‌ها</a>
						<a class="dropdown-item" href="#">غلطانک‌ها</a>
						<a class="dropdown-item" href="#">فرم‌ها</a>
						<a class="dropdown-item" href="#">لیست‌ها</a>
						<a class="dropdown-item disabled" href="#">فیلدها</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">تنظیمات</a>
				</li>
				<?php
				}
				?>
			</ul>
			<?php
			if($LOGIN){
			?>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="جستجو" aria-label="Search">
			</form>
			<?php
			}
			?>
		</div>
	</nav>
	<!-- -->
	
	<div class="container mt-3">
		<div class="jumbotron mb-2">
			<h1 class="font-weight-bold"><?=$pageTitle;?></h1>
			<p class="lead"><?=$subTitle;?></p>
		</div>

		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<?php
				foreach($breadcrumb as $link => $item){
					$i++;
					if($i==count($breadcrumb)){
						?>
						<li class="breadcrumb-item active" aria-current="page"><?=$item;?></li>
						<?php
					}else{
						?>
						<li class="breadcrumb-item"><a href="<?=$link;?>"><?=$item;?></a></li>
						<?php
					}
				}
				?>
			</ol>
		</nav>
