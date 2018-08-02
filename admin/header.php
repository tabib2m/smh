<!doctype html>
<html lang="fa" dir="rtl">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<?=$path;?>css/bootstrap.min.css">

<title><?=$_CONFIG['siteTitle'];?> - مدیریت - <?=$pageTitle;?></title>
</head>
<body>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?=$path;?>js/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="<?=$path;?>js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="<?=$path;?>js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
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