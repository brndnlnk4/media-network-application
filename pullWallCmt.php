		  <tr style='background-color:transparent;'>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php"); ?>			   <th class='<?=$fn->ifLoggedOut('hide')?>' colspan='100%' width='100%' align='center'>
			 <button class='center-block btn-lg btn-info' data-toggle='collapse' data-target='#tglCmtTxtArea' <?=$fn->ifLoggedOut("style='display:none;'")?>>
			  Post Wall Comment
			 </button>
			<div align='center' class='collapse' id='tglCmtTxtArea'>
			 <form>
			  <textarea class='input-lg form-control wallCmt' rows='4' placeholder='Enter Comment'></textarea>
			   <span class='center-block btn-group'>
			    <button onclick='postWallCmt($(".wallCmt").val(),"<?=$_GET['member']?>")' class='btn btn-sm btn-primary <?=$fn->ifLoggedOut('hide')?>' type='button'>
				 Submit
				</button>
				<button class='btn btn-sm btn-primary' type='reset'>
				 Clear
				</button>
			   </span>
			 </form>
			</div>
		   </th>
		  </tr>
		  <tr class='<?=$fn->ifLoggedIn('hide')?>'>
		   <th colspan='100%' width='100%' align='center'>
		    <span class='label label-primary center-block' >
			 Wall Comments
			</span>
		   </th>
		  </tr>
<?php
$memId = $fn->getFld('members','mem_name',$_REQUEST['member'],'id');
///////////////////////
$r = mysqli_query($dbCon," SELECT * FROM wall_post WHERE mem_id LIKE '$memId'") or print(mysqli_error($dbCon));								 
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
	/////////////////
	$q = "SELECT * 
		 FROM wall_post
		 WHERE mem_id 
		 LIKE '$memId' 
		 ORDER BY id DESC 
		 LIMIT 15 OFFSET ".$offset;
 
$res = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($res) > 0){
	while($cmts = mysqli_fetch_assoc($res)){
		$memAvatar = $fn->getFld('members','mem_name',$_REQUEST['member'],'mem_avatar');
?>
		  <tr>
		   <td align='center' colspan='15%'>
		    <p align='center'>
			 <a href='/reson8/mem/?member=<?=urldecode(trim($cmts['wall_poster']))?>' target='_self'>
			  <b class='text-left text-primary'>
			   <?=ucwords(trim($cmts['wall_poster']))?>
			  </b>
			 </a>
			  <br>
			 <img src='<?=$fn->ifIssetAndEquals(trim($memAvatar),'','/reson8/css/img/avatars/boy.png','/reson8/upl/'.trim($memAvatar))?>' width='45px' class='img-responsive img-circle' title='Pic' />
			  <br>
			 <small class='center-block text-primary'><?=$fn->getD8Re4matted($cmts['d8'])?></small>
			</p>
		   </td>
		   <td colspan='85%' width='85%'>
		    <p align='left' class=' well well-sm'>
			 <?=ucfirst($cmts['wall_msg'])?>
			</p>
		   </td>
		  </tr>
<?php
	}////END while
}else{
	print('<span class="center-block text-center lead text-primary">No Wall Comments</span>');
}////END if numrows
//////////////////_PAGINATION_PAGE_NUMBERS_/////////////////////////
$qr = mysqli_query($dbCon,"SELECT * FROM wall_post WHERE mem_id LIKE '$memId'") or die(mysqli_error($dbCon));
$rowCnt = mysqli_num_rows($qr);
global $limit;
$rowCnt = ceil($rowCnt / $limit);
	if($rowCnt > 1){
		print("<tr><td colspan='100%'><div class='well well-sm center-block text-center lead' style='max-width:100%;background-color:#c8d4e5;'>");		
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
		print("</div></td></tr>");
 	}/////////END if(wall)	
?>	