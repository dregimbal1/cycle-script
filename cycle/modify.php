<?php
// BY DAVID REGIMBAL
require('libs/Smarty.class.php');

$smarty = new Smarty;

session_start();
if (!isset($_SESSION['user']))
{
 die ("Access Denied");
}

	
include("includes/dbc.php");
	
//Get variables stored in database
$getnum = "SELECT numcycle FROM settings";
$placenum = mysql_query($getnum);
$outputnum = mysql_fetch_assoc($placenum);

$getend = "SELECT enddate FROM settings";
$placeend = mysql_query($getend);
$outputend = mysql_fetch_assoc($placeend);

$getdate = "SELECT startdate FROM settings";
$placedate = mysql_query($getdate);
$outputdate = mysql_fetch_assoc($placedate);

$getcyclename = "SELECT cyclename FROM settings";
$placecyclename = mysql_query($getcyclename);
$outputcyclename = mysql_fetch_assoc($placecyclename);

//Lets save data if we have to
if ($_POST['Submit'] == 'Save')
{
	$numupdate = $_POST['numcycle'];
	$dateupdate = $_POST['startdate'];
	$cyclename_update = $_POST['cyclename'];
	$endupdate = $_POST['enddate'];

	mysql_query("UPDATE settings SET numcycle = '$numupdate'");
	mysql_query("UPDATE settings SET startdate = '$dateupdate'");
	mysql_query("UPDATE settings SET cyclename = '$cyclename_update'");
	mysql_query("UPDATE settings SET enddate = '$endupdate'");

	header("Location: modify.php?msg=Settings Updated");

}	

include("includes/cron.php");

$smarty->force_compile = true;
$smarty->debugging = false;
$smarty->caching = true;
$smarty->cache_lifetime = 120;

//Navigation
$page = "modify";
$smarty->assign('page', $page);

//Convert PHP variables to something smarty can read
$smarty->assign('numcycle', $outputnum['numcycle']);
$smarty->assign('enddate', $outputend['enddate']);
$smarty->assign('startdate', $outputdate['startdate']);
$smarty->assign('cyclename', $outputcyclename['cyclename']);

//Say hello, get some user details
$smarty->assign('user', $_SESSION['user']);
$smarty->assign('cycleday', $DS_DISPLAY);

$smarty->assign("Name","Cycle Day Script",true);

$smarty->display('modify.tpl');
?>
