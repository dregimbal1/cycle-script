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

if ($_POST['Submit']=='Change')
{
$rsPwd = mysql_query("select user_pwd from users where user_email='$_SESSION[user]'") or die(mysql_error());
list ($oldpwd) = mysql_fetch_row($rsPwd);

if ($oldpwd == md5($_POST['oldpwd']))
 {
  $newpasswd = md5($_POST['newpwd']);
  
  mysql_query("Update users
  				SET user_pwd = '$newpasswd'
				WHERE user_email = '$_SESSION[user]'
				") or die(mysql_error());
  header("Location: profile.php?msg=Password updated...");				
  } else 
  { header("Location: profile.php?msg=ERROR: Password does not match..."); }
}

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 120;

//Navigation
$page = "profile";
$smarty->assign('page', $page);


//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);



$smarty->display('profile.tpl');


?>