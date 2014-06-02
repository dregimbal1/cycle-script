<?php session_start();require('libs/Smarty.class.php');include('includes/dbc.php');$smarty = new Smarty;if (!isset($_SESSION['user'])){ die ("Access Denied");}
$smarty = new Smarty;// Call calendar.// I hate Smarty with a passion. Thus will iframe this - however, dont recommend.// This is like iframe,, but wayyyyy better using PHP (:$cal = "includes/calendar.php"; $cal_read = readfile( $cal );$smarty->assign('calendar', $cal_read);
//Navigation
$page = "calendar";
$smarty->assign('page', $page);
$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;
//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);
$smarty->assign("Name","Cycle Day Script",true);
$smarty->display('calendar.tpl');
?>