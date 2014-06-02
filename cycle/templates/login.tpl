<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Sign In - {$Name}</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="templates/resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="templates/resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="templates/resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="templates/resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="templates/resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="templates/resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="templates/resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="templates/resources/scripts/jquery.wysiwyg.js"></script>
		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="templates/resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Cycle Administration</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="templates/resources/images/logo.png" alt="" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form name="form1" method="post" action="">
				
					<div class="notification information png_bg">
						<div><center>
							Your information has been logged.<br />
							IP: {$userip}</center>
						</div>
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="email" id="email" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="pwd" id="pwd"/>
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="Submit" value="Sign In" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
