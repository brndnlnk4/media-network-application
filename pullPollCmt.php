  <p align='center'>
<?php include_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php"); 
//////////////////////////////////////////////////////////////
if(isset($_REQUEST['txtData']) && !empty($_REQUEST['txtData'])){
	$_REQUEST['txtData'] = trim($_REQUEST['txtData']);
	$_REQUEST['txtData'] = mysqli_real_escape_string($dbCon,$_REQUEST['txtData']);
 	$qr = "INSERT INTO poll_cmts(
					mem_name,
					mem_post,
					d8)
				VALUES('{$_SESSION['username']}',
					'{$_REQUEST['txtData']}',
					NOW())";
	mysqli_query($dbCon,$qr) or die(mysqli_error($dbCon));
}////END if
?>
   <form>
    <fieldset id='pollCmtsFieldset'>
	   
	   <button type='button' class='<?=$fn->ifIssetAndEquals(trim($_REQUEST['txtData']),'','center-block text-center btn btn-sm btn-warning','hide')?> <?=$fn->ifLoggedOut('hide')?>' data-toggle='collapse' data-target='.txtAria'>
		Post Comment
	   </button>
	
	<legend class='label label-primary text-center center-block'>Comments</legend>
	 <div class='collapse txtAria <?=$fn->ifLoggedOut('hide')?>' >
	  
	  <textarea id='txtInput' class='<?=$fn->ifLoggedOut('hide')?> input-sm form-control' maxlength='300' rows='2' placeholder='Enter Comment'></textarea>
	   
	   <span class='btn-group btn-group-sm text-center' align='center'>
	    <input type='button' class='btn btn-primary' value='Send' />
		<input type='reset' class='btn btn-primary' value='Clear'/>
	   </span>
	  </div>
	   <table class='table-responsive table-condensed pollCmtTbl' width='100%'>
	    <tbody>
<?php
$q = "SELECT *
	 FROM poll_cmts
	 ORDER BY id DESC";
$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	while($rows = mysqli_fetch_assoc($r)){
?>
	 <tr>
	  <td colspan='5%' align='center'>
	   <a href='/reson8/mem/?member=<?=urldecode(trim($rows['mem_name']))?>' target='_self'>
		
		<small class='center-block text-center badge'><?=ucwords($rows['mem_name'])?></small>
		 <img src='<?=$fn->getAvatar(trim(urldecode($rows['mem_name'])))?>' width='35px' class='img-responsive img-rounded'/>
		<small class='center-block text-muted'><?=$fn->getD8Re4matted($rows['d8'])?></small>
	   
	   </a>
	  </td>
	  <td colspan='90%' width='95%' align='center'>
	   
	   <div class='well well-sm center-block text-left'>
	    <?=ucfirst($rows['mem_post'])?>
	   </div>
	  
	  </td>
	 </tr>
<?php		
	}////END while
}else{
	print("<br><span class='center-block text-center label label-info'>No Comments</span>");
}////END ifelse
?>
		</tbody>
	   </table>
	   
	</fieldset>
   </form>
  </p>  