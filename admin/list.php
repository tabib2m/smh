<?php
if($what){
	$shart.=' and '.filterQuery($what,$fieldsForSearch);
}

$pageNum=$_GET['page'];
if(!$pageNum) $pageNum=1;

$t_line=20;
$from=($pageNum-1)*$t_line;

$query=query("select SQL_CALC_FOUND_ROWS * from `$tableName` where $shart order by `date` desc limit $from,$t_line");
$q=query("select FOUND_ROWS()");
$r=mysqli_fetch_row($q);
$tedad=$r[0];
?>
<style>
	.userTitle:empty:before{
		content: 'ناشناخته';
		color: gray;
		font-style: italic;
	}
	.date-td{
		white-space: nowrap;
		width: 0;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<form class="col-md-4 p-0 mb-2">
			<div class="input-group">
				<input class="form-control" name="what" type="search" placeholder="جستجو" aria-label="جستجو" value="<?=htmlspecialchars($what);?>">
				<div class="input-group-append">
					<button class="btn btn-primary" type="submit">جستجو</button>
				</div>
			</div>
		</form>
		<div class="col-md-6 mb-2 px-0 px-md-3">
			<span class="input-group-text" style="white-space: inherit;">
				<small>
				تعداد یافته‌ها: <strong><?=$tedad;?></strong>
				<?php
				if($what){
					?>
					در جستجوی عبارت «<strong><?=$what;?></strong>»
					-
					<?php
					$url=$_GET;
					unset($url['page'],$url['what']);
					$url='?'.http_build_query($url);
					?>
					<a href="<?=$url;?>">نمایش تمام موارد</a>
					<?php
				}
				?>
				</small>
			</span>
		</div>
		<a href='add.php' class="btn btn-primary col-md-2 mb-2">افزودن</a>
	</div>
</div>
<div class="table-responsive table-striped table-hover">
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">
					ردیف
				</th>
				<?php
				foreach($fieldsToShow as $field => $options){
					?>
					<th scope="col">
						<?=$options['title'];?>
					</th>
					<?php
				}
				?>
			</tr>
		</thead>
		<tbody>
			<?php
			$C=$from;
			while($row=mysqli_fetch_assoc($query)){
				?>
				<tr>
					<td>
						<?=++$C;?>
					</td>
					<?php
					foreach($fieldsToShow as $field => $options){
						?>
						<td class="<?=$options['user']?'userTitle':'';?> <?=$options['date']?'small date-td':'';?>">
							<?php
							if($options['link']){
								?>
								<a href="edit.php?id=<?=$row['id'];?>">
								<?php
							}
							
							if($options['user']){
								echo userTitle($row[$field]);
							}elseif($options['date']){
								echo $fullDateFormat->format(strtotime($row[$field]));
							}else{
								echo $row[$field];
							}
							
							if($options['link']){
								?>
								</a>
								<?php
							}
							?>
						</td>
						<?php
					}
					?>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	<?php
	if(!$tedad){
		?>
		<div class="alert alert-warning text-center" role="alert">
			<small>
			هیچ موردی یافت نشد!
			<?php
			if($what){
				?>
				برای نمایش همه موارد
				<?php
				$url=$_GET;
				unset($url['page'],$url['what']);
				$url='?'.http_build_query($url);
				?>
				<a href="<?=$url;?>">اینجا را کلیک کنید</a>.
				<?php
			}
			?>
			</small>
		</div>
		<?php
	}
	?>
</div>
<?php
pagination($pageNum,$tedad,$t_line);
?>