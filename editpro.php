<?php 
 require_once("includes/initialize.php");
$id=$_REQUEST['record'];
$result=User::select_user_details($id);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
       <script src="js/jquery-1.4.2.js"></script>
       <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" charset="utf-8" />
       <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
       <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
 <script type="text/javascript" src="js/jquery.textshadow.js"></script>
    <script type="text/javascript" src="js/jquery.color.js"></script>
    <script type="text/javascript" src="js/aja.js"></script>

    <script>$(document).ready(function(){
  if ($.browser.msie) {
	  var sha = {
			x      : 0,
			y      : 0,
			radius : 2,
			color  : '#191919',
			opacity: 50
		};
  $(".txtshd").textShadow(sha);
  
}
else
{$("table").addClass("txtshd");}
})
	
</script>
<style>
body
{
	background:#50a6e5 url(images/bg_top.jpg) repeat-x top;

}
.content {
	margin:25px auto;
	width:500px;
	height:500px;
	background:#50a6e5 url(images/bg_top.jpg) repeat-x top ;
	border:1px solid #00e4f8;
	-moz-box-shadow:0px 0px 30px #000;
	-webkit-box-shadow:0px 0px 30px #000;
	box-shadow:0px 0px 30px #000;
	behavior: url(ie-css3.htc);
	
}

.txtshd{
	font:normal 16px Tahoma, Helvetica, sans-serif; 
	color:#000; 
	text-shadow:0px 0px 3px #191919;
	
}

table{
	width:450px;
	height:auto;
	padding:30px;
	
}

input[type="text"], input[type="password"]
{
	width:180px;
	padding:5px;
	text-shadow:0px 0px 1px;
}
select 
{
	width:192px;
	padding:5px;
	text-shadow:0px 0px 1px;

}

	.label    /* label for the text boxes */
{
	text-align:left;
	display:inline;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	color:#000;
	font-style:normal;
}


.form-login  {
		/*border: 1px solid #aeaeae;*/
		font-size: 16px;
		-webkit-border-radius:7px;
		border-radius:7px;
		-moz-border-radius:7px;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
		font-weight:bold;
		
		}
/* Styling for the CSS3 Button Goess here */

.button {
	display: inline-block;
	zoom: 1; /* zoom and *display = ie7 hack for display:inline-block */
	*display: inline;
	margin: 0 2px;
	outline: none;
	cursor: pointer;
	text-align: center;
	text-decoration: none;
	font: 14px/100% Arial, Helvetica, sans-serif;
	padding: .5em 2em .55em;
	text-shadow: 0 1px 1px rgba(0,0,0,.3);
	-webkit-border-radius: .5em; 
	-moz-border-radius: .5em;
	border-radius: .5em;
	-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	-moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
	box-shadow: 0 1px 2px rgba(0,0,0,.2);
	font-weight:bold;
}
.button:hover {
	text-decoration: none;
}
.button:active {
	position: relative;
	top: 1px;
}


.white {
	color: #606060;
	border: solid 1px #b7b7b7;
	background: #fff;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
	background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed');
}
.white:hover {
	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#dcdcdc));
	background: -moz-linear-gradient(top,  #fff,  #dcdcdc);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#dcdcdc');
}
.white:active {
	color: #999;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#fff));
	background: -moz-linear-gradient(top,  #ededed,  #fff);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ededed', endColorstr='#ffffff');
}

tr {height:50px;}


#status{		width:100%; 
				background:#0075d9;
				color:#fff;
				width:168px;
				font-family:tahoma;
				font-size:11px;
				border:2px solid #ddd;
				box-shadow: 0px 0px 6px #000;
				-moz-box-shadow: 0px 0px 6px #000;
				-webkit-box-shadow: 0px 0px 6px #000;
				padding:4px 10px 4px 10px;
				border-radius: 6px;
				-moz-border-radius: 6px;
				-webkit-border-radius: 6px;
				position:relative;
				margin-left:20px;
				margin-top:5px;
				}

</style>
	<script src="js/settings.js" type="text/javascript"></script>

<script>	
		$(document).ready(function() {
			$("#forID").validationEngine({
promptPosition: "topRight", // OPENNING BOX POSITION, IMPLEMENTED: topLeft, topRight, bottomLeft,  centerRight, bottomRight
validationEventTriggers:"keyup blur",
success :  false,
failure : function() {}
										 })	
			
			$('#status').hide();
		})
</script>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "images/loader.gif";

$(document).ready(function(){

$("#userName").change(function() { 

var usr = $("#userName").val();

if(usr.length >= 3)
{
$("#status").html('<img src="images/loader.gif" align="absmiddle">&nbsp;Checking availability...');


    $.ajax({  
    type: "POST",  
    url: "includes/check.php",  
    data: "userName="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#userName").removeClass('object_error'); // if necessary
		$("#userName").addClass("object_ok");
		$(this).html('&nbsp;<img src="images/accepted.png" align="absmiddle"> <font color="#fff" style="text-shadow:0px 0px 1px #32ff32; margin-left:20px; font-weight:bold;"> Available </font>  ');
		$("#sbmit").fadeIn('fast');
	}  
	else  
	{  
		$("#userName").removeClass('object_ok'); // if necessary
		$("#userName").addClass("object_error");
		$(this).html(msg);
		$("#sbmit").fadeOut('fast');
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="#FFF">Minimum <strong>3</strong> characters.</font>');
	$("#userName").removeClass('object_ok'); // if necessary
	$("#userName").addClass("object_error");
	$("#sbmit").fadeOut('fast');
	}

});

});

//-->
</SCRIPT>
       <script type="text/javascript">
	   function init()
	   {
	   document.getElementById('userName').value="<?php echo $result->username;?>";
	   document.getElementById('pass').value="<?php echo $result->password;?>";
	   document.getElementById('fullname').value="<?php echo $result->fullname;?>";
	   document.getElementById('e_mail').value="<?php echo $result->email_id;?>";
	   document.getElementById('contact').value="<?php echo $result->contact_no;?>";
	   }
	   </script>

</head>

<body onLoad="init()">
<div class="content">
  <form method="post" id="forID" action="registerSub.php?type=old" >
<table>
   <tr>
    <td width="46%"><div class="label">
      <div align="left">User Type</div>
    </div></td>
    <td width="54%"><div align="right">
      <input type="text" disabled class="form-login" name="usertypename" id="usertypename" value="<?php if($result->usertype_id==2){echo "Examinee";}elseif ($result->usertype_id==1){echo "Administrator";}?>">
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">User Name</div>
    </div></td>
    <td><div align="right">
      <input type="text" class="form-login validate[required,length[3,20]]" name="userName" id="userName" onBlur="javascript: $('#status').fadeIn('fast');">
    </div><div id="status"></div></td>
   
  </tr>
    <td><div class="label">
      <div align="left">Password</div>
    </div></td>
    <td><div align="right">
      <input type="password" class="form-login validate[required,length[6,20]]" name="password" id="pass" >
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">Confirm Password</div>
    </div></td>
    <td><div align="right">
      <input type="password" class="form-login validate[required,confirm[pass]]" name="cnfpassword" id="cnfrmpass" >
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">First Name</div>
    </div></td>
    <td><div align="right">
      <input type="text"class="form-login validate[required,,custom[onlyLetter]]" name="fullname" id="fullname" >
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">Contact No.</div>
    </div></td>
    <td><div align="right">
      <input type="text" class="form-login validate[required,custom[onlyNumber]]" name="contact" id="contact" >
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">Email</div>
    </div></td>
    <td><div align="right">
      <input type="text" class="form-login validate[required,custom[email]]" name="email" id="e_mail" >
    </div></td>
  </tr>
  <tr>
    <td><div class="label">
      <div align="left">Save Settings</div>
    </div></td>
    <td><div align="right">
      <input class="button white" name="sbmt" type="submit" value="Save" id="sbmit" >
    </div></td>
  </tr>
   <tr style="display:none">
    <td></td>
    <td><div align="right">
      <input type="hidden" name="owner_id" id="owner_id" readonly value="1">
    </div></td>
  </tr>
  <tr style="display:none">
    <td></td>
    <td><div align="right">
      <input type="hidden" name="auto_id" id="auto_id" readonly value="<?php echo $result->auto_id;?>">
    </div></td>
  </tr>
  <tr style="display:none">
    <td></td>
    <td><div align="right">
      <input type="hidden" name="usertypeid" id="usertypeid" readonly value="<?php echo $result->usertype_id;?>">
    </div></td>
  </tr>
</table>       
</form>
</div>
</body>
</html>
