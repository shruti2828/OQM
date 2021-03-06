<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>CSI Login Page</title> 
       <link rel="stylesheet" href="css/style.css" type="text/css">
       <link rel="stylesheet" href="css/modalbox.css" type="text/css" />
       <script type="text/javascript" src="js/prototype.js"></script>
	   <script type="text/javascript" src="js/scriptaculous.js"></script>
	   <script type="text/javascript" src="js/modalbox.js"></script>
       <script src="js/jquery-1.4.2.js"></script>
	   <script src="js/cufon-yui.js" type="text/javascript"></script>
	   <script src="js/BabelSans_500.font.js" type="text/javascript"></script>
	   <script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
       <link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" charset="utf-8" />
       <script src="js/jquery.validationEngine-en.js" type="text/javascript"></script>
       <script src="js/jquery.validationEngine.js" type="text/javascript"></script>
             
       <script type="text/javascript">   <!-- SCRIPT FOR THE FLASHY MENU -->
			 $(document).ready(function(){
  				if ($.browser.msie) {                  // hack for IE
 						 $(function() {
					   var $j = jQuery.noConflict();
				Cufon.replace('a, span').CSS.ready(function() {
					var $menu 		= $j("#slidingMenu");
					
					/**
					* the first item in the menu, 
					* which is selected by default
					*/
					var $selected	= $menu.find('li:first');
					
					/**
					* this is the absolute element,
					* that is going to move across the menu items
					* it has the width of the selected item
					* and the top is the distance from the item to the top
					*/
					var $moving		= $j('<li />',{
						className	: 'move',
						top			: $selected[0].offsetTop + 'px',
						width		: $selected[0].offsetWidth + 'px'
					});
					
					/**
					* each sliding div (descriptions) will have the same top
					* as the corresponding item in the menu
					*/
					$j('#slidingMenuDesc > div').each(function(i){
						var $this = $j(this);
						$this.css('top',$menu.find('li:nth-child('+parseInt(i+2)+')')[0].offsetTop + 'px');  
						<!-- Edited this section for the allignment problem -->
						<!--$this.css('margin-top','-107px');-->
						
					});
					
					/**
					* append the absolute div to the menu;
					* when we mouse out from the menu 
					* the absolute div moves to the top (like innitially);
					* when hovering the items of the menu, we move it to its position 
					*/
					$menu.bind('mouseleave',function(){
							moveTo($selected,400);
						  })
						 .append($moving)
						 .find('li')
						 .not('.move')
						 .bind('mouseenter',function(){
							var $this = $j(this);
							var offsetLeft = $this.offset().left - 20;
							//slide in the description
							$j('#slidingMenuDesc > div:nth-child('+ parseInt($this.index()) +')').stop(true).animate({'width':offsetLeft+'px'},400, 'easeOutExpo');
							//move the absolute div to this item
							moveTo($this,400);
						  })
						  .bind('mouseleave',function(){
							var $this = $j(this);
							var offsetLeft = $this.offset().left - 20;
							//slide out the description
							$j('#slidingMenuDesc > div:nth-child('+ parseInt($this.index()) +')').stop(true).animate({'width':'0px'},400, 'easeOutExpo');
						  });;
					
					/**
					* moves the absolute div, 
					* with a certain speed, 
					* to the position of $elem
					*/
					function moveTo($elem,speed){
						$moving.stop(true).animate({
							top		: $elem[0].offsetTop + 'px',
							width	: $elem[0].offsetWidth + 'px'
						}, speed, 'easeOutExpo');
					}
				}) ;
			});
  
  }
  
  $(function() {
					   var $j = jQuery.noConflict();
				Cufon.replace('a, span').CSS.ready(function() {
					var $menu 		= $j("#slidingMenu");
					
					/**
					* the first item in the menu, 
					* which is selected by default
					*/
					var $selected	= $menu.find('li:first');
					
					/**
					* this is the absolute element,
					* that is going to move across the menu items
					* it has the width of the selected item
					* and the top is the distance from the item to the top
					*/
					var $moving		= $j('<li />',{
						className	: 'move',
						top			: $selected[0].offsetTop + 'px',
						width		: $selected[0].offsetWidth + 'px'
					});
					
					/**
					* each sliding div (descriptions) will have the same top
					* as the corresponding item in the menu
					*/
					$j('#slidingMenuDesc > div').each(function(i){
						var $this = $j(this);
						$this.css('top',$menu.find('li:nth-child('+parseInt(i+2)+')')[0].offsetTop + 'px');  
						<!-- Edited this section for the allignment problem -->
						$this.css('margin-top','-107px');
						
					});
					
					/**
					* append the absolute div to the menu;
					* when we mouse out from the menu 
					* the absolute div moves to the top (like innitially);
					* when hovering the items of the menu, we move it to its position 
					*/
					$menu.bind('mouseleave',function(){
							moveTo($selected,400);
						  })
						 .append($moving)
						 .find('li')
						 .not('.move')
						 .bind('mouseenter',function(){
							var $this = $j(this);
							var offsetLeft = $this.offset().left - 20;
							//slide in the description
							$j('#slidingMenuDesc > div:nth-child('+ parseInt($this.index()) +')').stop(true).animate({'width':offsetLeft+'px'},400, 'easeOutExpo');
							//move the absolute div to this item
							moveTo($this,400);
						  })
						  .bind('mouseleave',function(){
							var $this = $j(this);
							var offsetLeft = $this.offset().left - 20;
							//slide out the description
							$j('#slidingMenuDesc > div:nth-child('+ parseInt($this.index()) +')').stop(true).animate({'width':'0px'},400, 'easeOutExpo');
						  });;
					
					/**
					* moves the absolute div, 
					* with a certain speed, 
					* to the position of $elem
					*/
					function moveTo($elem,speed){
						$moving.stop(true).animate({
							top		: $elem[0].offsetTop + 'px',
							width	: $elem[0].offsetWidth + 'px'
						}, speed, 'easeOutExpo');
					}
				}) ;
			});
});
	

		$("#lgfrm").validationEngine() 	
		</script>
       <script>	
		$(document).ready(function() {
				  var $JQ = jQuery.noConflict();
          		$JQ("#formID").validationEngine()
		});
		
		
	</script>
    <?php
require_once("../includes/initialize.php");

 $message="";
 
if($session->is_logged_in()) {
  redirect_to("index.php");
}

// Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['submit'])) { // Form has been submitted.

  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  
  // Check database to see if username/password exist.
	$found_user = User::authenticate($username, $password);
	
 if ($found_user) {
    $session->login($found_user);
		log_action('Login', "{$found_user->fullname} ({$found_user->username}) logged in.");
		
    redirect_to("index.php");
  } else {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }
  
} else { // Form has not been submitted.
  $username = "";
  $password = "";
}
?>
</head>
<body>      
<div class="myFloatBartop"><span id="fttext">CSI @ NIEC<sup>&copy;</sup></span></div>  
<div id="slidingMenuDesc" class="slidingMenuDesc">
			<div><span></span></div>
			<div><span></span></div>
			<div><span></span></div>
			<div><span></span></div>
            <div><span></span></div>
			<div><span>Sign Up Here To Be A Member Of This Site</span></div>
</div>
	 
<ul id="slidingMenu" class="slidingMenu">
		<li><a href="#">Login</a></li>
		<li style="visibility:hidden"><a href="#"></a></li>
		<li style="visibility:hidden"><a href="#"></a></li>
		<li style="visibility:hidden"><a href="#"></a></li>
		<li style="visibility:hidden"><a href="#"></a></li>
        <li style="visibility:hidden"><a href="#"></a></li>
		<li><a href="#" onClick="Modalbox.show('<div class=\'warning\'><p>Are you sure to delete this item?</p> <input type=\'button\' value=\'Yes, delete!\' onclick=\'Modalbox.hide()\' /> or <input type=\'button\' value=\'No, leave it!\' onclick=\'Modalbox.hide()\' /></div>',{title: 'sample', width: 300, overlayClose: false});">Sign Up</a></li>
            
    </ul>
		
<div id="form1"> 
        <center>
            <form method="get" id="formID" action="login.php" >
               <div class="label"><b>Username</div><input type="text" class="form-login validate[required]" name="username" id="usrnm"><br /><br /><br />
               <div class="label">Password</div><input type="password" class="form-login validate[required]" name="password" id="paswd" ><br /><br /><br />
               <input class="button white" name="submit" type="submit" value="Login" style="float:right; margin-top:-15px;margin-right:45px;"/>
              </form>
            </center>            
        </div>
        
        <div class="myFloatBar"><span id="fttext">CSI @ NIEC<sup>&copy;</sup></span></div>
</body>
</html>
