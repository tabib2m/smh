<?php
function pagination($page,$tedad,$t_line){
	if(!$tedad) return false;
	
	$pagesCount=ceil($tedad/$t_line);
	?>
	<nav aria-label="فهرست صفحات">
		<ul class="pagination justify-content-center">
			<?php
			$url=$_GET;
			$url['page']=1;
			$url='?'.http_build_query($url);
			?>
			<li class="page-item <?=$page<2?'disabled':'';?>">
				<a class="page-link" href="<?=$url;?>" aria-label="صفحه اول">
					<span aria-hidden="true">&laquo;</span>
					<span class="sr-only">صفحه اول</span>
				</a>
			</li>
			<?php
			$url=$_GET;
			$url['page']=$page-1;
			$url='?'.http_build_query($url);
			?>
			<li class="page-item <?=$page<2?'disabled':'';?>">
				<a class="page-link" href="<?=$url;?>" aria-label="صفحه قبل">
					<span aria-hidden="true">&lsaquo;</span>
					<span class="sr-only">صفحه قبل</span>
				</a>
			</li>
			<?php
			$firstPageShowing=$page-4;
			if($firstPageShowing<1) $firstPageShowing=1;

			$lastPageShowing=$firstPageShowing+8;
			if($lastPageShowing>$pagesCount) $lastPageShowing=$pagesCount;
			if($page>5 and $lastPageShowing-$page<5 and $lastPageShowing>8) $firstPageShowing=$lastPageShowing-8;
			
			
			if($firstPageShowing>1){
				?>
				<li class="page-item disabled">
					<a class="page-link">…</a>
				</li>
				<?php
			}
			
			for($i=$firstPageShowing;$i<=$lastPageShowing;$i++){
				$url=$_GET;
				$url['page']=$i;
				$url='?'.http_build_query($url);
				?>
				<li class="page-item <?=$page==$i?'active':'';?>">
					<a class="page-link" href="<?=$url;?>"><?=$i;?></a>
				</li>
				<?php
			}

			if($lastPageShowing<$pagesCount){
				?>
				<li class="page-item disabled">
					<a class="page-link">…</a>
				</li>
				<?php
			}
	
	
			$url=$_GET;
			$url['page']=$page+1;
			$url='?'.http_build_query($url);
			?>
			<li class="page-item <?=$page<$pagesCount?'':'disabled';?>">
				<a class="page-link" href="<?=$url;?>" aria-label="صفحه بعد">
					<span aria-hidden="true">&rsaquo;</span>
					<span class="sr-only">صفحه بعد</span>
				</a>
			</li>
			<?php
			$url=$_GET;
			$url['page']=$pagesCount;
			$url='?'.http_build_query($url);
			?>
			<li class="page-item <?=$page<$pagesCount?'':'disabled';?>">
				<a class="page-link" href="<?=$url;?>" aria-label="صفحه آخر">
					<span aria-hidden="true">&raquo;</span>
					<span class="sr-only">صفحه آخر</span>
				</a>
			</li>
			
		</ul>
	</nav>
	<?php
}
?>