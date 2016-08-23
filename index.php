<!DOCTYPE html> 
<HTML lang='en-US'>

<head>

<?php define("_PG_","home"); ?>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/reson8/incl/fn.php');?>

<?=$hdr->meta(_KEYWORDS_,_AUTHOR_,_DESC_)?>
		
 <title>
	Reson8
 </title>
 
<script src='/reson8/js/react.js'></script>

</head>
 
<body onscroll='stick();'>
 
 <?//WRAPPER 2\\?>
 <section class='wrapper_2'>

 <?//WRAPPER 1 \\?>
 <div class='wrapper_1'>

 <?///MODAL 1\\\?>
<div id='myModal2' class='modal modal1' >
 <div class='modal-content' id='pollOutput' style='min-height:250px;'>
	
   <span class='close' style='margin-bottom:10px;' onclick='$("#myModal2").fadeOut("fast")' >
	 <button class='btn btn-danger'>X</button>
   </span>
 </div>
</div>
 <?///END MODAL\\\?> 
 
 <?///POPUP\\\?>
 <span id='msgSntPopup' class='well well-sm lead text-center' style='display:none;font-weight:bold;z-index:2500;background-color:rgba(167, 208, 244, 0.83);min-width:30%;position:fixed;top:25px;left:35%;right:auto;border:4px solid #777;border-radius:7px;box-shadow:0px 3px 5px #333;'>
  <h1 class='text-center lead'>
	<!-- jQry will insrt msg here -->
  </h1>
 </span> 
 <?///END POPUP\\\?>
 
 <?//loading gif\\?>
 <span id='loadingPopup' class='well well-sm' style='display:none;z-index:1500;background-color:rgba(0, 0, 0, 0.21);min-width:10%;position:fixed;top:33%;left:45%;right:auto;border-radius:7px;box-shadow:0px 3px 5px #333;'>
  <img src='/reson8/css/img/loading.gif' width='120px' title='Hold yo horses man' class='img-responsive' /> 
 </span> 
 <?///END loading gif\\\?>
 
 <?///CONTENT BEGINS\\\?> <?///CONTENT BEGINS\\\?>
 <?///CONTENT BEGINS\\\?> <?///CONTENT BEGINS\\\?>
 
 <?///AUDIO PLAYER COUNTER FOR ID\\\?>
 <?php $cnt = 0; global $cnt;?>
 
 <?//// NAV \\\?>
  <?php include_once($_SERVER['DOCUMENT_ROOT'].'/reson8/incl/nav.php');?>
 <?//// NAV \\\?>
 
 <?//jumbotron\\?>
 <section class='content'>
  <div class='container-fluid'>
   <div class='row'>
     <div class='col-xl-12'>
	  <div class='content-1-jmbo jumbotron' id='jmbotrn'>
 	   <table class='table-condensed table-responsive' width='100%' cols='12'>
	    <tbody>
 		 <tr>
<!--
  <th colspan='25%' width='30%'>
	<div></div>
  </th>		
-->
		  <th colspan='100%' width='98%'>
			<div>
			 <ul class='list-unstyled' id='jmbotron_btns'>
			  <li class='active' name='1' img='jmbotronPic1.jpg' onmouseover="$('#small1').addClass('fade in')" onmouseout="$('#small1').removeClass('fade in');$('#small1').addClass('fade')">
			   &nbsp; 
			   <br><b class='text-center'>Song Producers</b>
			   <br><br><small id='small1' class='text-center fade in introText' >Upload your own songs and share ideas with other members like yourself</small>
			  </li>
			  <li class='' name='2' img='jmbotronPic2.jpg' onmouseover="$('#small2').addClass('fade in')" onmouseout="$('#small2').removeClass('fade in');$('#small2').addClass('fade')">
			   &nbsp; 
			   <br><b class='text-center'>Music Artist</b>
			   <br><br><small id='small2' class='text-center fade introText'>Promote your work through our Website and connect to various producers</small>			  
			  </li>
			  <li class='' name='3' img='jmbotronPic3.jpg' onmouseover="$('#small3').addClass('fade in')" onmouseout="$('#small3').removeClass('fade in');$('#small3').addClass('fade')">
			   &nbsp; 
			   <br><b class='text-center'>Various Songs</b>
			   <br><br><small id='small3' class='text-center fade introText'>Browse the songs of your choice through our song browser, you can find what you need based on your search</small>			  
			  </li>
			 </ul>
			</div>
		  </th>
		 </tr>
 		</tbody>
	   </table>
	  </div>
	 </div>   
    </div>
  </div>
 </section>
 
 <?//MIDDLE BLOCK BELOW JMBOTRN\\?>
  <div class='center-block well well-sm' id='mid_block'>
    <ul class='list-inline list-group text-center'>
	 <li class=''>
	  <b class='badge'>
	   <a href='/reson8/genre/?gen=rock' target='_self' class='btn btn-link'>
		<img src='/reson8/css/img/rock.jpg' width='80px' class='img-circle' />
 	   </a>
	    <h5>Rock</h5>
	  </b>
	 </li>
	 <li class=''>
	  <b class='badge'>
	   <a href='/reson8/genre/?gen=classical' target='_self' class='btn btn-link'>
	    <img src='/reson8/css/img/classical.jpg' width='80px' class='img-circle' />
	   </a>
		<h5>Classical</h5>
	  </b>
	 </li>
	 <li class=''>
	  <b class='badge'>
	   <a href='/reson8/genre/?gen=electro' target='_self' class='btn btn-link'>
	    <img src='/reson8/css/img/electro.jpg' width='80px' class='img-circle' />
	   </a>
		<h5>Electro</h5>
	  </b>
	 </li>
	 <li class=''>
	  <b class='badge'> 
	   <a href='/reson8/genre/?gen=hiphop' target='_self' class='btn btn-link'>
	    <img src='/reson8/css/img/hiphop.jpg' width='80px' class='img-circle' />
	   </a>
		<h5>Hiphop</h5>
	  </b>
	 </li>	 
	 <li class=''>
	  <b class='badge'>
	   <a href='/reson8/genre/?gen=country' target='_self' class='btn btn-link'>
	    <img src='/reson8/css/img/country.jpg' width='80px' class='img-circle' />
	   </a>
		<h5>Country</h5>
	  </b>
	 </li>
	 <li class=''>
	  <b class='badge'>
	   <a href='/reson8/genre/?gen=other' target='_self' class='btn btn-link'>
	    <img src='/reson8/css/img/other.jpg' width='80px' class='img-circle' />
	   </a>
		<h5>Other</h5>
	  </b>
	 </li>	 
	</ul>
  </div>
 
 <?//CONTENT MIDDLE\\?> 
 <section> 
 <div class='content' id='content-2'>
  <div class='container'>
   <div class='row'>
     <div class='col-lg-12'>
	  <div class='content-2' >
		<p align='center' valign='center'>
		 <table class='table-condensed table-responsive content-2-tbl' width='100%' cols='12'>
		  <tbody>
		   <tr>
		    <th colspan='100%' width='100%'>
			 <p align='center' valign='center'>
			  <strong class='text-info text-center text-uppercase' style='padding:4px 7px;background-color:rgba(255,255,255,0.85);border-radius:7px;font-size:150%;box-shadow:0px 1px 3px #444;'>
			   Top 12 voted songs
			  </strong>
			 </p>
			</th>
		   </tr>
		   <tr>
<?php
	$q = "SELECT DISTINCT * 
		  FROM songs
 		  ORDER BY song_vote_plus DESC
		  LIMIT 12";
	$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
	if(mysqli_num_rows($r) > 11){
		$c = 0;
		while($row = mysqli_fetch_assoc($r)){
		$c++;
		$memSite = $fn->getFld('members','mem_name',$row['song_producer'],'mem_website');
?>
<td colspan='33%' width='33%'>
 <ul class='list-inline well' style='padding:4px;'>
  <li>
   <img src='<?=$fn->getAvatar($row['song_producer'])?>' class='img-responsive img-rounded' width='105px' />
  </li>
  <li>
   <a href='/reson8/mem/?member=<?=urldecode($row['song_producer'])?>' target='_self' class='btn-link'><dt class='text-default'>Top <?=$c?></dt></a>
   <dd>
	<small>
	 <b><?=ucwords($row['song_title'])?></b><br>By: <b class='text-muted'><?=ucwords($row['song_producer'])?></b><br>Genre: <b class='text-muted'><?=ucfirst($row['song_genre'])?></b><br>Date: <b class='text-muted'><?=$fn->getD8Re4matted($row['d8'])?></b> 
	</small>
   </dd>
  </li>
  <li class='center-block'>
  <?//msg, like icon btns\\?>
   <img class='<?=$fn->ifLoggedOut("hide")?>' src='/reson8/css/img/heart.png' title='Like'  width='20px' style='cursor:pointer;' onclick='add2playlist("<?=$row['id']?>","<?=_ID_?>")' />
	&nbsp;&nbsp;&nbsp;
    <img class='<?=$fn->ifLoggedOut("hide")?>' src='/reson8/css/img/Talk.png' title='Comments' onclick='cmtOnBeat("<?=strtolower($row['song_producer'])?>")' width='20px' style='cursor:pointer;' />			  
 	<a href='<?=urlencode($memSite)?>' target='_blank' class='<?=$fn->ifStrLenEqualZero(trim($memSite),'hide')?> btn-link'>
     &nbsp;&nbsp;&nbsp;
	 <img src='/reson8/css/img/Browser.png' title='Website' width='20px' style='cursor:pointer;' />			  
	</a>
	&nbsp;&nbsp;&nbsp;
    <img class='<?=$fn->ifLoggedOut("hide")?>' src='/reson8/css/img/suscribe.png' title='Suscribe' width='20px' style='cursor:pointer;' onclick='suscribe("<?=strtolower($row['song_producer'])?>")' />			  
    
	<audio id='a<?=$cnt++?>' onplay='audioAction(this.id)' src="/reson8/upl/songs/<?=$row['song_file']?>"controls  />
  
  </li>			  
 </ul>
</td>
<?php
		if($c == 3 || $c == 6 || $c == 9){
			print('</tr><tr>');
 		}////END if
	}///END while
}////END if
?>
 		   </tr>
		   <tr>
		    <td colspan='100%' width='100%'>
			 <span class='center-block' id='lastAudioSpan'>
			   <small class='text-center lead center-block text-default'>
				 Tune of the Week
			   </small>	
			   <div class='center-block well well-sm' align='center'>
			    <small>
				 <ul class='list-inline'>
				  <li>
				   Track Name: <b class='text-primary'>Drizzy Dope Beat</b>
				  </li>
				  <li>
				   Genre: <b class='text-primary'>Hiphop</b>
				  </li>
				  <li>
				   Publish Date: <b class='text-primary'>2013</b>
				  </li>
				  <li>
				   Producer Name: <a href='/reson8/mem/?member=brandon' target='_self'><b class='text-primary'>Brandon Osuji</b></a>
				  </li>

				 </ul>
				</small>
			   </div>
			  <audio id='a<?=$cnt++?>' onplay='audioAction(this.id)' src="<?=urldecode('/reson8/upl/songs/drizzy DOPE Snippet.mp3')?>" controls preload='auto' />
			 </span>
			</td>
		   </tr>
		  </tbody>
		 </table>
		</p>
 	  </div>
	 </div>   
    </div>
  </div> 	
 </section>
 
 <?//CONTENT BOTTOM\\?> 
 <section>
  <div class='content' id='content-3'>
   <div class='container-fluid'>
    <div class='row'>
     <div class='col-lg-1'></div>   
      <div class='col-lg-10'>
	   <div class='content-3'>
		<table class='table-responsive table-condensed' width='80%' id='pollTbl'>
		 <tbody id='dawPollTbody1'>
		 <?//USE JQRY TRIGGER SO U CAN USE CHEKMARK PNG ICON\\?>
		 <?//USE JQRY TRIGGER SO U CAN USE CHEKMARK PNG ICON\\?>
		 <?//USE JQRY TRIGGER SO U CAN USE CHEKMARK PNG ICON\\?>
		  <tr>
		   <th colspan='100%' width='100%' align='center'>
		    <p align='center' valign='top'>
			 <strong class='badge center-block' title='Choose your favourite Digital Audio Workstation'>Choose Your DAW</strong>
			</p>
		   </th>
		  </tr>
		  <tr>
		  <?php $cntr = 0; ?>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well ableton' id='poll<?=$cntr?>'>
 			  <p class='pull-right badge'  >
			   Ableton Live
			  </p>
			</div>
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well logic' id='poll<?=$cntr?>'>
 			  <p class='pull-right badge'  >
			   Logic Studio
			  </p>
			</div>		   
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well protools' id='poll<?=$cntr?>'>
 			  <p class='pull-right badge'  >
			   Protools
			-  </p>
			</div>	   
		   </td>
		  </tr>
		  <tr>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well reaper' id='poll<?=$cntr?>'>
			  <p class='pull-right badge'  >
			   Reaper
			  </p>
			</div>
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well garageband' id='poll<?=$cntr?>'>
			  <p class='pull-right badge'  >
			   Garage Band
			  </p>
			</div>		   
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well fl' id='poll<?=$cntr?>'>
			  <p class='pull-right badge'  >
			   Fruity Loops
			  </p>
			</div>		   
		   </td>
		  </tr>
		  <tr>
		  <tr>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well sonar' id='poll<?=$cntr?>'>
			  <p class='pull-right badge' >
			   Sonar
			  </p>
			</div>
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well cubase' id='poll<?=$cntr?>'>
			  <p class='pull-right badge'  >
			   Cubase
			  </p>
			</div>		   
		   </td>
		   <td colspan='33%' width='33%' align='center'  >
		    <div class='well reason' id='poll<?=$cntr?>'>
			  <p class='pull-right badge'  >
			   Reason
			  </p>
			</div>		   
		   </td>
		  </tr>
		 </tbody>
		 <tbody id='dawPollTbody2'>
		  <tr>
		   <th colspan='80%' width='80%'>
			<strong class='text-muted lead' style='text-shadow:0px 1px 3px #111;font-weight:bold;font-size:150%;'>Popularity Results</strong>
		     <button type='button' class='btn-link pull-right pollCmtBtn'>
			  <img src='/reson8/css/img/chat.png' class='img-responsive' width='25px' />
			 </button>
		   </th>
 		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Ableton</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped abletonProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Logic</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped logicProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Protools</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped protoolsProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Reaper</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped reaperProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>GarageBand</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped garagebandProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>FL</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped flProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Sonar</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped sonarProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Cubase</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped cubaseProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		  <tr>
		   <td width='10%' align='right'>
		    <strong>Reason</strong>
		   </td>
		   <td width='90%' align='left'>
		    <div class='progress'>
			 <div class='progress-bar active progress-bar-info progress-bar-striped reasonProg' style='width:100%;max-width:600px;'></div>
			</div>
		   </td>
		  </tr>
		 </tbody>
		 
		</table>
	  </div>   
     <div class='col-lg-1'></div>  
    </div>
   </div>
  </div>

<?php $count = 0; 
$k = "SELECT DISTINCT *
	  FROM songs
	  WHERE DATEDIFF(NOW(),`d8`) < 7";
$chk = mysqli_query($dbCon,$k) or die(mysqli_error($dbCon));
if(mysqli_num_rows($chk) > 0){
	$show = true;
}else{
	$show = false;
}/////END if
?>
<?///recent uploaded tracks < 7 days\\\?>
	<div class='center-block' id='content-4-top'>
	 <div class='container'>
	  <div class='row <?=$fn->ifIssetAndEquals($show,false,'hide','')?>'>
	   <div class='col-lg-12' >
	   <span class='text-center center-block label label-primary' style='width:75%;font-size:160%;font-weight:bold;border-radius:7px 7px 0 0;text-shadow:0px 1px 3px #333;'>New Songs of the Week</span>
		<span class='center-block' id='memsBestTracksPlayer'>
		 <span class='center-block text-center text-muted' >
		  Title: <b class='text-primary playerInfoTitle'>title</b>
		  Track#: <b class='text-primary playerInfoQue'>Track Number</b>
		  Producer: <b class='text-primary playerInfoProducer'>name</b>
		  Duration: <b class='text-primary playerInfoLength'>00:00</b>
		 </span>
		  <audio id='memsBestPlayer' onplay='audioAction(this.id)' src="" controls preload='auto' />
		</span>
	   </div>
	  </div>
	  <div class='row' <?=$fn->ifIssetAndEquals($show,false,"style='background-image:none;padding:4px 7px;border-radius:5px;background:rgba(0,0,0,0.1);margin-top:15px;'","style='margin-top:15px;'")?>>
	   <div class='col-lg-2'></div>
		<div class='col-lg-8' id='newSongsPlayerDiv'>
		  <table class='table-condensed table-responsive text-center' width='100%' id='memsBestTracksTbl' >
		   <tbody>
			<tr class='<?=$fn->ifIssetAndEquals($show,false,'hide','')?>'>
			 <th colspan='' width='' align='center'>
			  <p align='center'>
			  Title
			  </p>
			 </th>
			 <th colspan='' width='' align='center'>
			  <p align='center'>
			  Publisher
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
$q = "SELECT DISTINCT *
	  FROM songs
	  WHERE DATEDIFF(NOW(),`d8`) < 7
	  ORDER BY d8 DESC
	  LIMIT 50";
$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	$queNum = 0;
	while($row = mysqli_fetch_array($r)){
	$queNum++;
?>
	<tr>
	 <td colspan='' align='center' width='35%'>
	  <p align='center'>
	   <?=ucwords(trim($row['song_title']))?>
	  </p>
	 </td>
	 <td colspan='' align='center' width='5%'>
	  <p align='center'>
	   <a href='/reson8/mem/?member=<?=$row['song_producer']?>' target='_self' class='btn btn-link'>
	    <?=ucwords($row['song_producer'])?>
	   </a>
	  </p>
	 </td>
	 <td colspan='' align='center' width='5%'>
	  <p align='center'>
	   <?=ucfirst($row['song_genre'])?>
	  </p>
	 </td>
	 <td colspan='35%' align='center' width='45%'>
 		<ul class='list-inline' style='background-color:rgba(0,0,0,0.1);border-radius:7px;'>
		  <li class='' name='vote<?=$count?>'>		
		   <button name='vote<?=$count?>' class='btn btn-link ' type='button' onclick='songVote("down","<?=$row['id']?>",<?=$count?>)'>
			<img src='/reson8/css/img/rateNegative.png'  class='img-responsive' title='Trash' width='35px' />
 		   </button>
  		   <button name='vote<?=$count?>' class='btn btn-link ' type='button' onclick='songVote("up","<?=$row['id']?>",<?=$count?>)'>
			<img src='/reson8/css/img/ratePositive.png'  class='img-responsive' title='Trash' width='35px' />
		   </button>
 		  </li>	
		  <li>		
		   <button name='<?=$count++?>' id='playBtn<?=$count?>' track-num='<?=$row['id']?>' que='<?=$queNum?>' class='btn btn-link btn-play' type='button' onclick='playMemsBest("<?="/reson8/upl/songs/{$row['song_file']}"?>",this.id)' playing='<?="/reson8/upl/songs/{$row['song_file']}"?>' title='<?=ucwords($row['song_title'])?>' producer='<?=ucfirst($row['song_producer'])?>'>
 			<img src='/reson8/css/img/playBtn.png' id='pic<?=$count?>' class='img-responsive' title='Play' width='35px' />
 		   </button>
		  </li>						  
		</ul>
 	 </td>
	</tr>

<?php
	}///END while
}else{
	print('<center class=\'text-uppercase text-center lead well well-lg text-primary\'>No new songs this week</center>');
}/////END if
?>		   
			</tr>
		   </tbody>
		  </table>
		</div>
	   <div class='col-lg-2'></div>
	  </div>
	 </div>
	</div>
  <?//CONTENT BOTTOM\\?> 
 <section>
  <div class='content' id='content-4'>
   <div class='container-fluid'>
    <div class='row'>
      <div class='col-lg-12'>
	   <div class='content-4'>
		<center class='lead text-muted'>
		<?////Top producers (based on total plus votes)\\\\?>
		<div class='pull-left leftArrow' align='center' valign='center' width='5%'>
		 <img src='/reson8/css/img/sliderControlLeft.gif' width='50px' class='img-responsive' />
		</div>
		<div class='pull-right rightArrow' align='center' valign='center' width='5%'>
		 <img src='/reson8/css/img/sliderControlRight.gif' width='50px' class='img-responsive' />
		</div>		
<?php
$q = "SELECT DISTINCT mem_name,mem_avatar 
	  FROM members
	  WHERE mem_votes <> 0
	  ORDER BY mem_votes DESC
	  LIMIT 3";
$r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
if(mysqli_num_rows($r) > 0){
	while($rows = mysqli_fetch_assoc($r)){
		$memName[] = $rows['mem_name'];
		$memAvatar[] = $rows['mem_avatar'];
 	}////END while
 }////END if
?>		
		<table class='table-responsive table-condensed topProdTbl' cols='100%' width='90%' pull-num='0'>
		 <tbody>
		  <tr>
		   <th colspan='100%' width='100%'>
		    <span class='center-block text-center' style='text-shadow:0px 2px 3px #111;font-size:140%;'>
			 Top Members
			</span>
		   </th>
		  </tr>
		  <tr>
		   <th colspan='33%' width='33%'>
		    <span class='label label-primary text-center center-block label1'>
			 <?=$memName[0]?>
			</span>
		   </th>
		   <th colspan='33%' width='33%'>
		    <span class='label label-primary text-center center-block label2'>
			 <?=$memName[1]?>
			</span>
		   </th>
		   <th colspan='33%' width='33%'>
		    <span class='label label-primary text-center center-block label3'>
			<?=$memName[2]?>
			</span>
		   </th>
		  </tr>
		  <tr>
		   <td colspan='33%' width='33%' align='center' id='topProducerTd1'>
		    <div class='center-block text-center list-group-item'>
			 <a href='/reson8/mem/?member=<?=$memName[0]?>' target='_self'>
			  <img src='<?=$fn->getAvatar($memName[0])?>' class='img-responsive img-rounded' />
			 </a>
			</div>
 		   </td>
		   <td colspan='33%' width='33%' align='center' id='topProducerTd2'>
		    <div class='center-block text-center list-group-item'>
			 <a href='/reson8/mem/?member=<?=$memName[1]?>' target='_self'>
			  <img src='<?=$fn->getAvatar($memName[1])?>' class='img-responsive img-rounded' />
			 </a>
			</div>
 		   </td>
		   <td colspan='33%' width='33%' align='center' id='topProducerTd3'>
		    <div class='center-block text-center list-group-item'>
			 <a href='/reson8/mem/?member=<?=$memName[2]?>' target='_self'>
			  <img src='<?=$fn->getAvatar($memName[2])?>' class='img-responsive img-rounded' />
			 </a>
			</div>
 		   </td>
		  </tr>
		 </tbody>
		</table>
		
 		</center>
	   </div>
	  </div>   
     </div>
   </div>
  </div>
 </section>
 
 <?///FTR\\\?> 
 <section>
  <div class='content' id='ftr'>
   <div class='container-fluid' >
    <div class='row'>
	 <div class='col-lg-1'></div>
	  <div class='col-lg-10'>
	   <div class='ftr'><br>
		<table class='table table-responsive table-condensed well well-sm' align='center' width='80%' style='background-color:rgba(255,255,255,0.75);'>
		 <tbody>
		  <tr>
		   <td colspan='100%' align='left'>
		    <span class='center-block text-left lead text-primary'>
		    Reson8 Fans 
			 <small class='text-muted'>Upcoming and prosperous music loving fans</small>
		    </span>		   
		   </td>
		  </tr>		  
		  <tr>		  
<?php
$r = mysqli_query($dbCon,"SELECT DISTINCT id,mem_name FROM members LIMIT 100") or die(mysqli_error($dbCon));
while($ids = mysqli_fetch_assoc($r)){
	$sngs[$ids['mem_name']] = mysqli_num_rows(mysqli_query($dbCon,"SELECT id FROM songs WHERE mem_id LIKE '{$ids['id']}'"));
}////END while

arsort($sngs); ///assoc array sort reversed

$cnttRow = 0;
foreach($sngs AS $mem => $sngCnt){
$cnttRow++;
@$about = $fn->getFld('members','mem_name',trim($mem),'mem_about');
@$sus = $fn->getFld('members','mem_name',trim($mem),'mem_subscribers');
$sus = count(array_values(explode(',',$sus))) - 1;
?>
		   <th colspan='10%' width='10%' align='center'>
			<a href='/reson8/mem/?member=<?=trim($mem)?>' target='_self' title='<?=$mem?> Profile'>
			 <img src='<?=$fn->getAvatar(trim($mem))?>' width='120px' class='img-responsive img-rounded thumbnail' title='<?=$mem?> Profile' alt='<?=$mem?>' />
			</a>
		   </th>
		   <th colspan='40%' width='40%' align='center' >
		   <ul class='media-list'>
		    <li class='media-left'>
			 <a href='/reson8/mem/?member=<?=trim($mem)?>' target='_self' class='btn-link' title='<?=$mem?> Profile'>
			  <b class='badge'><?=ucwords(trim($mem))?></b>
			 </a>
			</li>
			<li class='media-left'>
			 <b class='text-muted'><?=intval($sngCnt,0).' Songs'?></b>
			</li>
			<li class='media-left'>
			 <b class='text-muted'><?=intval($sus,0).' Subscribers'?></b>
			</li>
		   </ul>
 			  <p align='left' class='text-sm text-left'>
				<?=ucfirst($fn->ifIssetAndEquals(trim($about),'','No Information available',$about))?>
			  </p>
		   </th>
<?php	
	if($cnttRow == 2 || $cnttRow == 4 || $cnttRow == 6 || $cnttRow == 8 || $cnttRow == 10){
		echo "</tr><tr>";
 	}elseif($cnttRow > 10){
		break;
	}////END if
} /////END ifelse
?>
		  </tr>
		 </tbody>
		</table>
	   </div>		  
	  </div>
	  </div>
	 <div class='col-lg-1'></div>
	</div>
   </div>
  </div>
 </section>	  
  <div class='content' id='ftr'>
   <div class='container-fluid' >
    <div class='row'>
 	  <div class='col-lg-12'>
	   <div class='bg-info panel text-primary' align='center'>
 	    Reson8
	   </div>
	  </div>
	 </div>
	</div>
   </div>
  <?/// END OF WRAPPER 1 \\\?>

 </section>
 <?/// END OF WRAPPER 2 \\\?>
<script src='/reson8/js/dawpoll.js'></script>
<script src='/reson8/js/jmbotron_banner.js'></script>
 <script>
 function songVote(vote,trackId,li_id){
 	$(function(){
		$.post('/reson8/incl/editSong.php',{vote:vote,trackId:trackId},function(){
 			if(vote == 'up'){
 				$('li button[name="vote'+li_id+'"]').attr('disabled','');
			}else if(vote == 'down'){
 				$('li button[name="vote'+li_id+'"]').attr('disabled','');
			}
		})
	})
} 
</script>
<script>
///////////////play mems best track//////
function playMemsBest(trackSrc,id){
 	$(function(){
  	var player = document.getElementById('memsBestPlayer');
		if(player.currentSrc !== $.trim(trackSrc)){
			player.src = trackSrc;
				player.play();
				player.setAttribute('player-src',trackSrc);
		}
  	trak_id = document.getElementById(id);
	id = document.getElementById(id);
	var trakNum = $(id).attr('track-num');
	$.each($('.trakTr'),function(){
		if($(this).attr('id') !== 'track'+trakNum){
			$(this).css('border','none');	
  		}else{
			$('#track'+trakNum).css('border','1px solid blue');						
 		}
	})
	var sngTitle = $(id).attr('title');
	var sngProducer = $(id).attr('producer');
 	var sngNumber = $(id).attr('track-num');
 	var sngLength = document.getElementById('memsBestPlayer').duration;
 	//sngLength = isNaN(sngLength) ? sngLength = '0' : sngLength;
   	$('.playerInfoTitle').text(sngTitle);
   	$('.playerInfoProducer').text(sngProducer);
   	//$('.playerInfoLength').text(sngLength);
   	$('.playerInfoQue').text(sngNumber);	
 	})
}////END func 
/////play next track in que/////
document.getElementById('memsBestPlayer').onplaying = function(){
	que_num = $(trak_id).attr('track-num');
 	var dur = this.duration.toString();	
		 
 	if(dur > 60){
			dur = dur / 60;
			dur = Math.round(dur);
			dur = dur+' min';
		}else{
			dur = Math.round(dur);
			dur = dur+' sec';
		}
     	$('.playerInfoLength').text(dur);
/////////////////////////
 	this.onended = function(){
  			for(var i = 0;document.getElementsByClassName('btn-play')[i];i++){
				if(document.getElementsByClassName('btn-play')[i].getAttribute('playing') == document.getElementById('memsBestPlayer').getAttribute('player-src')){
					nxt = i + 1;
					if(typeof(document.getElementsByClassName('btn-play')[nxt]) == 'object'){
 						document.getElementById('memsBestPlayer').src = document.getElementsByClassName('btn-play')[nxt].getAttribute('playing');
						setTimeout(nextTrack,3000);
  					}else{
						 document.getElementById('memsBestPlayer').src = '';
						 document.getElementById('memsBestPlayer').setAttribute('player-src','');
					}
				}
			}//END 4loop		
	}///end onEnded
	var chkSrc = this.getAttribute('player-src');
	$.each($('.btn-play'),function(){
		if($(this).attr('playing') == chkSrc){
			var trackNum = $(this).attr('track-num');
			var title = $(this).attr('title');
			var producer = $(this).attr('producer');
			$('.playerInfoTitle').text(title);
			$('.playerInfoProducer').text(producer);
 			$('.playerInfoQue').text(trackNum);			
		}
	})

	

 }////END eventlistenr
function nextTrack(){
	if(document.getElementsByClassName('btn-play')[nxt]){
		document.getElementById('memsBestPlayer').play();
 		document.getElementById('memsBestPlayer').setAttribute('player-src',document.getElementsByClassName('btn-play')[nxt].getAttribute('playing'));	
		var queNum = document.getElementsByClassName('btn-play')[nxt].getAttribute('track-num');
			queNum = 'track'+queNum;
			$.each($('.trakTr'),function(){
				if(this.id !== queNum){
					$(this).css('border','none');
				}else{
					$(this).css('border','1px solid blue');
				}
			})
	}
}
</script>	 
<script>
function suscribe(membr){
	$(function(){
		$.post('/reson8/incl/msgPosts.php',{member:membr,suscribe:''},function(r){
 			if($.trim(r.substr(-3)) == 'no'){
				popUpMsg('Already Subscribed');
			}else if($.trim(r.substr(-3)) == 'ok'){
				popUpMsg('Successfully Suscribed');
			}else{
				alert('error with msgPost.php suscribe process');
			}
		})
	})}
</script> 
<script>
function add2playlist(songId,memId){
	songId = $.trim(songId);
	memId = $.trim(memId);
	$(function(){
		$.post('/reson8/incl/editSong.php',{songId:songId,memId:memId},function(r){
			if($.trim(r) == 'dup'){
				popUpMsg('Already Liked');
			}else{
				popUpMsg('Song Added to Playlist');
			}
		})
	})
}
</script>
<script>
  function cmtOnBeat(receiver){
	 $(function(){
 		$('#myModal2').fadeIn('fast');
		$('#myModal2 > .modal-content').html(
			"<p align='center' class='well center-block msgoMdal'>"+
				"<b class='text-center'>Send a Message</b>"+
					"<textarea class='form-control input-lg msgTxt' maxlength='200' rows='5' placeholder='Enter Message' autofocus>"+
				"</textarea>"+
					"<button type='button' class='btn btn-sm btn-primary center-block' onclick='sndMsg($(\".msgTxt\").val())'>Send</button>"+
			 "</p>"		 
		);
		 window.onclick = function(){
			 if(event.target.id == 'myModal2'){
				 $('#myModal2').fadeOut('fast');
			 }
		 }	 
	 })
	recvr = $.trim(receiver);
 }
 function sndMsg(val){
 	if($.trim(val) !== ''){
		$(function(){
			$.post('/reson8/incl/msgPosts.php',{val:val,receiver:recvr,msgPost:''},function(){
				popUpMsg('Message Sent');
			})
		})
		$('#myModal2').fadeOut('fast');
	}else{
		popUpMsg('Please Enter a Message');
	}	
 }	
</script>

</body>