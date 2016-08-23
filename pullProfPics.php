<?php
include($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php");
///////////////////////////////////////
function getPicFldsById($picId,$memId,$fld){
	global $dbCon;
	 $r = mysqli_query($dbCon,"SELECT * FROM `mem_pics` WHERE `id` LIKE '$picId' AND `mem_id` LIKE '$memId'") or print(mysqli_error($dbCon));
	 while($row = mysqli_fetch_assoc($r)){
		if(!empty($row[$fld])){
			$val = $row[$fld];
		}else{
			$val = "";
		}
	 break;
	 }///end while
	return $val;
 }///end funk
//////// SQL 4 DELETING OR SETTING AVATAR 2 DFLT////
//////// SQL 4 DELETING OR SETTING AVATAR 2 DFLT////
if(isset($_REQUEST['picProc'])){
if($_REQUEST['picProc'] == "dflt"){
//$pic = getPicFldsById($_REQUEST['picId'],_ID_,"mem_pic");
//$pic = strtolower($pic);
 $qry = "UPDATE members
		 SET mem_avatar = '{$_REQUEST['picUrl']}'
		 WHERE id = '"._ID_."'";
	mysqli_query($dbCon,$qry) or die('avatar prob..'.mysqli_error($dbCon));
/////////////////////////////////////////	
}elseif($_REQUEST['picProc'] == "trash"){
 $qry = "DELETE FROM `mem_pics` 
		 WHERE `id` LIKE '{$_REQUEST['picId']}'";
	mysqli_query($dbCon,$qry) or die('trash prob...'.mysqli_error($dbCon));		 
/////////////////////////////////////////	
 }///END elseif
} ///END drag drop pic edit process
/////////////////////////////////////////////////
/////////////////////////////////////////////////
?>
<div class='carousel slide' id='pix' data-ride='carousel'  >						
	 <ol class='carousel-indicators' id='carousel_indicators'>
	  <!--- SLIDE INDICATOR AT BOTTOM --->
<?php
$r = mysqli_query($dbCon,"SELECT id,mem_pic, d8 FROM mem_pics WHERE mem_id LIKE "._ID_." ORDER BY id DESC") or die('oh shit, '.mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	$tmpCntr = -1;
	while($indicators = mysqli_fetch_array($r)){
	$tmpCntr++;
?>
		<li class='<?=$fn->ifIssetAndEquals($tmpCntr,0,'active','')?> pull-left' data-target='#pix' data-slide-to='<?=$tmpCntr?>' >
			<img src='/reson8/upl/<?=$indicators[1]?>' class='img-responsive img-rounded center-block' alt='' width='45px' style='max-width:800px;'/>	
		</li>
<?php		
	}//END while
}//END if
?>
	 </ol>
	<div class='carousel-inner' >	
<?php
////// CAROUSEL  //////////// CAROUSEL  //////
$r = mysqli_query($dbCon,"SELECT id,mem_pic, d8 FROM mem_pics WHERE mem_id LIKE "._ID_." ORDER BY id DESC") or die('oh shit, '.mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	$tmpCntr = -1;
	while($galPics = mysqli_fetch_array($r)){
	$tmpCntr++;
?>			 
		<div class='item <?=$fn->ifIssetAndEquals($tmpCntr,0,'active','')?>' title='Uploaded On <?=$galPics[1]?>'> 
		  <img src='/reson8/upl/<?=$galPics[1]?>' class='img-responsive img-rounded center-block' alt='' width='' style=';max-width:800px;'/>	
		 <p class='carousel-caption' style='background:rgba(0,0,0,0.5);border-radius:15px;min-height:5px;margin:0 auto;'>
		  <span class='btn-group'>
		   <button class='btn btn-sm btn-primary' type='button' onclick='makeDflt("<?=$galPics[1]?>")'>Default</button>
		   <button class='btn btn-sm btn-primary' type='button' onclick='deletePic("<?=$galPics[0]?>")'>Delete</button>
		  </span>
		 </p>
		</div>	
<?php
	}///END while
}///END if
else{
	print("<div class='center-block bg-info text-center'>No Pictures Uploaded</div>");
}///END else
?>
   </div>	
 </div>	