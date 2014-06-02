<?php
// BY DAVID REGIMBAL
require('libs/Smarty.class.php');

$smarty = new Smarty;

	include("includes/dbc.php");

$user_email = mysql_real_escape_string($_POST['email']);

if ($_POST['Submit']=='Sign In')
{
$md5pass = md5($_POST['pwd']);
$sql = "SELECT id,user_email FROM users WHERE 
            user_email = '$user_email' AND 
            user_pwd = '$md5pass' AND user_activated='1'"; 
			
$result = mysql_query($sql) or die (mysql_error()); 
$num = mysql_num_rows($result);

    if ( $num != 0 ) { 

        // A matching row was found - the user is authenticated. 
       session_start(); 
	   list($user_id,$user_email) = mysql_fetch_row($result);
		// this sets variables in the session 
		$_SESSION['user']= $user_email;  
		
			
		if (isset($_GET['ret']) && !empty($_GET['ret']))
		{
		header("Location: $_GET[ret]");
		} else
		{
		header("Location: modify.php");
		}
		//echo "Logged in...";
		exit();
    } 

header("Location: login.php?msg=Invalid Login");
//echo "Error:";
exit();		
}

$user_ip = $_SERVER['REMOTE_ADDR']; // will return current visitor's ip address
$smarty->assign("userip", $user_ip);

// PREP IP LOG
$ipaddress = $_SERVER['REMOTE_ADDR']."\r\n";
$file = 'log.txt';
$fp = fopen($file, 'a');
fwrite($fp, $ipaddress);
fclose($fp);
// INFO SENT. CHECK LOG.TXT IN ROOT FOR ALL IP'S THAT HAVE BEEN HERE


$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->assign("Name","Cycle Day Script",true);

$smarty->display('login.tpl');
?>
