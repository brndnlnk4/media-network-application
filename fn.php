<?php //************************************\\
// SESSION FILE  SESSION FILE  SESSION FILE \\
 require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/sv.php"); 
 require_once($_SERVER['DOCUMENT_ROOT']."/reson8/incl/ses.php"); 
//DEFINE CONSTANT _USR_ DEFINE CONSTANT _USR_\\
//DEFINE CONSTANT _USR_ DEFINE CONSTANT _USR_\\
 if(isset($_SESSION['username']) &&
    isset($_SESSION['admin']) &&
    isset($_SESSION['myId'])){
$qry = "SELECT mem_avatar
        FROM members
        WHERE id = '{$_SESSION['myId']}'
        LIMIT 1";
$rzlt = mysqli_query($dbCon,$qry) or die(mysqli_error($dbCon));
 if(mysqli_num_rows($rzlt) > 0){
    while($pix = mysqli_fetch_array($rzlt)){
        if(!empty($pix[0])){
            $pic = $pix[0];	
        }else{
            $pic = "tgr.gif";
        }
    break;
    }	 
 }
 define("_USER_", $_SESSION['username']);
 define("_BOSS_", $_SESSION['admin']);
 define("_ID_", $_SESSION['myId']);   
 define("_ARTIST_", $_SESSION['artist_type']);   
 define("_SUSCRIBERS_", $_SESSION['mem_suscribers']); //csv 
 define("_AVATAR_", $pic);   
}else{
 define("_USER_", NULL);
 define("_BOSS_", NULL);
 define("_ID_", NULL);
 define("_ARTIST_", NULL);   
 define("_SUSCRIBERS_", NULL);   
 define("_AVATAR_", NULL);     
 }////DEFINED CONSTS////////////////////
define("_KEYWORDS_","");
define("_AUTHOR_","brandon osuji");
define("_DESC_","");
////////////////////////////////////////////  
class fn{
public function getFld($tbl,$whereThat,$whereThis,$fld){
    global $dbCon;
        $q = "SELECT * 
             FROM $tbl ";
        if(!empty($whereThat) && !empty($whereThis)){
        $q .= " WHERE $whereThat 
                LIKE '{$whereThis}'";            
        }
    $r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
    if(mysqli_num_rows($r) > 0){
     while($row = mysqli_fetch_assoc($r)){
        if(!empty(trim($row[$fld]))){
            $field = trim($row[$fld]);    
            break;
        }else{
             continue;
            $field = NULL; 
        }     
     }
    }else{
        $field = NULL;
     }                
    return $field;
}
///////////////////////////
public function ifLoggedIn($echoThis){
global $dbCon;
if(isset($_SESSION['username'])){
	echo $echoThis;
	}else{
		 echo "";
	} 
}
//*****************************************///
public function getNameById($id){
    global $dbCon;
    $r = mysqli_query($dbCon,"SELECT mem_name 
                             FROM members 
                             WHERE id 
                             LIKE '$id'") or die(mysqli_error($dbCon));
    if(mysqli_num_rows($r) > 0){
        while($row = mysqli_fetch_array($r)){
         return $row[0];
        }        
    }else{
        return NULL;
    }
}
//*****************************************///
public function getIdByName($name){
    global $dbCon;
    $r = mysqli_query($dbCon,"SELECT id 
                             FROM members 
                             WHERE mem_name 
                             LIKE '$name'") or die(mysqli_error($dbCon));
    if(mysqli_num_rows($r) > 0){
        while($row = mysqli_fetch_array($r)){
         return $row[0];
        }        
    }else{
        return NULL;
    }
}
//*****************************************///
public function getAvatar($nameOrId){
    $nameOrId = trim(strtolower($nameOrId));
    global $dbCon;
        $q = "SELECT mem_avatar 
             FROM members";
    if(is_numeric($nameOrId)){
        $q .= " WHERE id LIKE '$nameOrId'";
    }else{
        $q .= " WHERE mem_name = '$nameOrId'";
    }
    $r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
    while($row = mysqli_fetch_array($r)){
        if(!empty(trim($row[0]))){
            return '/reson8/upl/'.urldecode($row[0]);
        }else{
            return '/reson8/css/img/avatars/boy.png'; 
        }
        break;
    }
 }
//*****************************************///
public function ifLoggedOut($echoThis){
global $dbCon;
if(!isset($_SESSION['username'])){
	echo $echoThis;
	}else{
		 echo "";
	} 
}
//*****************************************///
public function echoIfIsset($chk,$Echo,$elseEcho){
    if(isset($chk) || !empty($chk)){
        echo $Echo;
    }else{
        echo $elseEcho;
    }
}
//*****************************************///
public function getD8Re4matted($d8){
 if(isset($d8) &&  $d8 !== 'Private'){
    $d8 = explode('-',$d8);
    $d8New = $d8[1].'-'.$d8[2].'-'.$d8[0];
   return $d8New;     
 }else{
     echo "";
 }
}
//*****************************************///
public function ifStrLenEqualZero($str,$thenEcho){
    if(strlen($str) == 0){
        echo $thenEcho;
    }else{
        echo $str;
    }
}
//*****************************************///
public function ifStrLenNotZero($str,$thenEcho){
    if(strlen($str) > 0){
        echo $thenEcho;
    }else{
        echo $str;
    }
}
//*****************************************///
public function ifIssetAndEquals($var,$eqls,$Echo,$else){
        if(isset($var) && $var == $eqls){
          echo $Echo;
     }else{
         echo $else;
     }
 }
//*****************************************///  
public function getAdminFld($usrName){
    global $dbCon;
    $q = "SELECT `admin` 
          FROM `members`
          WHERE `mem_username` = '$usrName'";
    $r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
        while($row = mysqli_fetch_assoc($r)){
            $adminStatus = $row['admin'];
             break;
        }
    return $adminStatus;
}
//*****************************************///
public function getCompId($usrName){
    global $dbCon;
    $q = "SELECT `company_id` 
          FROM `members`
          WHERE `mem_username` = '$usrName'";
    $r = mysqli_query($dbCon,$q) or die(mysqli_error($dbCon));
        while($row = mysqli_fetch_assoc($r)){
            $company_id = $row['company_id'];
             break;
        }
    return $company_id;
}
//*****************************************///
public function ifGet($get,$eqls,$echo,$else){
    if(!empty($eqls)){
        if(isset($_GET[$get]) && $_GET[$get] == $eqls){
            echo $echo;
        }else{
            echo $else;
        }
    }else{
        if(isset($_GET[$get])){
            echo $echo;
        }else{
            echo $else;
        }
    }
}
//*****************************************///
public function ifStrstr($This,$inThis,$echo,$else){
    if(stristr($inThis,$This)){
        echo $echo;
    }else{
        echo $else;
    }
}
//*****************************************///
function dateAdd($hour,$minute,$day){	
    $newdate = date('Y-m-d', mktime(
    date('h') + $hour, ////hour
    date('i') + $minute, /////minute
    0,                  ////seconds
    date('m'), ////month
    date('d') + $day, /////day
    date('y'))); //////year
return $newdate;
 }    
}////END CLASS fn

class hdr{
    
    public function meta($keywords,$author,$desc){
  
    echo '
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html" />
    <meta http-equiv="content-type" content="cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="'.$author.'" />	
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="keywords" content="'.$keywords.'" />
    <meta name="description" content="'.$desc.'" /> 	  
    
 
     <script src="/reson8/js/jquery-1.11.3.min.js" ></script>
	<script src="/reson8/js/jquery-ui.js" ></script>
	<script src="/reson8/js/custom.js" ></script>   
 	<script src="/reson8/js/jquery.easing.min.js" ></script>
 	<script src="/reson8/js/bootstrap.min.js" ></script>
 	<script src="/reson8/js/jquery-scrollto.js" ></script>
 	<script src="/reson8/js/jquery.validate.js" ></script>
     
    <link rel="icon" href="/reson8/css/icon.ico" /> 
	<link rel="stylesheet" type="text/css" href="/reson8/css/bootstrap.css" />   
    <link rel="stylesheet" type="text/css" href="/reson8/css/jquery-ui.css" />	
 	<link rel="stylesheet" type="text/css" href="/reson8/css/custom.css" />
       
    ';
    }
    
    public static function page($pg){
	  if(defined('_PG_')){
		  $pg = true ? ($pg == _PG_ ? 'active' : '') : false;
	  }
	  return $pg;
  }///////////////////////////
}////END CLASS hdr
 /////////////// END FUNK \\\\\\\\\\\\\\\\\\\\\
$fn = new fn;
//////////////////////////////////////////////
$hdr = new hdr;
//////////////////////////////////////////////
?>

<script>
 ////MEMBR PG BG CHANGE
function bgChng(){
    $(function(){
        $('#myModal2').fadeIn('fast');
            $('#uplBtn').change(function(){
                
                var fName = this.files[0].name;
                var fType = this.files[0].type;
                var fSize = this.files[0].size;
                var thumbNailSrc = URL.createObjectURL(this.files[0]);
                var thumbNail = document.createElement('img');
                
                thumbNail.setAttribute('src',thumbNailSrc);
                thumbNail.setAttribute('alt','Background');
                thumbNail.setAttribute('title','Background');
                thumbNail.className = 'thumnail center-block img-rounded';
                  
                $(thumbNail).css({
                    'border':'3px solid white',
                    'box-shadow':'0px 1px 3px #333',
                    'margin-top':'7px',
                    'max-width':'250px'
                });
                
                $('#imgHiddenInput').before(thumbNail);
                
                if(fType.match(/jpeg/) ||
                   fType.match(/gif/) ||
                   fType.match(/png/) ||
                   fType.match(/bmp/)){
                    console.log(URL.createObjectURL(this.files[0]));
                    
                $("#sbtBtn").attr("class","fade in btn btn-sm btn-primary");
                    
                }else{
                    popUpMsg("Can only upload pictures");
                }////END if
            })
            window.onclick = function(){
                if(event.target.id == 'myModal2'){
                    $('#myModal2').fadeOut('fast');  
                }////END if            
            }///END win.onclick       
    })////END $(fn)
}////END funk
  //////popup method////
popUpMsg = function(msg){
    ///////POP UP A MSG THAT FADES OUT 
	$('#msgSntPopup h1').text(msg);
    $('#msgSntPopup').effect('pulsate',{
        times:2,
     },function(){
        $('#msgSntPopup').fadeIn('fast',function(){
            $('#msgSntPopup').fadeTo('1',2700,function(){
                $('#msgSntPopup').fadeOut("slow");
            });
        })        
    })
}   
  ////I <3 ECMA\\\\\\
function audioAction(attr){
 	$(function(){
 		var curPlayer = document.getElementById(attr);
 		$.each($('audio'),function(){
			if(document.getElementById(this.id).id !== attr){
				document.getElementById(this.id).pause();
			}
		})
 	})
}
  //// drag to like or suscrib\\
function drag2playlist(songId,elmId,prodId){
    prod_id = prodId;
    song_id = songId;
    elm_Id = '#' + elmId;
                
       $(function(){
        $(elm_Id).draggable({
            
        containment:'.wrapper_2',
        revert:true,
        opacity:'.5',
            
            start: function(){
                var imgSrc = escape('/reson8/css/img/heart.png');
                $('#mid_block').html("<div id='likeDropBox'>"+
                         "<img src="+imgSrc+" width='95px' />"+
                                    "</div>");
                $(elm_Id+'_img').fadeOut('fast');
                 popUpMsg('Drag song below to add to playlist');
             },
            stop: function(){
                var dfltHtml = "<center><b class='badge center-block'>Drag song here to add to playlist</b><br></center>";
                $('#mid_block').html(dfltHtml);
                $('#add2playlstPopup').fadeOut('fast');
                $(elm_Id+'_img').fadeIn('fast');
                $(elm_Id+'_img').css('position','absolute');
            }
        })
    })///end $(fn)
}////END fn
$('#mid_block').droppable({
    
        tolerance:'touch',
        
    over:function(){
        $('#likeDropBox').css({
            'background-color':'rgba(255,255,255,0.25)',
            'border-color':'red'
        });
        $('#add2playlstPopup').effect('pulsate',{
            times:2
        },function(){
            $('#add2playlstPopup').fadeIn('fast');
        });
    },
    out:function(){
        $('#likeDropBox').css({
            'background-color':'rgba(0, 0, 0, 0.2)',
            'border-color':''
        });    
         $('#add2playlstPopup').fadeOut('fast');
    },     
    drop:function(){
        add2playlist(song_id,prod_id);
        $('#add2playlstPopup').fadeOut('fast');
    }////END drop fn
})///END droppable fn
         $('#add2playlstPopup').fadeOut('fast');
</script>
