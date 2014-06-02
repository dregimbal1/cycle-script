<?php
// BY DAVID REGIMBAL
session_start();

require('libs/Smarty.class.php');


include('includes/dbc.php');

$smarty = new Smarty;


if (!isset($_SESSION['user']))
{
 die ("Access Denied");
}

if ($_POST['Submit'] == 'Add')
{
   if (strlen($_POST['email']) < 5)
   {
    die ("Incorrect email. Please enter valid email address..");
    }
   if (strcmp($_POST['pass1'],$_POST['pass2']) || empty($_POST['pass1']) )
	{ 
	//die ("Password does not match");
	die("ERROR: Password does not match or empty..");

	}
	
	$rs_duplicates = mysql_query("select id from users where user_email='$_POST[email]'");
	$duplicates = mysql_num_rows($rs_duplicates);
	
	if ($duplicates > 0)
	{	
	//die ("ERROR: User account already exists.");
	header("Location: register.php?msg=ERROR: User account already exists..");
	exit();
	}

	$md5pass = md5($_POST['pass2']);
	$activ_code = rand(1000,9999);
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	mysql_query("INSERT INTO users
	              (`user_email`,`user_pwd`,`country`,`joined`,`activation_code`,`full_name`)
				  VALUES
				  ('$_POST[email]','$md5pass','$_POST[country]',now(),'$activ_code','$_POST[full_name]')") or die(mysql_error());
	
	$message = 
"Thank you for registering an account with $server. Here are the login details...\n\n
User Email: $_POST[email] \n
Password: $_POST[pass2] \n
Activation Code: $activ_code \n
____________________________________________
*** ACTIVATION LINK ***** \n
Activation Link: http://$host$uri/activate.php?usr=$_POST[email]&code=$activ_code \n\n
_____________________________________________
Thank you. This is an automated response. PLEASE DO NOT REPLY.
";

	mail($_POST['email'] , "Login Activation", $message,
    "From: \"Auto-Response\" <notifications@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());
	unset($_SESSION['ckey']);
	echo("Registration Successful! An activation code has been sent to your email address with an activation link...");	
	
	exit;
	}	

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

//Navigation
$page = "adduser";
$smarty->assign('page', $page);


//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);



$smarty->display('adduser.tpl');


?>