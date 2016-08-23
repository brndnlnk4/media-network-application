<?php  
require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/sv.php"); 

require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/ses.php"); 
?>
<table class='table-condensed table-responsive text-center' width='100%' id='memsBestTracksTbl' >
		   <tbody>
		    <tr>
			 <th colspan='' align='center'>
			  <p align='center' onclick='sortSongBy("que")'>
			   Track#<span class='caret center-block' style=' '></span>
			  </p>
			 </th>
			 <th colspan='' width='' align='center'>
			  <p align='center' onclick='sortSongBy("title")'>
			  TItle<span class='caret center-block' style=' '></span>
			  </p>
			 </th>
			 <th colspan='' width='' align='center'>
			  <p align='center'>
			  Producer
			  </p>
			 </th>
			 <th colspan='' width='' align='center'>
			  <p align='center'>
			  Genre
			  </p>
			 </th>
			 <th colspan='' width='' align='center'>
			  <p align='center'>
			  &nbsp;
			  </p>
			 </th>
			</tr>
<?php
	$q = "SELECT *
		  FROM songs
		  WHERE mem_id LIKE '{$_SESSION['myId']}' ";
	if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'title'){
	$q .= " ORDER BY song_title ASC";
	}elseif(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'que'){
	$q .= " ORDER BY id ASC";
	}else{
	$q .= " ORDER BY id DESC";
	}
 	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_num_rows($r) > 0){
		$trackNumber = 0;
 		if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'que'){
			$trackNumber = $trackNumber + mysqli_num_rows($r) + 1;
		} 
 		while($track = mysqli_fetch_assoc($r)){
			if(isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'que'){
				$trackNumber--;
			}else{
				$trackNumber++;
			}
			
?>
	<tr id='track<?=$trackNumber?>' class='trakTr'>
	 <td colspan='' width='20px' align='center' track-number='<?=$trackNumber?>'>
	  <p align='center'>
	   <?=$trackNumber?>
	  </p>
	 </td>
	 <td colspan='' align='center'>
	  <p align='center'>
	   <?=ucwords(trim($track['song_title']))?>
	  </p>
	 </td>
	 <td colspan='' align='center'>
	  <p align='center'>
	   <?=ucwords(trim($track['song_producer']))?>
	  </p>
	 </td>
	 <td colspan='' align='center'>
	  <p align='center'>
	   <?=ucfirst(trim($track['song_genre']))?>
	  </p>
	 </td>
	 <td colspan='' align='center' valign='top' style='min-width:360px;'>
	  <p align='center'>
		<ul class='list-inline' style='max-width:65%;background-color:rgba(0,0,0,0.1);border-radius:7px;'>
		  <li>		
		   <button name='<?=$count++?>' id='playBtn<?=$count?>' track-num='<?=$trackNumber?>' que='<?=$count?>' class='btn btn-link btn-play' type='button' onclick='playMemsBest("<?="/reson8/upl/songs/{$track['song_file']}"?>",this.id)' playing='<?="/reson8/upl/songs/{$track['song_file']}"?>' title='<?=ucwords($track['song_title'])?>' producer='<?=ucfirst($track['song_producer'])?>'>
			<img src='/reson8/css/img/playBtn.png' id='pic<?=$count?>' class='img-responsive' title='Play' width='35px' />
		   </button>
		  </li>		
		  <li>		
		   <button name='<?=$count++?>' que='<?=$count?>' class='btn btn-link btn-play' type='button' onclick='editMemsBest("<?=$track['id']?>")' playing='<?="/reson8/upl/{$track['song_file']}"?>'>
			<img src='/reson8/css/img/editBtn.png' id='pic<?=$count?>' class='img-responsive' title='Edit Caption' width='35px' />
		   </button>
		  </li>
		  <li>		
		   <button name='<?=$count++?>' que='<?=$count?>' class='btn btn-link btn-play' type='button' onclick='deleteMemsBest("<?=$track['id']?>")' playing='<?="/reson8/upl/songs/{$track['song_file']}"?>'>
			<img src='/reson8/css/img/trsgBtn.png' id='pic<?=$count?>' class='img-responsive' title='Trash' width='35px' />
		   </button>
		  </li>						  
		</ul>
	  </p>
	 </td>
	</tr>
<?php
		}///END while 
	}else{
		print("<b class='center-block bg-info text-primary lead'>No Songs Uploaded</b>");
	}///END else
?>			

			
		   </tbody>
		  </table>	