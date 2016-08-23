<?php
require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php");
/////////////////////////////////////////
if(isset($_REQUEST['category'])){
 	if($_REQUEST['category'] == 'Song'){
		$q = "SELECT DISTINCT song_title ";
	}else{
		$q = "SELECT DISTINCT song_producer ";
	}
		$q .= " FROM songs";
	if(isset($_REQUEST['genre']) && !empty($_REQUEST['genre'])){
		$_REQUEST['genre'] = strtolower($_REQUEST['genre']);
		$q .= " WHERE song_genre = '{$_REQUEST['genre']}'";
	}
		$q .= " LIMIT 500";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	while($row = mysqli_fetch_array($r)){
		print("<option value='{$row[0]}'>");
	}
}elseif(isset($_REQUEST['srch']) && !empty($_REQUEST['srch'])){
	if($_REQUEST['cat'] == 'song'){
		$q = "SELECT DISTINCT *
			  FROM songs
			  WHERE song_title = '{$_REQUEST['srch']}'";
		if(isset($_REQUEST['genre']) && !empty($_REQUEST['genre'])){
		$q .= " AND song_genre = '{$_REQUEST['genre']}'";
		$q .= " ORDER BY id DESC";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_num_rows($r) > 0){
		$cnt = 0;
		while($row = mysqli_fetch_assoc($r)){
		$cnt++;
?>
  <tr title='Drag to heart below to add to playlist'>
   <th align='center' width='15%' >
	 <b class='center-block bg-info text-center' style='border-radius:7px 7px 0 0;max-width:100%;margin-left:0;background-color:#587988;'>
	  <a href='/reson8/mem/?member=<?=urldecode($row['song_producer'])?>' target='_self' class='btn-link' style='margin-left:0;color:#eee;'>
	   <?=ucwords($row['song_producer'])?>
	  </a>
	 </b>
     <a href='/reson8/mem/?member=<?=urldecode($row['song_producer'])?>' target='_self' class='btn-link' style='margin-left:0;color:#eee;'>
	<img src='<?=$fn->getAvatar($row['song_producer'])?>' width='55px' class='img-responsive img-rounded pull-left' id='p<?=$cnt?>_img' />
     </a>
   </th>
   <th width='85%'>
	<p align='left' id='p<?=$cnt?>' class='text-muted' <?=$fn->ifLoggedIn('onclick')?>='drag2playlist("<?=$row['id']?>",this.id,"<?=$fn->getIdByName(trim($row['song_producer']))?>")' style='<?=$fn->ifLoggedIn("cursor:move;")?>' ondragstart='$(".dragMsg").show()' onmouseup='$(".dragMsg").hide()'>
		
		<span class='center-block' id='' style='background-color:rgba(0,0,0,0.37);border-radius:7px;padding:3px 5px;' >
		 
		 <small class='center-block text-center text-muted' >
		  Title: <b class='text-primary'><?=ucwords(trim($row['song_title']))?></b>
		  Upload Date: <b class='text-primary'><?=$fn->getD8Re4matted($row['d8'])?></b>
		  Publisher: <b class='text-primary'><?=ucwords($row['song_producer'])?></b>
		  Genre: <b class='text-primary'><?=ucfirst($row['song_genre'])?></b>
		 </small>
		 
		  <audio id='' src='/reson8/upl/songs/<?=trim(urldecode($row['song_file']))?>' controls preload='0' style='width:90%;margin:0 auto;' />
		
		</span>				
	</p>
   </th>
  </tr>	
<?php
		}////END while
	}else{
		print("<span class='center-block text-center badge'>No Songs Found, Sorry</span>");
	}////END if
		}/////END if
	}else{
		$q = "SELECT DISTINCT *
			  FROM members
			  WHERE mem_name = '{$_REQUEST['srch']}'";
		$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
		$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
		if(mysqli_num_rows($r) > 0){
			while($row = mysqli_fetch_assoc($r)){
?>
  <tr>
   <th align='center' width='15%'>
	 <b class='center-block bg-info text-center' style='border-radius:7px;max-width:95%;'>
	  <a href='/reson8/mem/?member=<?=urldecode($row['mem_name'])?>' target='_self' class='btn-link'>
	   <?=ucwords($row['mem_name'])?>
	  </a>
	 </b>
	<a href='' target='_self' class='btn-link'>
	 <img src='<?=$fn->getAvatar($row['id'])?>' width='195px' class='img-responsive img-rounded center-block' />
	</a>
   </th>
   <th width='35%'>
	<p align='center'>
	 <section id='srchRzltsHobbies' style='height:75px;'>
	 <dt>Hobbies</dt>
	  <dd class='text-center'>
	   <?=ucfirst($row['mem_hobbies'])?>
	  </dd>
	 </section>
	</p>
   </th>
   <th>
	<p align='center'>
	 <section id='srchRzltsTools' style='height:75px;'>
	 <dt>Tools</dt>
	  <dd class='text-center'>
	   <?=ucfirst($row['mem_tools'])?>
	  </dd>					 
	 </section>
	</p>
   </th>
   </tr>	
  <?php
			}/////END while
		}else{
			print("<span class='center-block text-center badge'>Nothing Found, Sorry</span>");
		}/////END if
 	}////END if
 }///END if
?>
 