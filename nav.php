 <?//login_hdr\\?>
 <section class='content' id='login'>
  <div class='container-fluid'>
   <div class='row'>
    <div class='col-lg-1'></div>   
     <div class='col-lg-10'>
	  <div class='content-1' id=''>
 	   <table class='table-condensed table-responsive' width='100%' cols='12'>
	    <tbody>
 		 <tr>
		  <th colspan='35%'>
		   <span align='left' valign='center' >
			<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
			 <ul class='list-inline'>
			  <li>
				<input class='<?=$fn->ifLoggedIn('hide')?>' name='usr_login' id='loginName1' type='name' class='input-sm' size='15' maxlength='15' placeholder='Login' value='Login' onfocus='this.value="";$("#loginName2").attr("name","");this.name="usr_login";' required />
			  </li>
			  <li class='<?=$fn->ifLoggedIn('hide')?>'>
				<input name='pw' id='loginPw1' type='password' class='input-sm' size='15' maxlength='15' minlength='5' placeholder='Password' value='Password' onfocus='this.value="";$("#loginPw2").attr("name","");this.name="pw";' required />
				<input type='submit' id='loginBtn' value='Login' class='btn btn-sm btn-info' onmousedown='clrFlds()' />
			  </li>
			  <li>
			   <button type='button' class='btn btn-sm btn-primary <?=$fn->ifLoggedIn('hide')?>' onclick='<?=$fn->ifLoggedOut('register()')?>'>
			    Register
			   </button>
			  </li>
			  <li id='loggedInMenu' class='<?=$fn->ifLoggedOut('hide')?>'>
			  <img src='/reson8/css/img/contacts.png' class='img-responsive' width='30px' title='Your Account'/>
			  <?=$fn->ifLoggedIn(ucfirst(trim(_USER_)))?><span class='caret'></span>
			   <?///submenu when logged in\\\?>
			   <?///submenu when logged in\\\?>
			   <ul class='list-horizontal <?=$fn->ifLoggedOut('')?>'>
			    <li><a href='/reson8/prof' target='_self' class='btn-link'>Account</a></li>
			    <li><a href='/reson8/mem<?='/?member='.urlencode(_USER_)?>' target='_self' class='btn-link'>Profile</a></li>
 			    <li><a href='#' class='btn-link' onclick="window.open('/reson8/playlist/','_add','width=330,height=500,menubar=0,resizeable=0,scrollbars=no,status=0,toolbar=0')">Playlist</a></li>
			    <li><a href='/reson8/?logout=1' target='_self' class='btn-link'>Logout</a></li>
			   </ul>
			  </li>
			 </ul>
			</form>
		   </span>
		  </th>
 		  <th colspan='35%' id='socialIcons'>
		   <a href='' target='_blank'>
		    <img src='/reson8/css/img/yahoo.png' class='img-responsive' width='32px' />
		   </a>
		   <a href='' target='_blank'>
		    <img src='/reson8/css/img/youtube.png' class='img-responsive' width='32px' />
		   </a>
		   <a href='' target='_blank'>
		    <img src='/reson8/css/img/google.png' class='img-responsive' width='32px' />
		   </a>
		   <a href='' target='_blank'>
		    <img src='/reson8/css/img/facebook.png' class='img-responsive' width='32px' />
		   </a>
		  </th>
		 </tr>
 		</tbody>
	   </table>
	  </div>
	 </div>   
     <div class='col-lg-1'></div>  
   </div>
  </div>
 </section>
 
<div class='hide' id='filler' style='display:block;width:100%;height:50px;'></div>

<nav role='navigation' class='navbar navbar-default navbar-static-top' id='navbarTop' > 	 

<?//sticky login\\?>
<div id='stickyLogin' class='hide' id='<?=$fn->echoIfIsset(_USER_,'hide','')?>'>
<form action='<?=htmlspecialchars($_SERVER['PHP_SELF'])?>' method='post'>
 <ul class='list-inline <?=$fn->ifLoggedIn('hide')?>'>
  <li>
	<input id='loginName2' name='' type='name' class='input-sm' size='15' maxlength='15' placeholder='Login' value='Login' onfocus='this.value="";this.name="usr_login";$("#loginName1").attr("name","");' required />
  </li>
  <li>
  	<input id='loginPw2' type='password' class='input-sm' size='15' maxlength='15' minlength='5' placeholder='Password' value='Password' onfocus='this.value="";this.name="pw";$("#loginPw1").attr("name","");' required />
    <input type='submit' value='Login' class='btn btn-sm btn-info' onmousedown='clrFlds()' />
  </li>
 </ul>
</form>
<?//social icons\\?>
 <ul class='<?=$fn->echoIfIsset(_USER_,'list-inline','hide')?>'>
  <li>
   <a href='' target='_blank'>
	<img src='/reson8/css/img/yahoo.png' class='img-responsive' width='32px' />
   </a>  
  </li>
  <li>
   <a href='' target='_blank'>
	<img src='/reson8/css/img/youtube.png' class='img-responsive' width='32px' />
   </a>  
  </li>
  <li>
   <a href='' target='_blank'>
	<img src='/reson8/css/img/google.png' class='img-responsive' width='32px' />
   </a>  
  </li>
  <li>
    <a href='' target='_blank'>
	<img src='/reson8/css/img/facebook.png' class='img-responsive' width='32px' />
   </a> 
  </li>
 </ul>
</div> 	 
 
  <style>
.text-bright{
    color:#d2d8dd !important;
}
.text-bright.active{
    color:#9ab8ea !important;
}
.text-bright:hover{
    color:#ffffff !important;
}
  </style>
  
 <div class='navbar-header' id='nvHdr'>
 
  <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#navUl' >
   <span class='icon-bar'></span>
   <span class='icon-bar'></span>
   <span class='icon-bar'></span>
  </button>
  
 <a class='navbar-brand' href='/reson8/'>
 
   <img src='/reson8/css/img/logo2.png' title='Logo' alt='Welcome' width='90px' class='img-responsive img-rounded' style='margin-top:-10px;' />

 </a>	
  </div>
  <div class='navbar-collapse collapse' id='navUl'>
  <ul class='nav navbar-nav navbar-right'>
   <li>&nbsp;</li>
   <li class=""><a class="text-bright <?=$hdr->page('home')?>" href="/reson8/" >Home</a></li>
   <li class=""><a class="text-bright <?=$hdr->page('srch')?>" href="/reson8/srch">Search</a></li>
   <li class="genLi"><a class="text-bright <?=$hdr->page('genre')?>" href="#">Genre<span class='caret'></span></a>
	<ul style='position:absolute;' class='gen'>
	 <li><a href='/reson8/genre/?gen=electro'>Electro</a></li>
	 <li><a href='/reson8/genre/?gen=hiphop'>Hiphop</a></li>
	 <li><a href='/reson8/genre/?gen=jazz'>Jazz</a></li>
	 <li><a href='/reson8/genre/?gen=country'>Country</a></li>
	 <li><a href='/reson8/genre/?gen=classical'>Classical</a></li>
	 <li><a href='/reson8/genre/?gen=soul'>Soul</a></li>
	 <li><a href='/reson8/genre/?gen=celtic'>Celtic</a></li>
	 <li><a href='/reson8/genre/?gen=fantasy'>Fantasy</a></li>
	 <li><a href='/reson8/genre/?gen=rock'>Rock</a></li>
	 <li><a href='/reson8/genre/?gen=orchestra'>Orchestra</a></li>
	 <li><a href='/reson8/genre/?gen=other'>Other</a></li>
	</ul>
   </li>
     <li class=""><a class="text-bright <?=$hdr->page('about')?>" href="/reson8/about">About&nbsp;&nbsp;&nbsp;&nbsp;</a></li>   
    </ul>  
     <?php
	 if(isset($_GET['wrong'])){
		 print('Wrong Login Info, Please try again');
	 }
	 ?>
 </div>
</nav>	 
<?///END OF NAV\\\?>
<?///END OF NAV\\\?>

<script type='text/javascript'> 
function clrFlds(){
	var nput_name1 = document.getElementById('loginName1');
	var nput_name2 = document.getElementById('loginName2');
	var nput_pw1 = document.getElementById('loginPw1');
	var nput_pw2 = document.getElementById('loginPw2');
	if(nput_name1.value == 'Login'){
		nput_name1.value = '';
	}if(nput_name2.value == 'Login'){
		nput_name2.value = '';
	}//////END if
	if(nput_pw1.value == 'Password'){
		nput_pw1.value == '';
	}if(nput_pw2.value == 'Password'){
		nput_pw2.value == '';
	}//////END if
}
var daBody = document.body;

if(daBody == false || daBody == 'Undefined'){
  daBody = window.document.body;
}
function stick(){
 	if(daBody.scrollTop > 180){
		document.getElementById('stickyLogin').className = 'fade in';
		document.getElementById('filler').className = '';
		document.getElementById('nvHdr').style.display = 'none';
		document.getElementById('navbarTop').className = 'navbar navbar-default navbar-fixed-top';
	}else if(daBody.scrollTop < 180){
 		document.getElementById('stickyLogin').className = 'hide';		
		document.getElementById('filler').className = 'hide';
		document.getElementById('nvHdr').style.display = '';		
		document.getElementById('navbarTop').className = 'navbar navbar-default navbar-static-top';		
	} 
}
 ////////////////////
////////////////////////////////////////////
document.getElementById('regYolo').onclick = function(){
	$('#myModalReg').fadeIn('fast');
} 
</script>
<script>
function register(){
	$(function(){
		var modalWin = $('#myModal3');
		var modalContent = $('#myModal3 .modal-content');
		var html = "<form id='regFrm'><table class='table-responsive table-condensed' align='center' id='newRegTbl'>";
			html += "<tbody><tr><td colspan='100%'>";
			html += "<div id='memRegTitle' colspan='100%' class='text-primary text-center' width='100%' style='text-shadow:0px 1px 3px #777;'>New Member Registration</div>";
			html += "<span class='badge center-block regTitle'><b class='label label-primary'>Required</b>: Fields must be filled out.</span>";
			html += "<p id='newRegFormPg' align='center'><label class='pull-left label label-primary'>Login name</label>";
			/////login
			html += "<input onkeyup='chkLogin()' type='name' name='login' class='input-sm form-control' maxlength='50' placeholder='Enter your login name here' required /><span id='iconHere'></span>";
			html += "<label class='pull-left label label-primary'>Email</label>";
			/////email
			html += "<input type='email' name='email' class='input-sm form-control' maxlength='50' placeholder='Enter your Email' required />";
			html += "<label class='pull-left label label-primary'>Password</label>";
			/////password
			html += "<input type='password' name='pw' id='passwrd' class='input-sm form-control' maxlength='20' placeholder='Enter your Password' required />";
			html += "<label class='pull-left label label-info'>Zip or Postal Code</label>";
			/////zip
			html += "<input name='zip' type='tel' id='zipYo' class='input-sm form-control' maxlength='5' placeholder='Enter Zip Code'  />";
			html += "<label class='pull-left label label-info'>Phone Number</label>";
			html += "<input name='phoneNum' type='tel' class='input-sm form-control' maxlength='10' placeholder='Phone Number' required />";
			html += "<br><button onclick='regSbt()' id='regSbmtBtn' class='btn btn-primary btn-lg' type='submit' disabled>Register</button>";
			html += "</p>";
			html += "</td></tr>";
			html += "</tbody></table></form>";
 		$(modalContent).css('background-color','#ddd');
		$(modalWin).fadeIn('fast');
		$(modalContent).html(html);
		$("input[name='login']").focus();
		$('#newRegFormPg').keyup(function(){
			if($.trim($('input[name="login"]').val()) !== '' 
			&& $.trim($('input[name="email"]').val()) !== '' 
			&& /@/.test($('input[name="email"]').val()) 
			&& $('input[name="email"]').val().indexOf('.') > $('input[name="email"]').val().indexOf('@')
			&& $.trim($('#passwrd').val()) !== ''
			&& /[0-9]/.test($('#passwrd').val())
			&& !$('#passwrd').val().match(/[^a-z|A-Z|0-9]/)
			&& $.trim($('input[name="login"]').val()).length > 4
			&& loginDup == false
			&& $('#passwrd').val().length > 4){
				$('#regSbmtBtn').removeAttr('disabled');
			}else{
				$('#regSbmtBtn').attr('disabled','');
			}///END funk
		})
		$("#zipYo").keyup(function(){
			if(isNaN($(this).val())){
				$(this).val('');
				popUpMsg("Must enter Zip Code Number");
			}///////END if
		})
		$("input[name='phoneNum']").keyup(function(){
			if(isNaN($(this).val())){
				$(this).val('');
				popUpMsg("Must enter Phone Number");
			}///////END if
		})
		window.onclick = function(){
			if(event.target.id == 'myModal3'){
				$(modalWin).fadeOut('fast');
			}//////END if
		}////////END win.onclck
		$('#regSbmtBtn').mouseup(function(){
			$(this).attr('type','button');
		})
 			$('#regFrm').validate({
				rules:{
					login:{
						required:true,
						minlength:5
					},
					email:{
						required:true,
						email:true
					},
					zip:{
						required:true,
						minlength:5,
						number:true
					},
					phoneNum:{
						minlength:10,
						number:true
					},
					pw:{
						required:true,
						minlength:5 
  					}				
				},
				messages:{
					pw:{
						minlength:'Must contain number and be atleast 5 characters long'
					}
				}
			})
 	})
}//////////////////////
function chkLogin(){
	var loginVal = $('input[name="login"]').val();
 	$.getJSON('/reson8/incl/editSong.php',{loginVal:loginVal},function(data){
 		if($.trim(loginVal).length > 4){
			//// 0 = DUP TRUE & 1 = DUP FALSE
 			if(data.check == '0'){
				iconUrl = "/reson8/css/img/padlock.png";
				$('input[name="login"]').css('background-color','#ffdddd');
				loginDup = true;
			}else{
				loginDup = false;
				$('input[name="login"]').css('background-color','#fff');
				iconUrl = "/reson8/css/img/unlocked.png";
			}////END if else		
		}else{
			if($.trim(loginVal).length == 0){
				iconUrl = '';	
			}else{
				iconUrl = '/reson8/css/img/loading2.gif';
			}
 		}////END if
			$("#iconHere").html("<img src='"+iconUrl+"' class='img-rounded pull-right' width='30px' />");
	})///END getjson
 }/////END funk
function regSbt(){
 	var username = $("input[name='login']").val();
	var email = $("input[name='email']").val();
	var pw = $("#passwrd").val();
	var zipCode = $("#zipYo").val();
	var phone = $("input[name='phoneNum']").val();
 	$.getJSON('/reson8/incl/editSong.php',{
			username:username,
			email:email,
			pw:pw,
			zipCode:zipCode,
			phone:phone,
			newReg:''
	},function(result){
		if($.trim(result.success) == 'ok'){
			$('#loginName1').val(result.login);
			$('#loginPw1').val(result.pw);
			$('#loginBtn').trigger('click');
		}else{
			alert('Problem with registration process, contact ya boi Brandon');
		}////END if
	})/////END get
}///////END funk
 </script>
  <?///MODAL 1\\\?>
 <div id='myModal3' class='modal modal1' >
 <div class='modal-content' style='min-height:250px;'>
    <span class='close' style='margin-bottom:10px;' onclick='$("#myModal3").fadeOut("fast")' >
	 <button class='btn btn-danger'>X</button>
   </span>
  </div>
 </div>
 <?///END MODAL\\\?> 
 <script>
$('#myModal3 .modal-content').draggable();
</script>