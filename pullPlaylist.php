 		    <tr class='bg-info'>
			 <th><p align='center' class='lead text-primary'>Title</p></th>
			 <th><p align='center' class='lead text-primary'>Genre</p></th>
			 <th><p align='center' class='lead text-primary'>Producer</p></th>
			 <th><p align='center' class='lead text-primary'>Upload Date</p></th>
			 <th>&nbsp;</th>
			</tr>	
<?php 
//////////////////////////////////////////////////////////////
include_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/fn.php"); 
//////////////////////////////////////////////////////////////
 $r = mysqli_query($dbCon,"SELECT * FROM playlist WHERE mem_id LIKE "._ID_) or print(mysqli_error($dbCon));								 
$rowCnt = mysqli_num_rows($r);
	$limit = 10;
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
		  FROM playlist
		  WHERE mem_id LIKE '"._ID_.
		  "' ORDER BY id DESC 
		  LIMIT 10 OFFSET ".$offset;
	$rez = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_num_rows($rez) > 0){
	$cntr = 0;
		while($songs = mysqli_fetch_assoc($rez)){
			$producer = $fn->getFld('songs','song_file',$songs['song_file'],'song_producer');
			$genre = $fn->getFld('songs','song_file',$songs['song_file'],'song_genre');
			$d8 = $fn->getFld('songs','song_file',$songs['song_file'],'d8');
			$profUrl = '/reson8/mem/?member='.urlencode($producer);
			$cntr++;
?>
		<tr id='playlist<?=$cntr?>'>
		 <th><p align='center'><?=ucwords(trim($songs['song_title']))?></p></th>
		 <th><p align='center'><?=$genre?></p></th>
		 <th><p align='center'><?=ucwords($producer)?></p></th>
		 <th><p align='center'><?=$fn->getD8Re4matted($d8)?></p></th>
		 <th>
		  <p align='center'>
		   <a href='<?=$profUrl?>' target='_self' type='button' class='btn btn-link btn-sm' >
			Profile 
		   </a>	
		   <button class='btn btn-success btn-sm' type='button' onclick="window.open('/reson8/playlist/?<?=md5('song').'='.urlencode($songs['song_file'])?>&mem=<?=urlencode(_USER_)?>','_add','width=330,height=500,menubar=0,resizeable=0,scrollbars=no,status=0,toolbar=0')">
			Play
		   </button>	
		   <button class='btn btn-danger btn-sm' type='button' onclick='delSngFrmPlaylist("<?=$songs['id']?>","playlist<?=$cntr?>")'>
			Delete
		   </button>
		  </p>
		 </th>
		</tr>	
<?php			
		}/////END while
	}/////END if
//////////////////_PAGINATION_PAGE_NUMBERS_/////////////////////////
$qr = mysqli_query($dbCon,"SELECT * FROM playlist WHERE mem_id LIKE "._ID_) or die(mysqli_error($dbCon));
$rowCnt = mysqli_num_rows($qr);
global $limit;
$rowCnt = ceil($rowCnt / $limit);
	if($rowCnt > 1){
		print("<tr><td colspan='100%'><div class='well well-sm center-block text-center lead' style='max-width:100%;background-color:#ccc;'>");		
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
 
 