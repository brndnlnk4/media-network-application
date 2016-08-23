 		 <tr>
		  <th colspan='100%' width='98%'>
  		<?/// PROFILE  TBL \\\?><?/// PROFILE  TBL \\\?>	
		<?/// PROFILE  TBL \\\?><?/// PROFILE  TBL \\\?>	
		<?/// PROFILE  TBL \\\?><?/// PROFILE  TBL \\\?>	
		<div class='' id='genTblDivWrp'>
		 <table class='table table-responsive' width='100%' >
		  <tbody>
		   <tr>
			<th colspan='100%' style='background-color:rgba(0,0,0,0.023);'>
			 <p align='center'>
 			   <b style='font-size:150%;color:#555;text-shadow:0px 1px 3px #444;'>
				<?=$_REQUEST['gen']?>
			   </b>
 			 </p>
			</th>
		   </tr>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php"); 

 ///////////////////////
$r = mysqli_query($dbCon,"SELECT * FROM songs WHERE song_genre = '{$_REQUEST['gen']}'") or print(mysqli_error($dbCon));								 
$rowCnt = mysqli_num_rows($r);
	$limit = 15;
	$rows = $rowCnt; //max rows
	$diviser = $rowCnt / $limit; //each pg = max rows divided by '5', '5' = limit
	$rowCnt = ceil($diviser); ///round up everything lol	
///////////////////////////////
if($rows > $limit){					
	$offset = '0';				
	if(isset($_REQUEST['page'])){
		$p = intval($_REQUEST['page'], 0);
		$offset = $limit * $p; // limit end 'offset'	
	}
}else{
	$p = 0;
	$offset = 0;
} ////END ifelse
  $q = "SELECT *
	  FROM songs 
	  WHERE song_genre = '{$_REQUEST['gen']}'
	  ORDER BY song_title ASC
	  LIMIT 5";
$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	$cnt = 0;
 	while($songs = mysqli_fetch_assoc($r)){
	$cnt++;	
?>
   <tr>
	<td colspan='10%' width='10%'>
	  <a href='<?='/reson8/mem/?member='.urldecode(trim($songs['song_producer']))?>' target='_self' class='btn-link'>
		<h4><?=ucwords($songs['song_producer'])?></h4> 
	   <img src='<?=$fn->getAvatar($songs['song_producer'])?>' class='img-responsive img-rounded' width='70px' />
	  </a>
	</td>
	<td colspan='<?=$fn->echoIfIsset(_USER_,'60%','90%')?>' width='<?=$fn->echoIfIsset(_USER_,'60%','90%')?>'>
	 <p align='center' class='center-block'>
	  <?=ucwords($songs['song_title'])?>
	 </p>
	  <br>
		<audio id='a<?=$cnt?>' onplay='audioAction(this.id)' src="/reson8/upl/songs/<?=urldecode(trim($songs['song_file']))?>" controls  />
	</td>
	<td colspan='30%' width='30%' class='<?=$fn->ifLoggedOut('hide')?>'>
	 <p align='center' class='center-block'>
		 <ul class='list-inline' id='' >
		  <li>		
		   <button id='<?=$cnt?>' class='btn btn-link btn-play' type='button' onclick='sndPm("<?=trim($fn->getNameById($songs['mem_id']))?>")'>
			<img src='/reson8/css/img/talk.png' id='' class='img-responsive' title='Play' width='35px' />
		   </button>
		  </li>		
		  <li>		
		   <button class='btn btn-link <?=$fn->ifLoggedOut('hide')?>' type='button' onclick='add2playlist("<?=$songs['id']?>","<?=$songs['mem_id']?>")' >
			<img src='/reson8/css/img/heart.gif' id='' class='img-responsive <?=$fn->ifLoggedOut('hide')?>' title='Edit Caption' width='35px' />
		   </button>
		  </li>
		  <li class='pull-left <?=$fn->ifLoggedOut('hide')?>' name='vote<?=$cnt?>'>		
		   <button name='vote<?=$cnt?>' class='btn btn-link <?=$fn->ifLoggedOut('hide')?>' type='button' onclick='songVote("down","<?=$songs['id']?>",<?=$cnt?>)'>
			<img src='/reson8/css/img/rateNegative.png'  class='img-responsive' title='Trash' width='35px' />
 		   </button>
			-<small id='voteMinus<?=$cnt?>' id='<?=$cnt?>'><?=$songs['song_vote_plus']?></small>
		   <button name='vote<?=$cnt?>' class='btn btn-link <?=$fn->ifLoggedOut('hide')?>' type='button' onclick='songVote("up","<?=$songs['id']?>",<?=$cnt?>)'>
			<img src='/reson8/css/img/ratePositive.png'  class='img-responsive' title='Trash' width='35px' />
		   </button>
		   +<small id='votePlus<?=$cnt?>' id='<?=$cnt?>'><?=$songs['song_vote_minus']?></small>
		  </li>						  
		 </ul>
	 </p>
	</td>
   </tr> 
<?php
	}///END while
}else{
	print('<tr><th><p class="label label-primary text-center center-block">No Songs Found</p></th></tr>');
}///END if
$qr = mysqli_query($dbCon,"SELECT * FROM songs WHERE song_genre = '{$_REQUEST['gen']}'") or die(mysqli_error($dbCon));
$rowCnt = mysqli_num_rows($qr);
global $limit;
$rowCnt = ceil($rowCnt / $limit);
	if($rowCnt > 1){
		print("<tr><td colspan='100%'><b class='well well-sm center-block text-center lead' style='max-height:50px;max-width:100%;background-color:#c8d4e5;'>");		
	  if(empty($p)){
		  $p = 0;
	  }
 		for($i = 0; $i < $rowCnt; $i++){
		  $pgNumShown = $i + 1;
			$btn = "<button type='button' class='btn btn-sm btn-link' onclick='go2pg($i)' ";
		  if(isset($p) && $i == $p){
		  	$btn .= " disabled ";
		  }
			$btn .= " >".$pgNumShown."</button>";
						
				echo $btn;
		}
		print("</b></td></tr>");
 	}/////////END if(wall)	
?>		   