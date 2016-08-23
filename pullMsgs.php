<?php require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php"); 
///////////////////////////////////////////////////////////
if(isset($_REQUEST['msg'])){
	$mem = $_REQUEST['member']; ///receiver
	$msg = trim($_REQUEST['msg']);
	$me = _USER_;
	$sql = "SELECT id 
			FROM msgs 
			WHERE msg_sender = '$mem'
			AND msg_receiver = '$me'
			OR msg_sender = '$me' 
			AND msg_receiver = '$mem'";
	$replyChk = mysqli_query($dbCon,$sql) or die(mysqli_error($dbCon));
	if($replyChk){
		while($msgId = mysqli_fetch_array($replyChk)){
			$rply_id = $msgId[0];
			break;
		}//////END while
	}////////END if
	if(isset($rply_id)){
		$q = "INSERT INTO msgs (msg_receiver,
								msg_sender,
								msg_reply,
								msg_id4rply,
								d8)
							VALUES('$mem',
									'$me',
									'$msg',
									'$rply_id',
									NOW())";
		mysqli_query($dbCon,$q) or die('rply prob '.mysqli_error($dbCon));
	}else{
		$q = "INSERT INTO msgs (msg
								msg_receiver,
								msg_sender,
  								d8)
							VALUES('$msg',
									'$mem',
									'$me',
 									NOW())";
		mysqli_query($dbCon,$q) or die('new msg prob '.mysqli_error($dbCon));	}/////END ifelse
}///////END if
////////////////////////////
$sql = "SELECT *
		FROM `msgs`  
		WHERE `msg_receiver` = '"._USER_."'";  
		if(isset($_REQUEST['msgId'])){
$sql .= " AND `id` LIKE '{$_REQUEST['msgId']}'";			
		}
$sql .= " AND msg_id4rply IS NULL
 		ORDER BY `id` DESC"; 
$rzlt = mysqli_query($dbCon,$sql) or die(print('error in query for messages'));
if(mysqli_num_rows($rzlt) > 0){
	$listCnt = 0;
	while($msgs = mysqli_fetch_assoc($rzlt)){
?>
		<?// MESSAGE \\?> <?// MESSAGE \\?>
	    <?// MESSAGE \\?> <?// MESSAGE \\?>
 		  
		  <?///MSG SENDER\\\?>
		  <b href='<?=""?>' class='label' style='color:#fff;background-color:rgba(0,0,0,0.17);'>
		   <?=ucwords($msgs['msg_sender'])?>
		  </b>				
		  
		  <sub class='pull-right'>
		   <b class='text-muted'>	
			<?// REPLY D8 \\?>
			<?=$fn->getD8Re4matted($msgs['d8'])?>
		   </b>
		  </sub>
		  
			<span id="<?=""?>" style='display:block;max-width:100%;min-width:65%;background-color:#F7EEE7;border-radius:5px;padding:2.5px 3px;margin-bottom:5px;color:#777;border:1px solid #999;'>
				<?/// MSG \\\?>
				<text>
				 <?=ucfirst($msgs['msg'])?>
				</text>
 			</span>
 		<?// REPLY \\?><?// REPLY \\?>
 		<?// REPLY \\?><?// REPLY \\?>
 		<?// REPLY \\?><?// REPLY \\?>
			
<?php
$sql = "SELECT *
		FROM `msgs`  
		WHERE `msg_id4rply` 
		LIKE '{$msgs['id']}'  
		ORDER BY `id` ASC"; 
	
 $rzlt = mysqli_query($dbCon, $sql) or die(mysqli_error($dbCon));
	////rply[msg_rcvr] = rply_sndr	
if(mysqli_num_rows($rzlt) > 0){
	while($rply = mysqli_fetch_assoc($rzlt)){
?>
		  <sub class='pull-left'>
		   <?// REPLIER NAME \\?>
			<b href='<?=""?>' class='label' style='color:#fff;background-color:rgba(0,0,0,0.17);'>
			 
			 <?=ucwords($rply['msg_sender'])?>
			
			</b>
		  </sub>
		  
		  <sub class='pull-right'>
		   <b class='text-muted'>
			<?// REPLY D8 \\?>
			<?=$fn->getD8Re4matted($rply['d8'])?>
		   </b>
		  </sub>
		 <br>
		<?// REPLY MESSAGE\\// REPLY MESSAGE\\$rply['msg_sender']?>
		<span id="<?=$fn->ifIssetAndEquals($rply['msg_sender'],_USER_,'rcvrMsg','sndrMsg')?>" >
		 <?=ucfirst($rply['msg_reply'])?>
		</span>		
<?php
	}///END while
}////END if numrows
 
	}///END while
}////END if numrows
?>

<script>	
	$('.modal-content').draggable();
	$('#inbox').accordion({active:'', collapsible:true });
	$('#profTabs').tabs();
	$('.subscriptions').draggable({containment:'.wrapper_2'});
</script>