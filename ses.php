<?php 
///////// INCLUDE THE FUNCTIONS PAGE \\\\\\\\			
// require_once("includes/func.php");
//include_once($_SERVER['DOCUMENT_ROOT'].'/reson8/incl/loginProcess.php'); 	
///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
$logout = md5('logout');
$success = md5('success');
$login  = md5('login');
$wrong  = md5('wrong');
$max = md5('max');
  
  if(isset($_GET[$login]) && $_GET[$login] == $success){	 
?>
 	 <script>
	  window.open("/reson8/?login","_self");
	 </script>
<?php
  }
  if(isset($_GET[$logout]) && $_GET[$logout] == $success){
?>
 	 <script>
	  alert("Successfully Logged Out");
	  window.open("?logout","_self");
	 </script>
<?php
  }elseif(isset($_POST['usr_login']) && $_POST['usr_login'] == 'Login'){
				header("Location:/reson8/?$wrong");
	} 	 
 ///////SESSION & PROCESSING\\\\\\\\\\
	  /////////////SESSION STARTED/////////////////			
	  if(isset($_SESSION)){
		  return $_SESSION;
	  }else{
		   session_start();
	  }
	  /////////////SESSION STARTED/////////////////	
	
$logout = 'logout';
$success = 'success';
$login  = 'login';
$wrong  = 'wrong';
$max = 'max';
global $login;
//////////BEGIN SESSION START PROCESS\\\\\\\
//////////BEGIN SESSION START PROCESS\\\\\\\
//////////BEGIN SESSION START PROCESS\\\\\\\
if(!isset($_GET[md5('reg')])){
///////if not new usr registration
///////if not new usr registration
 if(isset($_GET['logout']) && $_GET['logout'] == '1'){
	 $_SESSION = array();
			session_unset();
			session_destroy();
			header("Location: /reson8/?$logout=$success");
			exit();
 }elseif(isset($_POST['usr_login'])){

if((isset($_POST['usr_login']) && isset($_POST['pw']))){
	if((strlen($_POST['usr_login']) > '0') && strlen($_POST['pw']) > '0'){
	 include($_SERVER['DOCUMENT_ROOT']."/reson8/incl/sv.php");
		$login_name = trim(strip_tags($_POST['usr_login']));
 		$login_pw = trim($_POST['pw']);
 		 $qry4usr = "SELECT `mem_name`,`mem_pw`
					 FROM `members`
					 WHERE `mem_name` = '$login_name'
					 AND 
					 `mem_pw` = '$login_pw'";
		 $rslt = mysqli_query($dbCon, $qry4usr) or die(mysqli_error($dbCon));

		if(mysqli_num_rows($rslt) >= '1'){
			$qree = "SELECT *
					 FROM `members`
					 WHERE `mem_name` = '$login_name' ";
			$qre = mysqli_query($dbCon, $qree);
			 while($fd = mysqli_fetch_assoc($qre)){ 			
        ///////////////////////////////////
		$fd['mem_avatar'] = empty($fd['mem_avatar']) ? 'tgr.gif' : $fd['mem_avatar'];
		$_SESSION['username'] = $login_name;	
		$_SESSION['admin'] = $fd['admin'];	
		$_SESSION['artist_type'] = $fd['artist_type'];	
		$_SESSION['mem_suscribers'] = $fd['mem_suscribers'];
		$_SESSION['avatar'] = urldecode($fd['mem_avatar']);
		$_SESSION['myId'] = $fd['id'];
 			if(isset($_POST['rememberMe']) && !empty($_POST['rememberMe'])){
				setcookie('remMe',$login_name.'---'.$login_pw,time()+259200,'/'); ////259200 = 72hrs
			}//////END set 'rememberMe' cookie		
 			break;
			} ////////////////END while
			
 				header("Location:/reson8/?".$login."=".$success);
				
			}elseif(($_POST['usr_login'] !== 'Login') && $_POST['pw'] !== 'Password'){
		 $qry4usr = "SELECT `mem_name`,`mem_pw`
					 FROM `members`
					 WHERE `mem_name` = '$login_name'
					 AND 
					 `mem_pw` = '$login_pw'";
		 $rslt = mysqli_query($dbCon, $qry4usr) or die(mysqli_error($dbCon));
			 if(mysqli_num_rows($rslt) == 0){
				 
				header("Location:/reson8/"."?$wrong");
				exit();
			 }//END if
		 }else{
			header("Location:/reson8/"."?$wrong");
			exit();
		 }//END else
		} //END OF USRNME & PW != DFAULT VALUES 
	 else{
		header("Location:/reson8/?$wrong");
		exit();
		}	
	  } 
    } 	 
  }

 
 else{
	header("Location:/reson8/?".$login."=".$success);
} 
 
	//////////LOGOUT PROCESS\\\\\\\\\\\\\\\\\\
	//////////LOGOUT PROCESS\\\\\\\\\\\\\\\\\\
	//////////LOGOUT PROCESS\\\\\\\\\\\\\\\\\\

?>
