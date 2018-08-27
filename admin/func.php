<?php
function userTitle($userID){
	$q=query("select `fullName` from `user` where `id`='$userID'");
	if($r=mysqli_fetch_row($q)) return $r[0]; else return false;
}

function filterQuery($what,$fields){
	//should be completed later...
	
	$words=array();
	$what=trim($what);

	$what=str_replace('(','[(]',$what);
	$what=str_replace(')','[)]',$what);
	$what=str_replace('/','\/',$what);
	$what=str_replace('.','',$what);

	/* use these later...
	$erab =array('ً' ,'ٌ' ,'ٍ' ,'َ' ,'ُ' ,'ِ' ,'ّ' ,'ْ' ,'‏' );
	$erab2=array('ً?','ٌ?','ٍ?','َ?','ُ?','ِ?','ّ?','ْ?','‏?');
	*/

	$what=trim(str_replace($erab,$erab2," ".$what." "));


	$words=array();

	$slices=explode('"',$what);

	foreach($slices as $num=>$slice){
		$slice=trim($slice);
		if($slice){
			if($num%2==0){
				$slices2=explode(' ',$slice);
				foreach($slices2 as $slice2){
					$slice2=trim($slice2);
					if($slice2){
						$words[]=$slice2;
					}
				}
			}else{
				$words[]=$slice;
			}
		}
	}
	
	
	$shart='';
	foreach($words as $word){
		$s='';
		foreach($fields as $field){
			$s.=" or `$field` regexp '$word'";
		}
		
		if($s){
			$s=substr($s,4);
			$shart.=' and ('.$s.')';
		}
	}
	if($shart){
		$shart=substr($shart,5);
		return $shart;
	}else{
		return false;
	}
}
?>