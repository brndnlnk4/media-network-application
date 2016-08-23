<?php  require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/sv.php");
 //////////////////////////////////////////////
if(isset($_REQUEST['song']) && $_REQUEST['song'] == 'upd'){
///genre:genre,name:name,producer:producer,id:id
	$qry = "UPDATE `songs` SET";
		if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){
	$qry .= " `song_title` = '{$_REQUEST['name']}', ";
		}if(isset($_REQUEST['producer']) && !empty($_REQUEST['producer'])){
	$qry .= " `song_producer` = '{$_REQUEST['producer']}', ";
		}if(isset($_REQUEST['genre']) && !empty($_REQUEST['genre'])){
	$qry .= " `song_genre` = '{$_REQUEST['genre']}' ";
		}
	$qry .= " WHERE `id` LIKE '{$_REQUEST['id']}' ";
	mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
}elseif(isset($_REQUEST['song']) && $_REQUEST['song'] == 'details'){
	$qry = "SELECT *
			FROM songs
			WHERE id LIKE '{$_REQUEST['id']}'";
	$r = mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
	while($details = mysqli_fetch_assoc($r)){
		echo json_encode($details);
		break;
	}////END while
 }elseif(isset($_REQUEST['song']) && $_REQUEST['song'] == 'del'){
	  $q = "SELECT song_title
			FROM songs
			WHERE id LIKE '{$_REQUEST['id']}'";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	while($name = mysqli_fetch_array($r)){
		echo trim(ucwords($name[0]));
		break;
	}///END while
	 $qry = "DELETE FROM songs
			 WHERE id LIKE '{$_REQUEST['id']}'";
	mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
 }elseif(isset($_REQUEST['profile'])){
	if(isset($_REQUEST['hobbies']) && !empty($_REQUEST['hobbies'])){
	$q = "UPDATE members SET mem_hobbies = '{$_REQUEST['hobbies']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('1 '.mysqli_error($dbCon));
	}if(isset($_REQUEST['website']) && !empty($_REQUEST['website'])){
	$q = "UPDATE members SET mem_website = '{$_REQUEST['website']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('2 '.mysqli_error($dbCon));
	}if(isset($_REQUEST['tools']) && !empty($_REQUEST['tools'])){
	$q = "UPDATE members SET mem_tools = '{$_REQUEST['tools']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('3 '.mysqli_error($dbCon));
	}if(isset($_REQUEST['phone']) && !empty($_REQUEST['phone'])){
	$q = "UPDATE members SET mem_phone = '{$_REQUEST['phone']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('4 '.mysqli_error($dbCon));
	}if(isset($_REQUEST['address']) && !empty($_REQUEST['address'])){
	$q = "UPDATE members SET mem_location = '{$_REQUEST['address']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('5 '.mysqli_error($dbCon));
	}if(isset($_REQUEST['about']) && !empty($_REQUEST['about'])){
	$q = "UPDATE members SET mem_about = '{$_REQUEST['about']}' WHERE id LIKE '{$_REQUEST['id']}'";
		mysqli_query($dbCon,$q) or die('6 '.mysqli_error($dbCon));
	}//////////END if
	$rz = mysqli_query($dbCon,"SELECT * FROM members WHERE id LIKE '{$_REQUEST['id']}'") or die('2 '.mysqli_error($dbCon));
	while($data = mysqli_fetch_assoc($rz)){
		echo json_encode($data);
		break;
	}
 }elseif(isset($_REQUEST['songId'])){
	$songInfo = mysqli_query($dbCon,"SELECT * FROM songs WHERE id LIKE '{$_REQUEST['songId']}'") or die(mysqli_error($dbCon));
	$chk4dup = mysqli_query($dbCon,"SELECT id FROM playlist WHERE mem_id LIKE '{$_REQUEST['memId']}' AND song_id LIKE '{$_REQUEST['songId']}'");
	if(mysqli_num_rows($chk4dup) > 0){
		print('dup');
	}else{
	while($songInfos = mysqli_fetch_assoc($songInfo)){
		$song_file = $songInfos['song_file'];
		$song_title = $songInfos['song_title'];
		break;
	}/////END while
	 $q = "INSERT INTO playlist (
						song_id,
						mem_id,
						song_file,
						song_title)
					VALUES (
						'{$_REQUEST['songId']}',
						'{$_REQUEST['memId']}',
						'$song_file',
						'$song_title')";	
	mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
 	}////END else
 }elseif(isset($_REQUEST['trackId'])){
	 $vote = NULL;
	 switch($vote){
		 case $_REQUEST['vote'] == 'down':
			$vote = 'song_vote_minus';
			$operation = '+1';
			break;
		 case $_REQUEST['vote'] == 'up':
			$vote = 'song_vote_plus';
			$operation = '-1';
			break;
	 }/////END switch
	 $q = "UPDATE songs 
		  SET $vote = $vote +1 
		  WHERE id LIKE '{$_REQUEST['trackId']}'";
	 mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
 	 $m = "UPDATE members 
		  SET mem_votes = mem_votes ".$operation."
		  WHERE mem_name IN (SELECT song_producer
							 FROM songs
							 WHERE id LIKE '{$_REQUEST['trackId']}')";
	 mysqli_query($dbCon,$m) or die(mysqli_error($dbCon));
 	 //////upd8 mem vote too
 }elseif(isset($_REQUEST['delsng'])){
	 $q = "DELETE FROM playlist
			WHERE id LIKE '{$_REQUEST['id']}'";
	mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
 }elseif(isset($_REQUEST['loginVal'])){
	 $_REQUEST['loginVal'] = trim($_REQUEST['loginVal']);
	 $q = "SELECT id
		   FROM members
		   WHERE mem_name = '{$_REQUEST['loginVal']}'";
	 $r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	 if(mysqli_num_rows($r) > 0){
		 echo json_encode(array('check'=>'0')); ////DUP true
	 }else{
		 echo json_encode(array('check'=>'1')); ////DUP false
	 }/////END if numrows
 }elseif(isset($_REQUEST['newReg'])){
	 /////NEW REGISTRATION SUBMISSION PROCESS///
	 /////NEW REGISTRATION SUBMISSION PROCESS///
	 $q = "INSERT INTO members(
					mem_name, ";
		if(!empty(trim($_REQUEST['phone']))){
			$q .= " mem_phone, ";
		}if(!empty(trim($_REQUEST['zipCode']))){
			$q .= " mem_location,";
		}////END if
			$q .= " mem_pw,
					mem_email,
					mem_d8joined)
			VALUES ('{$_REQUEST['username']}', ";
		if(!empty(trim($_REQUEST['phone']))){
			$q .= " '{$_REQUEST['phone']}', ";
		}if(!empty(trim($_REQUEST['zipCode']))){
			$q .= " '{$_REQUEST['zipCode']}', ";
		}////END if
			$q .= " '{$_REQUEST['pw']}',
					'{$_REQUEST['email']}',
					NOW())";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
		if(mysqli_affected_rows($dbCon) > 0){
			echo json_encode(array('success'=>'ok','login'=>$_REQUEST['username'],'pw'=>$_REQUEST['pw']));
		}////END ifelse
}elseif(isset($_REQUEST['daw'])){
//INSERT INTO `poll` (`id`, `daw`, `vote`) VALUES (NULL, 'ableton', '0'), (NULL, 'logic', '0'), (NULL, 'protools', '0'), (NULL, 'reaper', '0'), (NULL, 'garageband', '0'), (NULL, 'fl', '0'), (NULL, 'sonar', '0'), (NULL, 'cubase', '0'), (NULL, 'reason', '0');
 	$daw = $_REQUEST['daw'];
 	$q = "UPDATE `poll` SET `vote` = `vote` + 1 WHERE `daw` = '$daw'";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_affected_rows($dbCon) > 0){
		$rz = mysqli_query($dbCon,"SELECT daw,vote FROM poll") or die(mysqli_error($dbCon));
 		while($rows = mysqli_fetch_assoc($rz)){
 			$daws[$rows['daw']]	= $rows;
 		}/////END while
		echo json_encode($daws);
 	}/////END if 
}elseif(isset($_REQUEST['getRowCnt'])){
 	echo mysqli_num_rows(mysqli_query($dbCon,"SELECT id FROM members WHERE mem_votes <> 0"));
}elseif(isset($_REQUEST['pullNumber'])){
 	$_REQUEST['pullNumber'] < 0 ? 1 : intval($_REQUEST['pullNumber'],1);
 	$offset =  intval($_REQUEST['pullNumber'],0) * 3;
  	$q = "SELECT DISTINCT mem_name,mem_avatar 
		  FROM members
		  WHERE mem_votes <> 0
 		  ORDER BY mem_votes DESC
		  LIMIT 3 OFFSET $offset";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_num_rows($r) > 0){
		while($rows = mysqli_fetch_assoc($r)){
			$members[] = $rows; 
		}////END while
		echo json_encode($members);
 }////END if
	
}///END elseif
//////////////////////////////////////////////
?>