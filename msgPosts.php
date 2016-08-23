<?php
require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php");
/////////////////////////////////////////////
if(isset($_REQUEST['wallpost'])){
$memId = $fn->getFld('members','mem_name',$_REQUEST['memName'],'id');
/////////////////////////////////////////////
$qry = "INSERT INTO wall_post (
					mem_id,
					wall_msg,
					wall_poster,
					d8)
				VALUES ('$memId',
						'{$_REQUEST['val']}',
						'"._USER_."',
						NOW())";
 	mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
?>
 	    <table class='table-responsive table-condensed' width='100%' >
		 <tbody>
		  <tr style='background-color:transparent;'>
		   <th colspan='100%' width='100%' align='center'>
			 <button class='center-block btn-lg btn-info' data-toggle='collapse' data-target='#tglCmtTxtArea'>
			  Post Wall Comment
			 </button>
			<div align='center' class='collapse' id='tglCmtTxtArea'>
			 <form>
			  <textarea class='input-lg form-control wallCmt' rows='4' placeholder='Enter Comment'></textarea>
			   <span class='center-block btn-group'>
			    <button onclick='postWallCmt($(".wallCmt").val(),"<?=$_REQUEST['memName']?>")' class='btn btn-sm btn-primary' type='button'>
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
<?php
global $memId;
$q = " SELECT * 
	   FROM wall_post
	   WHERE mem_id 
	   LIKE '$memId'
	   ORDER BY id DESC";
$res = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($res) > 0){
	while($cmts = mysqli_fetch_assoc($res)){
		$memAvatar = $fn->getFld('members','mem_name',$_REQUEST['memName'],'mem_avatar');
?>
		  <tr>
		   <td align='center' colspan='15%'>
		    <p align='center'>
			 <a href='/reson8/mem/?member=<?=$_REQUEST['memName']?>' target='_self'>
			  <b class='text-left text-primary'><?=ucwords(trim($cmts['wall_poster']))?></b>
			  <br>
			 </a>
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
?>		  
		 </tbody>
		</table>
<?php	
}elseif(isset($_REQUEST['msgPost'])){
$qry = "INSERT INTO msgs (
					mem_msg,
					msg_receiver,
					msg_sender,
					d8)
				VALUES ('{$_REQUEST['val']}',
						'{$_REQUEST['receiver']}',
						'{$_SESSION['username']}',
						NOW())";	
	mysqli_query($dbCon,$qry) or die('ohh '.mysqli_error($dbCon));
}elseif(isset($_REQUEST['suscribe'])){
	$chk4dup = $fn->getFld('members','mem_name',_USER_,'mem_subscribers');
	$chk4dup == NULL ? '' : $chk4dup;
	
	$mem2sus2 = $_REQUEST['member'].',';
	
	if(!stristr($chk4dup,$mem2sus2)){
	$mem2sus2 = $mem2sus2.$chk4dup;
		$qry = "UPDATE members
				SET mem_subscribers = '$mem2sus2'
				WHERE mem_name = '{$_SESSION['username']}'";
		mysqli_query($dbCon,$qry) or die('wow '.mysqli_error($dbCon));
	print("ok");
	}else{
		print("no");
	}////END if
 }////END if
?>
	