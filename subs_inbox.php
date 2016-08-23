<div class='subscriptions' ondrag='this.id="subDraggedOut"'>
 <div class=''>
  <div id='sidebarTabs'>
   <ul class='list-inline list-group'>
    <li>
	 <a href='#messages' class='btn btn-sm' type='button'>
	 Messages
	 </a>
	</li>
    <li>
	 <a href='#suscribers' class='btn btn-sm' type='button' >
	 Subscribers
	 </a>
	</li>
   </ul>
   <?////END OF TABS\\\?><?////END OF TABS\\\?>
   <?////END OF TABS\\\?><?////END OF TABS\\\?>
   <?////END OF TABS\\\?><?////END OF TABS\\\?>
 	 
   <div id='messages'>
	<p align='center'>
	 
	<ul id='inbox'>
<?///ACCORDION INBOX\\\?>
<?///ACCORDION INBOX\\\?>  
<?php
$sql = "SELECT *
		FROM `msgs`  
		WHERE `msg_receiver` = '"._USER_."'  
		AND msg_id4rply IS NULL
		ORDER BY `id` DESC"; 
$rzlt = mysqli_query($dbCon,$sql) or die(print('error in query for messages'));
if(mysqli_num_rows($rzlt) > 0){
	$listCnt = 0;
	while($msgs = mysqli_fetch_assoc($rzlt)){
?>
	<li id='msgLiCntnr' name='<?=$listCnt++?>' class='<?=""?>'>
	  <h4 class='inboxH4' id='<?=""?>' onclick='ifUnreadChange2Read(this.id)'>	
		
		<?/// MSG-UNREAD notification \\\?>
		<img src='/m8tod8/css/img/Messages.png' name='msgIcon' class='<?=""?>' id='<?=""?>' width='20px' style='margin-top:-7px;' />
		<?/// MSG SENDER \\\?>
		<small class='pull-right text-muted' style='padding:2px 3px;margin-top:-2px;border:1px solid #888;color:#222;border-radius:7px;background-color:rgba(255,255,255,0.15);'> 
		
			<?=ucwords($msgs['msg_receiver'])?>
		
		</small>	
		
		 <?/// DEL & RPLY BTN \\\?>
		 <br>
		  <div id='delRplyBtn'>
			 <ul class='list-inline'>
			  <li>
				<button type='button' class='btn btn-primary' name='<?=""?>' onclick='var li = "<?=""?>"; $("#rplyBox<?=$listCnt?>").toggle("fast");$("#rplyBox<?=$listCnt?> textarea").focus();'>Reply</button>
			  </li>
			  <li>
				<?/// SENDER AVATAR 'WHO USR IS TALKING 2'  \\\?>
				<?/// USE ID FROM CONVERSATION TO PULL VIA AJAX  \\\?>
			   <img src='<?=$fn->getAvatar($msgs['msg_receiver'])?>' class='img-responsive img-circle' width='30px' style='max-height:35px;border:2px solid #fff;margin-right:3px;' />
			  </li>
			 </ul>
						`
		  </div>
		</h4>	
		<?// MESSAGE \\?> <?// MESSAGE \\?>
	    <?// MESSAGE \\?> <?// MESSAGE \\?>
		<div id='cont' class='outputCntnr<?=$listCnt?> out<?=$msgs['id']?>' style='overflow-y: auto !important;min-height:100px;max-height:350px;background-color:#EAE3E3;font-weight:normal;text-align:left;overflow-y:scroll;word-wrap:break-word;font-size:86%;'>
		  
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
?>
   		</div>
		  
	   <div id='rplyBox<?=$listCnt?>' style='display:none;'>
		
		<textarea class='form-control input-lg' placeholder='Reply to Sender' style='border-radius:0 0 10px 10px;'></textarea>			  
		 
		 <button name='<?=$listCnt?>' type='button' class='btn btn-sm rplyBtn' style='width:100%;' onclick='rplyMsg("<?=$listCnt?>","<?=$msgs['id']?>","<?=$msgs['msg_sender']?>","<?=$msgs['msg_receiver']?>")' >Reply</button>
	   
	   </div>			 
	  </li>
<?php
	}/////END while
}else{
	print("<b class='text-center center-block bg-warning text-primary'>No Messages</b>");
}/////END if numrows

?>
 	 </ul>	
	</p>
   </div>
   
   <div id='suscribers' >
<?php
$meID = _ID_;
$q = "SELECT mem_subscribers 
	 FROM members
	 WHERE id LIKE '$meID'";
$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
 	while($row = mysqli_fetch_array($r)){
	  if($row[0]){
 		$subs = explode(',',$row[0]);
		foreach($subs AS $sub){
			if(trim($sub) !== ''){
?>
	  <ul class='list-inline'>
	   <li>
		<a href='/reson8/mem/?member=<?=urldecode(trim($sub))?>' type='button' target='_self' >
		 <strong class='badge'><?=ucwords($sub)?></strong>
		</a>
	   </li>
	   <li id='newSongIcon' style='display:block;position:absolute;margin-top:-5px;margin-left:-7px;'>
	    <span class='label label-success' style='box-shadow:0px 1px 3px #333;'>New Song<span>
	   </li>
	   <li>
	    <a href='<?=urlencode($fn->getFld('members','mem_name',trim(strtolower($sub)),'mem_website'))?>' target='_blank' >
		 <img src='/reson8/css/img/Browser.png' width='20px' class='img-responsive' />
		</a>
	   </li>	
	   <li>
	    <button class='btn-link' type='button' onclick="window.open('/reson8/playlist/?<?=md5('mem').'='.$sub?>','_add','width=330,height=500,menubar=0,resizeable=0,scrollbars=no,status=0,toolbar=0')">
		 <img src='/reson8/css/img/musical-note.png' width='20px' class='img-responsive' />
		</button>
	   </li>
	   <li class='pull-right'>
		<a href='/reson8/mem/?member=<?=urldecode(trim($sub))?>' type='button' target='_self'>
		 <img src='<?=$fn->getAvatar($sub)?>' class='img-responsive img-rounded' width='30px' title='' />
		</a>
	   </li>	   	
	  </ul> 
<?php
			}////END if
		}////END 4each
	  }else{
		  print("<b class='text-center center-block text-primary'>No Subscribers</b>");
	  }///END ifelse
 	break;
	}/////END while
?>
     </div>
  </div>
  <?//LOOP THIS FROM DB\\?>
  <?//LOOP THIS FROM DB\\?>
  </div>
</div>
<script>
$("a[href='#suscribers']").click(function(){
$('#newSongIcon').effect('shake',{direction:'left',times:2,distance:5});
 	$('#newSongIcon').fadeTo(2000,'.9',function(){
 		$('li[id="newSongIcon"]').fadeOut('slow');
	})
})
</script>
